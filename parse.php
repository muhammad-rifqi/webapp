<?php

	$m	= $_POST['m'];
	$e	= $_POST['e'];
	$n	= $_POST['n'];
	$fileName = $_FILES["file1"]["name"]; 
	$fileTmpLoc = $_FILES["file1"]["tmp_name"]; 
	move_uploaded_file($fileTmpLoc, "img/$fileName");
	echo'success';	
	exit();

?>




