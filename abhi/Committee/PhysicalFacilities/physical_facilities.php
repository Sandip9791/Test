<?= $this->extend('Layouts/committeeBase'); ?>
<?= $this->section("Content"); ?>

<h1 class="text-center">4.1.1</h1>

<div class="container-fluid" style="display:none" id="committees">
  <div id="form-container">
    <div class="container-fluid my-3 mx-2">
      <form class="row g-3 my-3" method="post" action="<?= base_url('save_physical_facilities') ?>" enctype="multipart/form-data" class="mx-3">
        <div class="col-md-4 ms-4 my-3">
          <label class="form-label">In which Academic Year you want to Store Data ? <label style="color: red;"></label></label>
          <input type="text" class="form-control" name="AcademicYear" placeholder="Enter Year" autocomplete="off" oninput="validateSubName()" required>
          <span id="" style="display:none;color:red;">Please enter a valid Subject Name.</span>
        </div>

        <table class="table table-hover table-bordered border border-primary border-4  my-3">
          <thead class="table-primary text-center">
            <tr>
              <th scope="col">Sr.No.</th>
              <th scope="col">Particulars</th>
              <th scope="col">Number/Document/Photo</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <tr>
              <th scope="row">1</th>
              <td>No. of Classrooms</td>
              <td><input type="number" class="form-control" name="no_classrooms"></td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>No. of Laborataries</td>
              <td><input type="number" class="form-control" name="no_laborataries"></td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>No. of Computers</td>
              <td><input type="number" class="form-control" name="no_computer"></td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>No. of Laptops</td>
              <td><input type="number" class="form-control" name="no_laptop"></td>
            </tr>
            <tr>
              <th scope="row">5</th>
              <td>No. of Printers</td>
              <td><input type="number" class="form-control" name="no_printers"></td>
            </tr>
            <tr>
              <th scope="row">6</th>
              <td>No. of Server</td>
              <td><input type="number" class="form-control" name="no_server"></td>
            </tr>
            <tr>
              <th scope="row">7</th>
              <td>No. of WIFI</td>
              <td><input type="number" class="form-control" name="no_wifi"></td>
            </tr>
            <tr>
              <th scope="row">8</th>
              <td>No. of Scanners</td>
              <td><input type="number" class="form-control" name="no_scanners"></td>
            </tr>
            <tr>
              <th scope="row">9</th>
              <td>No. of Smart boards</td>
              <td><input type="number" class="form-control" name="no_smartBoards"></td>
            </tr>
            <tr>
              <th scope="row">10</th>
              <td>No. of Smart Classrooms</td>
              <td><input type="number" class="form-control" name="no_smartClasses"></td>
            </tr>
            <tr>
              <th scope="row">11</th>
              <td>No. of Projectors</td>
              <td><input type="number" class="form-control" name="no_projector"></td>
            </tr>
            <tr>
              <th scope="row">12</th>
              <td>No. of Washrooms</td>
              <td><input type="number" class="form-control" name="no_washrooms"></td>
            </tr>
            <tr>
              <th scope="row">13</th>
              <td>No. of LR</td>
              <td><input type="number" class="form-control" name="no_lr"></td>
            </tr>
            <tr>
              <th scope="row">14</th>
              <td>Green Room</td>
              <td><input type="file" class="form-control" name="greenRoom"></td>
            </tr>
            <tr>
              <th scope="row">15</th>
              <td>Auditorium</td>
              <td><input type="file" class="form-control" name="auditorium"></td>
            </tr>
            <tr>
              <th scope="row">16</th>
              <td>Open Theater</td>
              <td><input type="file" class="form-control" name="openTheater"></td>
            </tr>
            <tr>
              <th scope="row">17</th>
              <td>Record Room</td>
              <td><input type="file" class="form-control" name="recordRoom"></td>
            </tr>
            <tr>
              <th scope="row">18</th>
              <td>Yoga & Meditation Hall</td>
              <td><input type="file" class="form-control" name="yogaMeditationHall"></td>
            </tr>
            <tr>
              <th scope="row">19</th>
              <td>Gym</td>
              <td><input type="file" class="form-control" name="gym"></td>
            </tr>
            <tr>
              <th scope="row">20</th>
              <td>Open Gym</td>
              <td><input type="file" class="form-control" name="openGym"></td>
            </tr>
            <tr>
              <th scope="row">21</th>
              <td>Fire Extinguisher </td>
              <td><input type="number" class="form-control" name="fireExtingusher"></td>
            </tr>
            <tr>
              <th scope="row">22</th>
              <td>Generator</td>
              <td>
                  <label class="form-label">Bill Details :</label><input type="file" class="form-control" name="generatorBill">
                    <br>
                  <label class="form-label">AMC Details :</label><input type="file" class="form-control" name="generatorAMC">
               </td>
            </tr>
            <tr>
              <th scope="row">23</th>
              <td>Filter Cooler</td>
              <td><input type="number" class="form-control" name="filterCooler"></td>
            </tr>
            <tr>
              <th scope="row">24</th>
              <td>Ramps</td>
              <td><input type="file" class="form-control" name="ramps"></td>
            </tr>
            <tr>
              <th scope="row">25</th>
              <td>Lift</td>
              <td><input type="file" class="form-control" name="lift"></td>
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
        <th scope="col" colspan="25">Number/Document/Photo</th>

        <th scope="col" colspan="2">Action</th>
      </tr>
      <tr>
        <th></th>
        <th scope="col">No. of Classrooms</th>
        <th scope="col">No. of Laborataries</th>
        <th scope="col">No. of Computers</th>
        <th scope="col">No. of Laptops</th>
        <th scope="col">No. of Printers</th>
        <th scope="col">No. of Server</th>
        <th scope="col">No. of WIFI</th>
        <th scope="col">No. of Scanners</th>
        <th scope="col">No. of Smart boards</th>
        <th scope="col">No. of Smart Classrooms</th>
        <th scope="col">No. of Projectors</th>
        <th scope="col">No. of Washrooms</th>
        <th scope="col">No. of LR</th>
        <th scope="col">Green Room</th>
        <th scope="col">Auditorium</th>
        <th scope="col">Open Theater</th>
        <th scope="col">Record Room</th>
        <th scope="col">Yoga & Meditation Hall</th>
        <th scope="col">Gym</th>
        <th scope="col">Open Gym</th>
        <th scope="col">Fire Extinguisher</th>
        <th scope="col">Generator</th>
        <th scope="col">Filter Cooler</th>
        <th scope="col">Ramps</th>
        <th scope="col">Lift</th>
        <th scope="col">Delete</th>
        <th scope="col">Update</th>
      </tr>
    </thead>

    <?php if (isset($documents)) :
      $row = 1;
      foreach ($documents as $doc) :
        $book =  $doc->Committee_PF;
    ?>
        <tbody>
          <?php
          foreach ($book as $chapter) :
          ?>
            <tr>
              <th class="form-control text-center" scope="row"><?= $row++ ?></th>

              <td class="text-center"><?= $chapter->no_classrooms?> </td>
              <td class="text-center"><?= $chapter->no_laborataries?> </td>
              <td class="text-center"><?= $chapter->no_computer?> </td>
              <td class="text-center"><?= $chapter->no_laptop?> </td>
              <td class="text-center"><?= $chapter->no_printers?> </td>
              <td class="text-center"><?= $chapter->no_server?> </td>
              <td class="text-center"><?= $chapter->no_wifi?> </td>
              <td class="text-center"><?= $chapter->no_scanners?> </td>
              <td class="text-center"><?= $chapter->no_smartBoards?> </td>
              <td class="text-center"><?= $chapter->no_smartClasses?> </td>
              <td class="text-center"><?= $chapter->no_projector?> </td>
              <td class="text-center"><?= $chapter->no_washrooms?> </td>
              <td class="text-center"><?= $chapter->no_lr?> </td>

              <td class="text-center">
                <?php if (!empty($chapter->greenRoom)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->greenRoom; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>
              </td>

              <td class="text-center">
                <?php if (!empty($chapter->auditorium)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->auditorium; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>
              </td>

              <td class="text-center">
                <?php if (!empty($chapter->openTheater)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->openTheater; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>
              </td>

              <td class="text-center">
                <?php if (!empty($chapter->recordRoom)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->recordRoom; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>
              </td>

              <td class="text-center">
                <?php if (!empty($chapter->yogaMeditationHall)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->yogaMeditationHall; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>
              </td>

              <td class="text-center">
                <?php if (!empty($chapter->gym)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->gym; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>
              </td>

              <td class="text-center">
                <?php if (!empty($chapter->openGym)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->openGym; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>
              </td>

              <td class="text-center"><?= $chapter->fireExtingusher?> </td>

              <td class="text-center">

                  <b>Bill Details</b>
                <?php if (!empty($chapter->generatorBill)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->generatorBill; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>

                <br>

                <b>AMC Details </b>
                <?php if (!empty($chapter->generatorAMC)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->generatorAMC; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>

              </td>

              <td class="text-center"><?= $chapter->filterCooler?> </td>

              <td class="text-center">
                <?php if (!empty($chapter->ramps)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->ramps; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>
              </td>

              <td class="text-center">
                <?php if (!empty($chapter->lift)) : ?>
                  <a href="<?= base_url('Userfiles/Committee/') . $chapter->lift; ?>" download><img src="<?= base_url('assets/images/iconspdf.gif') ?>" width="33px"> <br>
                    <button class="btn btn-outline-success"> Download File </button>
                  </a>
                <?php else : ?>
                  <b> Not Found...</b>
                <?php endif; ?>
              </td>


              <td class="text-center">
                <form action="<?= base_url('delete_physical_facilities') ?>" method="post">
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
                        <form action="<?= base_url('update_physical_facilities') ?>" method="post" enctype="multipart/form-data">
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

                            <table class="table table-hover table-bordered border border-primary border-4  my-3">
                              <thead class="table-primary text-center">
                                  <tr>
                                    <th scope="col">Sr.No.</th>
                                    <th scope="col">Particulars</th>
                                    <th scope="col">Number/Document/Photo</th>
                                  </tr>
                              </thead>
                              <tbody class="text-center">
                                <tr>
                                  <th scope="row">1</th>
                                  <td>No. of Classrooms</td>
                                  <td><input type="number" class="form-control" name="no_classrooms" value="<?= $chapter->no_classrooms?>"></td>
                                </tr>
                                <tr>
                                  <th scope="row">2</th>
                                  <td>No. of Laborataries</td>
                                  <td><input type="number" class="form-control" name="no_laborataries" value="<?= $chapter->no_laborataries?>"></td>
                                </tr>
                                <tr>
                                  <th scope="row">3</th>
                                  <td>No. of Computers</td>
                                  <td><input type="number" class="form-control" name="no_computer" value="<?= $chapter->no_computer?>"></td>
                                </tr>
                                <tr>
                                  <th scope="row">4</th>
                                  <td>No. of Laptops</td>
                                  <td><input type="number" class="form-control" name="no_laptop" value="<?= $chapter->no_laptop?>"></td>
                                </tr>
                                <tr>
                                  <th scope="row">5</th>
                                  <td>No. of Printers</td>
                                  <td><input type="number" class="form-control" name="no_printers" value="<?= $chapter->no_printers?>"></td>
                                </tr>
                                <tr>
                                  <th scope="row">6</th>
                                  <td>No. of Server</td>
                                  <td><input type="number" class="form-control" name="no_server" value="<?= $chapter->no_classrooms?>"></td>
                                </tr>
                                <tr>
                                  <th scope="row">7</th>
                                  <td>No. of WIFI</td>
                                  <td><input type="number" class="form-control" name="no_wifi" value="<?= $chapter->no_wifi?>"></td>
                                </tr>
                                <tr>
                                  <th scope="row">8</th>
                                  <td>No. of Scanners</td>
                                  <td><input type="number" class="form-control" name="no_scanners" value="<?= $chapter->no_scanners?>"></td>
                                </tr>
                                <tr>
                                  <th scope="row">9</th>
                                  <td>No. of Smart boards</td>
                                  <td><input type="number" class="form-control" name="no_smartBoards" value="<?= $chapter->no_smartBoards?>"></td>
                                </tr>
                                <tr>
                                  <th scope="row">10</th>
                                  <td>No. of Smart Classrooms</td>
                                  <td><input type="number" class="form-control" name="no_smartClasses" value="<?= $chapter->no_smartClasses?>"></td>
                                </tr>
                                <tr>
                                  <th scope="row">11</th>
                                  <td>No. of Projectors</td>
                                  <td><input type="number" class="form-control" name="no_projector" value="<?= $chapter->no_projector?>"></td>
                                </tr>
                                <tr>
                                  <th scope="row">12</th>
                                  <td>No. of Washrooms</td>
                                  <td><input type="number" class="form-control" name="no_washrooms" value="<?= $chapter->no_washrooms?>"></td>
                                </tr>
                                <tr>
                                  <th scope="row">13</th>
                                  <td>No. of LR</td>
                                  <td><input type="number" class="form-control" name="no_lr" value="<?= $chapter->no_lr?>"></td>
                                </tr>
                                <tr>
                                  <th scope="row">14</th>
                                  <td>Green Room</td>
                                  <td><input type="file" class="form-control" name="greenRoom"></td>
                                </tr>
                                <tr>
                                  <th scope="row">15</th>
                                  <td>Auditorium</td>
                                  <td><input type="file" class="form-control" name="auditorium"></td>
                                </tr>
                                <tr>
                                  <th scope="row">16</th>
                                  <td>Open Theater</td>
                                  <td><input type="file" class="form-control" name="openTheater"></td>
                                </tr>
                                <tr>
                                  <th scope="row">17</th>
                                  <td>Record Room</td>
                                  <td><input type="file" class="form-control" name="recordRoom"></td>
                                </tr>
                                <tr>
                                  <th scope="row">18</th>
                                  <td>Yoga & Meditation Hall</td>
                                  <td><input type="file" class="form-control" name="yogaMeditationHall"></td>
                                </tr>
                                <tr>
                                  <th scope="row">19</th>
                                  <td>Gym</td>
                                  <td><input type="file" class="form-control" name="gym"></td>
                                </tr>
                                <tr>
                                  <th scope="row">20</th>
                                  <td>Open Gym</td>
                                  <td><input type="file" class="form-control" name="openGym"></td>
                                </tr>
                                <tr>
                                  <th scope="row">21</th>
                                  <td>Fire Extinguisher </td>
                                  <td><input type="number" class="form-control" name="fireExtingusher" value="<?= $chapter->fireExtingusher?>"></td>
                                </tr>
                                <tr>
                                  <th scope="row">22</th>
                                  <td>Generator</td>
                                  <td>
                                      <label class="form-label">Bill Details :</label><input type="file" class="form-control" name="generatorBill">
                                        <br>
                                      <label class="form-label">AMC Details :</label><input type="file" class="form-control" name="generatorAMC">
                                  </td>
                                </tr>
                                <tr>
                                  <th scope="row">23</th>
                                  <td>Filter Cooler</td>
                                  <td><input type="number" class="form-control" name="filterCooler" value="<?= $chapter->filterCooler?>"></td>
                                </tr>
                                <tr>
                                  <th scope="row">24</th>
                                  <td>Ramps</td>
                                  <td><input type="file" class="form-control" name="ramps"></td>
                                </tr>
                                <tr>
                                  <th scope="row">25</th>
                                  <td>Lift</td>
                                  <td><input type="file" class="form-control" name="lift"></td>
                                </tr>
                              </tbody>
                            </table>
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