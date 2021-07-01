<?php 

include '../config/config.php';

$queri="DELETE FROM daftar_item WHERE id_daf='$_GET[id]'";
mysqli_query($koneksi,$queri);
    mysqli_close($koneksi);
    header("location:paket-detail.php?id=$_GET[idp]");