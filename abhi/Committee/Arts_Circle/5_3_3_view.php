<?= $this->extend('Layouts/hodBase');?>
<?= $this->section("Content");?>

<h1 class="text-center my-3"> 5.3.3</h1>
<div class="container-fluid border border-info-subtle my-4" style="display:none" id="hod">
    <form class="row g-3 my-3 mx-2 border"  method="post" action="<?= base_url('save_5_3_3') ?>">
        
        <div class="col-md-4 mb-3">
            <label class="form-label">In which Academic Year you want to Store Data ? <label style="color: red;"><strong>*</strong></label></label>
            <input type="text" class="form-control" name="AcademicYear" id="datepicker" placeholder="Enter Year" maxlength="4" autocomplete="off" required>
            <span id="error-message" style="display:none;color:red;">Please enter a valid valid Year.</span>
        </div>

        <div class="col-md-4">
            <label class="form-label">Date of Event/Competition : <label style="color: red;"><strong>*</strong></label></label>
            <input type="date" id="datepicker2" name="dateEvent" class="form-control" autocomplete="off" min="2019-01-01" required>
        </div>

        <div class="col-md-4">
            <label class="form-label">Name of the Event/Competition : <label style="color: red;"><strong>*</strong></label></label>
            <input type="text" id="nameEvent" name="nameEvent" class="form-control" autocomplete="off" oninput="validatenameEvent()" required>
            <span id="nameEventError" style="display:none;color:red;">Please Enter a Valid  Name of the Event/Competition.</span>
        </div>

        <div class="col-md-7">
            <label class="form-label">Type of the Event/Competition(Sport/cultural/Technical/academic fest/ant other event through active club/forum) : <label style="color: red;"><strong>*</strong></label></label>
            <input type="text" id="typeEvent" class="form-control" name="typeEvent" placeholder="" autocomplete="off" oninput="validatetypeEvent()" required >
            <span id="typeEventError" style="display:none;color:red;">Please Enter a Valid  Name of the Event/Competition.</span>
        </div>
        
        <div class="col-md-4">
            <label class="form-label">Link to the activity hosted on the institutional website : <label style="color: red;"><strong>*</strong></label></label>
            <input  type="text" class="form-control" id="enterLink" name="linkWebsite" placeholder="Enter Link" autocomplete="off" required>
            <span id="linkValidationError" style="display:none; color: red;">Please enter a valid link format.</span>
        </div>

        <div class="col-12 py-2 text-center">
            <input type="submit" class="btn btn-outline-primary"></input>
        </div>
    </form>
</div>
  
 
<div class="btn-group pb-1 ps-3 mt-3" role="group" aria-label="Basic checkbox toggle button group">
    <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
    <label class="btn btn-success" for="btncheck1">Add Data</label>
</div>

