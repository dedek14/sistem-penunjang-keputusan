 <div class="main-panel">
  <div class="content-wrapper">
    
    <!-- Quick Action Toolbar Starts-->
    <div class="row quick-action-toolbar">
      <div class="col-md-12 grid-margin">
        <div class="card">
          <div class="card-header d-block d-md-flex">
            <h5 class="mb-0">Data Promo Produk</h5>
          </div>
        </div>

         <div class="card">
          <div class="card-body">
            <div class="d-sm-flex align-items-center mb-4">
              <h4 class="card-title mb-sm-0">
              <a href="add-promo"  class="btn btn-outline-success btn-sm">+ Promo</a></h4>
              
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
                    <th class="font-weight-bold">Nama Produk</th>
                    <th class="font-weight-bold">Potongan</th>
                    <th class="font-weight-bold">Diskon (%)</th>
                    <th class="font-weight-bold">Dari Tanggal</th>
                    <th class="font-weight-bold">Sampai Tanggal</th>
                    <th class="font-weight-bold" style="width: 120px;text-align: center;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      $no=1; 
                      $promo = mysqli_query($conn, "SELECT * FROM promo, produk WHERE id_produk=idproduk");
                      while($t_promo = mysqli_fetch_assoc($promo)) {
                    ?>

                  <tr>
                    <td><?= $no++ ?></td>
                    <td>
                      <img class="img-sm rounded-circle" src="_img/produk/<?= $t_promo['foto'] ?>" alt="profile image"> <?= $t_promo['nama_produk'] ?>
                    </td>
                    <td><?= $t_promo['potongan'] ?></td>
                    <td><?= $t_promo['diskon'] ?></td>
                    <td><?= date('d-m-Y', strtotime($t_promo['dari_tanggal'])) ?></td>
                    <td><?= date('d-m-Y', strtotime($t_promo['sampai_tanggal'])) ?></td>
                   
                    <td align="center">
                      <a href="edit-promo&idpromo=<?= $t_promo['idpromo'] ?>" class="badge badge-dark p-2">Edit</a>
                      <a href="_mod/admin/promo/delete-promo.php?idpromo=<?=$t_promo['idpromo'] ?>" class="badge badge-danger p-2" title="Hapus" onclick="return confirm('Anda yakin ingin menghapus data ini ?')">Hapus</a>
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