<?php

session_start();
require 'koneksi.php';

if (!isset($_SESSION['loginTokoPrinter']) || !isset($_GET['id'])){
  header("Location: index.php");
}


$idProduct = $_GET['id'];
if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM products WHERE id=$idProduct")) == 0){
  header("Location: index.php");
}

$username = $_SESSION['loginTokoPrinter'];
$user = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
$user = mysqli_fetch_assoc($user);
$idUser = $user['id_user'];

mysqli_query($conn, "INSERT INTO carts VALUES('', $idUser, $idProduct)");
echo "<script>
        alert('Berhasil menambahkan barang ke cart')
      </script>";
header("Location: cart.php");