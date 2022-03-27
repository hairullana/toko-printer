<?php

session_start();
require '../koneksi.php';

if(!isset($_SESSION['loginTokoPrinter']) || $_SESSION['loginTokoPrinter'] != 'admin'){
    header("Location: ../index.php");
}

if(isset($_POST['add'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    mysqli_query($conn, "INSERT INTO products VALUES('','$name',$price,'$description')");
    echo "<script>alert('berhasil')</script>";

    header("Location: produk.php");
}

?>

<html>
    <head>
        <title>Tambah Produk</title>
        <style>
            td {
                padding: 10px;
            }
        </style>
    </head>
    <body>
        <?php include '../layout/sidebar.php'; ?>

        <div style="text-align: center;">
            <h3>Tambah Barang</h3>
            <form action="" method="POST">
                <p>Nama: <input type="text" name="name"></p>
                <p>Harga: <input type="number" name="price"></p>
                <p>Deskripsi: <textarea name="description"></textarea></p>
                <button type="submit" name="add">Add</button>
            </form>
        </div>
    </body>
</html>