<div class="container-fluid pb-3" >
    <table class="table table-hover table-bordered border border-success border-3 ">
        <thead class="table-success text-center">
            <tr>
                <th scope="col">Sr.No.</th>
                <th scope="col">Date of Event/Competition</th>
                <th scope="col">Name of the Event/Competition</th>
                <th scope="col">Type of the Event/Competition(Sport/cultural/Technical/academic fest/ant other event through active club/forum)</th>
                <th scope="col">Link to the activity hosted on the institutional website</th>
                <th scope="col">Delete</th>
                <th scope="col">Update</th>
            </tr>
        </thead>

        <?php if(isset($documents)):
              $row=1;
            foreach($documents as $doc):
                $book=  $doc->HOD_5_3_3;
        ?>
        <tbody >
            <?php
                foreach($book as $chapter):
            ?>
            <tr>
                <th class="form-control text-center" scope="row"><?= $row++?></th>
                
                <td class="text-center"><?= $chapter->DateEvent?></td>
                <td class="text-center"><?= $chapter->NameEvent?></td>
                <td class="text-center"><?= $chapter->TypeEvent?></td>
                <td class="text-center"><?= $chapter->Link_of_Website?></td>

                <td class="text-center">
                        <form action="<?=base_url('delete_5_3_3')?>" method="post">
                            <input class="form-control" type="text" value="<?= $chapter->HOD_id?>" name="srnumber" style="display:none">
                            <img class="mx-3" src="assets/images/iconsDelete.gif"><br>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $chapter->HOD_id?>">
                               Delete
                            </button>

                            <div class="modal fade" id="deleteModal<?= $chapter->HOD_id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel"> Alert</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                    <div class="modal-body">
                                        <p class="text-danger"> Are You Sure You Want To Delete The Record !!!</p>
                                    </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                </td>
                 
                <td> 
                      <div class="text-center">
                            <img class=" text-center" src="<?= base_url('assets/images/iconsUpdate.gif')?>" > <br>

                            <button type="button" class=" text-center btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $chapter->HOD_id?>" data-bs-whatever="@mdo">Update</button>                     
                     </div>
                 

                    <div class="modal fade" id="exampleModal<?= $chapter->HOD_id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  ">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">5.3.3</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                        <div class="modal-body">
                          <form action="<?= base_url('update_5_3_3')?>" method="post" enctype="multipart/form-data">
                            <div class="row">

                                <div class="md-4" style="display:none;">
                                    <label class="form-label">Mentee id <label style="color: red;">* </label></label>
                                    <input type="text" class="form-control"  name="srnumber" readonly value="<?= $chapter->HOD_id?>"></th>
                                    <span style="display:none;color:red;">Please enter a valid Information.</span>
                                </div>

                                <div class="md-4 my-3">
                                    <label class="form-label">In which Academic Year you want to Store Data? <label style="color: red;"><strong>*</strong></label></label>
                                    <input type="text" class="form-control" name="AcademicYear" id="datepicker0<?= $chapter->Committe_id ?>" placeholder="Enter Year" value="<?= $chapter->Current_Year ?>" autocomplete="off" maxlength="4" required>
                                    <span id="error-message<?= $chapter->Committe_id ?>" style="display:none;color:red;">Please enter a valid Year.</span>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                    var currentYear = new Date().getFullYear(); // Get the current year

                                    $("#datepicker0<?= $chapter->Committe_id ?>").datepicker({
                                        format: "yyyy",
                                        viewMode: "years",
                                        minViewMode: "years",
                                        startDate: "2022",
                                        //endDate: "currentYear", // Remove the quotes around currentYear to use the variable
                                        autoclose: true
                                    });

                                    // Add an input event handler to validate numeric input
                                    $("#datepicker0<?= $chapter->Committe_id ?>").on("input", function() {
                                        var inputValue = $(this).val();
                                        var numericValue = parseInt(inputValue);
                                        
                                        if (isNaN(numericValue)) {
                                            $(this).val(""); // Clear the input
                                            }
                                        });
                                    });
                                </script>

                                <div class="md-4 my-3">
                                    <label class="form-label">Date of Event/Competition : <label style="color: red;"><strong>*</strong></label></label>
                                    <input  type="date" id="updatedatepicker2<?= $chapter->Committe_id ?>" name="dateEvent" class="form-control" autocomplete="off" value="<?= $chapter->DateEvent?>" min="2019-01-01" required>
                                </div>
                                <script>
                                    function updatedatepicker2Validation<?= $chapter->Committe_id ?>() {
                                        const dobDateInput = document.getElementById('updatedatepicker2<?= $chapter->Committe_id ?>');
                                        const minDate = new Date('2019-01-01');

                                        function updateSetMaxDate<?= $chapter->Committe_id ?>() {
                                            const today = new Date();
                                            const maxDate = today.toISOString().split('T')[0];
                                            dobDateInput.max = maxDate;
                                        }

                                        updateSetMaxDate<?= $chapter->Committe_id ?>();

                                        dobDateInput.addEventListener('input', function() {
                                            updateSetMaxDate<?= $chapter->Committe_id ?>();
                                        });

                                        function validateRegDate<?= $chapter->Committe_id ?>() {
                                            const selectedDate = new Date(dobDateInput.value);
                                            if (selectedDate < minDate) {
                                                alert('Please select a date on or after 2019-01-01.');
                                                return false;
                                            }
                                            return true;
                                        }

                                        const form = document.querySelector('form');
                                        form.addEventListener('submit', function(event) {
                                            if (!validateRegDate<?= $chapter->Committe_id ?>()) {
                                                event.preventDefault();
                                            }
                                        });
                                    }

                                    updatedatepicker2Validation<?= $chapter->Committe_id ?>();
                                </script>

                                <div class="md-4 my-3">
                                    <label class="form-label"> Name of the Event/Competition : <label style="color: red;"><strong>*</strong></label></label>
                                    <input type="text" id="updatenameEvent<?= $chapter->Committe_id ?>" name="nameEvent" class="form-control" autocomplete="off" value="<?= $chapter->NameEvent?>" oninput="updatevalidatenameEvent<?= $chapter->Committe_id ?>()" required>
                                    <span id="updatenameEventError<?= $chapter->Committe_id ?>" style="display:none;color:red;">Please Enter a Valid  Name of the Event/Competition.</span>
                                </div>
                                <script>
                                    function updatevalidatenameEvent<?= $chapter->Committe_id ?>() {
                                        var regName = /^[a-zA-Z ]+$/;
                                        var name = document.getElementById('updatenameEvent<?= $chapter->Committe_id ?>').value;
                                        var error = document.getElementById("updatenameEventError<?= $chapter->Committe_id ?>");

                                        var sanitizedName = name.replace(/[^a-zA-Z ]/g, '');

                                        var words = sanitizedName.split(" ");
                                        var capitalizedWords = words.map(function(word) {
                                            return word.charAt(0).toUpperCase() + word.slice(1);
                                        });

                                        var finalupdatenameEvent = capitalizedWords.join(" ");
                                        document.getElementById('updatenameEvent<?= $chapter->Committe_id ?>').value = finalupdatenameEvent;

                                        if (finalupdatenameEvent.length === 0 || regName.test(finalupdatenameEvent)) {
                                            error.style.display = "none";
                                        } else {
                                            error.style.display = "block";
                                        }
                                    }

                                    document.getElementById('updatenameEvent<?= $chapter->Committe_id ?>').addEventListener('input', updatevalidatenameEvent<?= $chapter->Committe_id ?>);

                                </script>

                                <div class="md-4 my-3">
                                    <label class="form-label">Type of the Event/Competition(Sport/cultural/Technical/academic fest/ant other event through active club/forum) : <label style="color: red;"></label></label>
                                    <input type="text" id="updatetypeEvent<?= $chapter->Committe_id ?>" class="form-control" name="typeEvent" value="<?= $chapter->TypeEvent?>" oninput="updatevalidatetypeEvent<?= $chapter->Committe_id ?>()" autocomplete="off" required >
                                    <span id="updatetypeEventError<?= $chapter->Committe_id ?>" style="display:none;color:red;">Please Enter a Valid  Name of the Event/Competition.</span>
                                </div>
                                <script>
                                    function updatevalidatetypeEvent<?= $chapter->Committe_id ?>() {
                                        var regName = /^[a-zA-Z ]+$/;
                                        var name = document.getElementById('updatetypeEvent<?= $chapter->Committe_id ?>').value;
                                        var error = document.getElementById("updatenameEventError<?= $chapter->Committe_id ?>");

                                        var sanitizedName = name.replace(/[^a-zA-Z ]/g, '');

                                        var words = sanitizedName.split(" ");
                                        var capitalizedWords = words.map(function(word) {
                                            return word.charAt(0).toUpperCase() + word.slice(1);
                                        });

                                        var finalupdatetypeEvent = capitalizedWords.join(" ");
                                        document.getElementById('updatetypeEvent<?= $chapter->Committe_id ?>').value = finalupdatetypeEvent;

                                        if (finalupdatetypeEvent.length === 0 || regName.test(finalupdatetypeEvent)) {
                                            error.style.display = "none";
                                        } else {
                                            error.style.display = "block";
                                        }
                                    }

                                    document.getElementById('updatetypeEvent<?= $chapter->Committe_id ?>').addEventListener('input', updatevalidatenameEvent<?= $chapter->Committe_id ?>);

                                </script>
                                
                                <div class="md-4 my-3">
                                    <label class="form-label">Link to the activity hosted on the institutional website : <label style="color: red;"><strong>*</strong></label></label>
                                    <input  type="text" id="updateenterLink" class="form-control" name="linkWebsite" value="<?= $chapter->Link_of_Website?>" placeholder="Enter Link" autocomplete="off" required>
                                    <span id="updatelinkValidationError" style="display:none; color: red;">Please enter a valid link format.</span>
                                </div>
                                <script>
                                    function updatevalidateLink<?= $chapter->Committe_id ?>() {
                                        var linkInput = document.getElementById('updateenterLink<?= $chapter->Committe_id ?>');
                                        var linkValidationError = document.getElementById('updatelinkValidationError<?= $chapter->Committe_id ?>');
                                        var linkRegex = /^(ftp|http|https):\/\/[^ "]+$/;

                                        if (linkInput.value.trim() === '') {
                                            // Empty input, hide error message
                                            linkValidationError.style.display = 'none';
                                        } else if (!linkRegex.test(linkInput.value)) {
                                            // Invalid link format, show error message
                                            linkValidationError.style.display = 'block';
                                        } else {
                                            // Valid link format, hide error message
                                            linkValidationError.style.display = 'none';
                                        }
                                    }

                                    // Attach event listener to validate link on keyup
                                    document.getElementById('updateenterLink<?= $chapter->Committe_id ?>').addEventListener('keyup', updatevalidateLink<?= $chapter->Committe_id ?>);


                                </script>
                            </div>
                           
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-warning">Update</button>
                        </div>
                        </form>
                        </div>
                    </div>
                    </div>
                </td>   
                
               
            </tr>
            <?php endforeach;?>
        </tbody>
        <?php endforeach;?>
        <?php endif;?>
    </table>
</div>
   
<script>
        const showFormCheckbox = document.getElementById('btncheck1');
        const myForm = document.getElementById('hod');
        //const msg = document.getElementById('msg');

        showFormCheckbox.addEventListener('change', function() {
          if (this.checked) {
            myForm.style.display="block";
            //msg.style.display="none";
          } else {
            myForm.style.display="none";
            //msg.style.display="block";
          }
        });
</script>

<script src="<?php echo base_url('assets/js/Committee/Arts_Circle/5_3_3_view.js'); ?>"></script>

<?= $this->endSection();?>