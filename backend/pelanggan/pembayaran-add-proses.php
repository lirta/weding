<?php 

include '../config/config.php';



$date = date("Y-m-d");
    $acak = rand(00000000, 99999999);
    $namafoto = $_FILES['foto']['name'];
    			$nama = $acak.$namafoto;
    			$folderawal = $_FILES['foto']['tmp_name'];
    			$foldertujuan="../assets/pembayaran/";
    
    			move_uploaded_file($folderawal,$foldertujuan.$nama);
    
    $queri= "INSERT INTO pembayaran (pesanan_id,jumlah,bukti,reg,tgl_bayar) VALUES (
                                    '$_POST[id]',
                                    '$_POST[jumlah]',
                                    '$nama',
                                    '$_POST[reg]',
                                    '$date'
                                )";
                                // echo ($queri);
    
    mysqli_query($koneksi,$queri);
    mysqli_close($koneksi);
    header("location:pesanan-detail.php?id=$_POST[id]");


 ?>