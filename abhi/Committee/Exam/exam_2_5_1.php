<?= $this->extend('Layouts/committeeBase'); ?>
<?= $this->section("Content"); ?>
<h1 class="ms-3">Average number of days from the date of last semester-end/ year- end examination till the last date of declaration of results (2.5.1) :</h1>

<div class="container-fluid" style="display:none" id="committees">
    <div id="form-container">
        <div class="container-fluid border border-primary border-2 my-3 mx-2">

            <form class="row g-3 my-3" method="post" action="<?= base_url('save_exam_2_5_1') ?>" enctype="multipart/form-data">
             
                <div class="col-md-4 mb-3">
                    <label class="form-label">In which Academic Year you want to Store Data ? <label style="color: red;"><strong>*</strong></label></label>
                    <input type="text" class="form-control" name="AcademicYear" id="datepicker" placeholder="Enter Year" maxlength="4" autocomplete="off" required>
                    <span id="error-message" style="display:none;color:red;">Please enter a valid valid Year.</span>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Semester : <label style="color: red;"><strong>*</strong></label></label>
                    <input id="semester" type="text" class="form-control" name="semester" autocomplete="off" oninput="validateSemester()" required>
                    <span id="semesterError" style="display:none;color:red;">Please Enter a Valid Semester.</span>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Program Name : <label style="color: red;"><strong>*</strong></label></label>
                    <input id="program_name" type="text" class="form-control" name="program_name" autocomplete="off" oninput="validateProgramName()" required>
                    <span id="programNameError" style="display:none;color:red;">Please Enter a Valid Program Name.</span>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Program Code : <label style="color: red;"><strong>*</strong></label></label>
                    <input id="programcode" type="text" class="form-control" name="program_code" autocomplete="off" oninput="validateProgramCode()" required>
                    <span id="programcodeError" style="display:none;color:red;">Please Enter a Valid Program Code.</span>
                </div>

                <div class="col-md-4">
                    <label  class="form-label">Last Date of the semester end : <label style="color: red;"><strong>*</strong></label></label>
                    <input type="date" class="form-control" id="datepicker2" name="last_date_sem_end" autocomplete="off" min="2019-01-01" required>
                </div>

                <div class="col-md-4">
                    <label  class="form-label">Date of declaration of result : <label style="color: red;"><strong>*</strong></label></label>
                    <input type="date" class="form-control" id="datepicker3" name="date_of_dec" autocomplete="off" min="2019-01-01" required>
                </div>

                <div class="col-md-12 mt-5">
                    <label class="form-label" style="color:red"><strong>Note : Please select PDF file under 2 MB.</strong></label>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Examination Time Table : </label>
                    <input id="examinationtt" type="file" class="form-control" name="examination_tt" autocomplete="off" accept=".pdf" oninput="validateExaminationtt(event)" required>
                    <span id="examinationttError" style="color:red;"></span>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Result-Sheet : </label>
                    <input id="resultsheet" type="file" class="form-control" name="result_sheet" autocomplete="off" accept=".pdf" oninput="validateResultSheet(event)" required>
                    <span id="resultsheetError" style="color:red;"></span>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Policy document on declaration of result : </label>
                    <input id="policydocument" type="file" class="form-control" name="policy_document" autocomplete="off" accept=".pdf" oninput="validatePolicyDoc(event)" required>
                    <span id="policydocumentError" style="color:red;"></span>
                </div>

                <div class="col-md-12">
                    <label class="form-label">Report from COE mentioning name of program, end date of examination and date of annoucement of result along with number of days elapsed, for all programs : </label>
                    <input id="reportfromCOE" type="file" class="form-control" name="report_from_COE" autocomplete="off" accept=".pdf" oninput="validateReportfromCOE(event)" required>
                    <span id="reportfromCOEError" style="color:red;"></span>
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
                <th scope="col">Semester</th>
                <th scope="col">Program Name</th>
                <th scope="col">Program Code</th>
                <th scope="col">Last Date of the semester end</th>
                <th scope="col">Date of declaration of result</th>
                <th scope="col">Examination Time Table</th>
                <th scope="col">Result-Sheet</th>
                <th scope="col">Policy document on declaration of result</th>
                <th scope="col">Report from COE mentioning name of program, end date of examination and date of annoucement of result along with number of days elapsed, for all programs</th>
                <th scope="col">Delete</th>
                <th scope="col">Update</th>
            </tr>
        </thead>

        <?php if (isset($documents)) :
            $row = 1;
            foreach ($documents as $doc) :
                $book =  $doc->Committee_2_5_1;
        ?>
                <tbody>
                    <?php
                    foreach ($book as $chapter) :
                    ?>
                        <tr>
                            <th class="form-control text-center" scope="row"><?= $row++ ?></th>
                            <td class="text-center"><?= $chapter->semester ?> </td>
                            <td class="text-center"><?= $chapter->program_name ?> </td>
                            <td class="text-center"><?= $chapter->program_code ?> </td>
                            <td class="text-center"><?= $chapter->last_date_sem_end ?> </td>
                            <td class="text-center"><?= $chapter->date_of_dec ?> </td>

                            <td class="text-center">
                                <?php if (!empty($chapter->Examination_time_table)) : ?>
                                    <a href="<?= base_url('Userfiles/Committee/') . $chapter->Examination_time_table; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                                        <button class="btn btn-outline-success"> Download File </button>
                                    </a>
                                <?php else : ?>
                                    <b> Not Found...</b>
                                <?php endif; ?>
                            </td>

                            <td class="text-center">
                                <?php if (!empty($chapter->result_sheet)) : ?>
                                    <a href="<?= base_url('Userfiles/Committee/') . $chapter->result_sheet; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                                        <button class="btn btn-outline-success"> Download File </button>
                                    </a>
                                <?php else : ?>
                                    <b> Not Found...</b>
                                <?php endif; ?>
                            </td>

                            <td class="text-center">
                                <?php if (!empty($chapter->policy_document)) : ?>
                                    <a href="<?= base_url('Userfiles/Committee/') . $chapter->policy_document; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                                        <button class="btn btn-outline-success"> Download File </button>
                                    </a>
                                <?php else : ?>
                                    <b> Not Found...</b>
                                <?php endif; ?>
                            </td>

                            <td class="text-center">
                                <?php if (!empty($chapter->report_from_COE)) : ?>
                                    <a href="<?= base_url('Userfiles/Committee/') . $chapter->report_from_COE; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                                        <button class="btn btn-outline-success"> Download File </button>
                                    </a>
                                <?php else : ?>
                                    <b> Not Found...</b>
                                <?php endif; ?>
                            </td>

                            <td class="text-center">
                                <form action="<?= base_url('delete_exam_2_5_1') ?>" method="post">
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
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">2.5.1</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <form action="<?= base_url('update_exam_2_5_1') ?>" method="post" enctype="multipart/form-data">
                                                    <div class="row">

                                                        <div class="md-4" style="display:none;">
                                                            <label class="form-label">IQAC id <label style="color: red;">* </label></label>
                                                            <input type="text" class="form-control" name="srnumber" readonly value="<?= $chapter->Committe_id ?>"></th>
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

                                                        <div class="md-4 mb-3">
                                                            <label class="form-label">Semester : <label style="color: red;"><strong>*</strong></label></label>
                                                            <input id="updatesemester<?= $chapter->Committe_id ?>" type="text" class="form-control" name="semester" value="<?= $chapter->semester ?>" autocomplete="off" oninput="updatevalidateSemester<?= $chapter->Committe_id ?>()" required>
                                                            <span id="updatesemesterError<?= $chapter->Committe_id ?>" style="display:none;color:red;">Please Enter a Valid Semester.</span>
                                                        </div>
                                                        <script>
                                                            function updatevalidateSemester<?= $chapter->Committe_id ?>() {
                                                            var regName = /^[A-Z -]+$/;
                                                            var name = document.getElementById("updatesemester<?= $chapter->Committe_id ?>").value.toUpperCase();
                                                            var error = document.getElementById("updatesemesterError<?= $chapter->Committe_id ?>");

                                                            var sanitizedName = name.replace(/[^A-Z -]/g, "");

                                                            var words = sanitizedName.split(" ");
                                                            var capitalizedWords = words.map(function (word) {
                                                                return word.charAt(0).toUpperCase() + word.slice(1);
                                                            });

                                                            var finalSemester = capitalizedWords.join(" ");
                                                            document.getElementById("updatesemester<?= $chapter->Committe_id ?>").value = finalSemester;

                                                            if (finalSemester.length === 0 || regName.test(finalSemester)) {
                                                                error.style.display = "none";
                                                            } else {
                                                                error.style.display = "block";
                                                            }
                                                            }

                                                            document.getElementById("updatesemester<?= $chapter->Committe_id ?>").addEventListener("input", updatevalidateSemester<?= $chapter->Committe_id ?>);
                                                        </script>

                                                        <div class="md-4 mb-3">
                                                            <label class="form-label">Program Name : <label style="color: red;"><strong>*</strong></label></label>
                                                            <input id="updateprogram_name<?= $chapter->Committe_id ?>" type="text" class="form-control" name="program_name" value="<?= $chapter->program_name ?>" autocomplete="off" oninput="updatevalidateProgramName<?= $chapter->Committe_id ?>()" required>
                                                            <span id="updateprogramNameError<?= $chapter->Committe_id ?>" style="display:none;color:red;">Please Enter a Valid Program Name.</span>
                                                        </div>
                                                        <script>
                                                            function updatevalidateProgramName<?= $chapter->Committe_id ?>() {
                                                                var regName = /^[a-zA-Z0-9 ]+$/;
                                                                var name = document.getElementById("updateprogram_name<?= $chapter->Committe_id ?>").value;
                                                                var error = document.getElementById("updateprogramNameError<?= $chapter->Committe_id ?>");

                                                                var sanitizedName = name.replace(/[^a-zA-Z0-9 ]/g, "");

                                                                var words = sanitizedName.split(" ");
                                                                var capitalizedWords = words.map(function (word) {
                                                                    return word.charAt(0).toUpperCase() + word.slice(1);
                                                                });

                                                                var finalprogram_name = capitalizedWords.join(" ");
                                                                document.getElementById("updateprogram_name<?= $chapter->Committe_id ?>").value = finalprogram_name;

                                                                if (finalprogram_name.length === 0 || regName.test(finalprogram_name)) {
                                                                    error.style.display = "none";
                                                                } else {
                                                                    error.style.display = "block";
                                                                }
                                                                }

                                                                document
                                                                .getElementById("updateprogram_name<?= $chapter->Committe_id ?>").addEventListener("input", updatevalidateProgramName<?= $chapter->Committe_id ?>);
                                                        </script>

                                                        <div class="md-4 mb-3">
                                                            <label class="form-label">Program Code : <label style="color: red;"><strong>*</strong></label></label>
                                                            <input id="updateprogramcode<?= $chapter->Committe_id ?>" type="text" class="form-control" name="program_code" value="<?= $chapter->program_code ?>" autocomplete="off" oninput="updatevalidateProgramCode<?= $chapter->Committe_id ?>()" required>
                                                            <span id="updateprogramcodeError<?= $chapter->Committe_id ?>" style="display:none;color:red;">Please Enter a Valid Program Code.</span>
                                                        </div>
                                                        <script>
                                                            function updatevalidateProgramCode<?= $chapter->Committe_id ?>() {
                                                                var regName = /^[A-Z0-9() -]+$/;
                                                                var name = document.getElementById("updateprogramcode<?= $chapter->Committe_id ?>").value.toUpperCase();
                                                                var error = document.getElementById("updateprogramcodeError<?= $chapter->Committe_id ?>");

                                                                var sanitizedName = name.replace(/[^A-Z0-9() -]/g, "");

                                                                var words = sanitizedName.split(" ");
                                                                var capitalizedWords = words.map(function (word) {
                                                                    return word.charAt(0).toUpperCase() + word.slice(1);
                                                                });

                                                                var finalprogramcode = capitalizedWords.join(" ");
                                                                document.getElementById("updateprogramcode<?= $chapter->Committe_id ?>").value = finalprogramcode;

                                                                if (finalprogramcode.length === 0 || regName.test(finalprogramcode)) {
                                                                    error.style.display = "none";
                                                                } else {
                                                                    error.style.display = "block";
                                                                }
                                                                }

                                                                document
                                                                .getElementById("updateprogramcode<?= $chapter->Committe_id ?>")
                                                                .addEventListener("input", updatevalidateProgramCode<?= $chapter->Committe_id ?>);
                                                        </script>

                                                        <div class="md-4 mb-3">
                                                            <label  class="form-label">Last Date of the semester end : <label style="color: red;"><strong>*</strong></label></label>
                                                            <input type="date" class="form-control" id="updatedatepicker2<?= $chapter->Committe_id ?>" name="last_date_sem_end" value="<?= $chapter->last_date_sem_end ?>" autocomplete="off" required>
                                                        </div>
                                                        <script>
                                                            function updatedatepicker2Validation<?= $chapter->Committe_id ?>() {
                                                                const dobDateInput = document.getElementById("updatedatepicker2<?= $chapter->Committe_id ?>");

                                                                const minDate = new Date("2019-01-01");

                                                                function setMaxDate() {
                                                                    const today = new Date();
                                                                    const maxDate = today.toISOString().split("T")[0]; // Format as "YYYY-MM-DD"
                                                                    dobDateInput.max = maxDate;
                                                                }

                                                                setMaxDate();

                                                                dobDateInput.addEventListener("input", setMaxDate);

                                                                function updatevalidateRegDate<?= $chapter->Committe_id ?>() {
                                                                    const selectedDate = new Date(dobDateInput.value);
                                                                    if (selectedDate < minDate) {
                                                                    alert("Please select a date on or after 2019-01-01.");
                                                                    return false;
                                                                    }
                                                                    return true;
                                                                }

                                                                const form = document.querySelector("form<?= $chapter->Committe_id ?>");
                                                                form.addEventListener("submit", updatevalidateRegDate<?= $chapter->Committe_id ?>);
                                                                }

                                                                updatedatepicker2Validation<?= $chapter->Committe_id ?>();

                                                        </script>

                                                        <div class="md-4 mb-3">
                                                            <label  class="form-label">Date of declaration of result : <label style="color: red;"><strong>*</strong></label></label>
                                                            <input type="date" class="form-control" id="updatedatepicker3<?= $chapter->Committe_id ?>" name="date_of_dec" value="<?= $chapter->date_of_dec ?>" autocomplete="off" required>
                                                        </div>
                                                        <script>
                                                            function updatedatepicker3Validation<?= $chapter->Committe_id ?>() {
                                                                const dobDateInput = document.getElementById("updatedatepicker3<?= $chapter->Committe_id ?>");

                                                                const minDate = new Date("2019-01-01");

                                                                function setMaxDate() {
                                                                    const today = new Date();
                                                                    const maxDate = today.toISOString().split("T")[0]; // Format as "YYYY-MM-DD"
                                                                    dobDateInput.max = maxDate;
                                                                }

                                                                setMaxDate();

                                                                dobDateInput.addEventListener("input", setMaxDate);

                                                                function updatevalidateRegDate<?= $chapter->Committe_id ?>() {
                                                                    const selectedDate = new Date(dobDateInput.value);
                                                                    if (selectedDate < minDate) {
                                                                    alert("Please select a date on or after 2019-01-01.");
                                                                    return false;
                                                                    }
                                                                    return true;
                                                                }

                                                                const form = document.querySelector("form<?= $chapter->Committe_id ?>");
                                                                form.addEventListener("submit", updatevalidateRegDate<?= $chapter->Committe_id ?>);
                                                                }

                                                                updatedatepicker3Validation<?= $chapter->Committe_id ?>();
                                                        </script>

                                                        <div class="md-4 mb-3">
                                                            <label class="form-label">Examination Time Table : </label>
                                                            <input id="updateexaminationtt<?= $chapter->Committe_id ?>" type="file" class="form-control" name="examination_tt" autocomplete="off" accept=".pdf" oninput="updatevalidateExaminationtt<?= $chapter->Committe_id ?>(event)">
                                                            <span id="updateexaminationttError<?= $chapter->Committe_id ?>" style="color:red;"></span>
                                                        </div>

                                                        <div class="md-4 mb-3 mt-5">
                                                            <label class="form-label" style="color:red"><strong>Note : Please select PDF file under 2 MB.</strong></label>
                                                        </div>

                                                        <div class="md-4 mb-3">
                                                            <label class="form-label">Result-Sheet : </label>
                                                            <input id="updateresultsheet<?= $chapter->Committe_id ?>" type="file" class="form-control" name="result_sheet" autocomplete="off" accept=".pdf" oninput="updatevalidateResultSheet<?= $chapter->Committe_id ?>(event)">
                                                            <span id="updateresultsheetError<?= $chapter->Committe_id ?>" style="color:red;"></span>
                                                        </div>

                                                        <div class="md-4 mb-3">
                                                            <label class="form-label">Policy document on declaration of result : </label>
                                                            <input id="updatepolicydocument<?= $chapter->Committe_id ?>" type="file" class="form-control" name="policy_document" autocomplete="off" accept=".pdf" oninput="updatevalidatePolicyDoc<?= $chapter->Committe_id ?>(event)">
                                                            <span id="updatepolicydocumentError<?= $chapter->Committe_id ?>" style="color:red;"></span>
                                                        </div>

                                                        <div class="md-4 mb-3">
                                                            <label class="form-label">Report from COE mentioning name of program, end date of examination and date of annoucement of result along with number of days elapsed, for all programs : </label>
                                                            <input id="updatereportfromCOE<?= $chapter->Committe_id ?>" type="file" class="form-control" name="report_from_COE" autocomplete="off" accept=".pdf" oninput="updatevalidateReportfromCOE<?= $chapter->Committe_id ?>(event)">
                                                            <span id="updatereportfromCOEError<?= $chapter->Committe_id ?>" style="color:red;"></span>
                                                        </div>

                                                        <script>
                                                            function updatevalidateDoc<?= $chapter->Committe_id ?>(event, errorElementId) {
                                                                const file = event.target.files[0];
                                                                const errorElement = document.getElementById(errorElementId);

                                                                const maxFileSizeInBytes = 2 * 1024 * 1024; // 2 MB

                                                                if (!file.type.match("application/pdf")) {
                                                                    errorElement.textContent = "File is not a PDF.";
                                                                    event.target.value = ""; // Clear the file input
                                                                    return;
                                                                }

                                                                if (file.size > maxFileSizeInBytes) {
                                                                    errorElement.textContent = "File is too big. Maximum size is 2 MB.";
                                                                    event.target.value = ""; // Clear the file input
                                                                    return;
                                                                }

                                                                // If the file is valid, clear the error message
                                                                errorElement.textContent = "";
                                                                }

                                                                function updatevalidateExaminationtt<?= $chapter->Committe_id ?>(event) {
                                                                    updatevalidateDoc<?= $chapter->Committe_id ?>(event, "updateexaminationttError<?= $chapter->Committe_id ?>");
                                                                }

                                                                function updatevalidateResultSheet<?= $chapter->Committe_id ?>(event) {
                                                                    updatevalidateDoc<?= $chapter->Committe_id ?>(event, "updateresultsheetError<?= $chapter->Committe_id ?>");
                                                                }

                                                                function updatevalidatePolicyDoc<?= $chapter->Committe_id ?>(event) {
                                                                    updatevalidateDoc<?= $chapter->Committe_id ?>(event, "updatepolicydocumentError<?= $chapter->Committe_id ?>");
                                                                }

                                                                function updatevalidateReportfromCOE<?= $chapter->Committe_id ?>(event) {
                                                                    updatevalidateDoc<?= $chapter->Committe_id ?>(event, "updatereportfromCOEError<?= $chapter->Committe_id ?>");
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

<script src="<?php echo base_url('assets/js/Committee/Exam/exam_2_5_1.js'); ?>"></script>

<?= $this->endSection(); ?>

