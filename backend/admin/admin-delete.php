<?php 

include '../config/config.php';

$queri="DELETE FROM admin WHERE id='$_GET[id]'";
mysqli_query($koneksi,$queri);
    mysqli_close($koneksi);
    header('location:admin.php');