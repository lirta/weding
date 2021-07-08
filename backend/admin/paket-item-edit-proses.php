<?php 

include '../config/config.php';
$acak = rand(00000000, 99999999);
$namafoto = $_FILES['foto']['name'];
$nama = $acak.$namafoto;
$folderawal = $_FILES['foto']['tmp_name'];
$foldertujuan="../assets/galery/";
if (!empty($folderawal)) {
    
    move_uploaded_file($folderawal,$foldertujuan.$nama);
    $queri= "UPDATE item_paket SET item ='$_POST[nama]', harga='$_POST[harga]', gambar='$nama' WHERE id='$_POST[id]'";
    
    mysqli_query($koneksi,$queri);
    mysqli_close($koneksi);
    header('location:paket-item.php'); 
}else{
    $queri= "UPDATE item_paket SET item ='$_POST[nama]', harga='$_POST[harga]' WHERE id='$_POST[id]'";
    
    mysqli_query($koneksi,$queri);
    mysqli_close($koneksi);
    header('location:paket-item.php'); 

}