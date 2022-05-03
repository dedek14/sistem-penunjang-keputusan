
<?php

  

    $user = mysqli_query($conn, "SELECT * FROM user WHERE iduser='$iduser'");
    $t_user = mysqli_fetch_assoc($user) ;
?>


 <div class="main-panel">
  <div class="content-wrapper">
    
    <!-- Quick Action Toolbar Starts-->
    <div class="row quick-action-toolbar">
      <div class="col-md-9 grid-margin">
        <div class="card">
          <div class="card-header d-block d-md-flex">
            <h5 class="mb-0">Profil Saya</h5>
          </div>
        </div>

         <div class="card">
          <div class="card-body">
      
                   
              <form class="forms-sample" method="post" enctype="multipart/form-data">
                <?php
                  if (isset($_POST['simpan'])){
                    $nama_user       =   $_POST['nama_user'];
                    $username       =   $_POST['username'];
                    $password       =   $_POST['password'];
                    $filename = $_FILES['foto']['name'];


                    if(empty($filename)){

                        $sql = "UPDATE user SET nama_user='$nama_user', username='$username', password='$password' WHERE iduser='$iduser'";
                        mysqli_query($conn, $sql);


                    } else if(!empty($filename)){
                         $sql = "UPDATE user SET nama_user='$nama_user', username='$username', password='$password', foto='$filename' WHERE iduser='$iduser'";
                        mysqli_query($conn, $sql);

                          move_uploaded_file($_FILES['foto']['tmp_name'], "_img/user/".$_FILES['foto']['name']);
                          
                        
                     }

                   
                    echo"<script>window.location.href='profil-saya';</script>";
                  }

                  ?>

                <div class="form-group row">
                  <label  class="col-sm-3 col-form-label">Nama </label>
                  <div class="col-sm-8">
                    <input type="text" name="nama_user" class="form-control" placeholder="Nama Kriteria" required="" value="<?= $t_user['nama_user'] ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Username</label>
                  <div class="col-sm-8">
                    <input type="text" name="username" class="form-control" placeholder="Username" required="" value="<?= $t_user['username'] ?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Password</label>
                  <div class="col-sm-8">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="" value="<?= $t_user['password'] ?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Foto</label>
                  <div class="col-sm-8">
                    <img src="_img/user/<?= $t_user['foto'] ?>" style="width: 120px; height: 140px">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Ganti Foto</label>
                  <div class="col-sm-8">
                    <input type="file" name="foto" class="form-control">
                  </div>
                </div>


                

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-8">
                     <button type="submit" name="simpan" class="btn btn-sm btn-success mr-2">Edit Profil</button>
                    
                  </div>
                </div>


            </form>
                
        
          </div>
        </div>


      </div>
    </div>
    <!-- Quick Action Toolbar Ends-->
  </div>