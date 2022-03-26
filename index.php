<?php

session_start();




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
    <div class="card-product">
        <div class="product">
            <a href="detail.php">
                <img src="foto/printer1.png" class="foto-product" alt="">
            </a>
            <div class="price">
            <h3>Printer Canon MP830</h3>
            <p>Rp. 290.000.00</p>
            <a href="cart.php"><button type="submit" name="addToCart" class="add-cart">Masukan Keranjang </button></a>
            <a href="detail.php"><button type="submit" name="detail" class="detail">Lihat Produk </button></a>
            </div>
        </div>
    </div>
</body>
</html>