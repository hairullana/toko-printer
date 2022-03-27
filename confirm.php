<?php

session_start();
require 'koneksi.php';

if(!isset($_SESSION['bayar'])){
  header("Location: index.php");
}

$address = $_POST['address'];
$kecamatan = $_POST['kecamatan'];
$kelurahan = $_POST['kelurahan'];
$phone = $_POST['phone'];
$postcode = $_POST['postcode'];
$payment = $_POST['payment'];
$courier = $_POST['courier'];

$username = $_SESSION['loginTokoPrinter'];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE username='$username'"));
$idUser = $user['id_user'];
$carts = mysqli_query($conn, "SELECT * as total FROM carts WHERE id_user=$idUser");

foreach ($carts as $cart){
  $idProduct = $cart['id_product'];
  mysqli_query($conn, "INSERT INTO orders VALUES(
    '',
    $idUser,
    $idProduct,
    '$address',
    '$kecamatan',
    '$kelurahan',
    '$phone',
    '$postcode',
    '$payment',
    '$courier',
    'Proses',
    'Belum Dikirim'
  )");
}

mysqli_query($conn, "DELETE FROM carts WHERE id_user = $idUser");

echo "</script>
        alert('berhasil checkout')
      </script>";
header("Location: checkout.php");