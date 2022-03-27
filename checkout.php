<?php

session_start();
require 'koneksi.php';

if(!isset($_SESSION['loginTokoPrinter'])){
    header("Location: index.php");
}

$username = $_SESSION['loginTokoPrinter'];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE username='$username'"));
$idUser = $user['id_user'];
$carts = mysqli_query($conn, "SELECT *, COUNT(*) as total FROM carts WHERE id_user=$idUser GROUP BY id_product");

$totalPayment = 0;
$totalProduct = 0;
foreach ($carts as $cart){
    $idProduct = $cart['id_product'];
    $product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE id=$idProduct"));
    $totalPayment += $product['price'] * $cart['total'];
    $totalProduct += $cart['total'];
}


?>
<!DOCTYPE html>
<link rel="shortcut icon" href="printer.png" type="image/x-icon">
<html lang="en">
<head>
    <title>Checkout - Toko Printer</title>
</head>
<body>
    <?php include 'layout/navbar.php'; ?>
    <form action="confirm.php" method="POST">
        <div class="container-check">
            <h3>Checkout</h3>
            <p>Alamat Pengriman</p><hr><br>
            <label for="">Alamat lengkap anda</label><br>
            <textarea name="address" id="" class="form-alamat" placeholder="Alamat Lengkap. Provinsi. Kota" cols="30" rows="10"></textarea><br>

            <label for="">Kecamatan</label><br>
            <input type="text" name="kecamatan" placeholder="Kec." class="form-phone"><br>
            
            <label for="">Kelurahan / Desa</label><br>
            <input type="text" name="kelurahan" placeholder="Kel." class="form-phone"><br>

            <label for="">Nomor Hp</label><br>
            <input type="tel" name="phone" placeholder="No. Handphone Anda" class="form-phone"><br>

            <label for="">Kode Pos</label><br>
            <input type="number" name="postcode" placeholder="Kode Pos" class="form-kd"><br>
            
            <label for="">Pembayaran</label><br>
            <input type="radio" name="payment" value="COD" class="ckbox"><span>COD</span>
            <input type="radio" name="payment" value="DANA" class="ckbox"><span>DANA</span>
            <input type="radio" name="payment" value="OVO" class="ckbox"><span>OVO</span>
            <input type="radio" name="payment" value="Gopay" class="ckbox"><span>GoPay</span> <br>

            <label for="">Kurir</label><br>
            <input type="radio" name="courier" value="Instan" class="ckbox"><span>Instan</span>
            <input type="radio" name="courier" value="Premium" class="ckbox"><span>Premium</span>
            <input type="radio" name="courier" value="Ekonomi" class="ckbox"><span>Ekonomi</span>
            <input type="radio" name="courier" value="Reguler" class="ckbox"><span>Reguler</span>
        </div>
        <div class="total-body">
            <p>Total Harga : Rp. <?= number_format($totalPayment) ?></p>
            <p>Jumlah Item : <?= $totalProduct ?></p><hr>
            <button type="submit" name="bayar" class="cek">Bayar Sekarang !</button>
        </div>
    </form><br> <hr>
    <div class="card-order">
        <?php foreach($carts as $cart): ?>
            <?php
            $idProduct = $cart['id_product'];
            $product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE id=$idProduct"));
            ?>
            <img src="foto/<?= $product['id'] ?>.png" alt="" class="order-img">
            <h3><?= $product['name'] ?></h3>
            <p>Rp. <?= number_format($product['price']) ?></p>
            <p>Jumlah : <?= $cart['total'] ?></p>
            <hr>
            <div class="sub">
                <p><b>Subtotal </b> Rp. <?= number_format($product['price'] * $cart['total']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    </div>
</body>
</html>