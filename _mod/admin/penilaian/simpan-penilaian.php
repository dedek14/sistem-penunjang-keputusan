<?php
	include "../../../_inc/kon.php";


		$penilaian = mysqli_query($conn, "SELECT MAX(idpenilaian) AS idpenilaian FROM penilaian");
   		 $t_penilaian = mysqli_fetch_assoc($penilaian) ;

   		 $idpenilaian=$t_penilaian['idpenilaian']+1;


   		 $id_karyawan = $_POST['id_karyawan'];
   		 $tanggal_penilaian = date('Y-m-d');


   		  $sql = "INSERT INTO penilaian (idpenilaian, tanggal_penilaian, id_karyawan, status_penilaian, total_penilaian) VALUES ('$idpenilaian', '$tanggal_penilaian', '$id_karyawan', 'Menunggu', '0')";
	          mysqli_query($conn, $sql);


   		 $id_subkriteria = $_POST['id_subkriteria'];



		// Simpan Ke tabel Detai Penilaian


   		  $kriteria = mysqli_query($conn, "SELECT * FROM kriteria");
        	while($t_kriteria = mysqli_fetch_assoc($kriteria)) { 

	          $idkriteria = $t_kriteria['idkriteria'];

	          $sql = "INSERT INTO detail_penilaian (id_penilaian, id_subkriteria) VALUES ('$idpenilaian', '$id_subkriteria[$idkriteria]')";
	          mysqli_query($conn, $sql);

        }


	
		 echo"<script>window.location.href='../../../data-penilaian';</script>";
	


	

?>