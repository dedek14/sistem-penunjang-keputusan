<?php 
    $idkaryawan=$_GET['idkaryawan'];
    $idpenilaian=$_GET['idpenilaian'];


    $karyawan = mysqli_query($conn, "SELECT * FROM karyawan, devisi WHERE iddevisi=id_devisi AND idkaryawan=$idkaryawan");
    $t_karyawan = mysqli_fetch_assoc($karyawan) ;

    $penilaian = mysqli_query($conn, "SELECT * FROM penilaian WHERE idpenilaian=$idpenilaian");
    $t_penilaian = mysqli_fetch_assoc($penilaian) ;

   

?>



 <div class="main-panel">
  <div class="content-wrapper">
    
    <!-- Quick Action Toolbar Starts-->
    <div class="row quick-action-toolbar">
      <div class="col-md-10 grid-margin">
        <div class="card">
          <div class="card-header d-block d-md-flex">
            <h5 class="mb-0">Detail Penilaian Karyawan</h5>
          </div>
        </div>

         <div class="card">
          <div class="card-body">
      
                   
            

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

                <div class="form-group row" style="margin-top: -35px">
                  <label class="col-sm-3 col-form-label">Tanggal Penilaian</label>
                  
                  <label  class="col-sm-8 col-form-label"><?= date('d-m-Y', strtotime($t_penilaian['tanggal_penilaian'])) ?></label>
                
                </div>



                

               


          <div class="form-group row">
           
            <div class="col-sm-11">
              
              <div class="table-responsive border rounded p-1">
              <table class="table">
                <thead>
                  <tr>
                  
                    <th class="font-weight-bold">Nama Kriteria</th>
                    <th class="font-weight-bold">Subkriteria</th>
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
                        <?php 
                             
                              $sub = mysqli_query($conn, "SELECT * FROM sub_kriteria, detail_penilaian WHERE id_kriteria='$t_kriteria[idkriteria]' AND idsub_kriteria=id_subkriteria AND id_penilaian='$idpenilaian'");
                              while($t_sub = mysqli_fetch_assoc($sub)) {
                            ?>
                            		<?= $t_sub['nama_subkriteria'] ?>
                        <?php } ?>
                    </td>
                    <td>
                    	<?php 
                             
                              $sub = mysqli_query($conn, "SELECT * FROM sub_kriteria, detail_penilaian WHERE id_kriteria='$t_kriteria[idkriteria]' AND idsub_kriteria=id_subkriteria AND id_penilaian='$idpenilaian'");
                              while($t_sub = mysqli_fetch_assoc($sub)) {
                            ?>
                            		<?= $t_sub['nilai'] ?>
                        <?php } ?>
                    </td>
                  
                    
                  </tr>

                <?php }?>
                 
                </tbody>
              </table>
            </div>
            </div>
          </div>

           <div class="form-group row">
                  <!-- <label class="col-sm-3 col-form-label"></label> -->
                  <div class="col-sm-8">

                  	<?php if($hak_akses=='Section Manager') {?>
                   
                      <a href="data-penilaian" class="btn btn-sm btn-danger mr-2">Kembali</a>

                  <?php }?>

                  <?php if($hak_akses=='Departemen Manager') {?>
                   
                      <a href="data-nilai" class="btn btn-sm btn-danger mr-2">Kembali</a>

                  <?php }?>

                   
                  </div>
                </div>


          </div>
        </div>


      </div>
    </div>
    <!-- Quick Action Toolbar Ends-->
  </div>