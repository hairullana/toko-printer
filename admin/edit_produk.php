<?php

session_start();
require '../koneksi.php';

if(!isset($_SESSION['loginTokoPrinter']) || $_SESSION['loginTokoPrinter'] != 'admin'){
    header("Location: ../index.php");
}

if(!isset($_GET['id'])){
    header("Location: kategori.php");
}

$id = $_GET['id'];

$product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE id=$id"));

if(isset($_POST['edit'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    mysqli_query($conn, "UPDATE products SET name='$name', price=$price, description='$description' WHERE id=$id");
    echo "<script>alert('berhasil')</script>";

    header("Location: produk.php");
}

?>

<html>
    <head>
        <title>Edit Produk</title>
    </head>
    <body>
        <?php include '../layout/sidebar.php'; ?>

        <div style="text-align: center; margin-top:15rem;">
            <h3>Edit</h3>
            <form action="" method="POST">
                <p><input type="text" name="name" value="<?= $product['name'] ?>"></p>
                <p><input type="number" name="price" value="<?= $product['price'] ?>"></p>
                <p><textarea name="description"><?= $product['description'] ?></textarea></p>
                
                <button type="submit" name="edit">Edit</button>
            </form>
        </div>
    </body>
</html>