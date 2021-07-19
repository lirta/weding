<?php 

include '../config/config.php';
$idk=$_GET['idk'];

$queri="DELETE FROM makanan WHERE id='$_GET[id]'";
mysqli_query($koneksi,$queri);
    mysqli_close($koneksi);
    header("location:kategori-detail.php?id=$idk");