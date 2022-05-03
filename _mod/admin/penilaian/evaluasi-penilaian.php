 <?php
      $kriteriass = mysqli_query($conn, "SELECT COUNT(idkriteria) AS jumlah FROM kriteria");
      $t_kriteriass = mysqli_fetch_assoc($kriteriass);

      $jumlahkriteria=$t_kriteriass['jumlah'];

      $jumlahkriterias=$t_kriteriass['jumlah']+2;



 ?>

 <div class="main-panel">
  <div class="content-wrapper">
    
    <!-- Quick Action Toolbar Starts-->
    <div class="row quick-action-toolbar">
      <div class="col-md-12 grid-margin">
        <div class="card">
          <div class="card-header d-block d-md-flex">
            <h5 class="mb-0">Evaluasi Penilaian Karyawan</h5>
          </div>
        </div>

         <div class="card">
          <div class="card-body">
            <div class="d-sm-flex align-items-center mb-4">
              <h4 class="card-title mb-sm-0">
              </h4>
            </div>

             <h4 style="color: green">TAHAP ANALISA</h4>
             <hr>

            <div class="table-responsive border rounded p-1">
              <table class="table">
                <thead>
                  <tr style="text-align: center;">
                    <th class="font-weight-bold" rowspan="2">No</th>
                    <th class="font-weight-bold" rowspan="2">Nama Karyawan</th>
                    <th class="font-weight-bold" rowspan="2">Devisi</th>
                    <th class="font-weight-bold" colspan="<?= $jumlahkriteria ?>">Kriteria Penilaian</th>
                    
                  </tr>

                  <tr style="text-align: center;">
                    <?php

                    $kriteria = mysqli_query($conn, "SELECT * FROM kriteria ORDER BY idkriteria ASC");
                      while($t_kriteria = mysqli_fetch_assoc($kriteria)) { ?>

                      <th><?= $t_kriteria['nama_kriteria'] ?></th>

                    <?php }?>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      $no=1; 
                      $karyawan = mysqli_query($conn, "SELECT * FROM karyawan, devisi, penilaian WHERE id_devisi=iddevisi AND idkaryawan=id_karyawan");
                      while($t_karyawan = mysqli_fetch_assoc($karyawan)) {


                    ?>

                  <tr style="text-align: center;">
                    <td><?= $no++ ?></td>
                    <td>
                       <?= $t_karyawan['nama_karyawan'] ?>
                    </td>
                    <td><?= $t_karyawan['nama_devisi'] ?></td>
                   
                        <?php 
                             
                              $sub = mysqli_query($conn, "SELECT * FROM kriteria, sub_kriteria, detail_penilaian WHERE idkriteria=id_kriteria AND idsub_kriteria=id_subkriteria AND id_penilaian='$t_karyawan[idpenilaian]' ORDER BY idkriteria ASC");
                              while($t_sub = mysqli_fetch_assoc($sub)) {
                            ?>
                            <td>
                                <?= $t_sub['nama_subkriteria'] ?>

                            </td>
                        <?php } ?>


                   
                  </tr>

                <?php }?>
                 
                </tbody>
              </table>
            </div>

            <br>

            <br>


            <h4 style="color: red">TAHAP NORMALISASI</h4>
             <hr>

            <div class="table-responsive border rounded p-1">
              <table class="table">
                <thead>
                  <tr style="text-align: center;">
                    <th class="font-weight-bold" rowspan="2">No</th>
                    <th class="font-weight-bold" rowspan="2">Nama Karyawan</th>
                    <th class="font-weight-bold" rowspan="2">Devisi</th>
                    <th class="font-weight-bold" colspan="<?= $jumlahkriteria ?>">Kriteria Penilaian</th>
                    
                  </tr>

                  <tr style="text-align: center;">
                    <?php

                    $kriteria = mysqli_query($conn, "SELECT * FROM kriteria ORDER BY idkriteria ASC");
                      while($t_kriteria = mysqli_fetch_assoc($kriteria)) { ?>

                      <th><?= $t_kriteria['nama_kriteria'] ?></th>

                    <?php }?>
                  </tr>
                </thead>


                <tbody>
                  <?php 
                      $no=1; 
                      $karyawan = mysqli_query($conn, "SELECT * FROM karyawan, devisi, penilaian WHERE id_devisi=iddevisi AND idkaryawan=id_karyawan");
                      while($t_karyawan = mysqli_fetch_assoc($karyawan)) {

                           

                    ?>

                  <tr style="text-align: center;">
                    <td><?= $no++ ?></td>
                    <td>
                       <?= $t_karyawan['nama_karyawan'] ?>
                    </td>
                    <td><?= $t_karyawan['nama_devisi'] ?></td>
                   
                        <?php 
                             
                              $kriteria = mysqli_query($conn, "SELECT * FROM kriteria ORDER BY idkriteria ASC");
                              while($t_kriteria = mysqli_fetch_assoc($kriteria)) {

                               
                                 $detailpenilaian = mysqli_query($conn, "SELECT * FROM detail_penilaian, sub_kriteria WHERE  id_subkriteria=idsub_kriteria AND id_kriteria='$t_kriteria[idkriteria]' AND id_penilaian='$t_karyawan[idpenilaian]'  ");
                                $t_detailpenilaian = mysqli_fetch_assoc($detailpenilaian);



                                // Mencari Nilai Maksimal

                                $maksimal = mysqli_query($conn, "SELECT MAX(nilai) AS nilai FROM detail_penilaian, sub_kriteria WHERE  id_subkriteria=idsub_kriteria AND id_kriteria='$t_kriteria[idkriteria]'  GROUP BY id_kriteria ");
                                $t_maksimal = mysqli_fetch_assoc($maksimal);


                            ?>
                            <td>
                                <?= $t_detailpenilaian['nilai']/$t_maksimal['nilai'] ?> <br>



                            </td>
                        <?php } ?>


                   
                  </tr>



                <?php }?>

             
                </tbody>
              </table>
            </div>


            <br><br>


              <h4 style="color: #920808">TAHAP PERANGKINGAN</h4>
             <hr>

              
            <form action="" method="post" enctype="multipart/form-data">

            <div class="table-responsive border rounded p-1">
              <table class="table">
                <thead>
                  <tr style="text-align: center;">
                    <th class="font-weight-bold" rowspan="2">No</th>
                    <th class="font-weight-bold" rowspan="2">Nama Karyawan</th>
                    <th class="font-weight-bold" rowspan="2">Devisi</th>
                    <th class="font-weight-bold" colspan="<?= $jumlahkriteria ?>">Kriteria Penilaian</th>
                    <th>Total</th>
                    
                  </tr>

                  <tr style="text-align: center;">
                    <?php

                    $kriteria = mysqli_query($conn, "SELECT * FROM kriteria ORDER BY idkriteria ASC");
                      while($t_kriteria = mysqli_fetch_assoc($kriteria)) { ?>

                      <th><?= $t_kriteria['nama_kriteria'] ?> (<?= $t_kriteria['bobot'] ?> %)</th>

                    <?php }?>
                  </tr>
                </thead>


                <tbody>
                  <?php 
                      $no=1; 
                      $karyawan = mysqli_query($conn, "SELECT * FROM karyawan, devisi, penilaian WHERE id_devisi=iddevisi AND idkaryawan=id_karyawan");
                      while($t_karyawan = mysqli_fetch_assoc($karyawan)) {

                           

                    ?>

                  <tr style="text-align: center;">
                    <td><?= $no++ ?></td>
                    <td>
                       <?= $t_karyawan['nama_karyawan'] ?>
                    </td>
                    <td><?= $t_karyawan['nama_devisi'] ?></td>
                   
                        <?php 
                             
                              $kriteria = mysqli_query($conn, "SELECT * FROM kriteria ORDER BY idkriteria ASC");
                              while($t_kriteria = mysqli_fetch_assoc($kriteria)) {

                               
                                 $detailpenilaian = mysqli_query($conn, "SELECT * FROM detail_penilaian, sub_kriteria WHERE  id_subkriteria=idsub_kriteria AND id_kriteria='$t_kriteria[idkriteria]' AND id_penilaian='$t_karyawan[idpenilaian]'  ");
                                $t_detailpenilaian = mysqli_fetch_assoc($detailpenilaian);

                                // Mencari Nilai Maksimal

                                $maksimal = mysqli_query($conn, "SELECT MAX(nilai) AS nilai FROM detail_penilaian, sub_kriteria WHERE  id_subkriteria=idsub_kriteria AND id_kriteria='$t_kriteria[idkriteria]'  GROUP BY id_kriteria ");
                                $t_maksimal = mysqli_fetch_assoc($maksimal);


                                 $total=$t_detailpenilaian['nilai']/$t_maksimal['nilai']*$t_kriteria['bobot'];

                                $tot[]= $t_detailpenilaian['nilai']/$t_maksimal['nilai']*$t_kriteria['bobot'];





                            ?>
                            <td>
                                <?= $t_detailpenilaian['nilai']/$t_maksimal['nilai']*$t_kriteria['bobot'] ?> <br>



                            </td>
                        <?php } ?>

                        <td>
                           <?php
                                 if(!empty($totals))
                                    {
                                        $total_sebelumnya=$totals;
                                    }else{
                                        $total_sebelumnya=0;
                                    }

                                     if(!empty($tot))
                                       {
                                        $totals=array_sum($tot);
                                       echo  $total=$totals-$total_sebelumnya;

                                    }

                                 ?>

                                 <?php
                                        if (isset($_POST['simpan'])){
                                       
                                        
                                             $sql = "UPDATE  penilaian SET status_penilaian='Sukses', total_penilaian='$total'  WHERE idpenilaian='$t_karyawan[idpenilaian]'";
                                             mysqli_query($conn, $sql);

                                            
                                             // echo"<script>window.location.href='proses-perengkingan';</script>";
                                        }
                                    ?>


                                 <input type="hidden" name="total_penilaian" value="<?= $total ?>">
                        </td>


                   
                  </tr>



                <?php }?>
                <tr>
                  <td colspan="<?= $jumlahkriterias ?>"></td>
                  <td colspan="2"><input type="submit" name="simpan" class="btn btn-danger btn-sm" value="Proses Perangkingan"></td>
                </tr>
             
                </tbody>
              </table>
            </div>
          </form>

        
          </div>
        </div>


      </div>
    </div>
    <!-- Quick Action Toolbar Ends-->
  </div>