<?= $this->extend('Layouts/committeeBase'); ?>
<?= $this->section("Content"); ?>

<h1 class="text-center my-3">5.2.1</h1>
<h5 class="text-center my-3">Student placement</h5>

<div class="container-fluid " style="display:none;" id="hod">

    <div id="form-container">

        <div class="container-fluid border border-primary border-2 my-3 mx-1">
            <form class="row g-3 my-3" method="post" action="<?= base_url('save_committe_5_2_1') ?>" enctype="multipart/form-data">
             
                    <div class="col-md-4 mb-3">
                        <label class="form-label">In which Academic Year you want to Store Data ? <label style="color: red;"></label></label>
                        <input type="text" class="form-control" name="AcademicYear" placeholder="Enter Year" autocomplete="off" oninput="validateSubName()">
                        <span id="" style="display:none;color:red;">Please enter a valid Subject Name.</span>
                    </div>
                  
                    <div class="col-md-6 my-3">
                        <label class="form-label"><b>A. <u>Placement</u> :</b></label><br>
                        <label class="form-label">Download Excel :</label><br>
                        <label class="form-label">Fill the excel and upload : <a href="<?= base_url('assets\pdf\5_2_1.xlsx') ?>">Download Excel Templete</a></label>
                        <input type="file" class="form-control" name="excel" accept=".csv,.xlsx" required>
                        <span style="display:none;color:red;">Please upload the pdf.</span>
                    </div>
                    
                <div class="col-md-12 text-center my-3">
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Table View -->

<div class="btn-group pb-1 ps-3 mt-3" role="group" aria-label="Basic checkbox toggle button group">
    <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
    <label class="btn btn-success" for="btncheck1">Add Data</label>
</div>

<div class="container-fluid pb-3">
    <table class="table table-hover table-bordered border border-success border-3 ">
        <thead class="table-success text-center">
            <tr>
                <th scope="col">Sr.No.</th>
                <th scope="col">Placement</th>
                <th scope="col">Delete</th>
                <th scope="col">Update</th>
            </tr>
        </thead>

        <?php if (isset($documents)) :
            $row = 1;
            foreach ($documents as $doc) :
                $book =  $doc->Committee_5_2_1;
        ?>
                <tbody>
                    <?php
                    foreach ($book as $chapter) :
                    ?>
                        <tr>
                            <th class="form-control text-center" scope="row"><?= $row++ ?></th>
                            <td class="text-center">
                                <?php if (!empty($chapter->Placement_Cell)) : ?>
                                    <a href="<?= base_url('Userfiles/Committee/') . $chapter->Placement_Cell; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                                        <button class="btn btn-outline-success"> Download File </button>
                                    </a>
                                <?php else : ?>
                                    <b> Not Found...</b>
                                <?php endif; ?>
                            </td>

                            <td class="text-center">
                                <form action="<?= base_url('delete_committe_5_2_1') ?>" method="post">
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
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">5.2.1</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <form action="<?= base_url('update_committe_5_2_1') ?>" method="post" enctype="multipart/form-data">
                                                    <div class="row">

                                                        <div class="md-4" style="display:none;">
                                                            <label class="form-label">Mentee id <label style="color: red;">* </label></label>
                                                            <input type="text" class="form-control" name="srnumber" readonly value="<?= $chapter->Committe_id ?>"></th>
                                                            <span style="display:none;color:red;">Please enter a valid Information.</span>
                                                        </div>

                                                        <div class="md-4 my-4">
                                                            <label class="form-label">In which Academic Year you want to Store Data ? <label style="color: red;"></label></label>
                                                            <input type="text" class="form-control" name="AcademicYear" placeholder="Enter Year" value="<?= $chapter->Current_Year ?>" autocomplete="off" oninput="validateSubName()">
                                                            <span id="" style="display:none;color:red;">Please enter a valid Subject Name.</span>
                                                        </div>

                                                        <div class="md-5 my-3">
                                                            <label class="form-label"><b>A. <u>Placement</u> :</b></label><br>
                                                            <label class="form-label">Download Excel :</label><br>
                                                            <label class="form-label">Fill the excel and upload : <a href="<?= base_url('assets\pdf\5_2_1.xlsx') ?>">Download Excel Templete</a></label>
                                                            <input type="file" class="form-control" name="excel" accept=".csv,.xlsx">
                                                            <span style="display:none;color:red;">Please upload the pdf.</span>
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
    const myForm = document.getElementById('hod');
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

<script src="<?php echo base_url('assets/js/HOD/5_2_1_view.js'); ?>"></script>

<?= $this->endSection(); ?>