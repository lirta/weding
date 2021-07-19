<?php 
include '../config/config.php';
$id_p=$_POST['pesanan'];

    $queri= "INSERT INTO ketring (pesanan_id,id_makanan,jumlah) VALUES ('$_POST[pesanan]','$_POST[makanan]','$_POST[jumlah]')";
        
        mysqli_query($koneksi,$queri);
        mysqli_close($koneksi);
        header("location:ketring.php?id=$id_p");
