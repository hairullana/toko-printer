<?php

session_start();
require '../koneksi.php';

if(!isset($_SESSION['loginTokoPrinter']) || $_SESSION['loginTokoPrinter'] != 'admin'){
    header("Location: ../index.php");
}

if(isset($_POST['add'])){
    $name = $_POST['name'];

    mysqli_query($conn, "INSERT INTO categories VALUES('','$name')");
    echo "<script>
            alert('berhasil')
        </script>";
    header("Location: kategori.php");
}

?>

<html>
    <head>
        <title>Tambah kategori</title>
    </head>
    <body>
        <?php include '../layout/sidebar.php'; ?>

        <div style="text-align: center; margin-top:15rem;">
            <h3>Add New Category</h3>
            <form action="" method="POST">
                <input type="text" name="name">
                <button type="submit" name="add">Add</button>
            </form>
        </div>
    </body>
</html>