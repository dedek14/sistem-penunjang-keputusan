 <div class="main-panel">
  <div class="content-wrapper">
    
    <!-- Quick Action Toolbar Starts-->
    <div class="row quick-action-toolbar">
      <div class="col-md-9 grid-margin">
        <div class="card">
          <div class="card-header d-block d-md-flex">
            <h5 class="mb-0">Input Data Devisi/ Bagian</h5>
          </div>
        </div>

         <div class="card">
          <div class="card-body">
      
                   
              <form class="forms-sample" method="post">
                <?php
                  if (isset($_POST['simpan'])){
                    $nama_devisi       =   $_POST['nama_devisi'];
                  
                    $sql = "INSERT INTO devisi (nama_devisi) VALUES ('$nama_devisi')";
                    mysqli_query($conn, $sql);

                  

                    $_SESSION['ctt'] = "Berhasil Menyimpan Data";
                    echo"<script>window.location.href='data-devisi';</script>";
                  }

                  ?>

                <div class="form-group row">
                  <label  class="col-sm-3 col-form-label">Nama Devisi</label>
                  <div class="col-sm-8">
                    <input type="text" name="nama_devisi" class="form-control" placeholder="Nama Devisi" required="">
                  </div>
                </div>
                

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-8">
                     <button type="submit" name="simpan" class="btn btn-sm btn-success mr-2">Simpan</button>
                     <a href="data-devisi" class="btn btn-sm btn-dark">Kembali</a>
                  </div>
                </div>


            </form>
                
        
          </div>
        </div>


      </div>
    </div>
    <!-- Quick Action Toolbar Ends-->
  </div>