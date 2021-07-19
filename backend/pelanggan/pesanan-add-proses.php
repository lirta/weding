<?php 
include '../config/config.php';
$acak = rand(00000000, 99999999);
$tl=date('Y-m-d',strtotime( $_POST['tgl']));
$date = date("Y-m-d");
$st="konfirmasi";

$q_cek =mysqli_query($koneksi,"SELECT * FROM paket WHERE id='$_POST[paket]'");
$paket=mysqli_fetch_assoc($q_cek);
if ($paket['paket'] == "Custom") {
    $id=$paket['paket'].$_POST['id'].$acak;
    $queri= "INSERT INTO pesanan (id_pesanan,pelanggan_id,paket_id,tgl_pesan,tgl_pesta,alamat,status) VALUES ('$id','$_POST[id]','$_POST[paket]','$date','$tl','$_POST[alamat]','$st')";
        
        mysqli_query($koneksi,$queri);
        mysqli_close($koneksi);
        header("location:add-custom-item.php?id=$id");
}else{
    if (!empty($_POST['ketring'])) {
    $id=$_POST['id'].$acak;
    $queri= "INSERT INTO pesanan (id_pesanan,pelanggan_id,paket_id,tgl_pesan,tgl_pesta,alamat,status) VALUES ('$id','$_POST[id]','$_POST[paket]','$date','$tl','$_POST[alamat]','$st')";
        
        mysqli_query($koneksi,$queri);
        mysqli_close($koneksi);
        header("location:ketring.php?id=$id");
    }else{
    $id=$_POST['id'].$acak;
    $queri= "INSERT INTO pesanan (id_pesanan,pelanggan_id,paket_id,tgl_pesan,tgl_pesta,alamat,status) VALUES ('$id','$_POST[id]','$_POST[paket]','$date','$tl','$_POST[alamat]','$st')";
        
        mysqli_query($koneksi,$queri);
        mysqli_close($koneksi);
        header('location:pesanan.php');
    }
}
