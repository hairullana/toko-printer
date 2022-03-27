<?php

session_start();
require '../koneksi.php';

if(!isset($_SESSION['loginTokoPrinter']) || $_SESSION['loginTokoPrinter'] != 'admin'){
     header("Location: ../index.php");
}

$totalOrder = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM orders"));     
$totalProduct = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM products"));
$totalCategory = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM categories"));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="printer.png" type="image/x-icon">
    <title>Page|Admin</title>
</head>
<body>
    <?php include '../layout/sidebar.php'; ?>
    <h1>SELAMAT DATANG DI DASHBOARD ADMIN</h1>
    <div class="card-body">
        <p>Pesanan</p>
        <h1><?= $totalOrder ?></h1>  
   </div>
   <div class="card-body-center">
        <p>Product</p>
        <h1><?= $totalProduct ?></h1>  
   </div>
   <div class="card-body-right">
        <p>Kategori</p>
        <h1><?= $totalCategory ?></h1>  
   </div>
</body>
</html>