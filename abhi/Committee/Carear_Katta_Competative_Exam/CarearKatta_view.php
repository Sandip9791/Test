<?= $this->extend('Layouts/committeeBase'); ?>
<?= $this->section("Content"); ?>

<h2 class="text-center my-3">Anubhuti/Career Katta/Competitive Exam Cell/Vidyarthi Manch/Swar Madhuri/Yuva Saptah</h2>
<div class="container-fluid" style="display:none" id="committees">
    <div id="form-container">
        <div class="container-fluid border border-primary border-2 my-3 mx-2">

            <form class="row g-3 my-3 mx-2" method="post" action="<?= base_url('save_careerkatta') ?>" enctype="multipart/form-data">

                <div class="col-md-4 mb-3">
                    <label class="form-label">In which Academic Year you want to Store Data ? <label style="color: red;"><strong>*</strong></label></label>
                    <input type="text" class="form-control" name="AcademicYear" id="datepicker" placeholder="Enter Year" maxlength="4" autocomplete="off" required>
                    <span id="error-message" style="display:none;color:red;">Please enter a valid valid Year.</span>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Event Date From : <label style="color: red;"><strong>*</strong></label></label>
                    <input type="date" class="form-control" id="fromdate" name="fromEvent" autocomplete="off" placeholder="dd-mm-yyyy" min="2019-01-01" onchange="enableToDate()" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Event Date To : <label style="color: red;"><strong>*</strong></label></label>
                    <input type="date" class="form-control" id="todate" name="toEvent" placeholder="dd-mm-yyyy" autocomplete="off" disabled required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Schedule/Notice : <label style="color: red;"><strong>* Select .pdf file under 2 MB.</strong></label></label>
                    <input id="notice" type="file" name="notice" class="form-control" autocomplete="off" accept=".pdf" oninput="validateNotice(event)" required>
                    <span id="NoticeError" style="color:red;"></span>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Number Of Participants : <label style="color: red;"><strong>*</strong></label></label>
                    <input id="numberParticipants" type="text" class="form-control" name="numberParticipants" min="1" max="500" maxlength="3" autocomplete="off" required>
                    <span id = "numberParticipantsError" style="display:none;color:red;">Please Enter a Valid Number Of Participants between 1 to 500.</span>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Report Of Evevnt : <label style="color: red;"><strong>* Select .pdf file under 2 MB.</strong></label></label>
                    <input id="reportEvent" type="file" class="form-control" name="reportEvent" autocomplete="off" accept=".pdf" oninput="validateReportEvent(event)" required>
                    <span id="reportEventError" style="color:red;"></span>
                </div>

                <div class="col-md-6">
                    <label class="form-label"> Geotag Photos : <label style="color: red;"><strong>*</strong></label></label>
                    <div class="my-2">
                        <input id="GeoP" type="file" class="form-control" name="geotag1" autocomplete="off" accept=".jpg,.jpeg,.png" oninput="validateGeoTagPhoto(event)" required>
                        <span id="GeoPError" style="color: red;"></span>
                    </div>
                    <div class="my-2">
                        <input id="GeoP1" type="file" class="form-control" name="geotag2" autocomplete="off" accept=".jpg,.jpeg,.png" oninput="validateGeoTagPhoto1(event)" required>
                        <span id="GeoP1Error" style="color: red;"></span>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <label class="form-label"> Non Geotag Photos : <label style="color: red;"><strong></strong></label></label>
                    <div class="my-2">
                        <input id="currentphoto" type="file" class="form-control" name="nonGeotag1" autocomplete="off" accept=".jpg,.jpeg,.png" oninput="validateCurrentPhoto(event)">
                        <span id="currentphotoError" style="color:red;"></span>
                    </div>
                    <div class="my-2">
                        <input id="currentphoto1" type="file" class="form-control" name="nonGeotag2" autocomplete="off" accept=".jpg,.jpeg,.png" oninput="validateCurrentPhoto1(event)">
                        <span id="currentphoto1Error" style="color:red;"></span>
                    </div>
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
                <th scope="col">Event Date From</th>
                <th scope="col">Event Date To</th>
                <th scope="col">Schedule/Notice</th>
                <th scope="col">Number Of Participants</th>
                <th scope="col">Report Of Evevnt</th>
                <th scope="col" colspan="2">Geotag Photos</th>
                <th scope="col" colspan="2">Non Geotag Photos</th>
                <th scope="col">Delete</th>
                <th scope="col">Update</th>
            </tr>
        </thead>

        <?php if (isset($documents)) :
            $row = 1;
            foreach ($documents as $doc) :
                $book =  $doc->Committee_5_3;
        ?>
                <tbody>
                    <?php
                    foreach ($book as $chapter) :
                    ?>
                        <tr>
                            <th class="form-control text-center" scope="row"><?= $row++ ?></th>
                            <td class="text-center"><?= $chapter->From_Event ?> </td>
                            <td class="text-center"><?= $chapter->To_Event ?> </td>

                            <td class="text-center">
                                <?php if (!empty($chapter->Notice)) : ?>
                                    <a href="<?= base_url('Userfiles/Committee/') . $chapter->Notice; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                                        <button class="btn btn-outline-success"> Download File </button>
                                    </a>
                                <?php else : ?>
                                    <b> Not Found...</b>
                                <?php endif; ?>
                            </td>

                            <td class="text-center"><?= $chapter->Number_Partcipants ?> </td>

                            

                            <td class="text-center">
                                <?php if (!empty($chapter->Report_Event)) : ?>
                                    <a href="<?= base_url('Userfiles/Committee/') . $chapter->Report_Event; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                                        <button class="btn btn-outline-success"> Download File </button>
                                    </a>
                                <?php else : ?>
                                    <b> Not Found...</b>
                                <?php endif; ?>
                            </td>

                            
                            <td class="text-center">
                                <?php if (!empty($chapter->Geotag_Photo1)) : ?>
                                    <a href="<?= base_url('Userfiles/Committee/') . $chapter->Geotag_Photo1; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                                        <button class="btn btn-outline-success"> Download File </button>
                                    </a>
                                <?php else : ?>
                                    <b> Not Found...</b>
                                <?php endif; ?>
                            </td>

                            
                            <td class="text-center">
                                <?php if (!empty($chapter->Geotag_Photo2)) : ?>
                                    <a href="<?= base_url('Userfiles/Committee/') . $chapter->Geotag_Photo2; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                                        <button class="btn btn-outline-success"> Download File </button>
                                    </a>
                                <?php else : ?>
                                    <b> Not Found...</b>
                                <?php endif; ?>
                            </td>

                            
                            <td class="text-center">
                                <?php if (!empty($chapter->Non_Geotag_Photo1)) : ?>
                                    <a href="<?= base_url('Userfiles/Committee/') . $chapter->Non_Geotag_Photo1; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                                        <button class="btn btn-outline-success"> Download File </button>
                                    </a>
                                <?php else : ?>
                                    <b> Not Found...</b>
                                <?php endif; ?>
                            </td>

                            
                            <td class="text-center">
                                <?php if (!empty($chapter->Non_Geotag_Photo2)) : ?>
                                    <a href="<?= base_url('Userfiles/Committee/') . $chapter->Non_Geotag_Photo2; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                                        <button class="btn btn-outline-success"> Download File </button>
                                    </a>
                                <?php else : ?>
                                    <b> Not Found...</b>
                                <?php endif; ?>
                            </td>


                            <td class="text-center">
                                <form action="<?= base_url('delete_careerkatta') ?>" method="post">
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
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Anubhuti/Career Katta/Competitive Exam Cell/Vidyarthi Manch/Swar Madhuri/Yuva Saptah</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <form action="<?= base_url('update_careerkatta') ?>" method="post" enctype="multipart/form-data">
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
                                                            <label class="form-label">Event Date From : <label style="color: red;"><strong>*</strong></label></label>
                                                            <input type="date" class="form-control" id="updatefromdate<?= $chapter->Committe_id ?>" name="fromEvent" autocomplete="off" value="<?= $chapter->From_Event?>" placeholder="dd-mm-yyyy" min="2019-01-01" onchange="enableupdatetodate<?= $chapter->Committe_id ?>()" required>
                                                        </div>

                                                        <div class="md-4 mb-3">
                                                            <label class="form-label">Event Date To : <label style="color: red;"><strong>*</strong></label></label>
                                                            <input type="date" class="form-control" id="updatetodate<?= $chapter->Committe_id ?>" name="toEvent" placeholder="dd-mm-yyyy"  value="<?= $chapter->To_Event?>" autocomplete="off" disabled required>
                                                        </div>

                                                        <script>
                                                            document.addEventListener("DOMContentLoaded", function() {
                                                                var currentDate = new Date();
                                                                currentDate.setHours(0, 0, 0, 0);

                                                                var fromdateInput = document.getElementById("updatefromdate<?= $chapter->Committe_id ?>");
                                                                var todateInput = document.getElementById("updatetodate<?= $chapter->Committe_id ?>");

                                                                fromdateInput.setAttribute("max", updateFormatDate<?= $chapter->Committe_id ?>(currentDate));

                                                                fromdateInput.addEventListener("change", function() {
                                                                    var jDate = new Date(fromdateInput.value);

                                                                    todateInput.setAttribute("min", updateFormatDate<?= $chapter->Committe_id ?>(jDate));

                                                                    var maxDate = new Date();
                                                                    maxDate.setHours(0, 0, 0, 0);
                                                                    todateInput.setAttribute("max", updateFormatDate<?= $chapter->Committe_id ?>(maxDate));

                                                                    if (new Date(todateInput.value) < jDate) {
                                                                        todateInput.value = "";
                                                                    }

                                                                    enableupdatetodate<?= $chapter->Committe_id ?>(); // Call the function here
                                                                });

                                                                function updateFormatDate<?= $chapter->Committe_id ?>(date) {
                                                                    var dd = String(date.getDate()).padStart(2, "0");
                                                                    var mm = String(date.getMonth() + 1).padStart(2, "0");
                                                                    var yyyy = date.getFullYear();
                                                                    return yyyy + "-" + mm + "-" + dd;
                                                                }
                                                            });

                                                            function enableupdatetodate<?= $chapter->Committe_id ?>() {
                                                                var fromDateInput = document.getElementById('updatefromdate<?= $chapter->Committe_id ?>');
                                                                var toDateInput = document.getElementById('updatetodate<?= $chapter->Committe_id ?>');

                                                                if (fromDateInput.value !== '') {
                                                                    toDateInput.removeAttribute('disabled');
                                                                } else {
                                                                    toDateInput.setAttribute('disabled', 'disabled');
                                                                }
                                                            }
                                                        </script>

                                                        <div class="md-4 mb-3">
                                                            <label class="form-label">Schedule/Notice : <label style="color: red;"><strong>Select .pdf file under 2 MB.</strong></label></label>
                                                            <input id="updatenotice<?= $chapter->Committe_id ?>" type="file" name="notice" class="form-control" autocomplete="off" accept=".pdf" oninput="updatevalidateNotice<?= $chapter->Committe_id ?>(event)" >
                                                            <span id="updateNoticeError<?= $chapter->Committe_id ?>" style="color:red;"></span>
                                                        </div>

                                                        <div class="md-4 mb-3">
                                                            <label class="form-label">Number Of Participants : <label style="color: red;"><strong>*</strong></label></label>
                                                            <input id="updatenumberParticipants<?= $chapter->Committe_id ?>" type="text" class="form-control" name="numberParticipants" value="<?= $chapter->Number_Partcipants?>" min="1" max="500" maxlength="3" autocomplete="off" required>
                                                            <span id = "updatenumberParticipantsError<?= $chapter->Committe_id ?>" style="display:none;color:red;">Please Enter a Valid Number Of Participants between 1 to 500.</span>
                                                        </div>
                                                        <script>
                                                            function updatevalidatenumberParticipants<?= $chapter->Committe_id ?>(inputElement) {
                                                                var sanitizedValue = inputElement.value.replace(/\D/g, ''); // Remove non-numeric characters
                                                                inputElement.value = sanitizedValue; // Set sanitized value back into the input field
                                                            
                                                                var enteredValue = parseInt(sanitizedValue);
                                                                var minLimit = parseInt(inputElement.getAttribute("min"));
                                                                var maxLimit = parseInt(inputElement.getAttribute("max"));
                                                            
                                                                // Check if the entered value is within the specified limits
                                                                if (sanitizedValue.length === 0) {
                                                                    document.getElementById("updatenumberParticipantsError<?= $chapter->Committe_id ?>").style.display = "none"; // Hide the error message
                                                                    inputElement.setCustomValidity(""); // Clear custom validity
                                                                } else if (isNaN(enteredValue) || enteredValue < minLimit || enteredValue > maxLimit) {
                                                                    document.getElementById("updatenumberParticipantsError<?= $chapter->Committe_id ?>").style.display = "block";
                                                                    inputElement.setCustomValidity("Invalid value. Enter a number between " + minLimit + " and " + maxLimit + ".");
                                                                } else {
                                                                    document.getElementById("updatenumberParticipantsError<?= $chapter->Committe_id ?>").style.display = "none";
                                                                    inputElement.setCustomValidity("");
                                                                }
                                                            }
                                                            
                                                            // Add an event listener to the input field
                                                            document.getElementById("updatenumberParticipants<?= $chapter->Committe_id ?>").addEventListener("input", function () {
                                                                updatevalidatenumberParticipants<?= $chapter->Committe_id ?>(this);
                                                            });
                                                        </script>

                                                        <div class="md-4 mb-3">
                                                            <label class="form-label">Report Of Evevnt : <label style="color: red;"><strong> Select .pdf file under 2 MB.</strong></label></label>
                                                            <input id="updatereportEvent<?= $chapter->Committe_id ?>" type="file" class="form-control" name="reportEvent" autocomplete="off" accept=".pdf" oninput="updatevalidateReportEvent<?= $chapter->Committe_id ?>(event)" >
                                                            <span id="updatereportEventError<?= $chapter->Committe_id ?>" style="color:red;"></span>
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

                                                            function updatevalidateNotice<?= $chapter->Committe_id ?>(event) {
                                                                updatevalidateDoc<?= $chapter->Committe_id ?>(event, 'updateNoticeError<?= $chapter->Committe_id ?>');
                                                            }

                                                            function updatevalidateReportEvent<?= $chapter->Committe_id ?>(event) {
                                                                updatevalidateDoc<?= $chapter->Committe_id ?>(event, 'updatereportEventError<?= $chapter->Committe_id ?>');
                                                            }

                                                        </script>
                                                        
                                                        <div class="md-4 mb-3">
                                                            <label class="form-label"> Geotag Photos : <label style="color: red;"><strong>Select jpg, jpeg, png file under 2 MB.</strong></label></label>
                                                            <div class="my-2">
                                                                <input id="updateGeoP<?= $chapter->Committe_id ?>" type="file" class="form-control" name="geotag1" autocomplete="off" accept=".jpg,.jpeg,.png" oninput="updatevalidateGeoTagPhoto<?= $chapter->Committe_id ?>(event)" >
                                                                <span id="updateGeoPError<?= $chapter->Committe_id ?>" style="color: red;"></span>
                                                            </div>
                                                            <div class="my-2">
                                                                <input id="updateGeoP1<?= $chapter->Committe_id ?>" type="file" class="form-control" name="geotag2" autocomplete="off" accept=".jpg,.jpeg,.png" oninput="updatevalidateGeoTagPhoto1<?= $chapter->Committe_id ?>(event)" >
                                                                <span id="updateGeoP1Error<?= $chapter->Committe_id ?>" style="color: red;"></span>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="md-4 mb-3">
                                                            <label class="form-label"> Non Geotag Photos : <label style="color: red;"><strong>Select jpg, jpeg, png file under 500 KB.</strong></label></label>
                                                            <div class="my-2">
                                                                <input id="updatecurrentphoto<?= $chapter->Committe_id ?>" type="file" class="form-control" name="nonGeotag1" autocomplete="off" accept=".jpg,.jpeg,.png" oninput="updatevalidateCurrentPhoto<?= $chapter->Committe_id ?>(event)">
                                                                <span id="updatecurrentphotoError<?= $chapter->Committe_id ?>" style="color:red;"></span>
                                                            </div>
                                                            <div class="my-2">
                                                                <input id="updatecurrentphoto1<?= $chapter->Committe_id ?>" type="file" class="form-control" name="nonGeotag2" autocomplete="off" accept=".jpg,.jpeg,.png" oninput="updatevalidateCurrentPhoto1<?= $chapter->Committe_id ?>(event)">
                                                                <span id="updatecurrentphoto1Error<?= $chapter->Committe_id ?>" style="color:red;"></span>
                                                            </div>
                                                        </div>
                                                        <script>
                                                            function updatevalidatePhoto<?= $chapter->Committe_id ?>(event, errorElementId, isGeotag) {
                                                                const file = event.target.files[0];
                                                                const errorElement = document.getElementById(errorElementId);

                                                                const maxFileSizeInBytes1 = isGeotag ? 2 * 1024 * 1024 : 500 * 1024; // Adjusted maximum file size based on geotag or non-geotag
                                                                const maxFileSizeInBytes2 = 2 * 1024 * 1024; // Maximum size for geotag photos

                                                                if (!file.type.match('image/jpeg') && !file.type.match('image/png') && !file.type.match('image/jpg')) {
                                                                    errorElement.textContent = 'File is not in correct format.';
                                                                    event.target.value = ''; // Clear the file input
                                                                    return;
                                                                }
                                                                
                                                                if (file.size > maxFileSizeInBytes1) {
                                                                    errorElement.textContent = isGeotag ? 'File is too big. Maximum size is 2 MB.' : 'File is too big. Maximum size is 500 KB.';
                                                                    event.target.value = ''; // Clear the file input
                                                                    return;
                                                                }

                                                                // If the file is valid, clear the error message
                                                                errorElement.textContent = '';
                                                            }

                                                            function updatevalidateGeoTagPhoto<?= $chapter->Committe_id ?>(event) {
                                                                updatevalidatePhoto<?= $chapter->Committe_id ?>(event, 'updateGeoPError<?= $chapter->Committe_id ?>', true); 
                                                            }

                                                            function updatevalidateGeoTagPhoto1<?= $chapter->Committe_id ?>(event) {
                                                                updatevalidatePhoto<?= $chapter->Committe_id ?>(event, 'updateGeoP1Error<?= $chapter->Committe_id ?>', true); 
                                                            }

                                                            function updatevalidateCurrentPhoto<?= $chapter->Committe_id ?>(event) {
                                                                updatevalidatePhoto<?= $chapter->Committe_id ?>(event, 'updatecurrentphotoError<?= $chapter->Committe_id ?>', false); 
                                                            }

                                                            function updatevalidateCurrentPhoto1<?= $chapter->Committe_id ?>(event) {
                                                                updatevalidatePhoto<?= $chapter->Committe_id ?>(event, 'updatecurrentphoto1Error<?= $chapter->Committe_id ?>', false); 
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

<script src="<?php echo base_url('assets/js/Committee/Carear_Katta_Competative_Exam/CarearKatta_view.js'); ?>"></script>

<?= $this->endSection(); ?>

