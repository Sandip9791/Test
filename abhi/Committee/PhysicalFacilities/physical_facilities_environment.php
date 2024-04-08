<?= $this->extend('Layouts/committeeBase'); ?>
<?= $this->section("Content"); ?>

<h1 class="text-center">Physical Facilities Environment (7.1.2,7.1.4)</h1>

<div class="container-fluid" style="display:none" id="committees">
  <div id="form-container">
    <div class="container-fluid border border-primary border-2 my-3 mx-2">
      <form class="row g-3 my-3" method="post" action="<?= base_url('save_physical_facilities_environment') ?>" enctype="multipart/form-data" class="mx-3">

        <div class="col-md-4 ms-4 my-3">
          <label class="form-label">In which Academic Year you want to Store Data ? <label style="color: red;"></label></label>
          <input type="text" class="form-control" name="AcademicYear" placeholder="Enter Year" autocomplete="off" oninput="validateSubName()">
          <span id="" style="display:none;color:red;">Please enter a valid Subject Name.</span>
        </div>

        <table class="table table-hover table-bordered border border-primary border-3  my-3">
          <thead class="table-primary text-center">
            <tr>
              <th scope="col">Sr.No.</th>
              <th scope="col">Particulars</th>
              <th scope="col">Select</th>
              <th scope="col">Upload Bill</th>
              <th scope="col">Upload Photo</th>
            </tr>
          </thead>
          <tbody class="text-center">

            <tr>
              <th scope="row">1</th>
              <td>Solar Energy</td>
              <td>
                <input class="form-check-input" type="radio" name="Solar_Energy" id="inlineRadio1" value="Yes" onclick="showSolar()">
                <label class="form-check-label" for="inlineRadio1">Yes</label><br>
                <input class="form-check-input" type="radio" name="Solar_Energy" id="inlineRadio1" value="No" onclick="hideSolar()">
                <label class="form-check-label" for="inlineRadio1">No</label>
              </td>
              <td><input type="file" id="Solar1" class="form-control" name="Solar1" disabled="true"></td>
              <td><input type="file" id="Solar2" class="form-control" name="Solar2" disabled="true"></td>

              <script>
                var Solar1 = document.getElementById("Solar1")
                var Solar2 = document.getElementById("Solar2")

                function showSolar() {
                  Solar1.removeAttribute("disabled");
                  Solar2.removeAttribute("disabled");
                }

                function hideSolar() {
                  Solar1.disabled = "true";
                  Solar2.disabled = "true";
                }
              </script>
            </tr>

            <tr>
              <th scope="row">2</th>
              <td>Bio gas</td>
              <td><input class="form-check-input" type="radio" name="Bio_gas" id="inlineRadio1" value="Yes" onclick="showBio()">
                <label class="form-check-label" for="inlineRadio1">Yes</label><br>
                <input class="form-check-input" type="radio" name="Bio_gas" id="inlineRadio1" value="No" onclick="hideBio()">
                <label class="form-check-label" for="inlineRadio1">No</label>
              </td>
              <td><input type="file" id="Bio1" name="Bio1" class="form-control" disabled="true"></td>
              <td><input type="file" id="Bio2" name="Bio2" class="form-control" disabled="true"></td>
              <script>
                var Bio1 = document.getElementById("Bio1")
                var Bio2 = document.getElementById("Bio2")

                function showBio() {
                  Bio1.removeAttribute("disabled");
                  Bio2.removeAttribute("disabled");

                }

                function hideBio() {
                  Bio1.disabled = "true";
                  Bio2.disabled = "true";
                }
              </script>
            </tr>

            <tr>
              <th scope="row">3</th>
              <td>Wheeling to the grid</td>
              <td><input class="form-check-input" type="radio" name="Wheeling_to_the_grid" id="inlineRadio1" value="Yes" onclick="showWheeling()">
                <label class="form-check-label" for="inlineRadio1">Yes</label><br>
                <input class="form-check-input" type="radio" name="Wheeling_to_the_grid" id="inlineRadio1" value="No" onclick="hideWheeling()">
                <label class="form-check-label" for="inlineRadio1">No</label>
              </td>
              <td><input type="file" id="Wheeling1" name="Wheeling1" class="form-control" disabled="true"></td>
              <td><input type="file" id="Wheeling2" name="Wheeling2" class="form-control" disabled="true"></td>
              <script>
                var Wheeling1 = document.getElementById("Wheeling1")
                var Wheeling2 = document.getElementById("Wheeling2")

                function showWheeling() {
                  Wheeling1.removeAttribute("disabled");
                  Wheeling2.removeAttribute("disabled");

                }

                function hideWheeling() {
                  Wheeling1.disabled = "true";
                  Wheeling2.disabled = "true";
                }
              </script>
            </tr>

            <tr>
              <th scope="row">4</th>
              <td>Sensor based energy conservation</td>
              <td><input class="form-check-input" type="radio" name="Sensor_based_energy_conservation" id="inlineRadio1" value="Yes" onclick="showSensor()">
                <label class="form-check-label" for="inlineRadio1">Yes</label><br>
                <input class="form-check-input" type="radio" name="Sensor_based_energy_conservation" id="inlineRadio1" value="No" onclick="hideSensor()">
                <label class="form-check-label" for="inlineRadio1">No</label>
              </td>
              <td><input type="file" id="Sensor1" name="Sensor1" class="form-control" disabled="true"></td>
              <td><input type="file" id="Sensor2" name="Sensor2" class="form-control" disabled="true"></td>
              <script>
                var Sensor1 = document.getElementById("Sensor1")
                var Sensor2 = document.getElementById("Sensor2")

                function showSensor() {
                  Sensor1.removeAttribute("disabled");
                  Sensor2.removeAttribute("disabled");

                }

                function hideSensor() {
                  Sensor1.disabled = "true";
                  Sensor2.disabled = "true";
                }
              </script>
            </tr>

            <tr>
              <th scope="row">5</th>
              <td>Use of LED bulbs/power efficient equipment</td>
              <td><input class="form-check-input" type="radio" name="Use_of_LED_bulbs" id="inlineRadio1" value="Yes" onclick="showLED()">
                <label class="form-check-label" for="inlineRadio1">Yes</label><br>
                <input class="form-check-input" type="radio" name="Use_of_LED_bulbs" id="inlineRadio1" value="No" onclick="hideLED()">
                <label class="form-check-label" for="inlineRadio1">No</label>
              </td>
              <td><input type="file" id="LED1" name="LED1" class="form-control" disabled="true"></td>
              <td><input type="file" id="LED2" name="LED2" class="form-control" disabled="true"></td>
              <script>
                var LED1 = document.getElementById("LED1")
                var LED2 = document.getElementById("LED2")

                function showLED() {
                  LED1.removeAttribute("disabled");
                  LED2.removeAttribute("disabled");

                }

                function hideLED() {
                  LED1.disabled = "true";
                  LED2.disabled = "true";
                }
              </script>
            </tr>

            <tr>
              <th scope="row">6</th>
              <td>Wind mill</td>
              <td><input class="form-check-input" type="radio" name="Wind_mill" id="inlineRadio1" value="Yes" onclick="showWind()">
                <label class="form-check-label" for="inlineRadio1">Yes</label><br>
                <input class="form-check-input" type="radio" name="Wind_mill" id="inlineRadio1" value="No" onclick="hideWind()">
                <label class="form-check-label" for="inlineRadio1">No</label>
              </td>
              <td><input type="file" id="Wind1" name="Wind1" class="form-control" disabled="true"></td>
              <td><input type="file" id="Wind2" name="Wind2" class="form-control" disabled="true"></td>
              <script>
                var Wind1 = document.getElementById("Wind1")
                var Wind2 = document.getElementById("Wind2")

                function showWind() {
                  Wind1.removeAttribute("disabled");
                  Wind2.removeAttribute("disabled");

                }

                function hideWind() {
                  Wind1.disabled = "true";
                  Wind2.disabled = "true";
                }
              </script>
            </tr>

            <tr>
              <th scope="row">7</th>
              <td>Any other clean green energy</td>
              <td><input class="form-check-input" type="radio" name="Any_other" id="inlineRadio1" value="option1" onclick="showOther()">
                <label class="form-check-label" for="inlineRadio1">Yes</label><br>
                <input class="form-check-input" type="radio" name="Any_other" id="inlineRadio1" value="option1" onclick="hideOther()">
                <label class="form-check-label " for="inlineRadio1">No</label>
              </td>
              <td><input type="file" id="other1" name="other1" class="form-control" disabled="true"></td>
              <td><input type="file" id="other2" name="other2" class="form-control" disabled="true"></td>
              <script>
                var other1 = document.getElementById("other1")
                var other2 = document.getElementById("other2")

                function showOther() {
                  other1.removeAttribute("disabled");
                  other2.removeAttribute("disabled");

                }

                function hideOther() {
                  other1.disabled = "true";
                  other2.disabled = "true";
                }
              </script>
            </tr>

            <tr>
              <th scope="row">8</th>
              <td>Rain water harvesting</td>
              <td><input class="form-check-input" type="radio" name="harvesting" id="inlineRadio1" value="option1" onclick="showOtherharvesting()">
                <label class="form-check-label" for="inlineRadio1">Yes</label><br>
                <input class="form-check-input" type="radio" name="harvesting" id="inlineRadio1" value="option1" onclick="hideOtherharvesting()">
                <label class="form-check-label " for="inlineRadio1">No</label>
              </td>
              <td><input type="file" id="harvesting1" name="harvesting1" class="form-control" disabled="true"></td>
              <td><input type="file" id="harvesting2" name="harvesting2" class="form-control" disabled="true"></td>
              <script>
                var harvesting1 = document.getElementById("harvesting1")
                var harvesting2 = document.getElementById("harvesting2")

                function showOtherharvesting() {
                  harvesting1.removeAttribute("disabled");
                  harvesting2.removeAttribute("disabled");

                }

                function hideOtherharvesting() {
                  harvesting1.disabled = "true";
                  harvesting2.disabled = "true";
                }
              </script>
            </tr>

            <tr>
              <th scope="row">9</th>
              <td>Borewell /Open well recharge</td>
              <td><input class="form-check-input" type="radio" name="recharge" id="inlineRadio1" value="option1" onclick="showOtherrecharge()">
                <label class="form-check-label" for="inlineRadio1">Yes</label><br>
                <input class="form-check-input" type="radio" name="recharge" id="inlineRadio1" value="option1" onclick="hideOtherrecharge()">
                <label class="form-check-label " for="inlineRadio1">No</label>
              </td>
              <td><input type="file" id="recharge1" name="recharge1" class="form-control" disabled="true"></td>
              <td><input type="file" id="recharge2" name="recharge2" class="form-control" disabled="true"></td>
              <script>
                var recharge1 = document.getElementById("recharge1")
                var recharge2 = document.getElementById("recharge2")

                function showOtherrecharge() {
                  recharge1.removeAttribute("disabled");
                  recharge2.removeAttribute("disabled");

                }

                function hideOtherrecharge() {
                  recharge1.disabled = "true";
                  recharge2.disabled = "true";
                }
              </script>
            </tr>

            <tr>
              <th scope="row">10</th>
              <td>Construction of tanks and bunds</td>
              <td><input class="form-check-input" type="radio" name="bunds" id="inlineRadio1" value="option1" onclick="showOtherbunds()">
                <label class="form-check-label" for="inlineRadio1">Yes</label><br>
                <input class="form-check-input" type="radio" name="bunds" id="inlineRadio1" value="option1" onclick="hideOtherbunds()">
                <label class="form-check-label " for="inlineRadio1">No</label>
              </td>
              <td><input type="file" id="bunds1" name="bunds1" class="form-control" disabled="true"></td>
              <td><input type="file" id="bunds2" name="bunds2" class="form-control" disabled="true"></td>
              <script>
                var bunds1 = document.getElementById("bunds1")
                var bunds2 = document.getElementById("bunds2")

                function showOtherbunds() {
                  bunds1.removeAttribute("disabled");
                  bunds2.removeAttribute("disabled");

                }

                function hideOtherbunds() {
                  bunds1.disabled = "true";
                  bunds2.disabled = "true";
                }
              </script>
            </tr>

            <tr>
              <th scope="row">11</th>
              <td>Waste water recycling </td>
              <td><input class="form-check-input" type="radio" name="recycling" id="inlineRadio1" value="option1" onclick="showOtherrecycling()">
                <label class="form-check-label" for="inlineRadio1">Yes</label><br>
                <input class="form-check-input" type="radio" name="recycling" id="inlineRadio1" value="option1" onclick="hideOtherrecycling()">
                <label class="form-check-label " for="inlineRadio1">No</label>
              </td>
              <td><input type="file" id="recycling1" name="recycling1" class="form-control" disabled="true"></td>
              <td><input type="file" id="recycling2" name="recycling2" class="form-control" disabled="true"></td>
              <script>
                var recycling1 = document.getElementById("recycling1")
                var recycling2 = document.getElementById("recycling2")

                function showOtherrecycling() {
                  recycling1.removeAttribute("disabled");
                  recycling2.removeAttribute("disabled");

                }

                function hideOtherrecycling() {
                  recycling1.disabled = "true";
                  recycling2.disabled = "true";
                }
              </script>
            </tr>

            <tr>
              <th scope="row">11</th>
              <td>Maintenance of water bodies and distribution system in the campus</td>
              <td><input class="form-check-input" type="radio" name="campus" id="inlineRadio1" value="option1" onclick="showOthercampus()">
                <label class="form-check-label" for="inlineRadio1">Yes</label><br>
                <input class="form-check-input" type="radio" name="campus" id="inlineRadio1" value="option1" onclick="hideOthercampus()">
                <label class="form-check-label " for="inlineRadio1">No</label>
              </td>
              <td><input type="file" id="campus1" name="campus1" class="form-control" disabled="true"></td>
              <td><input type="file" id="campus2" name="campus2" class="form-control" disabled="true"></td>
              <script>
                var campus1 = document.getElementById("campus1")
                var campus2 = document.getElementById("campus2")

                function showOthercampus() {
                  campus1.removeAttribute("disabled");
                  campus2.removeAttribute("disabled");

                }

                function hideOthercampus() {
                  campus1.disabled = "true";
                  campus2.disabled = "true";
                }
              </script>
            </tr>

          </tbody>
        </table>

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
        <th>Sr.No.</th>
        <th scope="col" colspan="2">Solar Energy</th>
        <th scope="col" colspan="2">Bio gas</th>
        <th scope="col" colspan="2">Wheeling to the grid</th>
        <th scope="col" colspan="2">Sensor based energy conservation </th>
        <th scope="col" colspan="2">Use of LED bulbs/power efficient equipment </th>
        <th scope="col" colspan="2">Wind mill</th>
        <th scope="col" colspan="2">Any other clean green energy</th>
        <th scope="col" colspan="2">Rain water harvesting </th>
        <th scope="col" colspan="2">Borewell /Open well recharge</th>
        <th scope="col" colspan="2">Construction of tanks and bunds</th>
        <th scope="col" colspan="2">Waste water recycling </th>
        <th scope="col" colspan="2">Maintenance of water bodies and distribution system in the campus</th>
        <th scope="col">Delete</th>
        <th scope="col">Update</th>

      </tr>
    </thead>

    <?php if (isset($documents)) :
      $row = 1;
      foreach ($documents as $doc) :
        $book =  $doc->Committee_PFE;
    ?>
        <tbody>
          <?php
          foreach ($book as $chapter) :
          ?>
            <tr>
              <th class="form-control text-center" scope="row"><?= $row++ ?></th>
              <td class="text-center">
                <?php if (!empty($chapter->Solar1)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->Solar1; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>
              </td>

              <td class="text-center">
                <?php if (!empty($chapter->Solar2)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->Solar2; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>
              </td>

              <td class="text-center">
                <?php if (!empty($chapter->Bio1)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->Bio1; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>
              </td>

              <td class="text-center">
                <?php if (!empty($chapter->Bio2)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->Bio2; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>
              </td>

              <td class="text-center">
                <?php if (!empty($chapter->Wheeling1)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->Wheeling1; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>
              </td>

              <td class="text-center">
                <?php if (!empty($chapter->Wheeling2)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->Wheeling2; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>
              </td>

              <td class="text-center">
                <?php if (!empty($chapter->Sensor1)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->Sensor1; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>
              </td>

              <td class="text-center">
                <?php if (!empty($chapter->Sensor2)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->Sensor2; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>
              </td>

              <td class="text-center">
                <?php if (!empty($chapter->LED1)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->LED1; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>
              </td>

              <td class="text-center">
                <?php if (!empty($chapter->LED2)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->LED2; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>
              </td>

              <td class="text-center">
                <?php if (!empty($chapter->Wind1)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->Wind1; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>
              </td>

              <td class="text-center">
                <?php if (!empty($chapter->Wind2)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->Wind2; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>
              </td>

              <td class="text-center">
                <?php if (!empty($chapter->other1)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->other1; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>
              </td>

              <td class="text-center">
                <?php if (!empty($chapter->other2)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->other2; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>
              </td>

              <td class="text-center">
                <?php if (!empty($chapter->harvesting1)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->harvesting1; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>
              </td>

              <td class="text-center">
                <?php if (!empty($chapter->harvesting2)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->harvesting2; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>
              </td>

              <td class="text-center">
                <?php if (!empty($chapter->recharge1)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->recharge1; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>
              </td>

              <td class="text-center">
                <?php if (!empty($chapter->recharge2)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->recharge2; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>
              </td>

              <td class="text-center">
                <?php if (!empty($chapter->bunds1)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->bunds1; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>
              </td>

              <td class="text-center">
                <?php if (!empty($chapter->bunds2)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->bunds2; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>
              </td>

              <td class="text-center">
                <?php if (!empty($chapter->recycling1)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->recycling1; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>
              </td>

              <td class="text-center">
                <?php if (!empty($chapter->recycling2)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->recycling2; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>
              </td>

              <td class="text-center">
                <?php if (!empty($chapter->campus1)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->campus1; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>
              </td>

              <td class="text-center">
                <?php if (!empty($chapter->campus2)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->campus2; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>
              </td>


              <td class="text-center">
                <form action="<?= base_url('delete_physical_facilities_environment') ?>" method="post">
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
                        <h1 class="modal-title fs-5" id="exampleModalLabel">1.1.1</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>

                      <div class="modal-body">
                        <form action="<?= base_url('update_physical_facilities_environment') ?>" method="post" enctype="multipart/form-data">
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
                            <div class="md-4 my-3">
                              <label class="form-label" for="">Solar Energy</label>
                              <input type="file" class="form-control" name="Solar1">
                              <br>
                              <input type="file" class="form-control" name="Solar2">
                            </div>

                            <div class="md-4 my-3">
                              <label class="form-label" for="">Bio gas</label>
                              <input type="file" class="form-control" name="Bio1">
                              <br>
                              <input type="file" class="form-control" name="Bio2">
                            </div>

                            <div class="md-4 my-3">
                              <label class="form-label" for="">Wheeling to the grid</label>
                              <input type="file" class="form-control" name="Wheeling1">
                              <br>
                              <input type="file" class="form-control" name="Wheeling2">
                            </div>

                            <div class="md-4 my-3">
                              <label class="form-label" for="">Sensor based energy conservation</label>
                              <input type="file" class="form-control" name="Sensor1">
                              <br>
                              <input type="file" class="form-control" name="Sensor2">
                            </div>

                            <div class="md-4 my-3">
                              <label class="form-label" for="">Use of LED bulbs/power efficient equipment</label>
                              <input type="file" class="form-control" name="LED1">
                              <br>
                              <input type="file" class="form-control" name="LED2">
                            </div>

                            <div class="md-4 my-3">
                              <label class="form-label" for="">Wind mill</label>
                              <input type="file" class="form-control" name="Wind1">
                              <br>
                              <input type="file" class="form-control" name="Wind2">
                            </div>

                            <div class="md-4 my-3">
                              <label class="form-label" for="">Any other clean green energy</label>
                              <input type="file" class="form-control" name="other1">
                              <br>
                              <input type="file" class="form-control" name="other2">
                            </div>

                            <div class="md-4 my-3">
                              <label class="form-label">Rain water harvesting</label>
                              <input type="file" class="form-control" name="harvesting1">
                              <br>
                              <input type="file" class="form-control" name="harvesting2">
                            </div>

                            <div class="md-4 my-3">
                              <label class="form-label" for="">Borewell /Open well recharge</label>
                              <input type="file" class="form-control" name="recharge1">
                              <br>
                              <input type="file" class="form-control" name="recharge2">
                            </div>

                            <div class="md-4 my-3">
                              <label class="form-label" for="">Construction of tanks and bunds</label>
                              <input type="file" class="form-control" name="bunds1">
                              <br>
                              <input type="file" class="form-control" name="bunds2">
                            </div>

                            <div class="md-4 my-3">
                              <label class="form-label" for="">Waste water recycling</label>
                              <input type="file" class="form-control" name="recycling1">
                              <br>
                              <input type="file" class="form-control" name="recycling2">
                            </div>

                            <div class="md-4 my-3">
                              <label class="form-label" for="">Maintenance of water bodies and distribution system in the campus</label>
                              <input type="file" class="form-control" name="campus1">
                              <br>
                              <input type="file" class="form-control" name="campus2">
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