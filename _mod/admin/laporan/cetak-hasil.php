<?php
include '../../../_inc/kon.php';
$data = mysqli_query($conn, "SELECT * FROM user WHERE jabatan='HRD'");
$kepala = mysqli_fetch_assoc($data) ;

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SPK</title>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css"> -->
    <link rel="stylesheet" href="<?=$webserver?>/_aset/paper.css">

</head>
<body class="A4 landscape" onLoad="window.print()">

  <!-- onLoad="window.print()" -->

    <!-- <link rel="stylesheet" href="_asets/paper.css"> -->
<style>
    @page { size: A4 }
 
    h1 {
        font-weight: bold;
        font-size: 22pt;
        text-align: center;
    }
 
    table {
        border-collapse: collapse;
        width: 100%;
    }
 
    .table th {
        padding: 8px 8px;
        border:1px solid #000000;
        text-align: center;
    }
 
    .table td {
        padding: 3px 3px;
        border:1px solid #000000;
    }
 
    .text-center {
        text-align: center;
    }
</style>
    <section class="sheet" style="padding: 1.75cm 2cm 2cm 2cm">
            <table width="100%">
            <tr>
              <td width="30px"></td>
              <td width="10%" style="background-color: white;"><img src="<?=$webserver?>/_img/logo.png" style="height: 60px; width: 180px"></td>
              <td style="text-align: center;"><h4>LAPORAN HASIL KEPUTUSAN</h4><br>
                   
                <h1 style="text-align: center;margin-top: -0.8em">PT. GUDANG GARAM TBK</h1>

                <p style="text-align: center;margin-top: -1em">&nbsp;&nbsp; Alamat :Jl. Ujung Tanah No.1, Lubuk Begalung Nan XX, Kec. Lubuk Begalung  </p>

               </td>
                <td width="10%"></td>
              <td width="30px" style="background-color:white"></td>
            </tr>

        </table>
        <p style="margin-top: -1.5em"><img src="<?=$webserver?>/_img/line.png" style="width: 970px; height:5px "></p>

          <table class="table">
            <thead>
                <tr>
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

       
       

         <table>

            
             <tr>
                <td width="750px"></td>
           
                <td style="text-align: center;">
                   <p>Pasaman Barat, <?= date('d')." ".get_bulan(date('m'))." " .date('Y') ?></p>
               
                  <p style="line-height: 1.5;">HRD </p>
                  
                </td>
             
            </tr>

             <tr>
                <td width="750px"></td>
           
                <td style="text-align: center;">
               
                  <p style="line-height: 1.5;"><br><b><?= $kepala['nama_user'] ?></b></p>
                  
                </td>
             
            </tr>

        </table>

    </section>
</body>
</html>