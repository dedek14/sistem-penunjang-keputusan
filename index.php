	<?php

	include "_inc/kon.php";

	if(!empty($iduser)){
		include "_mod/admin.php";
	}elseif(empty($iduser)){
		echo"<script>window.location.href='login.php';</script>";
		
	}else{
		include "notfound.php";
	}




