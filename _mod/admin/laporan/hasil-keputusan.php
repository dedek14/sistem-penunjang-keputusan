 <div class="main-panel">
  <div class="content-wrapper">
    
    <!-- Quick Action Toolbar Starts-->
    <div class="row quick-action-toolbar">
      <div class="col-md-12 grid-margin">
        <div class="card">
          <div class="card-header d-block d-md-flex">
            <h5 class="mb-0">Laporan Hasil Keputusan</h5>
          </div>
        </div>

         <div class="card">
          <div class="card-body">
            <div class="d-sm-flex align-items-center mb-4">
              <h4 class="card-title mb-sm-0">
              <a href="_mod/admin/laporan/cetak-hasil.php"  class="btn btn-outline-success btn-sm" target="_blank">Cetak Laporan</a></h4>
              
            </div>

             
            <div class="table-responsive border rounded p-1">
              <table class="table">
                <thead>
                  <tr style="text-align: center;">
                    <th>No</th>
                      <th>Nama Karyawan</th>
                      <th>Tempat, Tanggal Lahir</th>
                      <th>Jenis Kelamin</th>
                      <th>Pendidikan</th>
                      <th>Nilai</th>
                      <th>Peringkat</th>
                   
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      $no=0; 
                      $po=0;
                      $da = mysqli_query($conn, "SELECT * FROM karyawan,penilaian WHERE idkaryawan=id_karyawan AND status_penilaian='Sukses'  ORDER BY total_penilaian DESC");
                      while($row = mysqli_fetch_assoc($da)) {
                        $no++;
                        $po++;

                    ?>

                    <tr style="text-align: center;">
                      <td><?= $no ?></td>
                      <td align="center"><?= $row['nama_karyawan'] ?></td>
                      <td><?= $row['tempat_lahir'] ?>, <?= date('d-m-Y', strtotime($row['tanggal_lahir'])) ?></td>
                      <td align="center"><?= $row['jk'] ?></td>
                      <td align="center"><?= $row['pendidikan'] ?></td>
                      <td><?= $row['total_penilaian'] ?></td>
                      <td><?= $no ?></td>

                     

                     
                    </tr>


                   
                    <?php }?>
                 
                </tbody>
              </table>
            </div>
        
          </div>
        </div>


      </div>
    </div>
    <!-- Quick Action Toolbar Ends-->
  </div>