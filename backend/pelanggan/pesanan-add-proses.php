<?php 
include '../config/config.php';

$tl=date('Y-m-d',strtotime( $_POST['tgl']));
$date = date("Y-m-d");
$st="konfirmasi";
// echo "$_POST[paket]";

$queri= "INSERT INTO pesanan (pelanggan_id,paket_id,tgl_pesan,tgl_pesta,alamat,status) VALUES ('$_POST[id]','$_POST[paket]','$date','$tl','$_POST[alamat]','$st')";
    
    mysqli_query($koneksi,$queri);
    mysqli_close($koneksi);
    header('location:pesanan.php');