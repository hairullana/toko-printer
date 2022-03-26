<?php




?>
<!DOCTYPE html>
<link rel="shortcut icon" href="printer.png" type="image/x-icon">
<html lang="en">
<head>
    <title>Checkout - Toko Printer</title>
</head>
<body>
    <?php include '../layout/navbar.php'; ?>
    <div class="container-check">
        <h3>Checkout</h3>
        <p>Alamat Pengriman</p><hr><br>
        <form action="" >
            <label for="">Alamat lengkap anda</label><br>
            <textarea name="alamat" id="" class="form-alamat" placeholder="Alamat Lengkap. Provinsi. Kota" cols="30" rows="10"></textarea><br>

            <label for="">Kecamatan</label><br>
            <input type="text" name="kecamatan" placeholder="Kel." class="form-phone"><br>
            
            <label for="">Kelurahan / Desa</label><br>
            <input type="text" name="kelurahan" placeholder="Kec." class="form-phone"><br>

            <label for="">Nomor Hp</label><br>
            <input type="tel" name="numberPhone" placeholder="No. Handphone Anda" class="form-phone"><br>

            <label for="">Kode Pos</label><br>
            <input type="number" name="KdPos" placeholder="Kode Pos" class="form-kd"><br>
            
            <label for="">Pembayaran</label><br>
            <input type="radio" name="pembayaran" class="ckbox"><span>COD</span>
            <input type="radio" name="pembayaran" class="ckbox"><span>DANA</span>
            <input type="radio" name="pembayaran" class="ckbox"><span>OVO</span>
            <input type="radio" name="pembayaran" class="ckbox"><span>GoPay</span> <br>

            <label for="">Kurir</label><br>
            <input type="radio" name="pembayaran" class="ckbox"><span>Instan</span>
            <input type="radio" name="pembayaran" class="ckbox"><span>Premium</span>
            <input type="radio" name="pembayaran" class="ckbox"><span>Ekonomi</span>
            <input type="radio" name="pembayaran" class="ckbox"><span>Reguler</span>
        </form><br> <hr>
    </div>
    <div class="total-body">
    <p>Total Harga : Rp.290.000.00</p>
    <p>Jumlah Item : 1 </p><hr>
    <a href="confirm.php"><button type="submit" name="bayar" class="cek">Bayar Sekarang !</button></a>
</div>
    <div class="card-order">
        <img src="printer1.png" alt="" class="order-img">
        <h3>Printer Canon MP830</h3>
        <p>Rp.290.000.00</p>
        <p>Jumlah : 1</p>
        <hr>
        <div class="sub">
            <p><b>Subtotal </b> Rp.290.000.00</p>
        </div>
    </div>
    </div>
</body>
</html>