<?php

$koneksi = mysqli_connect("localhost","root","","db_erp");
$q=$_GET['id'];
$sql = mysqli_query($koneksi,"select * from user where id_user = '".$q."'");
$row = mysqli_fetch_assoc($sql);
$data = $row;
echo json_encode($data);
?>