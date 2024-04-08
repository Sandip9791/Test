<?= $this->extend('Layouts/committeeBase'); ?>
<?= $this->section("Content"); ?>
<h1 class="text-center">Enrolment (2.1.1) </h1>

<div class="container-fluid" style="display:none" id="committees">
    <div id="form-container">
        <div class="container-fluid border border-primary border-2 my-3 mx-2">
            <form class="row g-3 my-3" method="post" action="<?= base_url('save_office_2_1_1') ?>" enctype="multipart/form-data">

                <div class="col-md-4 mb-3">
                    <label class="form-label">In which Academic Year you want to Store Data ? <label style="color: red;"></label></label>
                    <input type="text" class="form-control" name="AcademicYear" placeholder="Enter Year" autocomplete="off" oninput="validateSubName()">
                    <span id="" style="display:none;color:red;">Please enter a valid Subject Name.</span>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Program Name : <label style="color: red;">*</label></label>
                    <input id="" type="text" class="form-control" name="Program_Name">
                    <span style="display:none;color:red;">Please enter a valid name.</span>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Program Code : <label style="color: red;">*</label></label>
                    <input id="" type="text" class="form-control" name="Program_Code">
                    <span style="display:none;color:red;">Please enter a valid code.</span>
                </div>

                <div class="col-md-4">
                    <label for="year-of-award">Number of Seats Sanctioned : <label style="color: red;">*</label></label>
                    <input type="number" class="form-control" name="Seats_Sanctioned" id="">
                </div>

                <div class="col-md-4">
                    <label for="year-of-award">Number of Students Admitted : <label style="color: red;">*</label></label>
                    <input type="number" class="form-control" name="Students_Admitted" id="">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Approval of Saction of Intake : </label>
                    <input type="file" class="form-control" name="Approval_of_Sanction" accept=".pdf">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Final Addmission List : </label>
                    <input type="file" class="form-control" name="Final_Admission" accept=".pdf">
                </div>

                <div class="col-12 text-center">
                    <input type="submit" class="btn btn-outline-primary">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="btn-group pb-1 ps-3 mt-3" role="group" aria-label="Basic checkbox toggle button group">
    <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
    <label class="btn btn-success" for="btncheck1">Add Data</label>
</div>

