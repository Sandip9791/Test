0<?= $this->extend('Layouts/committeeBase'); ?>
<?= $this->section("Content"); ?>
<h1 class="text-center">IT integration and Reforms in examination (2.5.3):</h1>

<div class="container-fluid" style="display:none" id="committees">
    <div id="form-container">
        <div class="container-fluid border border-primary border-2 my-3 mx-2">
            <form class="row g-3 my-3" class="row" method="post" action="<?= base_url('save_exam_2_5_3') ?>" enctype="multipart/form-data">

                <div class="col-md-6">
                    <label class="form-label">In which Academic Year you want to Store Data ? <label style="color: red;"><strong>*</strong></label></label>
                    <input type="text" class="form-control" name="AcademicYear" id="datepicker" placeholder="Enter Year" maxlength="4" autocomplete="off" required>
                    <span id="error-message" style="display:none;color:red;">Please enter a valid valid Year.</span>
                </div>

                <div class="col-md-12 my-3">
                    <label>Examination Procedure : <span style="color: red;"><b>* 200 words only</b></span></label>
                    <textarea id="examinationProcedureTextarea" rows="5" cols="100" class="form-control" maxlength="200" name="Examination_Procedure" required></textarea>
                    <p class="float-end" style="color: rgb(76, 132, 236);">Remaining words: <span id="examinationProcedureRemainingWords">200</span></p>
                </div>

                <div class="col-md-12 my-3">
                    <label>Process Integrating IT : <span style="color: red;"><b>* 200 words only</b></span></label>
                    <textarea id="processIntegratingITTextarea" rows="5" cols="100" maxlength="200" class="form-control" name="Process_Integrating_IT" required></textarea>
                    <p class="float-end" style="color: rgb(76, 132, 236);">Remaining words: <span id="processIntegratingITRemainingWords">200</span></p>
                </div>

                <div class="col-md-12 my-3">
                    <label>Continuous Internal Assessment System : <span style="color: red;"><b>* 200 words only</b></span></label>
                    <textarea id="continuousInternalTextarea" rows="5" cols="100" class="form-control" maxlength="200" name="Continuous_Internal" required></textarea>
                    <p class="float-end" style="color: rgb(76, 132, 236);">Remaining words: <span id="continuousInternalRemainingWords">200</span></p>
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
                <th scope="col">Examination Procedure</th>
                <th scope="col">Process Integrating IT</th>
                <th scope="col">Continuous Internal Assessment System</th>
                <th scope="col">Delete</th>
                <th scope="col">Update</th>
            </tr>
        </thead>

        <?php if (isset($documents)) :
            $row = 1;
            foreach ($documents as $doc) :
                $book =  $doc->Committee_2_5_3;
        ?>
                <tbody>
                    <?php
                    foreach ($book as $chapter) :
                    ?>
                        <tr>
                            <th class="form-control text-center" scope="row"><?= $row++ ?></th>
                            <td class="text-center"><?= $chapter->Examination_Procedure ?> </td>
                            <td class="text-center"><?= $chapter->Process_Integrating_IT ?> </td>
                            <td class="text-center"><?= $chapter->Continuous_Internal ?> </td>

                            <td class="text-center">
                                <form action="<?= base_url('delete_exam_2_5_3') ?>" method="post">
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
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">2.5.3</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <form action="<?= base_url('update_exam_2_5_3') ?>" method="post" enctype="multipart/form-data">
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

                                                        <div class="md-9 my-3">
                                                            <label>Examination Procedure : <span style="color: red;"><b>* 200 words only</b></span></label>
                                                            <textarea id="updateexaminationProcedureTextarea<?= $chapter->Committe_id ?>" rows="3" cols="100" class="form-control" maxlength="200" name="Examination_Procedure" required><?= $chapter->Examination_Procedure ?></textarea>
                                                            <p class="float-end" style="color: rgb(76, 132, 236);">Remaining words: <span id="updateexaminationProcedureRemainingWords<?= $chapter->Committe_id ?>">200</span></p>
                                                        </div>

                                                        <div class="md-9 my-3">
                                                            <label>Process Integrating IT : <span style="color: red;"><b>* 200 words only</b></span></label>
                                                            <textarea id="updateprocessIntegratingITTextarea<?= $chapter->Committe_id ?>" rows="3" cols="100" maxlength="200" class="form-control" name="Process_Integrating_IT" required><?= $chapter->Process_Integrating_IT ?></textarea>
                                                            <p class="float-end" style="color: rgb(76, 132, 236);">Remaining words: <span id="updateprocessIntegratingITRemainingWords<?= $chapter->Committe_id ?>">200</span></p>
                                                        </div>

                                                        <div class="md-9 my-3">
                                                            <label>Continuous Internal Assessment System : <span style="color: red;"><b>* 200 words only</b></span></label>
                                                            <textarea id="updatecontinuousInternalTextarea<?= $chapter->Committe_id ?>" rows="3" cols="100" class="form-control" maxlength="200" name="Continuous_Internal" required><?= $chapter->Continuous_Internal ?></textarea>
                                                            <p class="float-end" style="color: rgb(76, 132, 236);">Remaining words: <span id="updatecontinuousInternalRemainingWords<?= $chapter->Committe_id ?>">200</span></p>
                                                        </div>

                                                        <script>
                                                            function updateEnforceWordLimit<?= $chapter->Committe_id ?>(event, textareaId, remainingWordsId) {
                                                                const wordLimit = 200; // Set your desired word limit here
                                                                const textarea = document.getElementById(textareaId);
                                                                const remainingWordsSpan = document.getElementById(remainingWordsId);
                                                                const words = textarea.value.trim().split(/\s+/);
                                                                const remainingWords = wordLimit - words.length;

                                                                if (remainingWords < 0) {
                                                                    // If the user exceeds the word limit, prevent further input
                                                                    event.preventDefault();
                                                                    textarea.value = words.slice(0, wordLimit).join(' ');
                                                                }

                                                                // Update the remaining words count
                                                                remainingWordsSpan.textContent = Math.max(remainingWords, 0);
                                                            }

                                                            // Attach the event listener to the textareas
                                                            const updateexaminationProcedureTextarea<?= $chapter->Committe_id ?> = document.getElementById('updateexaminationProcedureTextarea<?= $chapter->Committe_id ?>');
                                                            updateexaminationProcedureTextarea<?= $chapter->Committe_id ?>.addEventListener('input', (event) => {
                                                                updateEnforceWordLimit<?= $chapter->Committe_id ?>(event, 'updateexaminationProcedureTextarea<?= $chapter->Committe_id ?>', 'updateexaminationProcedureRemainingWords<?= $chapter->Committe_id ?>');
                                                            });

                                                            const updateprocessIntegratingITTextarea<?= $chapter->Committe_id ?> = document.getElementById('updateprocessIntegratingITTextarea<?= $chapter->Committe_id ?>');
                                                            updateprocessIntegratingITTextarea<?= $chapter->Committe_id ?>.addEventListener('input', (event) => {
                                                                updateEnforceWordLimit<?= $chapter->Committe_id ?>(event, 'updateprocessIntegratingITTextarea<?= $chapter->Committe_id ?>', 'updateprocessIntegratingITRemainingWords<?= $chapter->Committe_id ?>');
                                                            });

                                                            const updatecontinuousInternalTextarea<?= $chapter->Committe_id ?> = document.getElementById('updatecontinuousInternalTextarea<?= $chapter->Committe_id ?>');
                                                            updatecontinuousInternalTextarea<?= $chapter->Committe_id ?>.addEventListener('input', (event) => {
                                                                updateEnforceWordLimit<?= $chapter->Committe_id ?>(event, 'updatecontinuousInternalTextarea<?= $chapter->Committe_id ?>', 'updatecontinuousInternalRemainingWords<?= $chapter->Committe_id ?>');
                                                            });
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

<script src="<?php echo base_url('assets/js/Committee/Exam/exam_2_5_3.js'); ?>"></script>

<?= $this->endSection(); ?>