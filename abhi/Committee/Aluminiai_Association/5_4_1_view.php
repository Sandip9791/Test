<?= $this->extend('Layouts/committeeBase'); ?>
<?= $this->section("Content"); ?>

<div class="container-fluid" style="display:none" id="committees">
    <div id="form-container">
        <div class="container-fluid border border-primary border-2 my-3 mx-2">

            <form class="row g-3 my-3 mx-2" method="post" action="<?= base_url('save_5_4_1') ?>"
                enctype="multipart/form-data">

                <div class="col-md-4 mb-3">
                    <label class="form-label">In which Academic Year you want to Store Data ? <label style="color: red;"><strong>*</strong></label></label>
                    <input type="text" class="form-control" name="AcademicYear" id="datepicker" placeholder="Enter Year" maxlength="4" autocomplete="off" required>
                    <span id="error-message" style="display:none;color:red;">Please enter a valid valid Year.</span>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Name of Aluminai Assosiation : <label style="color: red;"><strong>*</strong></label></label>
                    <input type="text" id="nameAluminai" class="form-control" name="nameAluminai" placeholder="" autocomplete="off" oninput="validatenameAluminai()" required>
                    <span id="nameAluminaiError" style="display:none;color:red;">Please Enter a Valid Name of Aluminai Assosiation.</span>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Registration Number : <label style="color: red;"><strong>*</strong></label></label>
                    <input type="text" id="registrationNumberInput" name="registrationNumber" class="form-control" autocomplete="off" maxlength="15" oninput="validateRegistrationNumber(this);" required>
                    <span id="registrationNumberError" style="display:none;color:red;">Please Enter a Valid Registration Number.</span>
                </div>

                <div class="col-md-10 my-4">
                    <label class="form-label">Aluminai Supported Activities : <label style="color: red;"><strong>*</strong></label></label>
                    <input id="aluminaiSupported" type="text" class="form-control" name="aluminaiSupported" autocomplete="off" oninput="validatealuminaiSupported()" required>
                    <span id="aluminaiSupportedError" style="display:none;color:red;">Please Enter a Valid Aluminai Supported Activities.</span>
                </div>

                <div class="col-md-12 my-3">
                    <label class="form-label"><label style="color: red;"><strong>Note : Please Select all PDF files under 2MB.</strong></label></label><br>
                </div>

                <div class="col-md-5">
                    <label class="form-label">Upload Audited Statement of account of Aluminai funded scholarship account : <label style="color: red;"><strong>*</strong></label></label>
                    <input type="file" id="auditedSatement" class="form-control" name="auditedSatement" autocomplete="off" accept=".pdf" oninput="validateauditedSatement(event)" required>
                    <span id="auditedSatementError" style="color:red;"></span>
                </div>

                <div class="col-md-5">
                    <label class="form-label">Upload list of Aluminai with the amount contributed : <label style="color: red;"><strong>*</strong></label></label>
                    <input type="file" id="listAluminai" class="form-control" name="listAluminai" autocomplete="off" accept=".pdf" oninput="validatelistAluminai(event)" required>
                    <span id="listAluminaiError" style="color:red;"></span>
                </div>

                <div class="col-12 text-center my-3">
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
                <th scope="col">Name of Aluminai Assosiation</th>
                <th scope="col">Registration Number</th>
                <th scope="col">Aluminai Supported Activities</th>
                <th scope="col">Audited Statement of account of Aluminai funded scholarship account</th>
                <th scope="col">List of Aluminai with the amount contributed</th>
                <th scope="col">Delete</th>
                <th scope="col">Update</th>
            </tr>
        </thead>

        <?php if (isset($documents)):
            $row = 1;
            foreach ($documents as $doc):
                $book = $doc->Committee_5_4_1;
                ?>
                <tbody>
                    <?php
                    foreach ($book as $chapter):
                        ?>
                        <tr>
                            <th class="form-control text-center" scope="row">
                                <?= $row++ ?>
                            </th>
                            <td class="text-center">
                                <?= $chapter->Name_Aluminai ?>
                            </td>
                            <td class="text-center">
                                <?= $chapter->Registration_Number ?>
                            </td>
                            <td class="text-center">
                                <?= $chapter->Aluminai_Supported ?>
                            </td>

                            <td class="text-center">
                                <?php if (!empty($chapter->Audited_Statement)): ?>
                                    <a href="<?= base_url('Userfiles/Committee/') . $chapter->Audited_Statement; ?>" download><img
                                            src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                                        <button class="btn btn-outline-success"> Download File </button>
                                    </a>
                                <?php else: ?>
                                    <b> Not Found...</b>
                                <?php endif; ?>
                            </td>

                            <td class="text-center">
                                <?php if (!empty($chapter->List_Aluminai)): ?>
                                    <a href="<?= base_url('Userfiles/Committee/') . $chapter->List_Aluminai; ?>" download><img
                                            src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                                        <button class="btn btn-outline-success"> Download File </button>
                                    </a>
                                <?php else: ?>
                                    <b> Not Found...</b>
                                <?php endif; ?>
                            </td>


                            <td class="text-center">
                                <form action="<?= base_url('delete_5_4_1') ?>" method="post">
                                    <input class="form-control" type="text" value="<?= $chapter->Committe_id ?>" name="srnumber"
                                        style="display:none">
                                    <img class="mx-3" src="assets/images/iconsDelete.gif"><br>

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal<?= $chapter->Committe_id ?>">
                                        Delete
                                    </button>

                                    <div class="modal fade" id="deleteModal<?= $chapter->Committe_id ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel"> Alert</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-danger"> Are You Sure You Want To Delete The Record !!!</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
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

                                    <button type="button" class=" text-center btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal<?= $chapter->Committe_id ?>"
                                        data-bs-whatever="@mdo">Update</button>
                                </div>


                                <div class="modal fade" id="exampleModal<?= $chapter->Committe_id ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">5.4.1</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <form action="<?= base_url('update_5_4_1') ?>" method="post"
                                                    enctype="multipart/form-data">
                                                    <div class="row">

                                                        <div class="md-4 my-3" style="display:none;">
                                                            <label class="form-label">IQAC id <label style="color: red;">*
                                                                </label></label>
                                                            <input type="text" class="form-control" name="srnumber" readonly
                                                                value="<?= $chapter->Committe_id ?>"></th>
                                                            <span style="display:none;color:red;">Please enter a valid
                                                                Information.</span>
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
                                                            <label class="form-label">Name of Aluminai Assosiation : <label style="color: red;"><strong>*</strong></label></label>
                                                            <input type="text" id="updatenameAluminai<?= $chapter->Committe_id ?>" class="form-control" name="nameAluminai" placeholder="" value="<?= $chapter->Name_Aluminai ?>" autocomplete="off" oninput="updatevalidatenameAluminai<?= $chapter->Committe_id ?>()" required>
                                                            <span id="updatenameAluminaiError<?= $chapter->Committe_id ?>" style="display:none;color:red;">Please Enter a Valid Name of Aluminai Assosiation.</span>
                                                        </div>
                                                        <script>
                                                            function updatevalidatenameAluminai<?= $chapter->Committe_id ?>() {
                                                                var regName = /^[a-zA-Z ]+$/;
                                                                var name = document.getElementById('updatenameAluminai<?= $chapter->Committe_id ?>').value;
                                                                var error = document.getElementById("updatenameAluminaiError<?= $chapter->Committe_id ?>");

                                                                var sanitizedName = name.replace(/[^a-zA-Z ]/g, '');

                                                                var words = sanitizedName.split(" ");
                                                                var capitalizedWords = words.map(function(word) {
                                                                    return word.charAt(0).toUpperCase() + word.slice(1);
                                                                });

                                                                var finalupdatenameAluminai = capitalizedWords.join(" ");
                                                                document.getElementById('updatenameAluminai<?= $chapter->Committe_id ?>').value = finalupdatenameAluminai;

                                                                if (finalupdatenameAluminai.length === 0 || regName.test(finalupdatenameAluminai)) {
                                                                    error.style.display = "none";
                                                                } else {
                                                                    error.style.display = "block";
                                                                }
                                                            }

                                                            document.getElementById('updatenameAluminai<?= $chapter->Committe_id ?>').addEventListener('input', updatevalidatenameAluminai<?= $chapter->Committe_id ?>);
                                                        </script>

                                                        <div class="md-4 my-3">
                                                            <label class="form-label">Registration Number : <label style="color: red;"><strong>*</strong></label></label>
                                                            <input id="updateregistrationNumberInput<?= $chapter->Committe_id ?>" type="text" name="registrationNumber" class="form-control" value="<?= $chapter->Registration_Number ?>" autocomplete="off" maxlength="15" oninput="updatevalidateRegistrationNumber<?= $chapter->Committe_id ?>(this);" required>
                                                            <span id="updateregistrationNumberError<?= $chapter->Committe_id ?>" style="display:none;color:red;">Please Enter a Valid Registration Number.</span>
                                                        </div>
                                                        <script>
                                                            function updatevalidateRegistrationNumber<?= $chapter->Committe_id ?>(inputElement) {
                                                                var inputValue = inputElement.value;
                                                                var sanitizedValue = inputValue.replace(/[^a-zA-Z0-9]/g, ''); // Remove hyphens
                                                                inputElement.value = sanitizedValue.toUpperCase(); 

                                                                updatevalidateRegistrationNumberFormat<?= $chapter->Committe_id ?>(); 
                                                            }

                                                            function updatevalidateRegistrationNumberFormat<?= $chapter->Committe_id ?>() {
                                                                var subcode = document.getElementById("updateregistrationNumberInput<?= $chapter->Committe_id ?>").value;
                                                                var regsubcode = /^[A-Z0-9]+$/; // Only uppercase letters and numbers
                                                                var error = document.getElementById("updateregistrationNumberError<?= $chapter->Committe_id ?>");

                                                                if (subcode.length === 0) {
                                                                    error.style.display = "none";
                                                                } else if (!regsubcode.test(subcode)) {
                                                                    error.style.display = "block";
                                                                } else {
                                                                    error.style.display = "none";
                                                                }
                                                            }
                                                        </script>

                                                        <div class="md-4 my-3">
                                                            <label class="form-label">Aluminai Supported Activities : <label style="color: red;"><strong>*</strong></label></label>
                                                            <input id="updatealuminaiSupported<?= $chapter->Committe_id ?>" type="text" class="form-control" name="aluminaiSupported" value="<?= $chapter->Aluminai_Supported ?>" autocomplete="off" oninput="updatevalidatealuminaiSupported<?= $chapter->Committe_id ?>()" required>
                                                            <span id="updatealuminaiSupportedError<?= $chapter->Committe_id ?>" style="display:none;color:red;">Please Enter a Valid Aluminai Supported Activities.</span>
                                                        </div>
                                                        <script>
                                                            function updatevalidatealuminaiSupported<?= $chapter->Committe_id ?>() {
                                                                var regName = /^[a-zA-Z ]+$/;
                                                                var name = document.getElementById('updatealuminaiSupported<?= $chapter->Committe_id ?>').value;
                                                                var error = document.getElementById("updatealuminaiSupportedError<?= $chapter->Committe_id ?>");

                                                                var sanitizedName = name.replace(/[^a-zA-Z ]/g, '');

                                                                var words = sanitizedName.split(" ");
                                                                var capitalizedWords = words.map(function(word) {
                                                                    return word.charAt(0).toUpperCase() + word.slice(1);
                                                                });

                                                                var updatefinalaluminaiSupported = capitalizedWords.join(" ");
                                                                document.getElementById('updatealuminaiSupported<?= $chapter->Committe_id ?>').value = updatefinalaluminaiSupported;

                                                                if (updatefinalaluminaiSupported.length === 0 || regName.test(updatefinalaluminaiSupported)) {
                                                                    error.style.display = "none";
                                                                } else {
                                                                    error.style.display = "block";
                                                                }
                                                            }

                                                            document.getElementById('updatealuminaiSupported<?= $chapter->Committe_id ?>').addEventListener('input', updatevalidatealuminaiSupported<?= $chapter->Committe_id ?>);

                                                        </script>

                                                        <div class="md-4 my-3">
                                                            <label class="form-label"><label style="color: red;"><strong> Note : Please Select all PDF files under 2MB.</strong></label></label><br>
                                                        </div>

                                                        <div class="md-4 my-3">
                                                            <label class="form-label">Upload Audited Statement of account of Aluminai funded scholarship account : <label style="color: red;"></label></label>
                                                            <input id="updateauditedSatement<?= $chapter->Committe_id ?>" type="file" class="form-control" name="auditedSatement" autocomplete="off" accept=".pdf" oninput="updatevalidateauditedSatement<?= $chapter->Committe_id ?>(event)">
                                                            <span id="updateauditedSatementError<?= $chapter->Committe_id ?>" style="color:red;"></span>
                                                        </div>

                                                        <div class="md-4 my-3">
                                                            <label class="form-label">Upload list of Aluminai with the amount contributed : <label style="color: red;"></label></label>
                                                            <input id="updatelistAluminai<?= $chapter->Committe_id ?>" type="file" class="form-control" name="listAluminai" autocomplete="off" accept=".pdf" oninput="updatevalidatelistAluminai<?= $chapter->Committe_id ?>(event)">
                                                            <span id="updatelistAluminaiError<?= $chapter->Committe_id ?>" style="color:red;"></span>
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

                                                            function updatevalidateauditedSatement<?= $chapter->Committe_id ?>(event) {
                                                                updatevalidateDoc<?= $chapter->Committe_id ?>(event, 'updateauditedSatementError<?= $chapter->Committe_id ?>');
                                                            }

                                                            function updatevalidatelistAluminai<?= $chapter->Committe_id ?>(event) {
                                                                updatevalidateDoc<?= $chapter->Committe_id ?>(event, 'updatelistAluminaiError<?= $chapter->Committe_id ?>');
                                                            }

                                                        </script>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">Close</button>
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

    showFormCheckbox.addEventListener('change', function () {
        if (this.checked) {
            myForm.style.display = "block";
            //msg.style.display="none";
        } else {
            myForm.style.display = "none";
            //msg.style.display="block";
        }
    });
</script>


<script src="<?php echo base_url('assets/js/Committee/Aluminiai_Association/5_4_1_view.js'); ?>"></script>

<?= $this->endSection(); ?>

