<?php
require 'functionobat.php';
session_start();
if (!isset($_SESSION['login'])) {
    header('Location:../admin/login.php');
    exit();
}
// cek apakah tombol sudah di klik atau belim
if (isset($_POST['submit'])) {
    //   cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
    <script>
    alert('data berhasil disimpan');
    document.location.href='obat.php';
    </script>
    
    ";
    } else {
        echo "
    
    <script>
    alert('gagal');
    </script>
    
    ";
        echo mysqli_error($conn);
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/obat.css" >
</head>
<body>
    <div class="container-obat">
        <div class="navbar">
            <h2>Page Obat</h2>
        </div>
        <div class="tambah">
            <a href="obat.php">
            <button >Back</button>
            </a>

        </div>

        <div class="content">

     <form action="" method="post">

        <div class="kotak">
            <div class="label">
        <label for="kodeobat">Kode Obat</label>
        </div>
        <input class="inputobat" id="kd" type="text" id="kodeobat" name="kodeobat">
        </div>


        <div class="kotak">
            <div class="label">
        <label for="namaobat">Nama Obat</label>
        </div>
      <input type="text" class="inputobat" id="namaobat" name="namaobat">
        </div>

        <div class="kotak">
        <div class="label"><label for="satuan">Satuan</label>
        </div>
        <input type="text" class="inputobat" id="satuan" name="satuan">
        </div>

        <div class="kotak">
        <div class="label"><label for="kategori">Kategori</label>
        </div>
        <input type="text" class="inputobat" id="kategori" name="kategori">
        </div>

        
        <div class="kotak">
            <div class="label">
                <label for="hargabeli">Harga Beli</label>
            </div>
            <input class="inputobat" type="text" id="hargabeli" name="hargabeli">
        </div>
        
        <div class="kotak">
            <div class="label">
                <label for="hargajual">Harga Jual</label>
            </div>
            <input class="inputobat" type="text" id="hargajual" name="hargajual">
        </div>
        
        <div class="kotak">
            <div class="label">
                <label for="expired">Expired</label>
            </div>
            <input class="inputobat" type="date" id="expired" name="expired">
        </div>

        <div class="kotak">
                <div class="label">
            <label for="stock">Stock</label>
            </div>
            <input class="inputobat" type="text" id="stock" name="stock">
            </div>

        <div class="kotak">
            <div class="label">
                <label for="expired"></label>
            </div>
        <button class="inputobat" id="submit" type="submit" name="submit">Simpan</button>
        </div>
       
     </form>
        </div>

        <div style="width: 270px;" class="sidebar">
            <img src="../image/apotek1.png" alt="logo" >
            <h2>Apotek Salosa</h2>

            <div class="home">
                <img src="../image/home.png" alt="home"class="img">
                <a href="../home.php">
                <button type="button">HOME</button>
                </a>
            </div>

            <!-- <div class="obat">
                <img src="../image/obatn.svg" alt="obat" class="img">
                <a href="../obat/obat.php">
                <button type="button">OBAT</button>
                </a>
            </div> -->

            <!-- <div class="satuan">
                <a href="../satuan/satuan.php">
                <img src="../image/obatn.svg" alt="satuan" class="img">
                <button type="button">SATUAN</button>
                </a>
            </div> -->

            <div class="suplier">
                <img src="../image/user1.svg" alt="suplier" class="img">
                <a href="../suplier/suplier.php">
                <button type="button">SUPLIER</button>
                </a>
            </div>

            <div class="user">
                <img src="../image/user2.svg" alt="user" class="img">
                <a href="../admin/user.php">
                <button type="button">USER</button>
                </a>
            </div>

            <div class="penjualan">
                <img src="../image/transaction.svg" alt="penjualan" class="img">
                <a href="../penjualan/penjualan.php">
                <button type="button">PENJUALAN</button>
                </a>
            </div>

            <div class="pembelian">
                <img src="../image/transaksi.svg" alt="pembelian" class="img">
                <a href="../pembelian/pembelian.php">
                <button type="button">PEMBELIAN</button>
                </a>
            </div>

            <div class="laporan">
                <img src="../image/report.svg" alt="pembelian" class="img">
                <a href="laporan.php">
                <button type="button">LAPORAN</button>
                </a>
            </div>
            <div class="logout">
                <img src="../image/logout.svg" alt="logout" class="img">
                <a href="../admin/logout.php">
                <button type="button">LOGOUT</button>
            </a>
            </div>
        </div>
    </div>
</body>
</html>