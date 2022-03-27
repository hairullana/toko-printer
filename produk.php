<?php

session_start();
require 'koneksi.php';

$products = mysqli_query($conn, "SELECT * FROM products");

?>
<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" href="printer.png" type="image/x-icon">
<title>Produk - Toko Printer</title>
<body>
      
<?php include 'layout/navbar.php'; ?>
<div class="container">
	<div class="row" id="search">
		<form id="search-form" action="" method="POST" enctype="multipart/form-data">
			<div class="form-group col-xs-9">
				<input class="control-search" type="text" placeholder="Search" />
			</div>
	</form> 
</div>
<div class="row" id="filter">
		<form>
			<div class="kategori">
			<select class="list-kategori">
                <option value="">Pilih Kategori</option>
				<option value="">Printer Inkjet</option>
                <option value="">Printer Thernal</option>
                <option value="">Printer Dot Matrix</option>
            </select>
            <button type="submit" class="cari">Cari</button>
        </div>
    <div class="body-product">
        <?php foreach ($products as $product): ?>
            <div class="product">
                <a href="detail.php">
                    <img src="foto/<?= $product['id'] ?>.png" class="foto-product" alt="">
                </a>
                <div class="price-product">
                <h3><?= $product['name'] ?></h3>
                <p>Rp. <?= number_format($product['price']) ?></p>
                <a href="cart.php"><button type="submit" name="addToCart" class="add-cart">Masukan Keranjang </button></a>
                <a href="detail.php"><button type="submit" name="detail" class="detail">Lihat Produk </button></a>
                </div>
            </div>
        <?php endforeach; ?>
    </div> <br> <br> <br>
</body>
</html>