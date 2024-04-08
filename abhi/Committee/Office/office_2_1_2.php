<?= $this->extend('Layouts/committeeBase'); ?>
<?= $this->section("Content"); ?>
<h1 class="text-center">Percentage of Seats filled against reserved category for first year (2.1.2)</h1>

<div class="container-fluid" style="display:none" id="committees">
    <div id="form-container">
        <div class="container-fluid border border-primary border-2 my-3 mx-2">
            <form class="row g-3  my-3" method="post" action="<?= base_url('save_office_2_1_2') ?>" enctype="multipart/form-data">

                <div class="col-md-9 mb-3">
                    <label class="form-label">In which Academic Year you want to Store Data ? <label style="color: red;"></label></label>
                    <input type="text" class="form-control" name="AcademicYear" placeholder="Enter Year" autocomplete="off" oninput="validateSubName()">
                    <span id="" style="display:none;color:red;">Please enter a valid Subject Name.</span>
                </div>


                <div class="col-md-6">
                    <label class="form-label"><b>Number of seats emarked for reserved category as per GOI/State Government rule :</b></label>
                    <div class="input-group my-3">
                        <label class="input-group-text" for="">SC</label>
                        <input type="number" class="form-control" id="" name="SC_emarked">
                    </div>

                    <div class="input-group my-3">
                        <label class="input-group-text" for="">ST</label>
                        <input type="number" class="form-control" id="" name="ST_emarked">
                    </div>

                    <div class="input-group my-3">
                        <label class="input-group-text" for="">OBC</label>
                        <input type="number" class="form-control" id="" name="OBC_emarked">
                    </div>

                    <div class="input-group my-3">
                        <label class="input-group-text" for="">GENERAL</label>
                        <input type="number" class="form-control" id="" name="GENERAL_emarked">
                    </div>

                    <div class="input-group my-3">
                        <label class="input-group-text" for="">Divyanjan</label>
                        <input type="number" class="form-control" id="" name="Divyanjan_emarked">
                    </div>

                    <div class="input-group my-3">
                        <label class="input-group-text" for="">Other</label>
                        <input type="number" class="form-control" id="" name="Other_emarked">
                    </div>

                </div>



                <div class="col-md-6 ">
                    <label class="form-label"><b>Number of seats admitted from the reserved category : <br></b></label>
                    <div class="input-group my-3">
                        <label class="input-group-text" for="">SC</label>
                        <input type="number" class="form-control" id="" name="SC_admitted">
                    </div>

                    <div class="input-group my-3">
                        <label class="input-group-text" for="">ST</label>
                        <input type="number" class="form-control" id="" name="ST_admitted">
                    </div>

                    <div class="input-group my-3">
                        <label class="input-group-text" for="">OBC</label>
                        <input type="number" class="form-control" id="" name="OBC_admitted">
                    </div>

                    <div class="input-group my-3">
                        <label class="input-group-text" for="">GENERAL</label>
                        <input type="number" class="form-control" id="" name="GENERAL_admitted">
                    </div>

                    <div class="input-group my-3">
                        <label class="input-group-text" for="">Divyanjan</label>
                        <input type="number" class="form-control" id="" name="Divyanjan_admitted">
                    </div>

                    <div class="input-group my-3">
                        <label class="input-group-text" for="">Other</label>
                        <input type="number" class="form-control" id="" name="Other_admitted">
                    </div>

                </div>

                <div class="col-md-6">
                    <label class="form-label"><b>Letter issued by Government for reservation : </b></label>
                    <input type="file" class="form-control" name="Letter_issued_by_Government" accept=".pdf">
                </div>

                <div class="col-md-6">
                    <label class="form-label"><b>Final Admission List : </b> </label>
                    <input type="file" class="form-control" name="Final_Admission_List" accept=".pdf">
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
                <th></th>
                <th colspan="6">Number of seats emarked for reserved category as per GOI/State Government rule</th>
                <th colspan="6">Number of seats admitted from the reserved category </th>
                <th>Letter issued by Government for reservation </th>
                <th>Final Admission List </th>
                <th colspan="2">Action</th>
            </tr>
            <tr>
                <th scope="col">SR.No.</th>
                <th scope="col">SC</th>
                <th scope="col">ST</th>
                <th scope="col">OBC</th>
                <th scope="col">GENERAL</th>
                <th scope="col">Divyanjan</th>
                <th scope="col">Other</th>

                <th scope="col">SC</th>
                <th scope="col">ST</th>
                <th scope="col">OBC</th>
                <th scope="col">GENERAL</th>
                <th scope="col">Divyanjan</th>
                <th scope="col">Other</th>
                <th></th>
                <th></th>

                <th scope="col">Delete</th>
                <th scope="col">Update</th>
            </tr>
        </thead>

        <?php if (isset($documents)) :
            $row = 1;
            foreach ($documents as $doc) :
                $book =  $doc->Committee_2_1_2;
        ?>
                <tbody>
                    <?php
                    foreach ($book as $chapter) :
                    ?>
                        <tr>
                            <th class="form-control text-center" scope="row"><?= $row++ ?></th>
                            <td class="text-center"><?= $chapter->SC_emarked ?> </td>
                            <td class="text-center"><?= $chapter->ST_emarked ?> </td>
                            <td class="text-center"><?= $chapter->OBC_emarked ?> </td>
                            <td class="text-center"><?= $chapter->GENERAL_emarked ?> </td>
                            <td class="text-center"><?= $chapter->Divyanjan_emarked ?> </td>
                            <td class="text-center"><?= $chapter->Other_emarked ?> </td>
                            <td class="text-center"><?= $chapter->SC_admitted ?> </td>
                            <td class="text-center"><?= $chapter->ST_admitted ?> </td>
                            <td class="text-center"><?= $chapter->OBC_admitted ?> </td>
                            <td class="text-center"><?= $chapter->GENERAL_admitted ?> </td>
                            <td class="text-center"><?= $chapter->Divyanjan_admitted ?> </td>
                            <td class="text-center"><?= $chapter->Other_admitted ?> </td>

                            <td class="text-center">
                                <?php if (!empty($chapter->Letter_issued_by_Government)) : ?>
                                    <a href="<?= base_url('Userfiles/Committee/') . $chapter->Letter_issued_by_Government; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                                        <button class="btn btn-outline-success"> Download File </button>
                                    </a>
                                <?php else : ?>
                                    <b> Not Found...</b>
                                <?php endif; ?>
                            </td>

                            <td class="text-center">
                                <?php if (!empty($chapter->Final_Admission_List)) : ?>
                                    <a href="<?= base_url('Userfiles/Committee/') . $chapter->Final_Admission_List; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                                        <button class="btn btn-outline-success"> Download File </button>
                                    </a>
                                <?php else : ?>
                                    <b> Not Found...</b>
                                <?php endif; ?>
                            </td>

                            <td class="text-center">
                                <form action="<?= base_url('delete_office_2_1_2') ?>" method="post">
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
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">2.1.2</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <form action="<?= base_url('update_office_2_1_2') ?>" method="post" enctype="multipart/form-data">
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

                                                        <div class="md-6">
                                                            <label class="form-label"><b>Number of seats emarked for reserved category as per GOI/State Government rule :</b></label>
                                                            <div class="input-group my-3">
                                                                <label class="input-group-text" for="">SC</label>
                                                                <input type="number" class="form-control" id="" name="SC_emarked" value="<?= $chapter->SC_emarked ?>">
                                                            </div>

                                                            <div class="input-group my-3">
                                                                <label class="input-group-text" for="">ST</label>
                                                                <input type="number" class="form-control" id="" name="ST_emarked" value="<?= $chapter->ST_emarked ?>">
                                                            </div>

                                                            <div class="input-group my-3">
                                                                <label class="input-group-text" for="">OBC</label>
                                                                <input type="number" class="form-control" id="" name="OBC_emarked" value="<?= $chapter->OBC_emarked ?>">
                                                            </div>

                                                            <div class="input-group my-3">
                                                                <label class="input-group-text" for="">GENERAL</label>
                                                                <input type="number" class="form-control" id="" name="GENERAL_emarked" value="<?= $chapter->GENERAL_emarked ?>">
                                                            </div>

                                                            <div class="input-group my-3">
                                                                <label class="input-group-text" for="">Divyanjan</label>
                                                                <input type="number" class="form-control" id="" name="Divyanjan_emarked" value="<?= $chapter->Divyanjan_emarked ?>">
                                                            </div>

                                                            <div class="input-group my-3">
                                                                <label class="input-group-text" for="">Other</label>
                                                                <input type="number" class="form-control" id="" name="Other_emarked" value="<?= $chapter->Other_emarked ?>">
                                                            </div>
                                                        </div>

                                                        <div class="md-6 ">
                                                            <label class="form-label"><b>Number of seats admitted from the reserved category : <br></b></label>
                                                            <div class="input-group my-3">
                                                                <label class="input-group-text" for="">SC</label>
                                                                <input type="number" class="form-control" id="" name="SC_admitted" value="<?= $chapter->SC_admitted ?>">
                                                            </div>

                                                            <div class="input-group my-3">
                                                                <label class="input-group-text" for="">ST</label>
                                                                <input type="number" class="form-control" id="" name="ST_admitted" value="<?= $chapter->ST_admitted ?>">
                                                            </div>

                                                            <div class="input-group my-3">
                                                                <label class="input-group-text" for="">OBC</label>
                                                                <input type="number" class="form-control" id="" name="OBC_admitted" value="<?= $chapter->OBC_admitted ?>">
                                                            </div>

                                                            <div class="input-group my-3">
                                                                <label class="input-group-text" for="">GENERAL</label>
                                                                <input type="number" class="form-control" id="" name="GENERAL_admitted" value="<?= $chapter->GENERAL_admitted ?>">
                                                            </div>

                                                            <div class="input-group my-3">
                                                                <label class="input-group-text" for="">Divyanjan</label>
                                                                <input type="number" class="form-control" id="" name="Divyanjan_admitted" value="<?= $chapter->Divyanjan_admitted ?>">
                                                            </div>

                                                            <div class="input-group my-3">
                                                                <label class="input-group-text" for="">Other</label>
                                                                <input type="number" class="form-control" id="" name="Other_admitted" value="<?= $chapter->Other_admitted ?>">
                                                            </div>

                                                        </div>

                                                        <div class="md-6">
                                                            <label class="form-label"><b>Letter issued by Government for reservation : </b></label>
                                                            <input type="file" class="form-control" name="Letter_issued_by_Government" accept=".pdf">
                                                        </div>

                                                        <div class="md-6">
                                                            <label class="form-label"><b>Final Admission List : </b> </label>
                                                            <input type="file" class="form-control" name="Final_Admission_List" accept=".pdf">
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