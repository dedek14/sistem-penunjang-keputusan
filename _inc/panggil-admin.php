<?php
	if(empty($_GET['modul'])){
		$mod="";
	}else{
		$mod=html_blok(hapus_kutip($_GET['modul']));
	}

		if($mod=="")
		{
			include "_mod/admin/home.php";
		}
		else
		{
			switch($mod)
			{
				
				//Data Admin

				case "data-devisi" : include "_mod/admin/devisi/index.php"; 
				break;

				case "add-devisi" : include "_mod/admin/devisi/add-devisi.php"; 
				break;

				case "edit-devisi" : include "_mod/admin/devisi/edit-devisi.php"; 
				break;



				case "data-karyawan" : include "_mod/admin/karyawan/index.php"; 
				break;

				case "add-karyawan" : include "_mod/admin/karyawan/add-karyawan.php"; 
				break;

				case "edit-karyawan" : include "_mod/admin/karyawan/edit-karyawan.php"; 
				break;




				// Data Kriteria

				case "data-kriteria" : include "_mod/admin/kriteria/index.php"; 
				break;

				case "add-kriteria" : include "_mod/admin/kriteria/add-kriteria.php"; 
				break;

				case "edit-kriteria" : include "_mod/admin/kriteria/edit-kriteria.php"; 
				break;

				case "add-subkriteria" : include "_mod/admin/kriteria/add-subkriteria.php"; 
				break;

				// Data Jenis Produk


				case "profil-saya" : include "_mod/admin/profil-saya.php"; 
				break;

				case "data-penilaian" : include "_mod/admin/penilaian/data-penilaian.php"; 
				break;

				case "add-penilaian" : include "_mod/admin/penilaian/add-penilaian.php"; 
				break;

				case "lihat-penilaian" : include "_mod/admin/penilaian/lihat-penilaian.php"; 
				break;

				case "data-nilai" : include "_mod/admin/penilaian/data-nilai.php"; 
				break;

				case "evaluasi-penilaian" : include "_mod/admin/penilaian/evaluasi-penilaian.php"; 
				break;

				



				


				case "laporan-karyawan" : include "_mod/admin/laporan/laporan-karyawan.php"; 
				break;

				case "hasil-keputusan" : include "_mod/admin/laporan/hasil-keputusan.php"; 
				break;

				
				

				
				
			//KONDISI URL SALAH
			default : echo"<script>window.location.href='".$webserver."/notfound.php?ctt=".base64_encode("AKSES HALAMAN MITOS")."&adr=".base64_encode('http://'.$_SERVER['HTTP_HOST'].''. $_SERVER['REQUEST_URI'].'')."';</script>";		
			}
		}	
?>	