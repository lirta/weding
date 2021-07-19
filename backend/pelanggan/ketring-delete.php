<?php 

include '../config/config.php';
$id_p=$_GET['idp'];
$id=$_GET['id'];

$queri="DELETE FROM ketring WHERE id_ketring='$id'";
mysqli_query($koneksi,$queri);
mysqli_close($koneksi);
header("location:ketring.php?id=$id_p");