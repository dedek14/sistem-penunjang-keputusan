<?php 
    $idkaryawan=$_GET['idkaryawan'];


    $karyawan = mysqli_query($conn, "SELECT * FROM karyawan, devisi WHERE iddevisi=id_devisi AND idkaryawan=$idkaryawan");
    $t_karyawan = mysqli_fetch_assoc($karyawan) ;

   

?>



 <div class="main-panel">
  <div class="content-wrapper">
    
    <!-- Quick Action Toolbar Starts-->
    <div class="row quick-action-toolbar">
      <div class="col-md-10 grid-margin">
        <div class="card">
          <div class="card-header d-block d-md-flex">
            <h5 class="mb-0">Input Data Penilaian Karyawan</h5>
          </div>
        </div>

         <div class="card">
          <div class="card-body">
      
                   
              <form action="_mod/admin/penilaian/simpan-penilaian.php" class="forms-sample" method="post" enctype="multipart/form-data">
                

                <div class="form-group row">
                  <label  class="col-sm-3 col-form-label">Nama Karyawan</label>
                 
                  <label  class="col-sm-3 col-form-label"><?= $t_karyawan['nama_karyawan'] ?></label>
                   

                </div>

                <div class="form-group row" style="margin-top: -35px">
                  <label class="col-sm-3 col-form-label">Pendidikan</label>
                  
                  <label  class="col-sm-8 col-form-label"><?= $t_karyawan['pendidikan'] ?></label>
                
                </div>

                <div class="form-group row" style="margin-top: -35px">
                  <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                  
                  <label  class="col-sm-8 col-form-label"><?= $t_karyawan['jk'] ?></label>
                
                </div>

                <div class="form-group row" style="margin-top: -35px">
                  <label class="col-sm-3 col-form-label">Tanggal Masuk</label>
                  
                  <label  class="col-sm-8 col-form-label"><?= date('d-m-Y', strtotime($t_karyawan['tanggal_masuk'])) ?></label>
                
                </div>



                <div class="form-group row" style="margin-top: -35px">
                  <label class="col-sm-3 col-form-label">Devisi</label>
                  
                  <label  class="col-sm-8 col-form-label"><?= $t_karyawan['nama_devisi'] ?></label>
                
                </div>


                

               


          <div class="form-group row">
            <label class="col-sm-3 col-form-label"></label>
            <div class="col-sm-8">
              
              <div class="table-responsive border rounded p-1">
              <table class="table">
                <thead>
                  <tr>
                  
                    <th class="font-weight-bold">Nama Kriteria</th>
                    <th class="font-weight-bold">Nilai</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      $no=1; 
                   
                      $kriteria = mysqli_query($conn, "SELECT * FROM kriteria");
                      while($t_kriteria = mysqli_fetch_assoc($kriteria)) {

                    ?>

                  <tr>
                   
                    <td>
                      <?= $t_kriteria['nama_kriteria'] ?>
                    </td>
                    <td>
                        <select required="" name="id_subkriteria[<?= $t_kriteria['idkriteria']?>]" class="form-control" style="background-color: #181825">
                          <option value="">Pilih</option>
                          <?php 
                             
                              $sub = mysqli_query($conn, "SELECT * FROM sub_kriteria WHERE id_kriteria='$t_kriteria[idkriteria]'");
                              while($t_sub = mysqli_fetch_assoc($sub)) {
                            ?>

                          <option value="<?= $t_sub['idsub_kriteria'] ?>"><?= $t_sub['nama_subkriteria'] ?></option>

                        <?php } ?>
                        </select>
                    </td>
                  
                    
                  </tr>

                <?php }?>
                 
                </tbody>
              </table>
            </div>
            </div>
          </div>

           <div class="form-group row">
                  <label class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-8">

                    <input type="hidden" name="id_karyawan" value="<?= $idkaryawan ?>">
                     <button type="submit" name="proses" class="btn btn-sm btn-success mr-2">Simpan Penilaian</button>
                      <a href="data-penilaian" class="btn btn-sm btn-danger mr-2">Kembali</a>
                   
                  </div>
                </div>


          </form>

         

          </div>
        </div>


      </div>
    </div>
    <!-- Quick Action Toolbar Ends-->
  </div>