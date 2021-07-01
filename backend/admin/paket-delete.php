<?php 

include '../config/config.php';

$queri="DELETE FROM paket WHERE id='$_GET[id]'";
mysqli_query($koneksi,$queri);
    mysqli_close($koneksi);
    header('location:paket.php');