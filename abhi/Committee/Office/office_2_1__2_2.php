<?= $this->extend('Layouts/committeeBase'); ?>
<?= $this->section("Content"); ?>
<h1 class="text-center">2.1 & 2.2 </h1>

<div class="container-fluid" style="display:none" id="committees">
    <div id="form-container">
        <div class="container-fluid border border-primary border-2 my-3 mx-2">
            <form class="row g-3 my-3" method="post" action="<?= base_url('save_office_2_1__2_2') ?>" enctype="multipart/form-data">

                <div class="col-md-4 mb-3">
                    <label class="form-label">In which Academic Year you want to Store Data ? <label style="color: red;"></label></label>
                    <input type="text" class="form-control" name="AcademicYear" placeholder="Enter Year" autocomplete="off" oninput="validateSubName()">
                    <span id="" style="display:none;color:red;">Please enter a valid Subject Name.</span>
                </div>

                <label>
                    <h4>2.1 Number of full time teachers presently working in the institution : </h4>
                </label>
                <div class="col-md-4">
                    <label>Name : <label style="color: red;">*</label></label>
                    <input id="" type="text" class="form-control" name="Name_p">
                    <span style="display:none;color:red;">Please enter a valid name.</span>
                </div>

                <div class="col-md-4">
                    <label>ID number : <label style="color: red;">*</label></label>
                    <input type="number" class="form-control" name="ID_number_p" id="">
                </div>

                <div class="col-md-4">
                    <label>Email : <label style="color: red;">*</label></label>
                    <input type="text" class="form-control" name="Email_p">
                    <span style="display:none;color:red;">Please enter a valid code.</span>
                </div>

                <div class="col-md-4">
                    <label for="faculty-select">Gender : <label style="color: red;">*</label></label>
                    <select class="form-control" id="Gender_P" name="Gender_P" required>
                        <option selected hidden>--- Select One ---</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label>Designation : <label style="color: red;">*</label></label>
                    <input type="text" class="form-control" name="Designation_p" id="">
                </div>

                <div class="col-md-4">
                    <label>Date of joining:<label style="color: red;">*</label></label>
                    <input type="date" class="form-control" name="Date_of_joining_p" placeholder="">
                </div>



                <label>
                    <h4 class="mt-3">2.2 Number of full time teachers who left the institution during the last five years : </h4>
                </label>
                <div class="col-md-4">
                    <label>Name : <label style="color: red;">*</label></label>
                    <input id="" type="text" class="form-control" name="Name_l">
                    <span style="display:none;color:red;">Please enter a valid name.</span>
                </div>

                <div class="col-md-4">
                    <label>ID number : <label style="color: red;">*</label></label>
                    <input type="number" class="form-control" name="ID_number_l" id="">
                </div>

                <div class="col-md-4">
                    <label>Email : <label style="color: red;">*</label></label>
                    <input type="text" class="form-control" name="Email_l">
                    <span style="display:none;color:red;">Please enter a valid code.</span>
                </div>

                <div class="col-md-4">
                    <label for="faculty-select">Gender : <label style="color: red;">*</label></label>
                    <select class="form-control" id="Gender_l" name="Gender_l" required>
                        <option selected hidden>--- Select One ---</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label>Designation : <label style="color: red;">*</label></label>
                    <input type="text" class="form-control" name="Designation_l" id="">
                </div>

                <div class="col-md-4">
                    <label>Date of joining:<label style="color: red;">*</label></label>
                    <input type="date" class="form-control" name="Date_of_joining_l" placeholder="">
                </div>

                <div class="col-md-4">
                    <label>Date of leaving:<label style="color: red;">*</label></label>
                    <input type="date" class="form-control" name="Date_of_leaving_l" placeholder="">
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
                <th scope="col" colspan="6">Number of full time teachers presently working in the institution </th>
                <th scope="col" colspan="7">Number of full time teachers who left the institution during the last five years</th>
                <th colspan="2">Action</th>
            </tr>
            <tr>
                <th scope="col">SR.No.</th>
                <th scope="col">Name</th>
                <th scope="col">ID number</th>
                <th scope="col">Email</th>
                <th scope="col">Gender</th>
                <th scope="col">Designation</th>
                <th scope="col">Date of joining</th>

                <th scope="col">Name</th>
                <th scope="col">ID number</th>
                <th scope="col">Email</th>
                <th scope="col">Gender</th>
                <th scope="col">Designation</th>
                <th scope="col">Date of joining</th>
                <th scope="col">Date of leaving</th>
                <th scope="col">Delete</th>
                <th scope="col">Update</th>
            </tr>
        </thead>

        <?php if (isset($documents)) :
            $row = 1;
            foreach ($documents as $doc) :
                $book =  $doc->Committee_2_1_2_2;
        ?>
                <tbody>
                    <?php
                    foreach ($book as $chapter) :
                    ?>
                        <tr>
                            <th class="form-control text-center" scope="row"><?= $row++ ?></th>
                            <td class="text-center"><?= $chapter->Name_p ?></td>
                            <td class="text-center"><?= $chapter->ID_number_p ?></td>
                            <td class="text-center"><?= $chapter->Email_p ?></td>
                            <td class="text-center"><?= $chapter->Gender_P ?></td>
                            <td class="text-center"><?= $chapter->Designation_p ?></td>
                            <td class="text-center"><?= $chapter->Date_of_joining_p ?></td>
                            <td class="text-center"><?= $chapter->Name_l ?></td>
                            <td class="text-center"><?= $chapter->ID_number_l ?></td>
                            <td class="text-center"><?= $chapter->Email_l ?></td>
                            <td class="text-center"><?= $chapter->Gender_l ?></td>
                            <td class="text-center"><?= $chapter->Designation_l ?></td>
                            <td class="text-center"><?= $chapter->Date_of_joining_l ?></td>
                            <td class="text-center"><?= $chapter->Date_of_leaving_l ?></td>

                            <td class="text-center">
                                <form action="<?= base_url('delete_office_2_1__2_2') ?>" method="post">
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
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">2.1 & 2.2</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <form action="<?= base_url('update_office_2_1__2_2') ?>" method="post" enctype="multipart/form-data">
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

                                                        <label>
                                                            <h4>2.1 Number of full time teachers presently working in the institution : </h4>
                                                        </label>
                                                        <div class="md-4">
                                                            <label>Name : <label style="color: red;">*</label></label>
                                                            <input id="" type="text" class="form-control" name="Name_p" value="<?= $chapter->Name_p ?>">
                                                            <span style="display:none;color:red;">Please enter a valid name.</span>
                                                        </div>

                                                        <div class="md-4">
                                                            <label>ID number : <label style="color: red;">*</label></label>
                                                            <input type="number" class="form-control" name="ID_number_p" id="" value="<?= $chapter->ID_number_p ?>">
                                                        </div>

                                                        <div class="md-4">
                                                            <label>Email : <label style="color: red;">*</label></label>
                                                            <input type="text" class="form-control" name="Email_p" value="<?= $chapter->Email_p ?>">
                                                            <span style="display:none;color:red;">Please enter a valid code.</span>
                                                        </div>

                                                        <div class="md-4">
                                                            <label for="faculty-select">Gender : <label style="color: red;">*</label></label>
                                                            <select class="form-control" id="Gender_P" name="Gender_P" required>
                                                                <option selected hidden>--- Select One ---</option>
                                                                <option>Male</option>
                                                                <option>Female</option>
                                                                <option>Other</option>
                                                            </select>
                                                        </div>

                                                        <div class="md-4">
                                                            <label>Designation : <label style="color: red;">*</label></label>
                                                            <input type="text" class="form-control" name="Designation_p" id="" value="<?= $chapter->Designation_p ?>">
                                                        </div>

                                                        <div class="md-4">
                                                            <label>Date of joining:<label style="color: red;">*</label></label>
                                                            <input type="date" class="form-control" name="Date_of_joining_p" placeholder="" value="<?= $chapter->Date_of_joining_p ?>">
                                                        </div>


                                                        <label>
                                                            <h4 class="mt-3">2.2 Number of full time teachers who left the institution during the last five years : </h4>
                                                        </label>
                                                        <div class="md-4">
                                                            <label>Name : <label style="color: red;">*</label></label>
                                                            <input id="" type="text" class="form-control" name="Name_l" value="<?= $chapter->Name_l ?>">
                                                            <span style="display:none;color:red;">Please enter a valid name.</span>
                                                        </div>

                                                        <div class="md-4">
                                                            <label>ID number : <label style="color: red;">*</label></label>
                                                            <input type="number" class="form-control" name="ID_number_l" id="" value="<?= $chapter->ID_number_l ?>">
                                                        </div>

                                                        <div class="md-4">
                                                            <label>Email : <label style="color: red;">*</label></label>
                                                            <input type="text" class="form-control" name="Email_l" value="<?= $chapter->Email_l ?>">
                                                            <span style="display:none;color:red;">Please enter a valid code.</span>
                                                        </div>

                                                        <div class="md-4">
                                                            <label for="faculty-select">Gender : <label style="color: red;">*</label></label>
                                                            <select class="form-control" id="Gender_l" name="Gender_l" required>
                                                                <option selected hidden value="<?= $chapter->Current_Year ?>"><?= $chapter->Gender_l ?></option>
                                                                <option>Male</option>
                                                                <option>Female</option>
                                                                <option>Other</option>
                                                            </select>
                                                        </div>

                                                        <div class="md-4">
                                                            <label>Designation : <label style="color: red;">*</label></label>
                                                            <input type="text" class="form-control" name="Designation_l" id="" value="<?= $chapter->Designation_l ?>">
                                                        </div>

                                                        <div class="md-4">
                                                            <label>Date of joining:<label style="color: red;">*</label></label>
                                                            <input type="date" class="form-control" name="Date_of_joining_l" placeholder="" value="<?= $chapter->Date_of_joining_l ?>">
                                                        </div>

                                                        <div class="md-4">
                                                            <label>Date of leaving:<label style="color: red;">*</label></label>
                                                            <input type="date" class="form-control" name="Date_of_leaving_l" placeholder="" value="<?= $chapter->Date_of_leaving_l ?>">
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