
<?php

    $iddevisi=hapus_kutip($_GET['iddevisi']);

    $devisi = mysqli_query($conn, "SELECT * FROM devisi WHERE iddevisi='$iddevisi'");
    $t_devisi = mysqli_fetch_assoc($devisi) ;
?>


 <div class="main-panel">
  <div class="content-wrapper">
    
    <!-- Quick Action Toolbar Starts-->
    <div class="row quick-action-toolbar">
      <div class="col-md-9 grid-margin">
        <div class="card">
          <div class="card-header d-block d-md-flex">
            <h5 class="mb-0">Edit Data Devisi/ Bagian </h5>
          </div>
        </div>

         <div class="card">
          <div class="card-body">
      
                   
              <form class="forms-sample" method="post">
                <?php
                  if (isset($_POST['simpan'])){
                    $nama_devisi       =   $_POST['nama_devisi'];
                 
                    $sql = "UPDATE devisi SET nama_devisi='$nama_devisi' WHERE iddevisi='$iddevisi'";
                    mysqli_query($conn, $sql);

                  

                    $_SESSION['ctt'] = "Berhasil Mengedit Data";
                    echo"<script>window.location.href='data-devisi';</script>";
                  }

                  ?>

                <div class="form-group row">
                  <label  class="col-sm-3 col-form-label">devisi </label>
                  <div class="col-sm-8">
                    <input type="text" name="nama_devisi" class="form-control" placeholder="devisi " required="" value="<?= $t_devisi['nama_devisi'] ?>">
                  </div>
                </div>
                

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-8">
                     <button type="submit" name="simpan" class="btn btn-sm btn-success mr-2">Simpan</button>
                     <a href="data-devisi" class="btn btn-sm btn-dark">Kembali</a>
                  </div>
                </div>


            </form>
                
        
          </div>
        </div>


      </div>
    </div>
    <!-- Quick Action Toolbar Ends-->
  </div>