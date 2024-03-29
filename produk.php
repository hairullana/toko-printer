<?php

session_start();
require 'koneksi.php';

$products = mysqli_query($conn, "SELECT * FROM products");

if (isset($_POST['search'])){
    $keyword = $_POST['search'];
    $products = mysqli_query($conn, "SELECT * FROM products WHERE name LIKE '%$keyword%'");
}

if (isset($_POST['search2'])){
    $id = $_POST['id'];
    $products = mysqli_query($conn, "SELECT * FROM products WHERE id_category=$id");
}


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
				<input class="control-search" type="text" placeholder="Search" name="search" />
			</div>
	</form> 
</div>
<div class="row" id="filter">
		<form method="POST">
			<div class="kategori">
			<select class="list-kategori" name="id">
                <?php foreach (mysqli_query($conn, "SELECT * FROM categories") as $c): ?>
                    <option value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="cari" name="search2">Cari</button>
                </form>
        </div>  
        <?php if (isset($_POST['search'])): ?>
            <h3 style="text-align: center;">menampilkan hasil pencarian "<?= $_POST['search']    ?>"</h3>
        <?php endif ?>
        <?php if (isset($_POST['search2'])): ?>
            <h3 style="text-align: center;">menampilkan kategori "<?= mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM categories WHERE id=$id"))['name'] ?>"</h3>
        <?php endif ?>
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