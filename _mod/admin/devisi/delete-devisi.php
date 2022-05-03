<?php
	include '../../../_inc/kon.php';

	$iddevisi=hapus_kutip($_GET['iddevisi']);

	$sql = "DELETE FROM devisi WHERE iddevisi='$iddevisi'";
    mysqli_query($conn, $sql);

    $_SESSION['ctt'] = "Berhasil Menghapus Data";
    header("location:../../../data-devisi");