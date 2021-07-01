<?php 

include '../config/config.php';

$queri="DELETE FROM pembayaran WHERE id='$_GET[id]'";
mysqli_query($koneksi,$queri);
    mysqli_close($koneksi);
    header("location:pesanan-detail.php?id=$_GET[ps]");