<?php
	include '../../../_inc/kon.php';

	$idkaryawan=hapus_kutip($_GET['idkaryawan']);

	$sql = "DELETE FROM karyawan WHERE idkaryawan='$idkaryawan'";
    mysqli_query($conn, $sql);

   
    $_SESSION['ctt'] = "Berhasil Menghapus Data";
    header("location:../../../data-karyawan");