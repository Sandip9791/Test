<?= $this->extend('Layouts/committeeBase'); ?>
<?= $this->section("Content"); ?>
<h1 class="text-center">Pass percentage of Student (Excluding Backlog) (2.6.2) :</h1>

<div class="container-fluid" style="display:none" id="committees">
    <div id="form-container">
        <div class="container-fluid border border-primary border-2 my-3 mx-2">
            <form class="row g-3 my-3" method="post" action="<?= base_url('save_exam_2_6_2') ?>" enctype="multipart/form-data">

                <div class="col-md-4">
                    <label class="form-label">In which Academic Year you want to Store Data ? <label style="color: red;"><strong>*</strong></label></label>
                    <input type="text" class="form-control" name="AcademicYear" id="datepicker" placeholder="Enter Year" maxlength="4" autocomplete="off" required>
                    <span id="error-message" style="display:none;color:red;">Please enter a valid valid Year.</span>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Program Code : <label style="color: red;"><strong>*</strong></label></label>
                    <input id="programcode" type="text" class="form-control" name="Program_Code" autocomplete="off" oninput="validateProgramCode()" required>
                    <span id="programcodeError" style="display:none;color:red;">Please Enter a Valid Program Code.</span>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Program Name : <label style="color: red;"><strong>*</strong></label></label>
                    <input id="program_name" type="text" class="form-control" name="Program_Name" autocomplete="off" oninput="validateProgramName()" required>
                    <span id="programNameError" style="display:none;color:red;">Please Enter a Valid Program Name.</span>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Fresh Student appeared in Final Year : <label style="color: red;"><strong>* 0 to 500</strong></label></label>
                    <input id="numberrFreshStudAppeared" type="text" class="form-control" name="Fresh_Student_appeared" min="0" max="500" maxlength="3" autocomplete="off" required>
                    <span id = "numberrFreshStudAppearedError" style="display:none;color:red;">Please Enter a Valid Number.</span>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Passed in Final Year : <label style="color: red;"><strong>* 0 to 500</strong></label></label>
                    <input id="passedInFinal" type="text" class="form-control" name="Passed_in_Final" min="0" max="500" maxlength="3" autocomplete="off" required>
                    <span id="passedInFinalError" style="display:none;color:red;">Please Enter a Valid Number.</span>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Percentage(%) of Passing : <label style="color: red;"><strong>*</strong></label></label>
                    <input id="percentageofPassing" type="text" class="form-control" name="Percentage_of_Passing" readonly required>
                    <span id="percentageofPassingError" style="display:none;color:red;">Please Enter a Valid Percentage.</span>
                </div>

                <div class="col-md-12 mt-5">
                    <label class="form-label" style="color:red"><strong>Note : Please select PDF file under 2 MB.</strong></label>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Annual report of COE highligting passed % of Final year Student : <label style="color: red;"><strong>*</strong></label></label>
                    <input id="annualReport" type="file" class="form-control" name="Annual_report" autocomplete="off" accept=".pdf" oninput="validateAnnualReport(event)" required>
                    <span id="annualReportError" style="color:red;"></span>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Certified report from COE : <label style="color: red;"><strong>*</strong></label></label>
                    <input id="certifiedReport" type="file" class="form-control" name="Certified_report" autocomplete="off" accept=".pdf" oninput="validateCertifiedReport(event)" required>
                    <span id="certifiedReportError" style="color:red;"></span>
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
                <th scope="col">Program Code</th>
                <th scope="col">Program Name</th>
                <th scope="col">Fresh Student appeared in Final Year</th>
                <th scope="col">Passed in Final Year </th>
                <th scope="col">Percentage(%) of Passing</th>
                <th scope="col">Annual report of COE highligting passed % of Final year Student </th>
                <th scope="col">Certified report from COE</th>
                <th scope="col">Delete</th>
                <th scope="col">Update</th>
            </tr>
        </thead>

        <?php if (isset($documents)) :
            $row = 1;
            foreach ($documents as $doc) :
                $book =  $doc->Committee_2_6_2;
        ?>
                <tbody>
                    <?php
                    foreach ($book as $chapter) :
                    ?>
                        <tr>
                            <th class="form-control text-center" scope="row"><?= $row++ ?></th>
                            <td class="text-center"><?= $chapter->Program_Code ?> </td>
                            <td class="text-center"><?= $chapter->Program_Name ?> </td>
                            <td class="text-center"><?= $chapter->Fresh_Student_appeared ?> </td>
                            <td class="text-center"><?= $chapter->Passed_in_Final ?> </td>
                            <td class="text-center"><?= $chapter->Percentage_of_Passing ?> </td>

                            <td class="text-center">
                                <?php if (!empty($chapter->Annual_report)) : ?>
                                    <a href="<?= base_url('Userfiles/Committee/') . $chapter->Annual_report; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                                        <button class="btn btn-outline-success"> Download File </button>
                                    </a>
                                <?php else : ?>
                                    <b> Not Found...</b>
                                <?php endif; ?>
                            </td>

                            <td class="text-center">
                                <?php if (!empty($chapter->Certified_report)) : ?>
                                    <a href="<?= base_url('Userfiles/Committee/') . $chapter->Certified_report; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                                        <button class="btn btn-outline-success"> Download File </button>
                                    </a>
                                <?php else : ?>
                                    <b> Not Found...</b>
                                <?php endif; ?>
                            </td>

                            <td class="text-center">
                                <form action="<?= base_url('delete_exam_2_6_2') ?>" method="post">
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
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">2.6.2</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <form action="<?= base_url('update_exam_2_6_2') ?>" method="post" enctype="multipart/form-data">
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

                                                        <div class="md-4 my-3">
                                                            <label class="form-label">Program Code : <label style="color: red;">*</label></label>
                                                            <input id="updateprogramcode<?= $chapter->Committe_id ?>" type="text" class="form-control" name="Program_Code" value="<?= $chapter->Program_Code ?>" autocomplete="off" oninput="updatevalidateProgramCode<?= $chapter->Committe_id ?>()" required>
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

                                                        <div class="md-4 my-3">
                                                            <label class="form-label">Program Name : <label style="color: red;">*</label></label>
                                                            <input id="updateprogram_name<?= $chapter->Committe_id ?>" type="text" class="form-control" name="Program_Name" value="<?= $chapter->Program_Name ?>" autocomplete="off" oninput="updatevalidateProgramName<?= $chapter->Committe_id ?>()" required>
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
                                                                .getElementById("updateprogram_name<?= $chapter->Committe_id ?>")
                                                                .addEventListener("input", updatevalidateProgramName<?= $chapter->Committe_id ?>);
                                                        </script>

                                                        <div class="md-4 my-3">
                                                            <label class="form-label">Fresh Student appeared in Final Year : <label style="color: red;"><strong>* 0 to 500</strong></label></label>
                                                            <input id="updatenumberrFreshStudAppeared<?= $chapter->Committe_id ?>" type="text" class="form-control" name="Fresh_Student_appeared" value="<?= $chapter->Fresh_Student_appeared ?>" min="0" max="500" maxlength="3" autocomplete="off" required>
                                                            <span id="updatenumberrFreshStudAppearedError<?= $chapter->Committe_id ?>" style="display:none;color:red;">Please Enter a Valid Number.</span>
                                                        </div>
                                                        <script>
                                                             function updatevalidatefreshStudent<?= $chapter->Committe_id ?>(inputElement) {
                                                                var sanitizedValue = inputElement.value.replace(/\D/g, ''); // Remove non-numeric characters
                                                                inputElement.value = sanitizedValue; // Set sanitized value back into the input field
                                                            
                                                                var enteredValue = parseInt(sanitizedValue);
                                                                var minLimit = parseInt(inputElement.getAttribute("min"));
                                                                var maxLimit = parseInt(inputElement.getAttribute("max"));
                                                            
                                                                // Check if the entered value is within the specified limits
                                                                if (sanitizedValue.length === 0) {
                                                                    document.getElementById("updatenumberrFreshStudAppearedError<?= $chapter->Committe_id ?>").style.display = "none"; // Hide the error message
                                                                    inputElement.setCustomValidity(""); // Clear custom validity
                                                                } else if (isNaN(enteredValue) || enteredValue < minLimit || enteredValue > maxLimit) {
                                                                    document.getElementById("updatenumberrFreshStudAppearedError<?= $chapter->Committe_id ?>").style.display = "block";
                                                                    inputElement.setCustomValidity("Invalid value. Enter a number between " + minLimit + " and " + maxLimit + ".");
                                                                } else {
                                                                    document.getElementById("updatenumberrFreshStudAppearedError<?= $chapter->Committe_id ?>").style.display = "none";
                                                                    inputElement.setCustomValidity("");
                                                                }
                                                            }
                                                            
                                                            // Add an event listener to the input field
                                                            document.getElementById("updatenumberrFreshStudAppeared<?= $chapter->Committe_id ?>").addEventListener("input", function () {
                                                                updatevalidatefreshStudent<?= $chapter->Committe_id ?>(this);
                                                            });
                                                        </script>

                                                        <div class="md-4 my-3">
                                                            <label class="form-label">Passed in Final Year : <label style="color: red;"><strong>* 0 to 500</strong></label></label>
                                                            <input id="updatepassedInFinal<?= $chapter->Committe_id ?>" type="text" class="form-control" name="Passed_in_Final" value="<?= $chapter->Passed_in_Final ?>" min="0" max="500" maxlength="3" autocomplete="off" required>
                                                            <span id="updatepassedInFinalError<?= $chapter->Committe_id ?>" style="display:none;color:red;">Please Enter a Valid Number.</span>
                                                        </div>

                                                        <script>
                                                            function updatevalidatePassed<?= $chapter->Committe_id ?>(inputElement) {
                                                                var sanitizedValue = inputElement.value.replace(/\D/g, ''); // Remove non-numeric characters
                                                                inputElement.value = sanitizedValue; // Set sanitized value back into the input field

                                                                var enteredValue = parseInt(sanitizedValue);
                                                                var minLimit = parseInt(inputElement.getAttribute("min"));
                                                                var maxLimit = parseInt(inputElement.getAttribute("max"));

                                                                // Get the value of Fresh Student appeared in Final Year
                                                                var freshStudentValue = parseInt(document.getElementById("updatenumberrFreshStudAppeared<?= $chapter->Committe_id ?>").value);

                                                                // Check if the entered value is within the specified limits and not greater than Fresh Student value
                                                                if (sanitizedValue.length === 0) {
                                                                    document.getElementById("updatepassedInFinalError<?= $chapter->Committe_id ?>").style.display = "none"; // Hide the error message
                                                                    inputElement.setCustomValidity(""); // Clear custom validity
                                                                } else if (isNaN(enteredValue) || enteredValue < minLimit || enteredValue > maxLimit || enteredValue > freshStudentValue) {
                                                                    document.getElementById("updatepassedInFinalError<?= $chapter->Committe_id ?>").style.display = "block";
                                                                    inputElement.setCustomValidity("Invalid value. Enter a number between " + minLimit + " and " + Math.min(maxLimit, freshStudentValue) + ".");
                                                                } else {
                                                                    document.getElementById("updatepassedInFinalError<?= $chapter->Committe_id ?>").style.display = "none";
                                                                    inputElement.setCustomValidity("");
                                                                }

                                                                // Call updatePercentage function to recalculate the percentage
                                                                updateupdatePercentage<?= $chapter->Committe_id ?>();
                                                            }

                                                            // Add an event listener to the input field
                                                            document.getElementById("updatepassedInFinal<?= $chapter->Committe_id ?>").addEventListener("input", function () {
                                                                updatevalidatePassed<?= $chapter->Committe_id ?>(this);
                                                            });
                                                        </script>

                                                        <div class="md-4 my-3">
                                                            <label class="form-label">Percentage(%) of Passing : <label style="color: red;"><strong>*</strong></label></label>
                                                            <input id="updatepercentageofPassing<?= $chapter->Committe_id ?>" type="text" class="form-control" name="Percentage_of_Passing" value="<?= $chapter->Percentage_of_Passing ?>" readonly required>
                                                            <span id="updatepercentageofPassingError<?= $chapter->Committe_id ?>" style="display:none;color:red;">Please Enter a Valid Percentage.</span>
                                                        </div>

                                                        <script>
                                                            function updateupdatePercentage<?= $chapter->Committe_id ?>() {
                                                                // Get the error message element for Passed in Final Year
                                                                var passedErrorElement = document.getElementById("updatepassedInFinalError<?= $chapter->Committe_id ?>");

                                                                // Check if the error message is visible for Passed in Final Year
                                                                if (passedErrorElement.style.display === "block") {
                                                                    // If error message is visible, hide the percentage field and return
                                                                    document.getElementById("updatepercentageofPassing<?= $chapter->Committe_id ?>").value = '';
                                                                    return;
                                                                }

                                                                // If no error, calculate the percentage
                                                                var freshStudentValue = parseInt(document.getElementById("updatenumberrFreshStudAppeared<?= $chapter->Committe_id ?>").value);
                                                                var passedValue = parseInt(document.getElementById("updatepassedInFinal<?= $chapter->Committe_id ?>").value);

                                                                // Calculate percentage
                                                                var percentage = (passedValue / freshStudentValue) * 100;

                                                                // Check if the calculation is valid
                                                                if (!isNaN(percentage) && isFinite(percentage)) {
                                                                    document.getElementById("updatepercentageofPassing<?= $chapter->Committe_id ?>").value = percentage.toFixed(2); // Display percentage with 2 decimal places
                                                                } else {
                                                                    document.getElementById("updatepercentageofPassing<?= $chapter->Committe_id ?>").value = ''; // Clear the field if calculation is not valid
                                                                }
                                                            }

                                                            // Add event listeners to both input fields
                                                            document.getElementById("updatenumberrFreshStudAppeared<?= $chapter->Committe_id ?>").addEventListener("input", updateupdatePercentage<?= $chapter->Committe_id ?>);
                                                            document.getElementById("updatepassedInFinal<?= $chapter->Committe_id ?>").addEventListener("input", updateupdatePercentage<?= $chapter->Committe_id ?>);
                                                        </script>

                                                        <div class="md-4 mb-3 mt-5">
                                                            <label class="form-label" style="color:red"><strong>Note : Please select PDF file under 2 MB.</strong></label>
                                                        </div>

                                                        <div class="md-4 my-3">
                                                            <label class="form-label">Annual report of COE highligting passed % of Final year Student : </label>
                                                            <input id="updateannualReport<?= $chapter->Committe_id ?>" type="file" class="form-control" name="Annual_report" accept=".pdf" oninput="updatevalidateAnnualReport<?= $chapter->Committe_id ?>(event)">
                                                            <span id="updateannualReportError<?= $chapter->Committe_id ?>" style="color:red;"></span>
                                                        </div>

                                                        <div class="md-4 my-3">
                                                            <label class="form-label">Certified report from COE : </label>
                                                            <input id="updatecertifiedReport<?= $chapter->Committe_id ?>" type="file" class="form-control" name="Certified_report" accept=".pdf" oninput="updatevalidateCertifiedReport<?= $chapter->Committe_id ?>(event)">
                                                            <span id="updatecertifiedReportError<?= $chapter->Committe_id ?>" style="color:red;"></span>
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
                                                            
                                                            function updatevalidateAnnualReport<?= $chapter->Committe_id ?>(event) {
                                                                updatevalidateDoc<?= $chapter->Committe_id ?>(event, "updateannualReportError<?= $chapter->Committe_id ?>");
                                                            }

                                                            function updatevalidateCertifiedReport<?= $chapter->Committe_id ?>(event) {
                                                                updatevalidateDoc<?= $chapter->Committe_id ?>(event, "updatecertifiedReportError<?= $chapter->Committe_id ?>");
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

<script src="<?php echo base_url('assets/js/Committee/Exam/exam_2_6_2.js'); ?>"></script>

<?= $this->endSection(); ?>