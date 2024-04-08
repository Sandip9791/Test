<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modern College Ganeshkhind Pune </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>

</head>

<body>

  <style>
    .navbar-nav .nav-link {
      color: white;
    }

    .dropend .dropdown-toggle:hover {
      color: white;
      margin-left: 1em;
      transition-delay: 4s;
      transition: width 4s, height 4s, transform 4s;
    }

    .dropdown-item:hover {
      background-color: blue;
      color: #fff;
    }

    .dropdown .dropdown-menu {
      display: none;
      transition: width 4s, height 4s, transform 4s;
    }

    .dropdown:hover>.dropdown-menu,
    .dropend:hover>.dropdown-menu {
      display: block;
      margin-top: 0.125em;
      margin-left: 0.125em;
      transition-delay: 4s;
    }

    @media screen and (min-width: 769px) {
      .dropend:hover>.dropdown-menu {
        position: absolute;
        top: 0;
        left: 100%;
      }

      .dropend .dropdown-toggle {
        margin-left: 0.5em;
        transition-duration: 4s;
      }
    }
  </style>


  <div>
    <img class="border border-light-subtle border-3" style="width: 100%; height:auto;" src="<?= base_url('assets/images/modern_Logo_0_6.png'); ?>" />
  </div>

  <nav class="navbar  bg-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?= base_url('committeesProf')?>">MIRROR</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
            <form class="d-flex" method="Post" action="<?= base_url('committeeLogout') ?>">
              <label class="btn btn-outline-light rounded-pill mx-4" title="Login Profile">Username: <?php $session = \Config\Services::session(); $myusername = $session->get('committee_user'); echo $myusername; ?></label>
              <input type="submit" value="Logout" class="btn btn-outline-danger">
            </form>
          </div>
        </div>
  </nav>

  <?= $this->renderSection("Content"); ?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>