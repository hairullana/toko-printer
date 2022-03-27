<?php

session_start();
require '../koneksi.php';

if(!isset($_SESSION['loginTokoPrinter']) || $_SESSION['loginTokoPrinter'] != 'admin'){
    header("Location: ../index.php");
}

if(!isset($_GET['id'])){
    header("Location: kategori.php");
}

$idCategory = $_GET['id'];
$name = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM categories WHERE id=$idCategory"))['name'];

if(isset($_POST['edit'])){
    $name = $_POST['name'];

    mysqli_query($conn, "UPDATE categories SET name='$name' WHERE id=$idCategory");

    header("Location: kategori.php");
}

?>


<html>
    <head>
        <title>Edit Kategori</title>
    </head>
    <body>
        <?php include '../layout/sidebar.php'; ?>

        <div style="text-align: center; margin-top:15rem;">
            <h3>Edit</h3>
            <form action="" method="POST">
                <input type="text" name="name" value="<?= $name ?>">
                <button type="submit" name="edit">Edit</button>
            </form>
        </div>
    </body>
</html>