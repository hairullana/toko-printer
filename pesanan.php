<?php

session_start();
require 'koneksi.php';

if(!isset($_SESSION['loginTokoPrinter'])){
    header("Location: index.php");
}

$username = $_SESSION['loginTokoPrinter'];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE username='$username'"));
$idUser = $user['id_user'];
$orders = mysqli_query($conn, "SELECT *, COUNT(*) as total FROM orders WHERE id_user=$idUser GROUP BY id_product, payment, courier, status");

?>


  
<!DOCTYPE html>
<html lang="en">
<title>Pesanan - Toko Printer</title>
<body>
      
<?php include 'layout/navbar.php'; ?>
<table class="styled-table">
    <thead>
        <tr>
            <th>No Order</th>
            <th>Nama Barang</th>
            <th>Total Barang</th>
            <th>Harga Barang (1 Produk)</th>
            <th>Total Bayar</th>
            <th>Pembayaran</th>
            <th>Kurir</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($orders as $order): ?>
        <?php $idProduct=$order['id_product'];$product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE id=$idProduct")); ?>
        <tr>
            <td><?= $order['id'] ?></td>
            <td><?= $product['name'] ?></td>
            <td><?= $order['total'] ?></td>
            <td><?= number_format($product['price']) ?></td>
            <td><?= number_format($order['total']*$product['price']) ?></td>
            <td><?= $order['payment'] ?></td>
            <td><?= $order['courier'] ?></td>
            <td><?= $order['status'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>