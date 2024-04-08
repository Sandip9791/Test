<?= $this->extend('Layouts/committeeBase'); ?>
<?= $this->section("Content"); ?>

<h1 class="text-center">Student complaints/grievances about evaluation (2.5.2)</h1>

<div class="container-fluid" style="display:none" id="committees">
    <div id="form-container">
        <div class="container-fluid border border-primary border-2 my-3 mx-2">
            <form class="row g-3 my-3" method="post" action="<?= base_url('save_exam_2_5_2') ?>" enctype="multipart/form-data">

                <div class="col-md-6">
                    <label class="form-label">In which Academic Year you want to Store Data ? <label style="color: red;"><strong>*</strong></label></label>
                    <input type="text" class="form-control" name="AcademicYear" id="datepicker" placeholder="Enter Year" maxlength="4" autocomplete="off" required>
                    <span id="error-message" style="display:none;color:red;">Please enter a valid valid Year.</span>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Number of complaints about Evaluation : <label style="color: red;"><strong>* 0 to 500</strong></label></label>
                    <input id="numberofComplaints" type="text" class="form-control" name="Number_of_complaints" min="0" max="500" maxlength="3" autocomplete="off" required>
                    <span id = "numberofComplaintsError" style="display:none;color:red;">Please Enter a Valid Number Of Complaints about Evaluation.</span>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Number of Students appeared in examination : <label style="color: red;"><strong>* 0 to 900</strong></label></label>
                    <input id="numberofStudents" type="text" class="form-control" name="Number_of_Students" min="0" max="900" maxlength="3" autocomplete="off" required>
                    <span id = "numberofStudentsError" style="display:none;color:red;">Please Enter a Valid Number Of Students appeared in examination.</span>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Minutes of Grievance cell certified by Principal/COE : <label style="color: red;"><strong>* Select PDF file under 2 MB.</strong></label></label>
                    <input id="minutesofGrievance" type="file" class="form-control" name="Minutes_of_Grievance" accept=".pdf" autocomplete="off" accept=".pdf" oninput="validateminutesofGrievance(event)" required>
                    <span id="minutesofGrievanceError" style="color:red;"></span>
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
                <th scope="col">Number of complaints about Evaluation</th>
                <th scope="col">Number of Students appeared in examination</th>
                <th scope="col">Minutes of Grievance cell certified by Principal/COE</th>
                <th scope="col">Delete</th>
                <th scope="col">Update</th>
            </tr>
        </thead>

        <?php if (isset($documents)) :
            $row = 1;
            foreach ($documents as $doc) :
                $book =  $doc->Committee_2_5_2;
        ?>
                <tbody>
                    <?php
                    foreach ($book as $chapter) :
                    ?>
                        <tr>
                            <th class="form-control text-center" scope="row"><?= $row++ ?></th>
                            <td class="text-center"><?= $chapter->Number_of_complaints ?> </td>
                            <td class="text-center"><?= $chapter->Number_of_Students ?> </td>

                            <td class="text-center">
                                <?php if (!empty($chapter->Minutes_of_Grievance)) : ?>
                                    <a href="<?= base_url('Userfiles/Committee/') . $chapter->Minutes_of_Grievance; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                                        <button class="btn btn-outline-success"> Download File </button>
                                    </a>
                                <?php else : ?>
                                    <b> Not Found...</b>
                                <?php endif; ?>
                            </td>

                            <td class="text-center">
                                <form action="<?= base_url('delete_exam_2_5_2') ?>" method="post">
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
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">2.5.2</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <form action="<?= base_url('update_exam_2_5_2') ?>" method="post" enctype="multipart/form-data">
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

                                                        <div class="md-6 my-3">
                                                            <label class="form-label">Number of complaints about Evaluation : <label style="color: red;"><strong>* 0 to 500</strong></label></label>
                                                            <input id="updatenumberofComplaints<?= $chapter->Committe_id ?>" type="text" class="form-control" name="Number_of_complaints" value="<?= $chapter->Number_of_complaints ?>" min="0" max="500" maxlength="3" autocomplete="off" required>
                                                            <span id = "updatenumberofComplaintsError<?= $chapter->Committe_id ?>" style="display:none;color:red;">Please Enter Valid Number of Complaints about Evaluation.</span>
                                                        </div>
                                                        <script>
                                                              function updatevalidatenumberEvaluation<?= $chapter->Committe_id ?>(inputElement) {
                                                                var sanitizedValue = inputElement.value.replace(/\D/g, ''); // Remove non-numeric characters
                                                                inputElement.value = sanitizedValue; // Set sanitized value back into the input field
                                                            
                                                                var enteredValue = parseInt(sanitizedValue);
                                                                var minLimit = parseInt(inputElement.getAttribute("min"));
                                                                var maxLimit = parseInt(inputElement.getAttribute("max"));
                                                            
                                                                // Check if the entered value is within the specified limits
                                                                if (sanitizedValue.length === 0) {
                                                                    document.getElementById("updatenumberofComplaintsError<?= $chapter->Committe_id ?>").style.display = "none"; // Hide the error message
                                                                    inputElement.setCustomValidity(""); // Clear custom validity
                                                                } else if (isNaN(enteredValue) || enteredValue < minLimit || enteredValue > maxLimit) {
                                                                    document.getElementById("updatenumberofComplaintsError<?= $chapter->Committe_id ?>").style.display = "block";
                                                                    inputElement.setCustomValidity("Invalid value. Enter a number between " + minLimit + " and " + maxLimit + ".");
                                                                } else {
                                                                    document.getElementById("updatenumberofComplaintsError<?= $chapter->Committe_id ?>").style.display = "none";
                                                                    inputElement.setCustomValidity("");
                                                                }
                                                            }
                                                            
                                                            // Add an event listener to the input field
                                                            document.getElementById("updatenumberofComplaints<?= $chapter->Committe_id ?>").addEventListener("input", function () {
                                                                updatevalidatenumberEvaluation<?= $chapter->Committe_id ?>(this);
                                                            });
                                                        </script>

                                                        <div class="md-6 my-3">
                                                            <label class="form-label">Number of Students appeared in examination : <label style="color: red;"><strong>* 0 to 900</strong></label></label>
                                                            <input id="updatenumberofStudents<?= $chapter->Committe_id ?>" type="text" class="form-control" name="Number_of_Students" value="<?= $chapter->Number_of_Students ?>" min="0" max="900" maxlength="3" autocomplete="off" required>
                                                            <span id = "updatenumberofStudentsError<?= $chapter->Committe_id ?>" style="display:none;color:red;">Please Enter Valid Number of Students appeared in examination.</span>
                                                        </div>
                                                        <script>
                                                            function updatevalidatenumberexamination<?= $chapter->Committe_id ?>(inputElement) {
                                                                var sanitizedValue = inputElement.value.replace(/\D/g, ''); // Remove non-numeric characters
                                                                inputElement.value = sanitizedValue; // Set sanitized value back into the input field
                                                            
                                                                var enteredValue = parseInt(sanitizedValue);
                                                                var minLimit = parseInt(inputElement.getAttribute("min"));
                                                                var maxLimit = parseInt(inputElement.getAttribute("max"));
                                                            
                                                                // Check if the entered value is within the specified limits
                                                                if (sanitizedValue.length === 0) {
                                                                    document.getElementById("updatenumberofStudentsError<?= $chapter->Committe_id ?>").style.display = "none"; // Hide the error message
                                                                    inputElement.setCustomValidity(""); // Clear custom validity
                                                                } else if (isNaN(enteredValue) || enteredValue < minLimit || enteredValue > maxLimit) {
                                                                    document.getElementById("updatenumberofStudentsError<?= $chapter->Committe_id ?>").style.display = "block";
                                                                    inputElement.setCustomValidity("Invalid value. Enter a number between " + minLimit + " and " + maxLimit + ".");
                                                                } else {
                                                                    document.getElementById("updatenumberofStudentsError<?= $chapter->Committe_id ?>").style.display = "none";
                                                                    inputElement.setCustomValidity("");
                                                                }
                                                            }
                                                            
                                                            // Add an event listener to the input field
                                                            document.getElementById("updatenumberofStudents<?= $chapter->Committe_id ?>").addEventListener("input", function () {
                                                                updatevalidatenumberexamination<?= $chapter->Committe_id ?>(this);
                                                            });

                                                        </script>

                                                        <div class="md-4 mt-5">
                                                            <label class="form-label" style="color:red"><strong>Please select PDF file under 2 MB.</strong></label>
                                                        </div>

                                                        <div class="md-6 my-3">
                                                            <label class="form-label">Minutes of Grievance cell certified by Principal/COE : </label>
                                                            <input id="updateminutesofGrievance<?= $chapter->Committe_id ?>" type="file" class="form-control" name="Minutes_of_Grievance" autocomplete="off" accept=".pdf" oninput="updatevalidateminutesofGrievance<?= $chapter->Committe_id ?>(event)">
                                                            <span id="updateminutesofGrievanceError<?= $chapter->Committe_id ?>" style="color:red;"></span>
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
                                                            
                                                            function updatevalidateminutesofGrievance<?= $chapter->Committe_id ?>(event) {
                                                                updatevalidateDoc<?= $chapter->Committe_id ?>(event, "updateminutesofGrievanceError<?= $chapter->Committe_id ?>");
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

<script src="<?php echo base_url('assets/js/Committee/Exam/exam_2_5_2.js'); ?>"></script>

<?= $this->endSection(); ?>