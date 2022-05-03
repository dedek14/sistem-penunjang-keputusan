
<?php

    $idkaryawan=hapus_kutip($_GET['idkaryawan']);

    $karyawan = mysqli_query($conn, "SELECT * FROM karyawan, devisi WHERE idkaryawan='$idkaryawan' AND id_devisi=iddevisi");
    $t_karyawan = mysqli_fetch_assoc($karyawan) ;
?>


 <div class="main-panel">
  <div class="content-wrapper">
    
    <!-- Quick Action Toolbar Starts-->
    <div class="row quick-action-toolbar">
      <div class="col-md-9 grid-margin">
        <div class="card">
          <div class="card-header d-block d-md-flex">
            <h5 class="mb-0">Edit Data Karyawan</h5>
          </div>
        </div>

         <div class="card">
          <div class="card-body">
      
                   
              <form class="forms-sample" method="post" enctype="multipart/form-data">
                <?php
                  if (isset($_POST['simpan'])){
                    $nama_karyawan       =   $_POST['nama_karyawan'];
                    $tempat_lahir       =   $_POST['tempat_lahir'];
                    $tanggal_lahir       =   $_POST['tanggal_lahir'];
                    $jk       =   $_POST['jk'];
                    $alamat       =   $_POST['alamat'];
                    $pendidikan       =   $_POST['pendidikan'];
                    $tanggal_masuk       =   $_POST['tanggal_masuk'];
                    $no_telepon       =   $_POST['no_telepon'];
                    $id_devisi       =   $_POST['id_devisi'];



                      $sql = "UPDATE karyawan SET nama_karyawan='$nama_karyawan', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', jk='$jk', alamat='$alamat', pendidikan='$pendidikan', tanggal_masuk='$tanggal_masuk', no_telepon='$no_telepon', id_devisi='$id_devisi' WHERE idkaryawan='$idkaryawan'";
                            mysqli_query($conn, $sql);


                       

                    $_SESSION['ctt'] = "Berhasil Mengedit Data";
                    echo"<script>window.location.href='data-karyawan';</script>";
                  }

                  ?>

                <div class="form-group row">
                  <label  class="col-sm-3 col-form-label">Nama Karyawan</label>
                  <div class="col-sm-8">
                    <input type="text" name="nama_karyawan" class="form-control" placeholder="Nama Karyawan" required="" value="<?= $t_karyawan['nama_karyawan'] ?>">
                  </div>
                </div>

                 <div class="form-group row">
                  <label  class="col-sm-3 col-form-label">Tempat Lahir</label>
                  <div class="col-sm-8">
                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required="" value="<?= $t_karyawan['tempat_lahir'] ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label  class="col-sm-3 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-8">
                    <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" required="" value="<?= $t_karyawan['tanggal_lahir'] ?>">
                  </div>
                </div>




                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-8">
                    <select class="form-control" name="jk" required="">
                      <option value="">Pilih</option>
                      <option value="Laki-Laki" <?php if($t_karyawan['jk']=='Laki-Laki') echo "selected"; ?>>Laki-Laki</option>
                      <option value="Perempuan" <?php if($t_karyawan['jk']=='Perempuan') echo "selected"; ?>>Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Alamat</label>
                  <div class="col-sm-8">
                    <input type="text" name="alamat" class="form-control" placeholder="Alamat" required="" value="<?= $t_karyawan['alamat'] ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Pendidikan </label>
                  <div class="col-sm-8">
                   <select class="form-control" name="pendidikan" required="">
                      <option value="">Pilih Pendidikan</option>
                      <option value="SMA Sederajat" <?php if($t_karyawan['pendidikan']=='SMA Sederajat') echo "selected"; ?>>SMA Sederajat</option>
                      <option value="SI Sederajat" <?php if($t_karyawan['pendidikan']=='DIII Sederajat') echo "selected"; ?>>DIII Sederajat</option>

                      <option value="SI Sederajat" <?php if($t_karyawan['pendidikan']=='SI Sederajat') echo "selected"; ?>>SI Sederajat</option>
                      <option value="SII Sederajat" <?php if($t_karyawan['pendidikan']=='SII Sederajat') echo "selected"; ?>>SII Sederajat</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nomor Telepon</label>
                  <div class="col-sm-8">
                    <input type="number" name="no_telepon" class="form-control"  placeholder="Nomor Handphone" required="" value="<?= $t_karyawan['no_telepon'] ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Tanggal Masuk</label>
                  <div class="col-sm-8">
                    <input type="date" name="tanggal_masuk" class="form-control"  placeholder="Tanggal Masuk" required="" value="<?= $t_karyawan['tanggal_masuk'] ?>">
                  </div>
                </div>

                

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Devisi</label>
                  <div class="col-sm-8">
                    <select class="form-control" name="id_devisi" required="">
                      <option value="">Pilih Devisi</option>

                      <?php 

                        $devisi = mysqli_query($conn, "SELECT * FROM devisi");
                        while($t_devisi = mysqli_fetch_assoc($devisi)) {
                      ?>

                      <option value="<?= $t_devisi['iddevisi'] ?>" <?php if($t_devisi['iddevisi']==$t_karyawan['id_devisi']) echo "selected"; ?>><?= $t_devisi['nama_devisi'] ?></option>

                    <?php }?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-8">
                     <button type="submit" name="simpan" class="btn btn-sm btn-success mr-2">Simpan</button>
                     <a href="data-karyawan" class="btn btn-sm btn-dark">Kembali</a>
                  </div>
                </div>


            </form>
                
        
          </div>
        </div>


      </div>
    </div>
    <!-- Quick Action Toolbar Ends-->
  </div>