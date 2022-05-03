<?php
	include '../../../_inc/kon.php';

	$idsub_kriteria=hapus_kutip($_GET['idsub_kriteria']);
	$idkriteria=hapus_kutip($_GET['idkriteria']);

	$sql = "DELETE FROM sub_kriteria WHERE idsub_kriteria='$idsub_kriteria'";
    mysqli_query($conn, $sql);

    $_SESSION['ctt'] = "Berhasil Menghapus Data";
    header("location:../../../add-subkriteria&idkriteria=$idkriteria");