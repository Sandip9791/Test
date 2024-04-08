<?= $this->extend('Layouts/committeeBase'); ?>
<?= $this->section("Content"); ?>

<div class="container-fluid" style="display:none" id="committees">
    <h1 class="text-center my-3">5.3.3</h1>
    <div id="form-container">
        <div class="container-fluid border border-primary border-2 my-3 mx-2">

            <form class="row g-3 my-3 mx-2"  method="post" action="<?= base_url('save_committe_5_3_3') ?>">
                <div class="col-md-4 mb-3">
                    <label class="form-label">In which Academic Year you want to Store Data ? <label style="color: red;"></label></label>
                    <input type="text" class="form-control" name="AcademicYear" placeholder="Enter Year" autocomplete="off" oninput="validateSubName()" >
                    <span id="" style="display:none;color:red;">Please enter a valid Subject Name.</span>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Date of Event/Competition : <label style="color: red;"><strong>*</strong></label></label>
                    <input  type="date" name="dateEvent" class="form-control" autocomplete="off" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label"> Name of the Event/Competition : <label style="color: red;"><strong>*</strong></label></label>
                    <input  type="text" name="nameEvent" class="form-control" autocomplete="off" maxlength="15" required>
                </div>

                <div class="col-md-7">
                    <label class="form-label">Type of the Event/Competition(Sport/cultural/Technical/academic fest/ant other event through active club/forum) : <label style="color: red;"></label></label>
                    <input type="text" class="form-control" name="typeEvent" placeholder="" autocomplete="off" required >
                </div>
                

                <div class="col-md-4">
                    <label class="form-label">Link to the activity hosted on the institutional website : <label style="color: red;"><strong>*</strong></label></label>
                    <input  type="url" class="form-control" name="linkWebsite" autocomplete="off" required>
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
                $book=  $doc->Committee_5_3_3;
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
                        <form action="<?=base_url('delete_committe_5_3_3')?>" method="post">
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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">5.3.3</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                        <div class="modal-body">
                          <form action="<?= base_url('update_committe_5_3_3')?>" method="post" enctype="multipart/form-data">
                            <div class="row">

                                <div class="md-4" style="display:none;">
                                    <label class="form-label">Mentee id <label style="color: red;">* </label></label>
                                    <input type="text" class="form-control"  name="srnumber" readonly value="<?= $chapter->Committe_id?>"></th>
                                    <span style="display:none;color:red;">Please enter a valid Information.</span>
                                </div>

                                <div class="md-4 my-4">
                                    <label class="form-label">In which Academic Year you want to Store Data ? <label style="color: red;"></label></label>
                                    <input type="text" class="form-control"  name="AcademicYear" placeholder="Enter Year" value="<?= $chapter->Current_Year?>" autocomplete="off" oninput="validateSubName()" >
                                    <span id="" style="display:none;color:red;">Please enter a valid Subject Name.</span>
                                </div>

                                <div class="md-4 my-3">
                                    <label class="form-label">Date of Event/Competition : <label style="color: red;"><strong>*</strong></label></label>
                                    <input  type="date" name="dateEvent" class="form-control" autocomplete="off" value="<?= $chapter->DateEvent?>" required>
                                </div>

                                <div class="md-4 my-3">
                                    <label class="form-label"> Name of the Event/Competition : <label style="color: red;"><strong>*</strong></label></label>
                                    <input  type="text" name="nameEvent" class="form-control" autocomplete="off" value="<?= $chapter->NameEvent?>" required>
                                </div>

                                <div class="md-4 my-3">
                                    <label class="form-label">Type of the Event/Competition(Sport/cultural/Technical/academic fest/ant other event through active club/forum) : <label style="color: red;"></label></label>
                                    <input type="text" class="form-control" name="typeEvent" value="<?= $chapter->TypeEvent?>"  autocomplete="off" required >
                                </div>
                                
                                <div class="md-4 my-3">
                                    <label class="form-label">Link to the activity hosted on the institutional website : <label style="color: red;"><strong>*</strong></label></label>
                                    <input  type="url" class="form-control" name="linkWebsite" value="<?= $chapter->Link_of_Website?>" autocomplete="off" required>
                                </div>
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
            myForm.style.display = "block";
            //msg.style.display="none";
        } else {
            myForm.style.display = "none";
            //msg.style.display="block";
        }
    });
</script>


<?= $this->endSection();?>
