<?php

session_start();
require '../koneksi.php';

if(isset($_SESSION['loginTokoPrinter'])){
    header("Location: ../index.php");
}

if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $userCheck = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");

    if (mysqli_num_rows($userCheck) == 1){
        $_SESSION['loginTokoPrinter'] = $username;
        header('Location: ../index.php');
    }else {
        echo "<script>
            alert('username atau password salah')
        </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Toko Printer - Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="printer.png" type="image/x-icon">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
    <div class="container-box">
        <img src="printer.png" alt="" class="img">
        <h3>Login | Toko Printer</h3>
        <form action="" method="post">
      
        <i class='fas fa-user-alt'></i>
        <input type="text" name="username" placeholder="Username" class="form-control"><br/><br/>

        <i class='fas fa-lock'></i>
        <input type="password" name="password" placeholder="Password" class="form-control"><br/><br/>
       
        <button type="submit" name="login" class="button">Login</button>
        <h4>Belum mempunyai akun?<a href="../register/index.php"> Daftar disini</a></h4> 
        </form>
    </div>
</body>
</html>