<?php

session_start();
require '../koneksi.php';

if(isset($_SESSION['loginTokoSepatu'])){
    header("Location: ../index.php");
}

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    // var_dump($_POST);die;

    mysqli_query($conn, "INSERT INTO user  VALUES('', '$name', '$username', '$password', 'customers')");
    echo "<script>alert('berhasil mendaftar')</script>";
    header("Location: ../login/index.php");
}





?>
<html>
    <head>
        <title>Toko Printer - Register</title>
        <link rel="shortcut icon" href="printer.png" type="image/x-icon">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container-box">
        <img src="printer.png" alt="" class="img">
            <h3>Register | Toko Printer</h3>
            <form action="" method="post">
            <i class='fas fa-user-circle' style='font-size:20px'></i>
                <input type="text" name="name" placeholder="Your Name" class="form-control"></br><br/>

                <i class='fas fa-user-alt'></i>
                <input type="text" name="username" placeholder="Username" class="form-control"></br><br/>

                <i class='fas fa-lock'></i>
                <input type="password" name="password" placeholder="Password" class="form-control"></br><br/>

                <button type="submit" name="register" class="button">Register</button>
                <h4>Sudah mempunyai akun?<a href="../login/index.php"> Login disini</a></h4>
            </form>
        </div>
    </body>
</html>