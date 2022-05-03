<?php 
    $idkriteria=$_GET['idkriteria'];


    $kriteria = mysqli_query($conn, "SELECT * FROM kriteria WHERE idkriteria=$idkriteria");
    $t_kriteria = mysqli_fetch_assoc($kriteria) ;

   

?>



 <div class="main-panel">
  <div class="content-wrapper">
    
    <!-- Quick Action Toolbar Starts-->
    <div class="row quick-action-toolbar">
      <div class="col-md-10 grid-margin">
        <div class="card">
          <div class="card-header d-block d-md-flex">
            <h5 class="mb-0">Input Data Subkriteria</h5>
          </div>
        </div>

         <div class="card">
          <div class="card-body">
      
                   
              <form class="forms-sample" method="post" enctype="multipart/form-data">
                <?php
                  if (isset($_POST['simpan'])){
                    $nama_subkriteria       =   $_POST['nama_subkriteria'];
                    $nilai       =   $_POST['nilai'];
                    
                    $sql = "INSERT INTO sub_kriteria (id_kriteria, nama_subkriteria, nilai) VALUES ('$idkriteria', '$nama_subkriteria', '$nilai')";
                    mysqli_query($conn, $sql);

                   
                    $_SESSION['ctt'] = "Berhasil Menyimpan Data";
                    echo"<script>window.location.href='add-subkriteria&idkriteria=$idkriteria';</script>";
                  }

                  ?>

                <div class="form-group row">
                  <label  class="col-sm-3 col-form-label">Nama Kriteria</label>
                  <div class="col-sm-6">
                      <label  class="col-sm-3 col-form-label"><?= $t_kriteria['nama_kriteria'] ?></label>
                   
                    </select>


                  </div>
                </div>

                

                <div class="form-group row" style="margin-top: -25px">
                  <label class="col-sm-3 col-form-label">Bobot</label>
                  <div class="col-sm-6">
                    <label  class="col-sm-3 col-form-label"><?= $t_kriteria['bobot'] ?> %</label>
                  </div>
                </div>

                

                <div class="form-group row">
                  <label  class="col-sm-3 col-form-label">Nama Subkriteria</label>
                  <div class="col-sm-8">
                    <input type="text" name="nama_subkriteria" class="form-control" placeholder="Nama Subkriteria" required="">
                  </div>
                </div>
                <div class="form-group row" style="margin-top: -20px">
                  <label class="col-sm-3 col-form-label">Nilai</label>
                  <div class="col-sm-8">
                    <input type="number" name="nilai" class="form-control" placeholder="Nilai Subkriteria" required="" min="0" max="100">
                  </div>
                </div>


                <div class="form-group row">
                  <label class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-8">
                     <button type="submit" name="simpan" class="btn btn-sm btn-dark mr-2">Tambah</button>
                      <a href="data-kriteria" class="btn btn-sm btn-danger mr-2">Kembali</a>
                   
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-8">
                    
                    <div class="table-responsive border rounded p-1">
              <table class="table">
                <thead>
                  <tr>
                  
                    <th class="font-weight-bold">Nama Subkriteria</th>
                    <th class="font-weight-bold">Nilai</th>
                    <th class="font-weight-bold" style="width: 120px;text-align: center;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      $no=1; 
                      $subkriteria = mysqli_query($conn, "SELECT * FROM sub_kriteria WHERE id_kriteria='$idkriteria'");
                      while($t_subkriteria = mysqli_fetch_assoc($subkriteria)) {
                    ?>

                  <tr>
                   
                    <td>
                      <?= $t_subkriteria['nama_subkriteria'] ?>
                    </td>
                    <td><?= $t_subkriteria['nilai'] ?></td>
                  
                    <td align="center">
                     
                      <a href="_mod/admin/kriteria/delete-subkriteria.php?idsub_kriteria=<?=$t_subkriteria['idsub_kriteria'] ?>&idkriteria=<?= $idkriteria ?>" class="badge badge-danger p-2" title="Hapus" onclick="return confirm('Anda yakin ingin menghapus data ini ?')">Hapus</a>
                    </td>
                  </tr>

                <?php }?>
                 
                </tbody>
              </table>
            </div>
            </div>
          </div>

          </form>

         

          </div>
        </div>


      </div>
    </div>
    <!-- Quick Action Toolbar Ends-->
  </div>