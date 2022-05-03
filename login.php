<?php
    include "_inc/kon.php";

    if(!empty($idadmin)){
        header("location:$webserver");
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $judul ?></title>
   
    <link rel="stylesheet" href="_aset/admin/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="_aset/admin/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="_aset/admin/vendors/css/vendor.bundle.base.css">
  
    <!-- Layout styles -->
    <link rel="stylesheet" href="_aset/admin/css/style.css">
    <link rel="shortcut icon" href="_img/logo.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                
                <h4 style="text-align: center;">SILAHKAN LOGIN</h4>
                <hr>
                <!-- <h6 class="font-weight-light">Silahkan Login.</h6> -->


                <?php 
                if(!empty($_SESSION['ctt'])){
                    ?>
                    <div class="alert alert-danger">
                        <?= $_SESSION['ctt'] ?>
                    </div>
                    <?php
                        }
                    ?>
              <form action="" method="post" class="pt-3">
                 <?php
                    if(isset($_POST['login'])){
                    $username=$_POST['username'];
                    $password=$_POST['password'];
                    
                  
                    $qcek = "SELECT iduser FROM user WHERE username='$username' AND password='$password'";
                    $cek = $conn->query($qcek);
                    $t_cek = $cek->fetch_assoc();

                    echo $id=$t_cek['iduser'];
                   
                   
                    if(!empty($id)){
                      $_SESSION['iduser'] = $id;
                     

                      header("location:$webserver");
                  }else{
                      $_SESSION['ctt'] = "USERNAME DAN PASSWORD SALAH";
                      header("location:login.php");
                  }

                  }
                  ?>

                 <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="exampleInputusername1" placeholder="Username" name="username" required="">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password" required="">
                  </div>
                  <div class="mt-3">
                    <input type="submit" name="login" class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn" value="LOGIN">
                  </div>
                 
             </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="_aset/admin/vendors/js/vendor.bundle.base.js"></script>
  
    <script src="_aset/admin/js/off-canvas.js"></script>
    <script src="_aset/admin/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>
<?
    mysqli_close($conn);
?>