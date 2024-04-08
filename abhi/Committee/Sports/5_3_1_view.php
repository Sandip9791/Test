<?= $this->extend('Layouts/committeeBase'); ?>
<?= $this->section("Content"); ?>

<div class="container-fluid" style="display:none" id="committees">
    <h1 class="text-center my-3">5.3.1</h1>
    <div id="form-container">
        <div class="container-fluid border border-primary border-2 my-3 mx-2">

            <form class="row g-3 my-3 mx-2"  method="post" action="<?= base_url('save_5_3_1') ?>">
                <div class="col-md-4 mb-3">
                    <label class="form-label">In which Academic Year you want to Store Data ? <label style="color: red;"></label></label>
                    <input type="text" class="form-control" name="AcademicYear" placeholder="Enter Year" autocomplete="off" oninput="validateSubName()" >
                    <span id="" style="display:none;color:red;">Please enter a valid Subject Name.</span>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Name of the award/medal : <label style="color: red;"><strong>*</strong></label></label>
                    <input type="text" class="form-control" name="nameMedal" placeholder="" autocomplete="off" required >
                </div>
            

                <div class="col-md-4">
                    <label class="form-label">Team/Individual : <label style="color: red;"><strong>*</strong></label></label>
                    <select class="form-control" name="team" id="">
                        <option selected hidden disable>--- Select One ---</option>
                        <option value="Team">Team</option>
                        <option value="Individual">Individual</option>
                    </select>
                </div>

                <div class="col-md-4">
                <label class="form-label">Inter-University/State/National/International : <label style="color: red;"><strong>*</strong></label></label>
                    <select class="form-control" name="level" id="">
                        <option selected hidden disable>--- Select One ---</option>
                        <option value="Inter-University">Inter-University</option>
                        <option value="State">State</option>
                        <option value="National">National</option>
                        <option value="International">International</option>

                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Name of the event : <label style="color: red;"><strong>*</strong></label></label>
                    <input id="" type="text" class="form-control" name="nameEvent" autocomplete="off" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Name of the Student : <label style="color: red;"><strong>*</strong></label></label>
                    <input id="" type="text" class="form-control" name="nameStudent" autocomplete="off" required>
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
                <th scope="col">Name of the award/medal</th>
                <th scope="col">Team/Individual </th>
                <th scope="col">Inter-University/State/National/International</th>
                <th scope="col">Name of the event</th>
                <th scope="col">Name of the Student</th>
                <th scope="col">Delete</th>
                <th scope="col">Update</th>
            </tr>
        </thead>

        <?php if(isset($documents)):
              $row=1;
            foreach($documents as $doc):
                $book=  $doc->Committee_5_3_1;
        ?>
        <tbody >
            <?php
                foreach($book as $chapter):
            ?>
            <tr>
                <th class="form-control text-center" scope="row"><?= $row++?></th>
                
                <td class="text-center"><?= $chapter->Name_Medal?></td>
                <td class="text-center"><?= $chapter->Team?></td>
                <td class="text-center"><?= $chapter->Level?></td>
                <td class="text-center"><?= $chapter->Name_Event?></td>
                <td class="text-center"><?= $chapter->Name_Student?></td>

                <td class="text-center">
                        <form action="<?=base_url('delete_5_3_1')?>" method="post">
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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">5.3.1</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                        <div class="modal-body">
                          <form action="<?= base_url('update_5_3_1')?>" method="post" enctype="multipart/form-data">
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
                                    <label class="form-label">Name of the award/medal : <label style="color: red;"><strong>*</strong></label></label>
                                    <input type="text" class="form-control" name="nameMedal" placeholder="" value="<?= $chapter->Name_Medal?>" autocomplete="off" required >
                                </div>
                            

                                <div class="md-4 my-3">
                                    <label class="form-label">Team/Individual : <label style="color: red;"><strong>*</strong></label></label>
                                    <select class="form-control" name="team" id="">
                                        <option selected hidden disable><?= $chapter->Team?></option>
                                        <option value="Team">Team</option>
                                        <option value="Individual">Individual</option>
                                    </select>

                                </div>

                                <div class="md-4 my-3">
                                <label class="form-label">Inter-University/State/National/International : <label style="color: red;"><strong>*</strong></label></label>
                                    <select class="form-control" name="level" id="">
                                        <option selected hidden disable><?= $chapter->Level?></option>
                                        <option value="Inter-University">Inter-University</option>
                                        <option value="State">State</option>
                                        <option value="National">National</option>
                                        <option value="International">International</option>
                                    </select>
                                </div>

                                <div class="md-4 my-3">
                                    <label class="form-label">Name of the event : <label style="color: red;"><strong>*</strong></label></label>
                                    <input id="" type="text" class="form-control" name="nameEvent" value="<?= $chapter->Name_Event?>" autocomplete="off" required>
                                </div>

                                <div class="md-4 my-3">
                                    <label class="form-label">Name of the Student : <label style="color: red;"><strong>*</strong></label></label>
                                    <input id="" type="text" class="form-control" name="nameStudent" value="<?= $chapter->Name_Student?>" autocomplete="off" required>
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