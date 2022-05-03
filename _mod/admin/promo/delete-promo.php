<?php
	include '../../../_inc/kon.php';

	$idpromo=hapus_kutip($_GET['idpromo']);

	$sql = "DELETE FROM promo WHERE idpromo='$idpromo'";
    mysqli_query($conn, $sql);

    $_SESSION['ctt'] = "Berhasil Menghapus Data";
    header("location:../../../data-promo");