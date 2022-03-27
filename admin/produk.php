<?php

session_start();
require '../koneksi.php';

if(!isset($_SESSION['loginTokoPrinter']) || $_SESSION['loginTokoPrinter'] != 'admin'){
    header("Location: ../index.php");
}

$products = mysqli_query($conn, "SELECT *, products.id as idProduct, products.name as productName, categories.name as category FROM products INNER JOIN categories ON products.id_category=categories.id");


?>

<html>
    <head>
        <title>Data Produk</title>
        <style>
            td {
                padding: 10px;
            }
        </style>
    </head>
    <body>
        <?php include '../layout/sidebar.php'; ?>

        <div style="text-align: center;">
            <h3>Data Barang</h3>

            <a href="tambah_produk.php">Tambah Produk</a>
        </div>

        <div style="margin-left:15rem">
            <table border="1">
                <tr>
                    <td>ID</td>
                    <td>Nama</td>
                    <td>Deskripsi</td>
                    <td>Harga</td>
                    <td>Kategori</td>
                    <td>Foto</td>
                    <td>Aksi</td>
                </tr>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $product['idProduct'] ?></td>
                        <td><?= $product['productName'] ?></td>
                        <td><?= $product['description'] ?></td>
                        <td><?= number_format($product['price']) ?></td>
                        <td><?= $product['category'] ?></td>
                        <td><img src="../foto/<?= $product['idProduct'] ?>.png" alt="" style="width:100px"></td>
                        <td><a href="edit_produk.php?id=<?= $product['idProduct'] ?>">edit</a> | <a href="hapus_produk.php?id=<?= $product['id'] ?>">hapus</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </body>
</html>