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
        <div class="card-product">
            <div class="product">
                <a href="detail.php?id=<?= $product['id'] ?>">
                    <img src="foto/<?= $product['id'] ?>.png" class="foto-product" alt="">
                </a>
                <div class="price">
                <h3><?= $product['name'] ?></h3>
                <p>Rp. <?= number_format($product['price']) ?></p>
                <a href="cart.php"><button type="submit" name="addToCart" class="add-cart">Masukan Keranjang </button></a>
                <a href="detail.php"><button type="submit" name="detail" class="detail">Lihat Produk </button></a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</body>
</html>