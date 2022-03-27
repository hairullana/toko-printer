<?php

session_start();
require 'koneksi.php';

if(!isset($_SESSION['loginTokoPrinter'])){
  header("Location: index.php");
}

$username = $_SESSION['loginTokoPrinter'];
$idUser = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE username='$username'"))['id_user'];
$idProduct = $_GET['id'];

$idDel = mysqli_query($conn, "DELETE FROM carts WHERE id_user=$idUser AND id_product=$idProduct");
header("Location: cart.php");