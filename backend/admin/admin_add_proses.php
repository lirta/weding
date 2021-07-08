<?php 

include '../config/config.php';

$email=$_POST['email'];
$q=("SELECT * FROM admin where email = '$email' ");
$hasil =mysqli_query($koneksi,$q);  
$ketemu=mysqli_num_rows($hasil);
if ($ketemu >  0) {
    header('location:admin.php');
}else{

    $acak = rand(00000000, 99999999);
    $namafoto = $_FILES['foto']['name'];
    			$nama = $acak.$namafoto;
    			$folderawal = $_FILES['foto']['tmp_name'];
    			$foldertujuan="../assets/admin/";
    
    			move_uploaded_file($folderawal,$foldertujuan.$nama);
                $ps=md5($_POST['pass']);
                $status="non";
                if (!empty($folderawal))
                    {
    
    $queri= "INSERT INTO admin (name, 
                                email,
                                password,
                                alamat,
                                hp,
                                rules,
                                status,
                                foto) VALUES (
                                    '$_POST[nama]',
                                    '$_POST[email]',
                                    '$ps',
                                    '$_POST[alamat]',
                                    '$_POST[hp]',
                                    '$_POST[rules]', 
                                    '$status',
                                    '$nama'
                                )";
                                // echo ($queri);
    
    mysqli_query($koneksi,$queri);
    mysqli_close($koneksi);
    header('location:admin.php');
                                }else{
                                    $name="defuld.jpg";
                                    $queri= "INSERT INTO admin (name,
                                    email,
                                    password,
                                    alamat,
                                    hp,
                                    rules,
                                    status,
                                    foto) VALUES (
                                        '$_POST[nama]',
                                        '$_POST[email]',
                                        '$ps',
                                        '$_POST[alamat]',
                                        '$_POST[hp]',
                                        '$_POST[rules]',
                                        '$status',
                                        '$nama'
                                    )";
                                    // echo ($queri);
        
        mysqli_query($koneksi,$queri);
        mysqli_close($koneksi);
        header('location:admin.php'); 
                                }
}

 ?>