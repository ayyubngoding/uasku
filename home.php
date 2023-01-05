<?php
require 'admin/functions.php';
session_start();
if (!isset($_SESSION['login'])) {
    header('Location:admin/login.php');
    exit();
}

$result = mysqli_query($conn, 'SELECT * FROM penjualan');
$obatterjual = mysqli_num_rows($result);

$obat = mysqli_query($conn, 'SELECT * FROM obat');
$jmlobat = mysqli_num_rows($obat);

$result1 = mysqli_query($conn, 'SELECT SUM(total) AS totall FROM penjualan;');
$pendapatan = mysqli_fetch_assoc($result1);

$total = $pendapatan['totall'];
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

   


    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Courgette&family=Francois+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Pacifico&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital,wght@1,600&display=swap" rel="stylesheet">

<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> -->

    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <div class="container-hompage">
        <div  style="margin-left: 270px;" class="heder">
            <h2 class="h2">HOME PAGE</h2>
           
          
        </div>
        <div style="margin-left: 275px; width:78%;" class="content">
            <div class="content-obat ">
                <img src="image/salary.svg" alt="">
                <h3 >OBAT YANG TERJUAL :<span style="color: red;"> <?= $obatterjual ?></span></h3>
            </div>
            <div class="content-penjualan">
            <img src="image/wallet.svg" alt="">
                <h3>TOTAL PENDAPATAN :<span style="color: red;"> <?= $total ?></span></h3>
            </div>
            <div class="content-pembelian">
            <img src="image/drugs.svg" alt="">
                <h3>JUMLAH OBAT : <span style="color: red;"> <?= $jmlobat ?></span></h3>

            </div>
        </div>
        <div  class="content1">
            <div class="artikel">
                <h2>Kami Buka 24 Jam <br> Untuk Anda</h2>
                <p>Rasakan Pengalaman Berbelanja Yang Nyaman, 
                    Menyediakan Obat Obatan Yang Lengkap.</p>
                    <p class="copyright">Salam full stack web developer</p>
            </div>
            <div class="gambar">
            </div>
        </div>
        <div  class="navbar">
            <img class="logo" src="image/apotek1.png" alt="logo" >
            <h2 class="hh2">Apotek Salosa</h2>

            <div class="obat">
                <img src="image/obatn.svg" alt="obat" class="img">
                <a style="text-decoration: none;" href="obat/obat.php">
                <button type="button">OBAT</button>
            </div>
        </a>


        <div class="suplier">
            <img src="image/user1.svg" alt="suplier" class="img">
            <a style="text-decoration: none;" href="suplier/suplier.php">
                <button type="button">SUPLIER</button>
            </div>
        </a>

        <div class="user">
            <img src="image/user2.svg" alt="user" class="img">
            <a style="text-decoration: none;" href="admin/user.php">
                    <button type="button">USER</button>
                </div>
            </a>

            <div class="penjualan">
                <img src="image/transaction.svg" alt="penjualan" class="img">
                <a style="text-decoration: none;" href="penjualan/penjualan.php">
                <button type="button">PENJUALAN</button>
            </div>
        </a>

        <div class="pembelian">
            <img src="image/transaksi.svg" alt="pembelian" class="img">
            <a style="text-decoration: none;" href="pembelian/pembelian.php">
                <button type="button">PEMBELIAN</button>
            </div>
        </a>

        <div class="logout">
            <img src="image/logout.svg" alt="logout" class="img">
            <a style="text-decoration: none;" href="admin/logout.php">
                <button type="button">LOGOUT</button>
            </div>
        </a>
        </div>
    </div>
</body>
</html>