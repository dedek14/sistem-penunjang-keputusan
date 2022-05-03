<?php
	include '../../../_inc/kon.php';

	$idkriteria=hapus_kutip($_GET['idkriteria']);

	$sql = "DELETE FROM kriteria WHERE idkriteria='$idkriteria'";
    mysqli_query($conn, $sql);

    $_SESSION['ctt'] = "Berhasil Menghapus Data";
    header("location:../../../data-kriteria");