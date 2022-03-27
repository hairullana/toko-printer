<?php

session_start();
require '../koneksi.php';

if(!isset($_SESSION['loginTokoPrinter']) || $_SESSION['loginTokoPrinter'] != 'admin'){
    header("Location: ../index.php");
}


$orders = mysqli_query($conn, "SELECT *, COUNT(*) as total FROM orders GROUP BY id_product, payment, courier, status, id_user");

if(isset($_POST['status'])){
    $id_user = $_POST['id_user'];
    $id_product = $_POST['id_product'];
    $payment = $_POST['payment'];
    $courier = $_POST['courier'];
    $statusOld = $_POST['statusOld'];
    $status = $_POST['status'];

    mysqli_query($conn, "UPDATE orders SET status='$status' WHERE id_user=$id_user AND id_product=$id_product AND payment='$payment' AND courier='$courier' AND status='$statusOld'");
}

?>


<html>
    <head>
    <title>Pesanan</title>
    <style>
        table{
            margin-left: 15rem;
            text-align: center;
        }
        td {
            padding: 1rem;
        }
    </style>
    </head>
    <body>
        <?php include '../layout/sidebar.php'; ?>

        <table class="styled-table" border="1">
            <thead>
                <tr>
                    <th>No Order</th>
                    <td>Pembeli</td>
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
                <?php $idUser=$order['id_user'];$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE id_user=$idUser")); ?>
                <tr>
                    <td><?= $order['id'] ?></td>
                    <td><?= $user['nama_lengkap'] ?></td>
                    <td><?= $product['name'] ?></td>
                    <td><?= $order['total'] ?></td>
                    <td><?= number_format($product['price']) ?></td>
                    <td><?= number_format($order['total']*$product['price']) ?></td>
                    <td><?= $order['payment'] ?></td>
                    <td><?= $order['courier'] ?></td>
                    <td>
                        <?= $order['status'] ?>
                        <div>
                            <?php if($order['status'] != 'Selesai'): ?>
                            <form method="POST">
                                <input type="hidden" name="id_user" value="<?= $order['id_user'] ?>">
                                <input type="hidden" name="id_product" value="<?= $order['id_product'] ?>">
                                <input type="hidden" name="payment" value="<?= $order['payment'] ?>">
                                <input type="hidden" name="courier" value="<?= $order['courier'] ?>">
                                <input type="hidden" name="statusOld" value="<?= $order['status'] ?>">
                                <select name="status" id="">
                                    <option value="Diproses">Diproses</option>
                                    <option value="Dikirim">Dikirim</option>
                                    <option value="Selesai">Selesai</option>
                                </select>
                                <button type="submit">update</button>
                            </form>
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>