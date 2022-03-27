<?php

session_start();
require '../koneksi.php';

if(!isset($_SESSION['loginTokoPrinter']) || $_SESSION['loginTokoPrinter'] != 'admin'){
    header("Location: ../index.php");
}

if(!isset($_GET['id'])){
    header("Location: kategori.php");
}

$idCategory = $_GET['id'];

mysqli_query($conn, "DELETE FROM categories WHERE id=$idCategory");

header("Location: kategori.php");