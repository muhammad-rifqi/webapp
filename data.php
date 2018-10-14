<?php

$koneksi = mysqli_connect("localhost","root","","db_erp");
$sql = mysqli_query($koneksi,"select * from user");
$row = array();
while($row = mysqli_fetch_assoc($sql)){
$data[] = $row;
}
echo json_encode($data);
?>