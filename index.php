<?php

session_start();
require 'koneksi.php';

$products = mysqli_query($conn, 'SELECT * FROM products');

?>
<!DOCTYPE html>
<link rel="shortcut icon" href="printer.png" type="image/x-icon">
<html lang="en">
<body>
    <?php include 'layout/navbar.php'; ?>
    <div class="hero">
        <img src="iklan.jpg" alt="" class="iklan">
    </div> <br> <br>
    <div class="container">
        <h2 class="text-product">Produk Kami</h2><hr>
    </div>
    
    <?php foreach ($products as $product): ?>
        <div class="list-card-detail">
            <img src="foto/<?= $product['id'] ?>.png" alt="print" class="foto-detail">
            <div class="list-card-detail-product">
                <h3><?= $product['name'] ?></h3>
                <p><?= $product['description'] ?></p>
                <p>Rp. <?= number_format($product['price']) ?></p>
                <a href="add-to-cart.php?id=<?= $product['id'] ?>"><button type="submit" name="addToCart" class="add-cart">Masukan Keranjang</button></a>
                <a href="produk.php"><button type="submit" class="detail">Lihat produk lainnya </button></a>
            </div>
        </div>
    <?php endforeach; ?>
</body>
</html>