 <div class="main-panel">
  <div class="content-wrapper">
    
    <!-- Quick Action Toolbar Starts-->
    <div class="row quick-action-toolbar">
      <div class="col-md-9 grid-margin">
        <div class="card">
          <div class="card-header d-block d-md-flex">
            <h5 class="mb-0">Input Data Kriteria Penilaian</h5>
          </div>
        </div>

         <div class="card">
          <div class="card-body">
      
                   
              <form class="forms-sample" method="post">
                <?php
                  if (isset($_POST['simpan'])){
                    $nama_kriteria       =   $_POST['nama_kriteria'];
                    $bobot       =   $_POST['bobot'];

                    $kriteria = mysqli_query($conn, "SELECT SUM(bobot) AS bobot FROM kriteria");
                    $t_kriteria = mysqli_fetch_assoc($kriteria) ;

                    $maksimal=100-$t_kriteria['bobot'];

                    if ($bobot <= $maksimal) {


                    $sql = "INSERT INTO kriteria (nama_kriteria, bobot) VALUES ('$nama_kriteria', '$bobot')";
                    mysqli_query($conn, $sql);


                    $_SESSION['ctt'] = "Berhasil Menyimpan Data";
                    echo"<script>window.location.href='data-kriteria';</script>";

                      
                    }else{
                      echo "<b>Total Maksimal Bobot Kriteria Adalah 100</b>";
                      echo "<br>";
                      echo "<br>";
                    }


                   
                  }

                  ?>

                <div class="form-group row">
                  <label  class="col-sm-3 col-form-label">Nama Kriteria</label>
                  <div class="col-sm-8">
                    <input type="text" name="nama_kriteria" class="form-control" placeholder="Nama Kriteria" required="">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Bobot (%)</label>
                  <div class="col-sm-8">
                    <input type="number" name="bobot" class="form-control" placeholder="Bobot Kriteria" required="" min="0" max="<?= $maksimal ?>">
                  </div>
                </div>
                

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-8">
                     <button type="submit" name="simpan" class="btn btn-sm btn-success mr-2">Simpan</button>
                     <a href="data-kriteria" class="btn btn-sm btn-dark">Kembali</a>
                  </div>
                </div>


            </form>
                
        
          </div>
        </div>


      </div>
    </div>
    <!-- Quick Action Toolbar Ends-->
  </div>