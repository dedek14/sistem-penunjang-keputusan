 <div class="main-panel">
  <div class="content-wrapper">
    
    <!-- Quick Action Toolbar Starts-->
    <div class="row quick-action-toolbar">
      <div class="col-md-12 grid-margin">
        <div class="card">
          <div class="card-header d-block d-md-flex">
            <h5 class="mb-0">Data Karyawan</h5>
          </div>
        </div>

         <div class="card">
          <div class="card-body">
            <div class="d-sm-flex align-items-center mb-4">
              <h4 class="card-title mb-sm-0">
              <a href="add-karyawan"  class="btn btn-outline-success btn-sm">+ Karyawan</a></h4>
              
            </div>

             <?php 
                     if(!empty($_SESSION['ctt'])) { ?>

                      <div class="alert alert-success">
                      <strong><?= $_SESSION['ctt'] ?></strong>
                    </div>

                   
                  <?php
                  }
                 ?>

                 <?php
                      //MENGOSONGKAN SESSION
                      $_SESSION['ctt']='';
                ?>

            <div class="table-responsive border rounded p-1">
              <table class="table">
                <thead>
                  <tr>
                    <th class="font-weight-bold">No</th>
                    <th class="font-weight-bold">Nama Karyawan</th>
                    <th class="font-weight-bold">Tempat, Tanggal Lahir</th>
                    <th class="font-weight-bold">Jenis Kelamin</th>
                    <th class="font-weight-bold">Alamat</th>
                    <th class="font-weight-bold">Pendidikan</th>
                    <th class="font-weight-bold">Keterangan</th>
                    <th class="font-weight-bold" style="width: 120px;text-align: center;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      $no=1; 
                      $karyawan = mysqli_query($conn, "SELECT * FROM karyawan, devisi WHERE id_devisi=iddevisi");
                      while($t_karyawan = mysqli_fetch_assoc($karyawan)) {
                    ?>

                  <tr>
                    <td><?= $no++ ?></td>
                    <td>
                       <?= $t_karyawan['nama_karyawan'] ?>
                    </td>
                    <td><?= $t_karyawan['tempat_lahir'] ?>, <?= date('d-m-Y', strtotime($t_karyawan['tanggal_lahir'])) ?></td>
                    <td><?= $t_karyawan['jk'] ?></td>
                    <td><?= $t_karyawan['alamat'] ?></td>
                    <td><?= $t_karyawan['pendidikan'] ?></td>
                    <td>
                      Tanggal Masuk : <?= date('d-m-Y', strtotime($t_karyawan['tanggal_masuk'])) ?><br>
                      No Telepon : <?= $t_karyawan['no_telepon'] ?><br>
                      Devisi : <?= $t_karyawan['nama_devisi'] ?><br>
                    </td>
                   
                    <td align="center">
                      <a href="edit-karyawan&idkaryawan=<?= $t_karyawan['idkaryawan'] ?>" class="badge badge-dark p-2">Edit</a>
                      <a href="_mod/admin/karyawan/delete-karyawan.php?idkaryawan=<?=$t_karyawan['idkaryawan'] ?>" class="badge badge-danger p-2" title="Hapus" onclick="return confirm('Anda yakin ingin menghapus data ini ?')">Hapus</a>
                    </td>
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