<?php 

include '../config/config.php';

$queri="DELETE FROM item_paket WHERE id='$_GET[id]'";
mysqli_query($koneksi,$queri);
    mysqli_close($koneksi);
    header('location:paket-item.php');