 <div class="main-panel">
  <div class="content-wrapper">
    
    <!-- Quick Action Toolbar Starts-->
    <div class="row quick-action-toolbar">
      <div class="col-md-12 grid-margin">
        <div class="card">
          <div class="card-header d-block d-md-flex">
            <h5 class="mb-0">Data Kriteria Penilaian</h5>
          </div>
        </div>

         <div class="card">
          <div class="card-body">
            <div class="d-sm-flex align-items-center mb-4">
              <h4 class="card-title mb-sm-0">
              <a href="add-kriteria"  class="btn btn-outline-success btn-sm">+ Kriteria</a></h4>
              
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
                    <th class="font-weight-bold">Nama Kriteria</th>
                    <th class="font-weight-bold">Bobot (%)</th>
                    <th class="font-weight-bold" style="width: 120px;text-align: center;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      $no=1; 
                      $kriteria = mysqli_query($conn, "SELECT * FROM kriteria");
                      while($t_kriteria = mysqli_fetch_assoc($kriteria)) {
                    ?>

                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $t_kriteria['nama_kriteria'] ?></td>
                    <td><?= $t_kriteria['bobot'] ?></td>
                   
                    <td align="center">

                      <a href="add-subkriteria&idkriteria=<?= $t_kriteria['idkriteria'] ?>" class="badge badge-success p-2">+ Subkriteria</a>

                      <a href="edit-kriteria&idkriteria=<?= $t_kriteria['idkriteria'] ?>" class="badge badge-dark p-2">Edit</a>
                      <a href="_mod/admin/kriteria/delete-kriteria.php?idkriteria=<?=$t_kriteria['idkriteria'] ?>" class="badge badge-danger p-2" title="Hapus" onclick="return confirm('Anda yakin ingin menghapus data ini ?')">Hapus</a>
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