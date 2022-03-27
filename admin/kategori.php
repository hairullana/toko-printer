<?php

session_start();
require '../koneksi.php';

if(!isset($_SESSION['loginTokoPrinter']) || $_SESSION['loginTokoPrinter'] != 'admin'){
    header("Location: ../index.php");
}

$categories = mysqli_query($conn, "SELECT * FROM categories");

?>

<html>
    <head>
        <title>Kategori</title>
    </head>
    <body>
        <?php include '../layout/sidebar.php'; ?>

        <div style="text-align:center">
            <a href="tambah_kategori.php">tambah kategori</a>
        
            <br>
            <br>
            <br>

            <?php foreach($categories as $category): ?>
                <div>
                    - <?= $category['name'] ?> <a href="edit_kategori.php?id=<?= $category['id'] ?>">edit</a>|<a href="hapus_kategori.php?id=<?= $category['id'] ?>">hapus</a>
                </div>
            <?php endforeach; ?>

        </div>
    </body>
</html>