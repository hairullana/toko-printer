<?php


?>
<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" href="printer.png" type="image/x-icon">
<title>Cart-Toko Printer</title>
<body>
      
<?php include '../layout/navbar.php'; ?>
<div class="container-cart">
<h2>Keranjang saya</h2>
<div class="cart-body">
    <img src="printer1.png" class="cart-img">
</div>
<div class="text-cart">
    <h3>Printer Canon MP830</h3>
    <p>Rp.290.000.00</p>
    <p class="product-quantity"> Jumlah : <a href="kurangBarang.php"><button class="quantity-button">-</button></a>1<a href="TambahBarang.php"><button class="quantity-button">+</button></a></p>
    <a href="hapusBarang.php"><button type="submit" name="hapus" class="remove">Hapus</button></a>
</div>
<div class="total-body">
    <p>Total Price : Rp.290.000.00</p>
    <p>Jumlah Item : 1 </p><hr>
    <a href="checkout.php"><button type="submit" name="checkout" class="cek">Proses to Checkout !</button></a>
</div>
</div>
</body>
</html>