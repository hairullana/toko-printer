<?php

session_start();

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
            <th>Status</th>
            <th>Kurir</th>
            <th>Info</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Printer Canon MP830</td>
            <td>1</td>
            <td>Rp.290.000.00</td>
            <td>Rp.290.000.00</td>
            <td>DANA</td>
            <td>Proses</td>
            <td>Instan</td>
            <td>Diterima</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Epson LQ-2190 Dot Matrix Printer</td>
            <td>3</td>
            <td>Rp.200.000.00</td>
            <td>Rp.600.000.00</td>
            <td>COD</td>
            <td>Proses</td>
            <td>Premium</td>
            <td>Belum Terkirim</td>
        </tr>
    </tbody>
</table>
</body>
</html>