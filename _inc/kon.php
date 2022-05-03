<?php
// INI ADALAH KONFIGURASI UMUM -----------------------------------------------------------------------------------------------//
	//error_reporting(0);
	session_start();
	date_default_timezone_set('Asia/Jakarta');
	//session_cache_limiter('private_no_expire');

//	KONEKSI DATABASE ---------------------------------------------------------------------------------------------------------//
	$dbserver="localhost";
	$user="root";
	$pass="";
	$dbname="spk_saw";

	// Create connection
	$conn = mysqli_connect($dbserver, $user, $pass, $dbname);

	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	// ---------------------------------------------//

//	MEMANGGUL DATA USER ------------------------------------------------------------------------------------------------------//

	if(!empty($_SESSION['iduser'])){
		$iduser = $_SESSION['iduser'];
		

		$data = mysqli_query($conn, "SELECT * FROM user WHERE iduser='$iduser'");
    	$sessionlogin = mysqli_fetch_assoc($data);

    	if($sessionlogin['jabatan']=='HRD'){
    		
    		$hak_akses='HRD';

    	}

    	if($sessionlogin['jabatan']=='Section Manager'){
    		
    		$hak_akses='Section Manager';

    	} 

    	if($sessionlogin['jabatan']=='Departemen Manager'){
    		
    		$hak_akses='Departemen Manager';

    	} 

		
	}else{
		$iduser = "";
		
	}

// 	INI ADALAH VARIABLE YANG AKAN SERING DI GUNAKAN---------------------------------------------------------------------------//
	$judul="PT. Gudang Garam";
	$webserver="http://".$_SERVER['HTTP_HOST']."/fikri/";
	$isitoken=("Ini adalah parameter untuk enkripsi data");

	//---------------------------------------------//

//	INI ADALAH KEPALA DARI KODE YANG AKAN DI BUAT ----------------------------------------------------------------------------//
	$kep_mdl="MODAL-";			//KEPALA KODE MODAL
	$kep_usr="USR-";

	// --------------------------------------------//

	

	
//	INI ADALAH FUNGSI YANG AKAN BANYAK DI GUNAKAN-----------------------------------------------------------------------------//
		//kode
		function get_nkd($kd){
			$nkd=0;
			
			$rkd=$kd;
			switch (strlen($kd)) {
				case 1: $nkd = "000".$rkd; break;
				case 2: $nkd = "00".$rkd; break;
				case 3: $nkd = "0".$rkd; break;
				default: $nkd = $rkd; break;
			}
			
			return $nkd;
		}
		
		//format uang
		function get_rp($a){
			$rp=number_format($a,0,',','.');
			
			return $rp;
		}
		
		//pembulatan kr ribuan bawah
		function get_bulat($uang)
		{
			$ratusan = substr($uang, -3);
			$bulat=$uang-$ratusan;
			
			return $bulat;
		}
		
		//hapus kutip
		function hapus_kutip($hk)
		{
			$hapus_k=str_replace(str_split("/':*"),"",$hk); //MERUBAH KUTIP MENJADI x AGAR TOKEN TIDAK SESUAi
			
			return $hapus_k;
		}

		//html blok
		function html_blok($hb)
		{
			$htb=strip_tags(addslashes($hb));

			return $htb;
		}
		
		//angka romawi
		function get_romawi($ang)
		{
			$ang=intval($ang);
			$bulan=array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
			$angka=$bulan[$ang];
			
			return $angka;
		}
		
		//BULAN
		function get_bulan($bln)
		{
			$bln=intval($bln);
			$bulan=array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
			$bulan=$bulan[$bln];
			
			return $bulan;
		}
		
		//TERBILANG
		function kekata($x) 
		{
			$x = abs($x);
			$angka = array("", "satu", "dua", "tiga", "empat", "lima",
			"enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
			$temp = "";
			if ($x <12) {
				$temp = " ". $angka[$x];
			} else if ($x <20) {
				$temp = kekata($x - 10). " belas";
			} else if ($x <100) {
				$temp = kekata($x/10)." puluh". kekata($x % 10);
			} else if ($x <200) {
				$temp = " seratus" . kekata($x - 100);
			} else if ($x <1000) {
				$temp = kekata($x/100) . " ratus" . kekata($x % 100);
			} else if ($x <2000) {
				$temp = " seribu" . kekata($x - 1000);
			} else if ($x <1000000) {
				$temp = kekata($x/1000) . " ribu" . kekata($x % 1000);
			} else if ($x <1000000000) {
				$temp = kekata($x/1000000) . " juta" . kekata($x % 1000000);
			} else if ($x <1000000000000) {
				$temp = kekata($x/1000000000) . " milyar" . kekata(fmod($x,1000000000));
			} else if ($x <1000000000000000) {
				$temp = kekata($x/1000000000000) . " trilyun" . kekata(fmod($x,1000000000000));
			}     
				return $temp;
			}


		function terbilang($x, $style=4) 
		{
			if($x<0) {
				$hasil = "minus ". trim(kekata($x));
			} else {
				$hasil = trim(kekata($x));
			}     
			switch ($style) {
				case 1:
					$hasil = strtoupper($hasil);
					break;
				case 2:
					$hasil = strtolower($hasil);
					break;
				case 3:
					$hasil = ucwords($hasil);
					break;
				default:
					$hasil = ucfirst($hasil);
					break;
			}     
			return $hasil;
		}

		function get_akom($akom){
			$angka = $akom;
			$angka_format = number_format($angka,2);
			return $angka_format;
		}

		// -------------------------------------------//
?>
