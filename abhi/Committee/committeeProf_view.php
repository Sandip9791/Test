<!DOCTYPE html>
<html>

<head>
    <title>Modern College GK</title>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>

    <link rel="stylesheet" href="<?= base_url('assets/css/hodDashboard.css')?>">
    <script>
        $(document).ready(function(){
          $("#datepicker").datepicker({
             format: "yyyy",
             viewMode: "years", 
             minViewMode: "years",
             autoclose:true
          });   
        }) 
    </script>

</head>

<body>
    <div>
        <img class="border border-light-subtle border-3" style="width: 100%; height:auto;"
            src="<?= base_url('assets/images/modern_Logo_0_6.png'); ?>" />
    </div>



    <nav class="navbar  bg-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html"></a>
                    </li>
                    <li class="nav-item dropdown">
                    </li>
                </ul>


                <form class="d-flex" method="Post" action="<?= base_url('iqacLogout') ?>">
                    <label class="btn btn-outline-light rounded-pill mx-4" title="Login Profile">Username:
                        <?php $session = \Config\Services::session();
                        $myusername = $session->get('committee_user');
                        echo $myusername; ?>
                    </label>
                    <input type="submit" value="Logout" class="btn btn-outline-danger">
                </form>
            </div>
        </div>
    </nav>
    <br>
    <h1 style="margin-top:0%; margin-bottom:0%;margin-left:0%; text-align:center">Committee Dashboard</h1>
    <br>
    <div class="container">
        <div class="section1">
            <div class="section1a mt-1">
                <h3>&nbsp; Profile</h3>
            </div>

            <?php if (isset($documents)):
                foreach ($documents as $doc):

                    $title = $doc->Title;
                    $fname = $doc->First_Name;
                    $lname = $doc->Last_Name;
                    $mname = $doc->Midd_Name;

                    $Name = $title . " " . $fname . " " . $mname . " " . $lname;

                    ?>
                    <div class="section1b">
                        <img src="<?= base_url("assets\images\profile\pro.png"); ?>" alt="profile" class="profilr_pic"><br>
                        <h6><b>Name :&nbsp;</b>
                            <?= $Name ?>
                        </h6>
                        <h6><b>Designation :&nbsp;</b>
                            <?= $doc->Designation ?>
                        </h6>
                        <h6><b>Teacher Type :&nbsp;</b>
                            <?= $doc->Teacher_Type ?>
                        </h6>
                        <h6><b>Email :&nbsp;</b>
                            <?= $doc->Email ?>
                        </h6>
                        <h6><b>Department :&nbsp;</b>
                            <?= $doc->Department ?>
                        </h6>
                        </h6>
                        <h6><b>Name of the College / Institute : </b>
                            Progressive Education Society's
                            Modern College Of Arts, Science & Commerce
                            Ganeshkhind,Pune-16.
                        </h6>
                    </div>
                </div>

                <div class="section2">
                    <div class="section2a  mt-1">
                        <h3>&nbsp; Important links:</h3>
                    </div>
                    <br>
                    <div class="row g-3 my-2" style="padding-left: 0.5cm;">
                        <div class="section2b">
                            <ol id="criteria">


                                <?php if ($doc->Committes_Type === "Exam"): ?>
                                    <li onclick="toggleSublist(1)" class="mx-3" style="color:black;"><b>&nbsp;Exam&nbsp;</b></li>
                                    <ul class="criterium1" id="sublist1" style="display: none;">

                                        <li onclick="toggleSublist(2)">2.5 Evaluation Process and Reforms</li>
                                        <ul class="sub-criterium1" id="sublist2" style="display: none;">
                                            <u>
                                                <li><a href="<?= base_url('exam_2_5_1') ?>" style="color:white;">2.5.1</a></li>
                                                <li><a href="<?= base_url('exam_2_5_2') ?>" style="color:white;">2.5.2</a></li>
                                                <li><a href="<?= base_url('exam_2_5_3') ?>" style="color:white;">2.5.3</a></li>
                                            </u>
                                        </ul>

                                        <li onclick="toggleSublist(3)">2.6 Students Performance and Learning Outcomes</li>
                                        <ul class="sub-criterium1" id="sublist3" style="display: none;">
                                            <u>
                                                <li><a href="<?= base_url('exam_2_6_2') ?>" style="color:white;">2.6.2</a></li>
                                            </u>
                                        </ul>
                                    </ul>
                                <?php endif; ?>

                                <?php if ($doc->Committes_Type === "Library"): ?>
                                    <li onclick="toggleSublist(4)" class="mx-3" style="color:black;"><b>&nbsp;Library&nbsp;</b></li>
                                    <ul class="criterium2" id="sublist4" style="display: none;">
                                        <li onclick="toggleSublist(5)">3.4 Research Publications and Awards (30)</li>
                                        <ul class="sub-criterium2" id="sublist5" style="display: none;">
                                            <u>
                                                <li><a href="<?= base_url('library_3_4_5') ?>" style="color:white;">3.4.5</a></li>
                                                <li><a href="<?= base_url('library_3_4_6') ?>" style="color:white;">3.4.6</a></li>
                                            </u>
                                        </ul>

                                        <li onclick="toggleSublist(6)">4.2 Library as a Learning Resource (20)</li>
                                        <ul class="sub-criterium2" id="sublist6" style="display: none;">
                                            <u>
                                                <li><a href="<?= base_url('library_4_2_1') ?>" style="color:white;">4.2.1</a></li>
                                                <li><a href="<?= base_url('library_4_2_2') ?>" style="color:white;">4.2.2</a></li>
                                            </u>
                                        </ul>
                                    </ul>
                                <?php endif; ?>

                                <?php if ($doc->Committes_Type === "Office"): ?>
                                    <li onclick="toggleSublist(7)" class="mx-3" style="color:black;"><b>&nbsp;Office&nbsp;</b></li>
                                    <ul class="criterium14" id="sublist7" style="display: none;">
                                        <li onclick="toggleSublist(8)">2.1 Student Enrolment and Profile (20)</li>
                                        <ul class="sub-criterium15" id="sublist8" style="display: none;">
                                            <li><a href="<?= base_url('office_2_1__2_2') ?>" style="color:white;">2.1, 2.2</a></li>
                                            <li><a href="<?= base_url('office_2_1_1') ?>" style="color:white;">2.1.1</a></li>
                                            <li><a href="<?= base_url('office_2_1_2') ?>" style="color:white;">2.1.2</a></li>
                                        </ul>

                                        <li onclick="toggleSublist(9)">3.1 Promotion of Research and Facilities (20)</li>
                                        <ul class="sub-criterium15" id="sublist9" style="display: none;">
                                            <u>
                                                <li><a href="<?= base_url('office_3_1_2') ?>" style="color:white;">3.1.2</a></li>
                                            </u>
                                        </ul>

                                        <li onclick="toggleSublist(41)">3.5 Consultancy</li>
                                        <ul class="sub-criterium15" id="sublist41" style="display: none;">
                                            <u>
                                                <li><a href="<?= base_url('office_3_5_1') ?>" style="color:white;">3.5.1</a></li>
                                            </u>
                                        </ul>


                                        <li onclick="toggleSublist(10)">4.1 Physical Facilities, 4.2 Library as a Learning Resource,
                                            4.4 Maintenance of Campus Infrastructure</li>
                                        <ul class="sub-criterium15" id="sublist10" style="display: none;">
                                            <u>
                                                <li><a href="<?= base_url('physical_facilities') ?>" style="color:white;">Physical
                                                        Facilities(4.1.1)</a></li>
                                                <li><a href="<?= base_url('office_412_422_441') ?>" style="color:white;">4.1.2,
                                                        4.2.2, 4.4.1</a></li>
                                            </u>
                                        </ul>

                                        <li onclick="toggleSublist(11)">6.4 Financial Management and Resource Mobilization</li>
                                        <ul class="sub-criterium15" id="sublist11" style="display: none;">
                                            <u>
                                                <li><a href="<?= base_url('office_6_4_2') ?>" style="color:white;">6.4.2</a></li>
                                            </u>
                                        </ul>

                                        <li onclick="toggleSublist(42)">7.1 Institutional Values and Social Responsibilities</li>
                                        <ul class="sub-criterium15" id="sublist42" style="display: none;">
                                            <u>
                                                <li><a href="<?= base_url('physical_facilities_environment') ?>"
                                                        style="color:white;">Physical Facilities Enviroment(7.1.2)</a></li>
                                            </u>
                                        </ul>


                                    </ul>
                                <?php endif; ?>

                                <?php if ($doc->Committes_Type === "Antisexual Harsement"): ?>
                                    <li onclick="toggleSublist(12)" class="mx-3" style="color:black;"><b>&nbsp;Antisexual
                                            Harsement&nbsp;</b></li>
                                    <ul class="criterium14" id="sublist12" style="display: none;">
                                        <li onclick="toggleSublist(13)">5.1 Student Support </li>
                                        <ul class="sub-criterium15" id="sublist13" style="display: none;">
                                            <u>
                                                <li><a href="<?= base_url('committe_5_1_4') ?>" style="color:white;">5.1.4</a></li>
                                            </u>
                                        </ul>
                                    </ul>
                                <?php endif; ?>

                                <?php if ($doc->Committes_Type === "Anti Ragging"): ?>
                                    <li onclick="toggleSublist(21)" class="mx-3" style="color:black;"><b>&nbsp;Antiragging&nbsp;</b>
                                    </li>
                                    <ul class="criterium14" id="sublist21" style="display: none;">
                                        <li onclick="toggleSublist(22)">5.1 Student Support </li>
                                        <ul class="sub-criterium22" id="sublist22" style="display: none;">
                                            <u>
                                                <li><a href="<?= base_url('committe_5_1_4') ?>" style="color:white;">5.1.4</a></li>
                                            </u>
                                        </ul>
                                    </ul>
                                <?php endif; ?>

                                <?php if ($doc->Committes_Type === "Student Grievances"): ?>
                                    <li onclick="toggleSublist(23)" class="mx-3" style="color:black;"><b>&nbsp;Student
                                            Grievances&nbsp;</b></li>
                                    <ul class="criterium14" id="sublist23" style="display: none;">
                                        <li onclick="toggleSublist(24)">5.1 Student Support </li>
                                        <ul class="sub-criterium22" id="sublist24" style="display: none;">
                                            <u>
                                                <li><a href="<?= base_url('committe_5_1_4') ?>" style="color:white;">5.1.4</a></li>
                                            </u>
                                        </ul>
                                    </ul>
                                <?php endif; ?>

                                <?php if ($doc->Committes_Type === "Counselling Cell"): ?>
                                    <li onclick="toggleSublist(25)" class="mx-3" style="color:black;"><b>&nbsp;Counselling
                                            Cell&nbsp;</b></li>
                                    <ul class="criterium14" id="sublist25" style="display: none;">
                                        <li onclick="toggleSublist(26)">5.1 Student Support </li>
                                        <ul class="sub-criterium26" id="sublist26" style="display: none;">
                                            <u>
                                                <li><a href="<?= base_url('committe_5_1_4') ?>" style="color:white;">5.1.4</a></li>
                                            </u>
                                        </ul>
                                    </ul>
                                <?php endif; ?>

                                <?php if ($doc->Committes_Type === "Aluminiai Association"): ?>
                                    <li onclick="toggleSublist(14)" class="mx-3" style="color:black;"><b>&nbsp;Aluminiai
                                            Association&nbsp;</b></li>
                                    <ul class="criterium14" id="sublist14" style="display: none;">
                                        <li onclick="toggleSublist(15)">5.4 Alumni Engagement </li>
                                        <ul class="sub-criterium29" id="sublist15" style="display: none;">
                                            <u>
                                                <li><a href="<?= base_url('committe_5_4_1') ?>" style="color:white;">5.4.1</a></li>
                                            </u>
                                        </ul>
                                    </ul>
                                <?php endif; ?>

                                <?php if ($doc->Committes_Type === "Sports"): ?>
                                    <li onclick="toggleSublist(16)" class="mx-3" style="color:black;"><b>&nbsp;Sports &nbsp;</b>
                                    </li>
                                    <ul class="criterium14" id="sublist16" style="display: none;">
                                        <li onclick="toggleSublist(17)">5.3 Student Participation and Activities </li>
                                        <ul class="sub-criterium29" id="sublist17" style="display: none;">
                                            <u>
                                                <li><a href="<?= base_url('committe_5_3_1') ?>" style="color:white;">5.3.1</a></li>
                                                <li><a href="<?= base_url('committe_5_3_3') ?>" style="color:white;">5.3.3</a></li>
                                            </u>
                                        </ul>
                                    </ul>
                                <?php endif; ?>

                                <?php if ($doc->Committes_Type === "Arts Circle"): ?>
                                    <li onclick="toggleSublist(18)" class="mx-3" style="color:black;"><b>&nbsp;Arts Circle
                                            &nbsp;</b></li>
                                    <ul class="criterium14" id="sublist18" style="display: none;">
                                        <li onclick="toggleSublist(19)">5.3 Student Participation and Activities </li>
                                        <ul class="sub-criterium29" id="sublist19" style="display: none;">
                                            <u>
                                                <li><a href="<?= base_url('committe_5_3_3') ?>" style="color:white;">5.3.3</a></li>
                                            </u>
                                        </ul>
                                    </ul>
                                <?php endif; ?>

                                <?php if ($doc->Committes_Type === "Placement Cell"): ?>
                                    <li onclick="toggleSublist(27)" class="mx-3" style="color:black;"><b>&nbsp;Placement
                                            Cell&nbsp;</b></li>
                                    <ul class="criterium14" id="sublist27" style="display: none;">
                                        <li onclick="toggleSublist(28)">5.2 Student Participation and Activities</li>
                                        <ul class="sub-criterium29" id="sublist28" style="display: none;">
                                            <u>
                                                <li><a href="<?= base_url('committe_5_2_1') ?>" style="color:white;">5.2.1</a></li>
                                            </u>
                                        </ul>
                                    </ul>
                                <?php endif; ?>

                                <?php if ($doc->Committes_Type === "Anubhuti"): ?>
                                    <li onclick="toggleSublist(29)" class="mx-3" style="color:black;"><b>&nbsp;Anubhuti&nbsp;</b>
                                    </li>
                                    <ul class="criterium14" id="sublist29" style="display: none;">
                                        <li onclick="toggleSublist(30)">5.3 Student Participation and Activities </li>
                                        <ul class="sub-criterium30" id="sublist28" style="display none;">
                                            <u>
                                                <li><a href="<?= base_url('careerkatta') ?>" style="color:white;">5.3</a></li>
                                            </u>
                                        </ul>
                                    </ul>
                                <?php endif; ?>

                                <?php if ($doc->Committes_Type === "Competitive Exam Cell"): ?>
                                    <li onclick="toggleSublist(31)" class="mx-3" style="color:black;"><b>&nbsp;Competitive Exam
                                            Cell&nbsp;</b></li>
                                    <ul class="criterium14" id="sublist31" style="display: none;">
                                        <li onclick="toggleSublist(32)">5.3 Student Participation and Activities </li>
                                        <ul class="sub-criterium29" id="sublist32" style="display: none;">
                                            <u>
                                                <li><a href="<?= base_url('careerkatta') ?>" style="color:white;">5.3</a></li>
                                            </u>
                                        </ul>
                                    </ul>
                                <?php endif; ?>

                                <?php if ($doc->Committes_Type === "Career Katta"): ?>
                                    <li onclick="toggleSublist(33)" class="mx-3" style="color:black;"><b>&nbsp;Career
                                            Katta&nbsp;</b></li>
                                    <ul class="criterium14" id="sublist33" style="display: none;">
                                        <li onclick="toggleSublist(34)">5.3 Student Participation and Activities </li>
                                        <ul class="sub-criterium29" id="sublist34" style="display: none;">
                                            <u>
                                                <li><a href="<?= base_url('careerkatta') ?>" style="color:white;">5.3</a></li>
                                            </u>
                                        </ul>
                                    </ul>
                                <?php endif; ?>

                                <?php if ($doc->Committes_Type === "Vidyarthi Manch"): ?>
                                    <li onclick="toggleSublist(35)" class="mx-3" style="color:black;"><b>&nbsp;Vidyarthi
                                            Manch&nbsp;</b></li>
                                    <ul class="criterium14" id="sublist35" style="display: none;">
                                        <li onclick="toggleSublist(36)">5.3 Student Participation and Activities </li>
                                        <ul class="sub-criterium29" id="sublist36" style="display: none;">
                                            <u>
                                                <li><a href="<?= base_url('careerkatta') ?>" style="color:white;">5.3</a></li>
                                            </u>
                                        </ul>
                                    </ul>
                                <?php endif; ?>

                                <?php if ($doc->Committes_Type === "Swar Madhuri"): ?>
                                    <li onclick="toggleSublist(37)" class="mx-3" style="color:black;"><b>&nbsp;Swar
                                            Madhuri&nbsp;</b></li>
                                    <ul class="criterium14" id="sublist37" style="display: none;">
                                        <li onclick="toggleSublist(38)">5.3 Student Participation and Activities </li>
                                        <ul class="sub-criterium29" id="sublist38" style="display: none;">
                                            <u>
                                                <li><a href="<?= base_url('careerkatta') ?>" style="color:white;">5.3</a></li>
                                            </u>
                                        </ul>
                                    </ul>
                                <?php endif; ?>

                                <?php if ($doc->Committes_Type === "Yuva Saptah"): ?>
                                    <li onclick="toggleSublist(39)" class="mx-3" style="color:black;"><b>&nbsp;Yuva Saptah&nbsp;</b>
                                    </li>
                                    <ul class="criterium14" id="sublist39" style="display: none;">
                                        <li onclick="toggleSublist(40)">5.3 Student Participation and Activities </li>
                                        <ul class="sub-criterium40" id="sublist40" style="display: none;">
                                            <u>
                                                <li><a href="<?= base_url('careerkatta') ?>" style="color:white;">5.3</a></li>
                                            </u>
                                        </ul>
                                    </ul>
                                <?php endif; ?>




                                    <?php if (empty($doc->Committes_Type)): ?>

                                        <b class="text-dark">Contact In Office...</b>

                                    <?php endif; ?>
                                </li>

                            </ol>
                            <script>
                                function toggleSublist(listNum) {
                                    var sublist = document.getElementById("sublist" + listNum);
                                    sublist.style.display = sublist.style.display === "none" ? "block" : "none";
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

</html>