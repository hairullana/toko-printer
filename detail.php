<?php

session_start();
require "koneksi.php";

if(!isset($_GET['id'])){
    header('Location: index.php');
}

$id = $_GET['id'];
$product = mysqli_query($conn, "SELECT * FROM products WHERE id='$id'");
$product = mysqli_fetch_assoc($product);

?>


  
<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" href="printer.png" type="image/x-icon">
<title>Detail - Toko Printer</title>
<body>      
<?php include 'layout/navbar.php'; ?>

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

</body>
</html>