<?= $this->extend('Layouts/committeeBase'); ?>
<?= $this->section("Content"); ?>
<h1 class="text-center">Expenditure incurred on Infrastructure, Books & Physical Facilites (4.1.2) (4.2.2) (4.4.1) </h1>

<div class="container-fluid" style="display:none" id="committees">
    <div id="form-container">
        <div class="container-fluid border border-primary border-2 my-3 mx-2">
            <form class=" g-3 my-3" method="post" action="<?= base_url('save_office_412_422_441') ?>" enctype="multipart/form-data">

                <div class="col-md-4 mb-3">
                    <label class="form-label">In which Academic Year you want to Store Data ? <label style="color: red;"></label></label>
                    <input type="text" class="form-control" name="AcademicYear" placeholder="Enter Year" autocomplete="off" oninput="validateSubName()">
                    <span id="" style="display:none;color:red;">Please enter a valid Subject Name.</span>
                </div>

                <div class="mx-1 my-3 row border ">
                    <h4 class="my-3">1. Infrastructure :</h4>
                   
                    <div class="col-md-6 my-3">
                        <label>Amount of Expenditure Infrastructure developement & augmentation :<label style="color: red;">*</label></label>
                        <input type="number" class="form-control" name="Expenditure_Infrastructure" id="">
                    </div>

                    <div class="col-md-4 my-3">
                        <label>Total Expenditure Excluding Salary : <label style="color: red;">*</label></label>
                        <input type="number" class="form-control" name="Total_Expenditure" id="">
                    </div>

                    <div class="col-md-4 my-3">
                        <label>Percentage : <label style="color: red;">*</label></label>
                        <input type="number" class="form-control" name="Percentage_Infrastructure" id="">
                    </div>

                    <div class="col-md-4 my-3">
                        <label>Upload Audited income Expenditure statement : <label style="color: red;">*</label></label>
                        <input type="file" class="form-control" name="Audited_Infrastructure" id="" accept=".pdf">
                        <label style="color: red;"><small>Note - Signed by CA & Counter Signed by competent authority.</small></label></label>
                    </div>
                </div>


                <div class="mx-1 row border">
                    <h4 class="my-3">2. Books :</h4>

                    <div class="col-md-6 my-3">
                        <label>Amount of Expenditure Infrastructure developement & augmentation :<label style="color: red;">*</label></label>
                        <input type="number" class="form-control" name="Expenditure_Books" id="">
                    </div>

                    <div class="col-md-4 my-3">
                        <label>Percentage : <label style="color: red;">*</label></label>
                        <input type="number" class="form-control" name="Percentage_Books" id="">
                    </div>

                    <div class="col-md-4 my-3">
                        <label>Upload Audited Expenditure statement : <label style="color: red;">*</label></label>
                        <input type="file" class="form-control" name="Audited_Books" id="" accept=".pdf">
                        <label style="color: red;"><small>Note - Signed by CA & Counter Signed by competent authority.</small></label></label>
                    </div>

                </div>



                <div class="mx-1 my-3 row border">
                    <h4 class="my-3">3. Physical Facilites :</h4>

                    <div class="col-md-6 my-3">
                        <label>Expenditure on maintenance of physical facilities (excluding salary for human resources) :<label style="color: red;">*</label></label>
                        <input type="number" class="form-control" name="Expenditure_physical_facilities" id="">
                    </div>

                    <div class="col-md-6 my-3">
                        <label>Expenditure on maintenace of academic facilities (excluding salary for human resources) :<label style="color: red;">*</label></label>
                        <input type="number" class="form-control" name="Expenditure_academic_facilities" id="">
                    </div>

                    <div class="col-md-4 my-3">
                        <label>Upload Audited Expenditure statement : <label style="color: red;">*</label></label>
                        <input type="file" class="form-control" name="Audited_Physical_Facilites" id="" accept=".pdf">
                        <label style="color: red;"><small>Note - Signed by CA & Counter Signed by competent authority.</small></label></label>
                    </div>

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
                <th scope="col" colspan="4">Infrastructure</th>
                <th scope="col" colspan="3">Books</th>
                <th scope="col" colspan="3">Physical Facilites</th>
                <th scope="col" colspan="2">Actions</th>
            </tr>
            <tr>
                <th></th>
                <th scope="col">Amount of Expenditure Infrastructure developement & augmentation</th>
                <th scope="col">Total Expenditure Excluding Salary</th>
                <th scope="col">Percentage</th>
                <th scope="col">Audited income Expenditure statement</th>

                <th scope="col">Amount of Expenditure Infrastructure developement & augmentation</th>
                <th scope="col">Percentage</th>
                <th scope="col">Audited Expenditure statement</th>

                <th scope="col">Expenditure on maintenance of physical facilities (excluding salary for human resources)</th>
                <th scope="col">Expenditure on maintenace of academic facilities (excluding salary for human resources)</th>
                <th scope="col">Audited Expenditure statement</th>

                <th scope="col">Delete</th>
                <th scope="col">Update</th>

            </tr>
        </thead>

        <?php if (isset($documents)) :
            $row = 1;
            foreach ($documents as $doc) :
                $book =  $doc->Committee_4;
        ?>
                <tbody>
                    <?php
                    foreach ($book as $chapter) :
                    ?>
                        <tr>
                            <th class="form-control text-center" scope="row"><?= $row++ ?></th>
                            <td class="text-center"><?= $chapter->Expenditure_Infrastructure ?> </td>
                            <td class="text-center"><?= $chapter->Total_Expenditure_Infrastructure ?> </td>
                            <td class="text-center"><?= $chapter->Percentage_Infrastructure ?> </td>

                            <td class="text-center">
                                <?php if (!empty($chapter->Audited_Infrastructure)) : ?>
                                    <a href="<?= base_url('Userfiles/Committee/') . $chapter->Audited_Infrastructure; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                                        <button class="btn btn-outline-success"> Download File </button>
                                    </a>
                                <?php else : ?>
                                    <b> Not Found...</b>
                                <?php endif; ?>
                            </td>

                            <td class="text-center"><?= $chapter->Expenditure_Books ?> </td>
                            <td class="text-center"><?= $chapter->Percentage_Books ?> </td>

                            <td class="text-center">
                                <?php if (!empty($chapter->Audited_Books)) : ?>
                                    <a href="<?= base_url('Userfiles/Committee/') . $chapter->Audited_Books; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                                        <button class="btn btn-outline-success"> Download File </button>
                                    </a>
                                <?php else : ?>
                                    <b> Not Found...</b>
                                <?php endif; ?>
                            </td>

                            <td class="text-center"><?= $chapter->Expenditure_physical_facilities ?> </td>
                            <td class="text-center"><?= $chapter->Expenditure_academic_facilities ?> </td>

                            <td class="text-center">
                                <?php if (!empty($chapter->Audited_Physical_Facilites)) : ?>
                                    <a href="<?= base_url('Userfiles/Committee/') . $chapter->Audited_Physical_Facilites; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                                        <button class="btn btn-outline-success"> Download File </button>
                                    </a>
                                <?php else : ?>
                                    <b> Not Found...</b>
                                <?php endif; ?>
                            </td>


                            <td class="text-center">
                                <form action="<?= base_url('delete_office_412_422_441') ?>" method="post">
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
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">4.1.2 & 4.2.2 & 4.4.1</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <form action="<?= base_url('update_office_412_422_441') ?>" method="post" enctype="multipart/form-data">
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

                                                        <div class="mx-1 my-3 row border ">
                                                            <h4 class="my-3">1. Infrastructure :</h4>
                                                          

                                                            <div class="md-6 my-3">
                                                                <label>Amount of Expenditure Infrastructure developement & augmentation :<label style="color: red;">*</label></label>
                                                                <input type="number" class="form-control" name="Expenditure_Infrastructure" value="<?= $chapter->Expenditure_Infrastructure ?>" id="">
                                                            </div>

                                                            <div class="md-4 my-3">
                                                                <label>Total Expenditure Excluding Salary : <label style="color: red;">*</label></label>
                                                                <input type="number" class="form-control" name="Total_Expenditure" value="<?= $chapter->Total_Expenditure_Infrastructure ?>" id="">
                                                            </div>

                                                            <div class="md-4 my-3">
                                                                <label>Percentage : <label style="color: red;">*</label></label>
                                                                <input type="number" class="form-control" name="Percentage_Infrastructure" value="<?= $chapter->Percentage_Infrastructure ?>" id="">
                                                            </div>

                                                            <div class="md-4 my-3">
                                                                <label>Upload Audited income Expenditure statement : <label style="color: red;">*</label></label>
                                                                <input type="file" class="form-control" name="Audited_Infrastructure" id="" accept=".pdf">
                                                                <label style="color: red;"><small>Note - Signed by CA & Counter Signed by competent authority.</small></label></label>
                                                            </div>
                                                        </div>


                                                        <div class="mx-1 row border">
                                                            <h4 class="my-3">2. Books :</h4>

                                                            <div class="md-6 my-3">
                                                                <label>Amount of Expenditure Infrastructure developement & augmentation :<label style="color: red;">*</label></label>
                                                                <input type="number" class="form-control" name="Expenditure_Books" id="" value="<?= $chapter->Expenditure_Books ?>">
                                                            </div>

                                                            <div class="md-4 my-3">
                                                                <label>Percentage : <label style="color: red;">*</label></label>
                                                                <input type="number" class="form-control" name="Percentage_Books" id="" value="<?= $chapter->Percentage_Books ?>">
                                                            </div>

                                                            <div class="md-4 my-3">
                                                                <label>Upload Audited Expenditure statement : <label style="color: red;">*</label></label>
                                                                <input type="file" class="form-control" name="Audited_Books" id="" accept=".pdf">
                                                                <label style="color: red;"><small>Note - Signed by CA & Counter Signed by competent authority.</small></label></label>
                                                            </div>

                                                        </div>

                                                        <div class="mx-1 my-3 row border">
                                                            <h4 class="my-3">3. Physical Facilites :</h4>

                                                            <div class="md-6 my-3">
                                                                <label>Expenditure on maintenance of physical facilities (excluding salary for human resources) :<label style="color: red;">*</label></label>
                                                                <input type="number" class="form-control" name="Expenditure_physical_facilities" id="" value="<?= $chapter->Expenditure_physical_facilities ?>">
                                                            </div>

                                                            <div class="md-6 my-3">
                                                                <label>Expenditure on maintenace of academic facilities (excluding salary for human resources) :<label style="color: red;">*</label></label>
                                                                <input type="number" class="form-control" name="Expenditure_academic_facilities" id="" value="<?= $chapter->Expenditure_academic_facilities ?>">
                                                            </div>

                                                            <div class="md-4 my-3">
                                                                <label>Upload Audited Expenditure statement : <label style="color: red;">*</label></label>
                                                                <input type="file" class="form-control" name="Audited_Physical_Facilites" id="" accept=".pdf">
                                                                <label style="color: red;"><small>Note - Signed by CA & Counter Signed by competent authority.</small></label></label>
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