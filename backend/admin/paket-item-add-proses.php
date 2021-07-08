<?php 

include '../config/config.php';
$acak = rand(00000000, 99999999);
$namafoto = $_FILES['foto']['name'];
$nama = $acak.$namafoto;
$folderawal = $_FILES['foto']['tmp_name'];
$foldertujuan="../assets/galery/";

move_uploaded_file($folderawal,$foldertujuan.$nama);

$queri= "INSERT INTO item_paket (item,harga,gambar) VALUES ('$_POST[nama]','$_POST[harga]','$nama')";
    
    mysqli_query($koneksi,$queri);
    mysqli_close($koneksi);
    header('location:paket-item.php'); 