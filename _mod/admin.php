


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $judul ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="_aset/admin/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="_aset/admin/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="_aset/admin/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="_aset/admin/vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="_aset/admin/vendors/chartist/chartist.min.css">

     <link rel="stylesheet" href="_aset/admin/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="_aset/admin/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="_aset/admin/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="_img/logo.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="navbar-brand brand-logo" href="<?= $webserver ?>" style="color: red; font-size:18px">
            <b>PT. GUDANG GARAM</b>
          </a>
          <a class="navbar-brand brand-logo-mini" href="<?= $webserver ?>"><img src="_aset/admin/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Selamat Datang <?= $sessionlogin['nama_user'] ?>!</h5>
          <ul class="navbar-nav navbar-nav-right ml-auto">
           
           
            
            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle ml-2" src="_img/user/<?= $sessionlogin['foto'] ?>" alt="Profile image"> <span class="font-weight-normal"> <?= $sessionlogin['nama_user'] ?> </span></a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="_img/user/<?= $sessionlogin['foto'] ?>" alt="Profile image" style="width: 100px">
                  <p class="mb-1 mt-3"><?= $sessionlogin['nama_user'] ?></p>
                  <p class="font-weight-light text-muted mb-0"><?= $sessionlogin['jabatan'] ?></p>
                </div>
                <a class="dropdown-item" href="profil-saya"><i class="dropdown-item-icon icon-user text-primary"></i> Profil Saya</a>
                
                <a href="_mod/login/logout.php" class="dropdown-item"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>

      <div class="container-fluid page-body-wrapper">

        <?php
        include "_inc/menu-admin.php";
        include "_inc/panggil-admin.php";
        ?>
      <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © <?= $judul ?> 2021</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">  <a href="#"><?= $judul ?></a> From UPI YTPK</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="_aset/admin/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->

    <script src="_aset/admin/vendors/select2/select2.min.js"></script>

    <!-- Plugin js for this page -->
    <script src="_aset/admin/vendors/chart.js/Chart.min.js"></script>
    <script src="_aset/admin/vendors/moment/moment.min.js"></script>
    <script src="_aset/admin/vendors/daterangepicker/daterangepicker.js"></script>
    <script src="_aset/admin/vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="_aset/admin/js/off-canvas.js"></script>
    <script src="_aset/admin/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="_aset/admin/js/dashboard.js"></script>
    <!-- End custom js for this page -->

    <script src="_aset/admin/js/select2.js"></script>

  </body>
</html>