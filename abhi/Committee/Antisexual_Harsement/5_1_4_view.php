<?= $this->extend('Layouts/committeeBase');?>
<?= $this->section("Content");?>

<div class="container-fluid" style="display:none" id="committees">
    <div id="form-container">
        <div class="container-fluid border border-primary border-2 my-3 mx-2">
            <form class="row g-3 my-3 mx-2" method="post" action="<?= base_url('save_5_1_4')?>" enctype="multipart/form-data">
                
                <div class="col-md-4 mb-3">
                    <label class="form-label">In which Academic Year you want to Store Data ? <label style="color: red;"><strong>*</strong></label></label>
                    <input type="text" class="form-control" name="AcademicYear" id="datepicker" placeholder="Enter Year" maxlength="4" autocomplete="off" required>
                    <span id="error-message" style="display:none;color:red;">Please enter a valid valid Year.</span>
                </div>

                <div class="col-md-12 my-3">
                    <label class="form-label"><label style="color: red;"><strong>Note : Please Select all PDF files under 2MB.</strong></label></label><br>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Upload Annual Report : <label style="color: red;"><strong>*</strong></label></label>
                    <input id="annualReprt" type="file" class="form-control" name="annualReprt" autocomplete="off" accept=".pdf" oninput="validateannualReprt(event)" required>
                    <span id="annualReprtError" style="color:red;"></span>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Upload Relevent Document : <label style="color: red;"><strong>*</strong></label></label>
                    <input id="relevantDoc" type="file" class="form-control" name="relevantDoc" autocomplete="off" accept=".pdf" oninput="validaterelevantDoc(event)" required>
                    <span id="relevantDocError" style="color:red;"></span>
                </div>

                <div class="col-12 py-2 text-center">
                    <input type="submit" class="btn btn-outline-primary"></input>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="btn-group pb-1 ps-3 mt-3" role="group" aria-label="Basic checkbox toggle button group">
    <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
    <label class="btn btn-success" for="btncheck1">Add Data</label>
</div>

<div class="container-fluid pb-3" >
    <table class="table table-hover table-bordered border border-success border-3 ">
        <thead class="table-success text-center">
            <tr>
                <th scope="col">SR.No.</th>
                <th scope="col">Annual Report</th>
                <th scope="col">Relevent Document</th>
                 <th scope="col">Delete</th>
                <th scope="col">Update</th>
            </tr>
        </thead>

        <?php if(isset($documents)):
              $row=1;
            foreach($documents as $doc):
                $book=  $doc->Committee_5_1_4;
        ?>
        <tbody >
            <?php
                foreach($book as $chapter):
            ?>
            <tr>
                <th class="form-control text-center" scope="row"><?= $row++?></th>
               
                <td class="text-center">
                    <?php if(!empty($chapter->Annual_Report)):?>
                        <a href="<?= base_url('Userfiles/Committee/').$chapter->Annual_Report;?>" download><img src="<?= base_url('assets/images/iconspdf.gif')?>" width="33px"> <br> 
                            <button class="btn btn-outline-success"> Download File </button>
                        </a>
                    <?php else:?>
                        <b> Not Found...</b>
                    <?php endif;?>  
                </td>

                <td class="text-center">
                    <?php if(!empty($chapter->Relevent_Document)):?>
                        <a href="<?= base_url('Userfiles/Committee/').$chapter->Relevent_Document;?>" download><img src="<?= base_url('assets/images/iconspdf.gif')?>" width="33px"> <br> 
                            <button class="btn btn-outline-success"> Download File </button>
                        </a>
                    <?php else:?>
                        <b> Not Found...</b>
                    <?php endif;?>  
                </td>

             
                <td class="text-center">
                        <form action="<?=base_url('delete_5_1_4')?>" method="post">
                            <input class="form-control" type="text" value="<?= $chapter->Committe_id?>" name="srnumber" style="display:none">
                            <img class="mx-3" src="assets/images/iconsDelete.gif"><br>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $chapter->Committe_id?>">
                               Delete
                            </button>

                            <div class="modal fade" id="deleteModal<?= $chapter->Committe_id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                            <button type="button" class=" text-center btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $chapter->Committe_id?>" data-bs-whatever="@mdo">Update</button>                     
                     </div>
                 

                    <div class="modal fade" id="exampleModal<?= $chapter->Committe_id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  ">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">5.1.4</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                        <div class="modal-body">
                          <form action="<?= base_url('update_5_1_4')?>" method="post" enctype="multipart/form-data">
                            <div class="row">

                                <div class="md-4" style="display:none;">
                                    <label class="form-label">IQAC id <label style="color: red;">* </label></label>
                                    <input type="text" class="form-control"  name="srnumber" readonly value="<?= $chapter->Committe_id?>"></th>
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
                                    <label class="form-label"><label style="color: red;"><strong>Note : Please Select all PDF files under 2MB.</strong></label></label><br>
                                </div>

                                <div class="md-4 my-3">
                                    <label class="form-label">Upload Annual Report : <label style="color: red;"><strong></strong></label></label>
                                    <input id="updateannualReprt<?= $chapter->Committe_id ?>" type="file" class="form-control" name="annualReprt" autocomplete="off" accept=".pdf" oninput="updatevalidateannualReprt<?= $chapter->Committe_id ?>(event)">
                                    <span id="updateannualReprtError<?= $chapter->Committe_id ?>" style="color:red;"></span>
                                </div>

                                <div class="md-4 my-3">
                                    <label class="form-label">Upload Relevent Document : <label style="color: red;"><strong></strong></label></label>
                                    <input id="updaterelevantDoc<?= $chapter->Committe_id ?>" type="file" class="form-control" name="relevantDoc" autocomplete="off" accept=".pdf" oninput="updatevalidaterelevantDoc<?= $chapter->Committe_id ?>(event)">
                                    <span id="updaterelevantDocError<?= $chapter->Committe_id ?>" style="color:red;"></span>
                                </div>
                                <script>
                                    function updatevalidateDoc<?= $chapter->Committe_id ?>(event, errorElementId) {
                                        const file = event.target.files[0];
                                        const errorElement = document.getElementById(errorElementId);

                                        const maxFileSizeInBytes = 2 * 1024 * 1024; // 2 MB

                                        if (!file.type.match('application/pdf')) {
                                            errorElement.textContent = 'File is not a PDF.';
                                            event.target.value = ''; // Clear the file input
                                            return;
                                        }

                                        if (file.size > maxFileSizeInBytes) {
                                            errorElement.textContent = 'File is too big. Maximum size is 2 MB.';
                                            event.target.value = ''; // Clear the file input
                                            return;
                                        }

                                        // If the file is valid, clear the error message
                                        errorElement.textContent = '';
                                    }

                                    function updatevalidateannualReprt<?= $chapter->Committe_id ?>(event) {
                                        updatevalidateDoc<?= $chapter->Committe_id ?>(event, 'updateannualReprtError<?= $chapter->Committe_id ?>');
                                    }

                                    function updatevalidaterelevantDoc<?= $chapter->Committe_id ?>(event) {
                                        updatevalidateDoc<?= $chapter->Committe_id ?>(event, 'updaterelevantDocError<?= $chapter->Committe_id ?>');
                                    }

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
        const myForm = document.getElementById('committees');
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

<script src="<?php echo base_url('assets/js/Committee/Antisexual_Harsement/5_1_4_view.js'); ?>"></script>

<?= $this->endSection();?>
