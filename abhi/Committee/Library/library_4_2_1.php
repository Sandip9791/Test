<?= $this->extend('Layouts/committeeBase'); ?>
<?= $this->section("Content"); ?>
<h1 class="ms-3">Library is automated with digital facilities using Integrated Library Management System (ILMS), adequate subscriptions to e-resources and journals are made. The library is optimally used by the faculty and students (4.2.1) :</h1>

<div class="container-fluid" style="display:none" id="committees">
    <div id="form-container">
        <div class="container-fluid border border-primary border-2 my-3 mx-2">
            <form class="row g-3 my-3" method="post" action="<?= base_url('save_library_4_2_1') ?>" enctype="multipart/form-data">

                <div class="col-md-4 mb-3">
                    <label class="form-label">In which Academic Year you want to Store Data ? <label style="color: red;"></label></label>
                    <input type="text" class="form-control" name="AcademicYear" placeholder="Enter Year" autocomplete="off" oninput="validateSubName()">
                    <span id="" style="display:none;color:red;">Please enter a valid Subject Name.</span>
                </div>

                <div class="col-md-12">
                    <label>Describe : <b style="color: rgb(235, 15, 15);">* 200 words only</b> </label>
                    <textarea name="Describe" class="form-control" id="wordLimitedTextarea" rows="5" data-word-limit="200"></textarea>
                    <p class="float-end" style="color: rgb(76, 132, 236);">Remaining words: <span id="remainingWords"> 200</span></p>
                    <script>
                        // Function to enforce the word limit on the textarea
                        function enforceWordLimit(event) {
                            const wordLimit = 200; // Set your desired word limit here
                            const textarea = event.target;
                            const words = textarea.value.trim().split(/\s+/);
                            const remainingWords = wordLimit - words.length;

                            if (remainingWords < 0) {
                                // If the user exceeds the word limit, prevent further input
                                event.preventDefault();
                                textarea.value = words.slice(0, wordLimit).join(' ');
                            }

                            // Update the remaining words count
                            document.getElementById('remainingWords').textContent = remainingWords;
                        }

                        // Attach the event listener to the textarea
                        const textareaElement1 = document.getElementById('wordLimitedTextarea');
                        textareaElement1.addEventListener('input', enforceWordLimit);
                    </script>
                </div>

                <label class="form-label"><b>
                        <h5>Upload :-</h5>
                    </b></label>
                <p style="color: red;"><b>Note:- .pdf </b></p>



                <div class="col-md-6 my-3">
                    <label class="form-label">Library is automated with digital facilities using Integrated Library Management System (ILMS) : </label>
                    <input type="file" class="form-control" name="Automated_with_digital" accept=".pdf">
                </div>


                <div class="col-md-6 my-3">
                    <label class="form-label">Library is having adequate subscriptions to e-resources and journals : </label>
                    <input type="file" class="form-control" name="Adequate_subscriptions" accept=".pdf">
                </div>

                <label class="form-label">Library is optimally used by the faculty and students : </label>
                <div class="col-md-6 my-3">
                    <label for="">Footfall of Teachers :</label>
                    <input type="file" class="form-control" name="Footfall_of_Teachers">
                </div>

                <div class="col-md-6 my-3">
                    <label for="">Footfall of Students :</label>
                    <input type="file" class="form-control" name="Footfall_of_Students">
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
                <th scope="col">Describe</th>
                <th scope="col">Library is automated with digital facilities using Integrated Library Management System (ILMS)</th>
                <th scope="col">Library is having adequate subscriptions to e-resources and journals</th>
                <th scope="col">Footfall of Teachers</th>
                <th scope="col">Footfall of Students </th>
                <th scope="col">Delete</th>
                <th scope="col">Update</th>
            </tr>
        </thead>

        <?php if (isset($documents)) :
            $row = 1;
            foreach ($documents as $doc) :
                $book =  $doc->Committee_4_2_1;
        ?>
                <tbody>
                    <?php
                    foreach ($book as $chapter) :
                    ?>
                        <tr>
                            <th class="form-control text-center" scope="row"><?= $row++ ?></th>
                            <td class="text-center"><?= $chapter->Describe ?></td>

                            <td class="text-center">
                                <?php if (!empty($chapter->Automated_with_digital)) : ?>
                                    <a href="<?= base_url('Userfiles/Committee/') . $chapter->Automated_with_digital; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                                        <button class="btn btn-outline-success"> Download File </button>
                                    </a>
                                <?php else : ?>
                                    <b> Not Found...</b>
                                <?php endif; ?>
                            </td>

                            <td class="text-center">
                                <?php if (!empty($chapter->Adequate_subscriptions)) : ?>
                                    <a href="<?= base_url('Userfiles/Committee/') . $chapter->Adequate_subscriptions; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                                        <button class="btn btn-outline-success"> Download File </button>
                                    </a>
                                <?php else : ?>
                                    <b> Not Found...</b>
                                <?php endif; ?>
                            </td>

                            <td class="text-center">
                                <?php if (!empty($chapter->Footfall_of_Teachers)) : ?>
                                    <a href="<?= base_url('Userfiles/Committee/') . $chapter->Footfall_of_Teachers; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                                        <button class="btn btn-outline-success"> Download File </button>
                                    </a>
                                <?php else : ?>
                                    <b> Not Found...</b>
                                <?php endif; ?>
                            </td>

                            <td class="text-center">
                                <?php if (!empty($chapter->Footfall_of_Students)) : ?>
                                    <a href="<?= base_url('Userfiles/Committee/') . $chapter->Footfall_of_Students; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                                        <button class="btn btn-outline-success"> Download File </button>
                                    </a>
                                <?php else : ?>
                                    <b> Not Found...</b>
                                <?php endif; ?>
                            </td>

                            <td class="text-center">
                                <form action="<?= base_url('delete_library_4_2_1') ?>" method="post">
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
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">4.2.1</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <form action="<?= base_url('update_library_4_2_1') ?>" method="post" enctype="multipart/form-data">
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

                                                        <div class="md-12">
                                                            <label>Describe : <b style="color: rgb(235, 15, 15);">* 200 words only</b> </label>
                                                            <textarea name="Describe" class="form-control" id="wordLimitedTextarea" rows="5" data-word-limit="200"><?= $chapter->Describe ?></textarea>
                                                            <p class="float-end" style="color: rgb(76, 132, 236);">Remaining words: <span id="remainingWords"> 200</span></p>
                                                            <script>
                                                                // Function to enforce the word limit on the textarea
                                                                function enforceWordLimit(event) {
                                                                    const wordLimit = 200; // Set your desired word limit here
                                                                    const textarea = event.target;
                                                                    const words = textarea.value.trim().split(/\s+/);
                                                                    const remainingWords = wordLimit - words.length;

                                                                    if (remainingWords < 0) {
                                                                        // If the user exceeds the word limit, prevent further input
                                                                        event.preventDefault();
                                                                        textarea.value = words.slice(0, wordLimit).join(' ');
                                                                    }

                                                                    // Update the remaining words count
                                                                    document.getElementById('remainingWords').textContent = remainingWords;
                                                                }

                                                                // Attach the event listener to the textarea
                                                                const textareaElement2 = document.getElementById('wordLimitedTextarea');
                                                                textareaElement2.addEventListener('input', enforceWordLimit);
                                                            </script>
                                                        </div>

                                                        <label class="form-label"><b>
                                                                <h5>Upload :-</h5>
                                                            </b></label>
                                                        <p style="color: red;"><b>Note:- .pdf </b></p>

                                                        <div class="md-6 my-3">
                                                            <label class="form-label">Library is automated with digital facilities using Integrated Library Management System (ILMS) : </label>
                                                            <input type="file" class="form-control" name="Automated_with_digital" accept=".pdf">
                                                        </div>


                                                        <div class="md-6 my-3">
                                                            <label class="form-label">Library is having adequate subscriptions to e-resources and journals : </label>
                                                            <input type="file" class="form-control" name="Adequate_subscriptions" accept=".pdf">
                                                        </div>

                                                        <label class="form-label">Library is optimally used by the faculty and students : </label>
                                                        <div class="md-6 my-3">
                                                            <label for="">Footfall of Teachers :</label>
                                                            <input type="file" class="form-control" name="Footfall_of_Teachers">
                                                        </div>

                                                        <div class="md-6 my-3">
                                                            <label for="">Footfall of Students :</label>
                                                            <input type="file" class="form-control" name="Footfall_of_Students">
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