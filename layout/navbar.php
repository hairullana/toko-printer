<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="printer.png" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="style/index.css">
    <title>Beranda</title>
</head>
<body>
    <div>
    <section class="navigation">
  <div class="nav-container">
    <div class="brand">
    <img src="printer.png" alt="" class="img">
      <a href="index.php">Toko Printer</a>
    </div>
    <nav>
      <div class="nav-mobile"><a id="nav-toggle" ><span></span></a></div>
      <ul class="nav-list">
        <li>
          <a href="index.php">Home</a>
        </li>
        <li>
          <a href="produk.php">Produk</a>
        </li>
        <li>
          <a href="cart.php">Cart</a>
        </li>
        <li>
          <a href="pesanan.php">Informasi Pesanan</a>
        </li>
        <?php if(isset($_SESSION['loginTokoPrinter'])) : ?>
          <li>
            <a href="logout.php">Log Out |</a>
          </li>
          <li>
            <h4>Halo, <?= $_SESSION['loginTokoPrinter'] ?></h4>
          </li>
        <?php else : ?>
          <li>
            <a href="login">Login</a>
          </li>
        <?php endif; ?>
      </ul>
    </nav>
  </div>
    </section>
    </div>
</body>
</html>