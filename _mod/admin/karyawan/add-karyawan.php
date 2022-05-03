 <div class="main-panel">
  <div class="content-wrapper">
    
    <!-- Quick Action Toolbar Starts-->
    <div class="row quick-action-toolbar">
      <div class="col-md-9 grid-margin">
        <div class="card">
          <div class="card-header d-block d-md-flex">
            <h5 class="mb-0">Input Data Karyawan</h5>
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
                 
                   
                    $sql = "INSERT INTO karyawan (nama_karyawan, tempat_lahir, tanggal_lahir, jk, alamat, pendidikan, tanggal_masuk, no_telepon, id_devisi) VALUES ('$nama_karyawan', '$tempat_lahir', '$tanggal_lahir', '$jk', '$alamat', '$pendidikan', '$tanggal_masuk', '$no_telepon', '$id_devisi')";
                    mysqli_query($conn, $sql);

                     

                    $_SESSION['ctt'] = "Berhasil Menyimpan Data";
                    echo"<script>window.location.href='data-karyawan';</script>";
                  }

                  ?>

                <div class="form-group row">
                  <label  class="col-sm-3 col-form-label">Nama Karyawan</label>
                  <div class="col-sm-8">
                    <input type="text" name="nama_karyawan" class="form-control" placeholder="Nama Karyawan" required="">
                  </div>
                </div>

                <div class="form-group row">
                  <label  class="col-sm-3 col-form-label">Tempat Lahir</label>
                  <div class="col-sm-8">
                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required="">
                  </div>
                </div>

                <div class="form-group row">
                  <label  class="col-sm-3 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-8">
                    <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" required="">
                  </div>
                </div>


                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-8">
                    <select class="form-control" name="jk" required="">
                      <option value="">Pilih</option>
                      <option value="Laki-Laki">Laki-Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Alamat</label>
                  <div class="col-sm-8">
                    <input type="text" name="alamat" class="form-control" placeholder="Alamat" required="">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Pendidikan </label>
                  <div class="col-sm-8">
                   <select class="form-control" name="pendidikan" required="">
                      <option value="">Pilih Pendidikan</option>
                      <option value="SMA Sederajat">SMA Sederajat</option>
                      <option value="DII Sederajat">DII Sederajat</option>
                      <option value="SI Sederajat">SI Sederajat</option>
                      <option value="SII Sederajat">SII Sederajat</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nomor Telepon</label>
                  <div class="col-sm-8">
                    <input type="number" name="no_telepon" class="form-control"  placeholder="Nomor Handphone" required="">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Tanggal Masuk</label>
                  <div class="col-sm-8">
                    <input type="date" name="tanggal_masuk" class="form-control"  placeholder="Tanggal Masuk" required="">
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

                      <option value="<?= $t_devisi['iddevisi'] ?>"><?= $t_devisi['nama_devisi'] ?></option>

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