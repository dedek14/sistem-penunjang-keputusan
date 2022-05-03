
<?php

    $idpromo=hapus_kutip($_GET['idpromo']);

    $promo = mysqli_query($conn, "SELECT * FROM promo WHERE idpromo='$idpromo'");
    $t_promo = mysqli_fetch_assoc($promo) ;
?>


 <div class="main-panel">
  <div class="content-wrapper">
    
    <!-- Quick Action Toolbar Starts-->
    <div class="row quick-action-toolbar">
      <div class="col-md-9 grid-margin">
        <div class="card">
          <div class="card-header d-block d-md-flex">
            <h5 class="mb-0">Edit Data Promosi</h5>
          </div>
        </div>

         <div class="card">
          <div class="card-body">
      
                   
              <form class="forms-sample" method="post" enctype="multipart/form-data">
                <?php
                  if (isset($_POST['simpan'])){
                    $id_produk       =   $_POST['id_produk'];
                    $potongan       =   $_POST['potongan'];
                    $diskon       =   $_POST['diskon'];
                    $dari_tanggal       =   $_POST['dari_tanggal'];
                    $sampai_tanggal       =   $_POST['sampai_tanggal'];


                        $sql = "UPDATE promo SET id_produk='$id_produk', potongan='$potongan', diskon='$diskon', dari_tanggal='$dari_tanggal', sampai_tanggal='$sampai_tanggal' WHERE idpromo='$idpromo'";
                        mysqli_query($conn, $sql);

                    $_SESSION['ctt'] = "Berhasil Mengedit Data";
                    echo"<script>window.location.href='data-promo';</script>";
                  }

                  ?>

                
                <div class="form-group row">
                  <label  class="col-sm-3 col-form-label">Nama Produk</label>
                  <div class="col-sm-8">

                    <select class="js-example-basic-single" style="width:100%" name="id_produk" required="">
                        <option value="">Pilih</option>

                        <?php 
                       
                          $produk = mysqli_query($conn, "SELECT * FROM produk");
                          while($t_produk = mysqli_fetch_assoc($produk)) {
                        ?>

                        <option value="<?= $t_produk['idproduk'] ?>" <?php if($t_produk['idproduk']==$t_promo['id_produk']) echo "selected"; ?>><?= $t_produk['nama_produk'] ?></option>
                       <?php }?>
                    </select>


                  </div>
                </div>

                

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Potongan</label>
                  <div class="col-sm-8">
                    <input type="number" name="potongan" class="form-control" placeholder="Potongan" required="" value="<?= $t_promo['potongan'] ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Diskon (%)</label>
                  <div class="col-sm-8">
                    <input type="number" name="diskon" class="form-control" placeholder="Diskon" required="" value="<?= $t_promo['diskon'] ?>" max="100" min="0">
                    
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Dari Tanggal</label>
                  <div class="col-sm-8">
                    <input type="date" name="dari_tanggal" class="form-control" placeholder="Dari Tanggal" required="" value="<?= $t_promo['dari_tanggal'] ?>">
                    
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Sampai Tanggal</label>
                  <div class="col-sm-8">
                    <input type="date" name="sampai_tanggal" class="form-control" placeholder="Sampai Tanggal" required="" value="<?= $t_promo['sampai_tanggal'] ?>">
                    
                  </div>
                </div>




                

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-8">
                     <button type="submit" name="simpan" class="btn btn-sm btn-success mr-2">Simpan</button>
                     <a href="data-promo" class="btn btn-sm btn-dark">Kembali</a>
                  </div>
                </div>



            </form>
                
        
          </div>
        </div>


      </div>
    </div>
    <!-- Quick Action Toolbar Ends-->
  </div>