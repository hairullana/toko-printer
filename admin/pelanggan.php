<?php

session_start();
require '../koneksi.php';

if(!isset($_SESSION['loginTokoPrinter']) || $_SESSION['loginTokoPrinter'] != 'admin'){
    header("Location: ../index.php");
}

$customers = mysqli_query($conn, "SELECT * FROM user");

?>

<html>
    <head>
        <title>Data Pelanggan</title>
        <style>
            td {
                padding: 10px;
            }
        </style>
    </head>
    <body>
        <?php include '../layout/sidebar.php'; ?>

        <div style="text-align: center;">
            <h3>Data Pelanggan</h3>
        </div>

        <div style="margin-left:15rem">
            <table border="1">
                <tr>
                    <td>ID</td>
                    <td>Nama Lengkap</td>
                    <td>Username</td>
                    <td>Role</td>
                </tr>
                <?php foreach($customers as $customer): ?>
                    <tr>
                        <td><?= $customer['id_user'] ?></td>
                        <td><?= $customer['nama_lengkap'] ?></td>
                        <td><?= $customer['username'] ?></td>
                        <td><?= $customer['roles'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </body>
</html>