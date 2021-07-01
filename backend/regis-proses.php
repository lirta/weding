<?php 

include 'config/config.php';

$email=$_POST['email'];
$q=("SELECT * FROM pelanggan where email = '$email' ");
$hasil =mysqli_query($koneksi,$q);  
$ketemu=mysqli_num_rows($hasil);
if ($ketemu >  0) {
    header('location:registrasi.php');
}else{
    $nama="defuld.jpg";
    $ps=md5($_POST['pass']);
    
    $queri= "INSERT INTO pelanggan (name,
                                hp,
                                email,
                                password,
                                foto) VALUES (
                                    '$_POST[nama]',
                                    '$_POST[hp]',
                                    '$_POST[email]',
                                    '$ps',
                                    '$nama'
                                )";
                                // echo ($queri);
    
    mysqli_query($koneksi,$queri);
    mysqli_close($koneksi);
    header('location:pelanggan/index.php');
}

 ?>