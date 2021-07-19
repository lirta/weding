<?php 

include '../config/config.php';
$id_p=$_GET['idp'];
$id=$_GET['idc'];

$queri="DELETE FROM custom WHERE id_custom='$id'";
mysqli_query($koneksi,$queri);
mysqli_close($koneksi);
header("location:add-custom-item.php?id=$id_p");