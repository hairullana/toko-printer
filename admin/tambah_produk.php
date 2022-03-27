<?php

session_start();
require '../koneksi.php';

if(!isset($_SESSION['loginTokoPrinter']) || $_SESSION['loginTokoPrinter'] != 'admin'){
    header("Location: ../index.php");
}

if(isset($_POST['add'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category = $_POST['category'];


    //data cover
    $ukuranFile = $_FILES["foto"]["size"];
    $temp = $_FILES["foto"]["tmp_name"];
    $namaFile = $_FILES["foto"]["name"];
    $error = $_FILES["foto"]["error"];

    //CEK apakah gambar di upload ada gak
    if ( $error == 4 ) {
        echo "
        <script>
            alert('Silahkan inputkan gambar !');
            document.location.href = 'produk.php';
        </script>
        ";
        return false;
    }

    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.',$namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    //CEK $ekstensiGambar ada di array $ekstensiGambarValid
    if ( !in_array($ekstensiGambar,$ekstensiGambarValid) ){
        echo "
            <script>
                alert('yang anda masukkan bukan gambar');
                document.location.href = 'produk.php';
            </script>
        ";
    }
    if ( $ukuranFile > 3000000 ) {
        echo "
            <script>
                alert('ukuran gambar terlalu besar');
                document.location.href = 'produk.php';
            </script>
        ";
    }
    
    mysqli_query($conn, "INSERT INTO products VALUES('','$name',$price,'$description',$category)");
    $last = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC LIMIT 1");
    $last = mysqli_fetch_assoc($last);
    $last = $last['id'];
    // var_dump($last);die;
    move_uploaded_file($temp,'../foto/' . $last . '.png');
    echo "<script>alert('berhasil')</script>";

    header("Location: produk.php");
}

?>

<html>
    <head>
        <title>Tambah Produk</title>
        <style>
            td {
                padding: 10px;
            }
        </style>
    </head>
    <body>
        <?php include '../layout/sidebar.php'; ?>

        <div style="text-align: center;">
            <h3>Tambah Barang</h3>
            <form action="" method="POST" enctype="multipart/form-data">
                <p>Nama: <input type="text" name="name"></p>
                <p>Harga: <input type="number" name="price"></p>
                <p>Deskripsi: <textarea name="description"></textarea></p>
                <p>Kategori:
                    <select name="category">
                        <?php
                        foreach (mysqli_query($conn, "SELECT * FROM categories") as $c):
                        ?>
                        <option value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </p>
                <p><input type="file" name="foto"></p>
                <button type="submit" name="add">Add</button>
            </form>
        </div>
    </body>
</html>