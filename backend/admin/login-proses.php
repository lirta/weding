<?php
  include "../config/config.php";
  $email = $_POST['email'];
  $pass     =md5 ($_POST['pass']);
  $sql = "SELECT * FROM admin WHERE email='$email' AND password='$pass'";
  $result = mysqli_query($koneksi, $sql);
  $ketemu=mysqli_num_rows($result);
  $r=mysqli_fetch_assoc($result);
  if ($ketemu > 0) {
    
    session_start();
    $_SESSION['name']            = $r['name'];
    $_SESSION['id']            = $r['id'];
    $_SESSION['email']            = $r['email'];
    $_SESSION['password']            = $r['password'];
    $_SESSION['foto']            = $r['foto'];
    $_SESSION['hp']            = $r['hp'];
    $_SESSION['rules']            = $r['rules'];

      header('location:index.php');
    
 
  }
  else {
    echo '<script language="javascript">
              alert ("Username dan Password Anda Salah");
              window.location="login.php";
              </script>';
              exit();
  }
?>