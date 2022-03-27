<?php

session_start();
require 'koneksi.php';

if(!isset($_SESSION['loginTokoPrinter'])){
    header("Location: index.php");
}

$username = $_SESSION['loginTokoPrinter'];
$user = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
$user = mysqli_fetch_assoc($user);
$idUser = $user['id_user'];

$carts = mysqli_query($conn, "SELECT *, COUNT(*) as total FROM carts INNER JOIN products ON carts.id_product = products.id WHERE carts.id_user=$idUser GROUP BY products.id");
// var_dump($carts);die;

?>
<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" href="printer.png" type="image/x-icon">
<title>Cart-Toko Printer</title>
<body>
      
<?php include 'layout/navbar.php'; ?>
<div class="container-cart">
<h2>Keranjang saya</h2>
<?php $totalPrice = 0; $total = 0; ?>
<?php foreach($carts as $product): ?>
    <?php $totalPrice += $product['price']*$product['total']; $total += $product['total'] ?>
    <div class="cart-body">
        <img src="foto/<?= $product['id_product'] ?>.png" class="cart-img">
    </div>
    <div class="text-cart">
        <h3><?= $product['name'] ?></h3>
        <p>Rp.<?= number_format($product['price']) ?></p>
        <p class="product-quantity"> Jumlah : <a href="kurangBarang.php?id=<?= $product['id_product'] ?>"><button class="quantity-button">-</button></a><?= $product['total'] ?><a href="TambahBarang.php?id=<?= $product['id_product'] ?>"><button class="quantity-button">+</button></a></p>
        <a href="hapusBarang.php?id=<?= $product['id_product'] ?>"><button type="submit" name="hapus" class="remove">Hapus</button></a>
    </div>
<?php endforeach; ?>
<div class="total-body">
    <p>Total Price : Rp. <?= $totalPrice ?></p>
    <p>Jumlah Item : <?= $total ?> </p><hr>
    <a href="checkout.php"><button type="submit" name="checkout" class="cek">Proses to Checkout !</button></a>
</div>
</div>
</body>
</html>