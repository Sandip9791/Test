<?= $this->extend('Layouts/committeeBase'); ?>
<?= $this->section("Content"); ?>
<h1 class="text-center">Funds / Grants received from government bodies, non-government bodies, and philanthropists (6.4.2) </h1>

<div class="container-fluid" style="display:none" id="committees">
    <div id="form-container">
        <div class="container-fluid border border-primary border-2 my-3 mx-2">
            <form class="row g-3 my-3" method="post" action="<?= base_url('save_office_6_4_2') ?>" enctype="multipart/form-data">

                <div class="col-md-4 mb-3">
                    <label class="form-label">In which Academic Year you want to Store Data ? <label style="color: red;"></label></label>
                    <input type="text" class="form-control" name="AcademicYear" placeholder="Enter Year" autocomplete="off" oninput="validateSubName()">
                    <span id="" style="display:none;color:red;">Please enter a valid Subject Name.</span>
                </div>

                <div class="col-md-4">
                    <label class="form-label" for="faculty-select">Type : <label style="color: red;">*</label></label>
                    <select class="form-control" name="Type" required>
                        <option selected hidden disable>--- Select One ---</option>
                        <option value="Government Bodies">Government Bodies</option>
                        <option value="Non-Government Bodies">Non-Government Bodies</option>
                        <option value="Philanthropists">Philanthropists</option>
                    </select>
                </div>


                <div class="col-md-4">
                    <label class="form-label">Name of government body : <label style="color: red;">*</label></label>
                    <input id="" type="text" class="form-control" name="Government_body">
                    <span style="display:none;color:red;">Please enter a valid name.</span>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Purpose of grant : <label style="color: red;">*</label></label>
                    <input id="" type="text" class="form-control" name="Purpose_of_grant">
                    <span style="display:none;color:red;">Please enter a valid code.</span>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Grants in Rs. : <label style="color: red;">*</label></label>
                    <input type="number" class="form-control" name="Grants_in_Rs" id="">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Link to Audited Statment of Accounts reflecting receipts : <label style="color: red;">*</label></label>
                    <input type="text" class="form-control" name="Link_to_Audited_Statment" id="">
                </div>

                
                <div class="col-md-8">
                    <label class="form-label">Upload Annual audited statements of accounts highlighting the grants received : <label style="color: red;">*</label></label>
                    <input type="file" class="form-control" name="Upload_the_list1" accept=".pdf">
                </div>

                <div class="col-md-8">
                    <label class="form-label">Upload Copy of the sanction letters received from government/ non government bodies and philanthropists : <label style="color: red;">*</label></label>
                    <input type="file" class="form-control" name="Upload_the_list2" accept=".pdf">
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
                <th scope="col">Type</th>
                <th scope="col">Name of government body</th>
                <th scope="col">Purpose of grant</th>
                <th scope="col">Grants in Rs</th>
                <th scope="col">Link to Audited Statment of Accounts reflecting receipts</th>
                <th scope="col">Annual audited statements of accounts highlighting the grants received</th>
                <th scope="col">Copy of the sanction letters received from government/ non government bodies and philanthropists</th>
                <th scope="col">Delete</th>
                <th scope="col">Update</th>
            </tr>
        </thead>

        <?php if (isset($documents)) :
            $row = 1;
            foreach ($documents as $doc) :
                $book =  $doc->Committee_6_4_2;
        ?>
                <tbody>
                    <?php
                    foreach ($book as $chapter) :
                    ?>
                        <tr>
                            <th class="form-control text-center" scope="row"><?= $row++ ?></th>
                            <td class="text-center"><?= $chapter->Type ?></td>
                            <td class="text-center"><?= $chapter->Government_body ?></td>
                            <td class="text-center"><?= $chapter->Purpose_of_grant ?></td>
                            <td class="text-center"><?= $chapter->Grants_in_Rs ?></td>
                            <td class="text-center"><?= $chapter->Link_to_Audited_Statment ?></td>
                            <td class="text-center">
                                <?php if (!empty($chapter->Upload_the_list1)) : ?>
                                    <a href="<?= base_url('Userfiles/Committee/') . $chapter->Upload_the_list1; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                                        <button class="btn btn-outline-success"> Download File </button>
                                    </a>
                                <?php else : ?>
                                    <b> Not Found...</b>
                                <?php endif; ?>
                            </td>

                            <td class="text-center">
                                <?php if (!empty($chapter->Upload_the_list2)) : ?>
                                    <a href="<?= base_url('Userfiles/Committee/') . $chapter->Upload_the_list2; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                                        <button class="btn btn-outline-success"> Download File </button>
                                    </a>
                                <?php else : ?>
                                    <b> Not Found...</b>
                                <?php endif; ?>
                            </td>


                            <td class="text-center">
                                <form action="<?= base_url('delete_office_6_4_2') ?>" method="post">
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
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">6.4.2</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <form action="<?= base_url('update_office_6_4_2') ?>" method="post" enctype="multipart/form-data">
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


                                                        <div class="md-4 my-2">
                                                            <label class="form-label" for="faculty-select">Type : <label style="color: red;">*</label></label>
                                                            <select class="form-control" id="" name="Type" required>
                                                                <option selected hidden value="<?= $chapter->Type ?>"><?= $chapter->Type ?></option>
                                                                <option value="Government Bodies">Government Bodies</option>
                                                                <option value="Non-Government Bodies">Non-Government Bodies</option>
                                                                <option value="Philanthropists">Philanthropists</option>
                                                            </select>
                                                        </div>


                                                        <div class="md-4 my-2">
                                                            <label class="form-label">Name of government body : <label style="color: red;">*</label></label>
                                                            <input id="" type="text" class="form-control" name="Government_body" value="<?= $chapter->Government_body ?>">
                                                            <span style="display:none;color:red;">Please enter a valid name.</span>
                                                        </div>

                                                        <div class="md-4 my-2">
                                                            <label class="form-label">Purpose of grant : <label style="color: red;">*</label></label>
                                                            <input id="" type="text" class="form-control" name="Purpose_of_grant" value="<?= $chapter->Purpose_of_grant ?>">
                                                            <span style="display:none;color:red;">Please enter a valid code.</span>
                                                        </div>

                                                        <div class="md-4 my-2">
                                                            <label class="form-label">Grants in Rs. : <label style="color: red;">*</label></label>
                                                            <input type="number" class="form-control" name="Grants_in_Rs" id="" value="<?= $chapter->Grants_in_Rs ?>">
                                                        </div>

                                                        <div class="md-4 my-2">
                                                            <label class="form-label">Link to Audited Statment of Accounts reflecting receipts : <label style="color: red;">*</label></label>
                                                            <input type="text" class="form-control" name="Link_to_Audited_Statment" id="" value="<?= $chapter->Link_to_Audited_Statment ?>">
                                                        </div>

                                                        <div class="md-8 my-2">
                                                            <label class="form-label">Upload Annual audited statements of accounts highlighting the grants received : <label style="color: red;">*</label></label>
                                                            <input type="file" class="form-control" name="Upload_the_list1" accept=".pdf">
                                                        </div>

                                                        <div class="md-8 my-2">
                                                            <label class="form-label">Upload Copy of the sanction letters received from government/ non government bodies and philanthropists : <label style="color: red;">*</label></label>
                                                            <input type="file" class="form-control" name="Upload_the_list2" accept=".pdf">
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