<div class="container-fluid pb-3">
    <table class="table table-hover table-bordered border border-success border-3 ">
        <thead class="table-success text-center">
            <tr>
                <th scope="col">SR.No.</th>
                <th scope="col">Program Name</th>
                <th scope="col">Program Code</th>
                <th scope="col">Number of Seats Sanctioned</th>
                <th scope="col">Number of Students Admitted</th>
                <th scope="col">Approval of Saction of Intake</th>
                <th scope="col">Final Addmission List</th>
                <th scope="col">Delete</th>
                <th scope="col">Update</th>
            </tr>
        </thead>

        <?php if (isset($documents)) :
            $row = 1;
            foreach ($documents as $doc) :
                $book =  $doc->Committee_2_1_1;
        ?>
                <tbody>
                    <?php
                    foreach ($book as $chapter) :
                    ?>
                        <tr>
                            <th class="form-control text-center" scope="row"><?= $row++ ?></th>
                            <td class="text-center"><?= $chapter->Program_Name ?> </td>
                            <td class="text-center"><?= $chapter->Program_Code ?> </td>
                            <td class="text-center"><?= $chapter->Seats_Sanctioned ?> </td>
                            <td class="text-center"><?= $chapter->Students_Admitted ?> </td>

                            <td class="text-center">
                                <?php if (!empty($chapter->Approval_of_Sanction)) : ?>
                                    <a href="<?= base_url('Userfiles/Committee/') . $chapter->Approval_of_Sanction; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                                        <button class="btn btn-outline-success"> Download File </button>
                                    </a>
                                <?php else : ?>
                                    <b> Not Found...</b>
                                <?php endif; ?>
                            </td>

                            <td class="text-center">
                                <?php if (!empty($chapter->Final_Admission)) : ?>
                                    <a href="<?= base_url('Userfiles/Committee/') . $chapter->Final_Admission; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                                        <button class="btn btn-outline-success"> Download File </button>
                                    </a>
                                <?php else : ?>
                                    <b> Not Found...</b>
                                <?php endif; ?>
                            </td>

                            <td class="text-center">
                                <form action="<?= base_url('delete_office_2_1_1') ?>" method="post">
                                    <input class="form-control" type="text" value="<?= $chapter->Committe_id ?>" name="srnumber" style="display:none">
                                    <img class="mx-3" src="assets/images/iconsDelete.gif"><br>

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $chapter->Committe_id ?>">
                                        Delete
                                    </button>

                                    <div class="modal fade" id="deleteModal<?= $chapter->Committe_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <img class=" text-center" src="<?= base_url('assets/images/iconsUpdate.gif') ?>"> <br>

                                    <button type="button" class=" text-center btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $chapter->Committe_id ?>" data-bs-whatever="@mdo">Update</button>
                                </div>


                                <div class="modal fade" id="exampleModal<?= $chapter->Committe_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">2.1.1</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <form action="<?= base_url('update_office_2_1_1') ?>" method="post" enctype="multipart/form-data">
                                                    <div class="row">

                                                        <div class="md-4" style="display:none;">
                                                            <label class="form-label">IQAC id <label style="color: red;">* </label></label>
                                                            <input type="text" class="form-control" name="srnumber" readonly value="<?= $chapter->Committe_id ?>"></th>
                                                            <span style="display:none;color:red;">Please enter a valid Information.</span>
                                                        </div>

                                                        <div class="md-4 my-4">
                                                            <label class="form-label">In which Academic Year you want to Store Data ? <label style="color: red;"></label></label>
                                                            <input type="text" class="form-control" name="AcademicYear" placeholder="Enter Year" value="<?= $chapter->Current_Year ?>" autocomplete="off" oninput="validateSubName()">
                                                            <span id="" style="display:none;color:red;">Please enter a valid Subject Name.</span>
                                                        </div>

                                                        <div class="md-4">
                                                            <label class="form-label">Program Name : <label style="color: red;">*</label></label>
                                                            <input id="" type="text" class="form-control" name="Program_Name" value="<?= $chapter->Program_Name ?>">
                                                            <span style="display:none;color:red;">Please enter a valid name.</span>
                                                        </div>

                                                        <div class="md-4">
                                                            <label class="form-label">Program Code : <label style="color: red;">*</label></label>
                                                            <input id="" type="text" class="form-control" name="Program_Code" value="<?= $chapter->Program_Code ?>">
                                                            <span style="display:none;color:red;">Please enter a valid code.</span>
                                                        </div>

                                                      
                                                        <div class="md-4">
                                                            <label for="year-of-award">Number of Seats Sanctioned : <label style="color: red;">*</label></label>
                                                            <input type="number" class="form-control" name="Seats_Sanctioned" value="<?= $chapter->Seats_Sanctioned ?>" id="">
                                                        </div>

                                                        <div class="md-4">
                                                            <label for="year-of-award">Number of Students Admitted : <label style="color: red;">*</label></label>
                                                            <input type="number" class="form-control" name="Students_Admitted" value="<?= $chapter->Students_Admitted ?>" id="">
                                                        </div>

                                                        <div class="md-6">
                                                            <label class="form-label">Approval of Saction of Intake : </label>
                                                            <input type="file" class="form-control" name="Approval_of_Sanction" accept=".pdf">
                                                        </div>

                                                        <div class="md-6">
                                                            <label class="form-label">Final Addmission List : </label>
                                                            <input type="file" class="form-control" name="Final_Admission" accept=".pdf">
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
                    <?php endforeach; ?>
                </tbody>
            <?php endforeach; ?>
        <?php endif; ?>
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

<?= $this->endSection(); ?>