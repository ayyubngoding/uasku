<?php
require 'function.php';
session_start();
if (!isset($_SESSION['login'])) {
    header('Location:../admin/login.php');
    exit();
}
$jumlahDataPerHalaman = 2;
$query = mysqli_query($conn, 'SELECT * FROM suplier');
$jumlahData = mysqli_num_rows($query);
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = isset($_GET['halaman']) ? $_GET['halaman'] : 1;
$awalData = $jumlahDataPerHalaman * $halamanAktif - $jumlahDataPerHalaman;

// $obat = mysqli_query(
//     $conn,
//     "SELECT * FROM obat JOIN satuan ON obat.id_satuan= satuan.id_satuan  LIMIT $awalData,$jumlahDataPerHalaman "
// );
if (isset($_POST['cari'])) {
    $keyword = $_POST['keyword'];
    $suplier = mysqli_query(
        $conn,
        "SELECT * FROM suplier  WHERE
   nama LIKE '%$keyword%' "
    );
} else {
    $suplier = mysqli_query(
        $conn,
        "SELECT * FROM suplier  LIMIT $awalData,$jumlahDataPerHalaman "
    );
}
$no = 1;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    

    <link rel="stylesheet" href="../css/obat.css" >
    <link rel="stylesheet" href="style.css" >

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital,wght@1,600&display=swap" rel="stylesheet">


   

</head>
<body>
    <div class="container-obat">
        <div class="navbar">
            <h2>Page Suplier</h2>
        </div>
        <div class="tambah">
            <a href="tambah.php">
            <button >Tambah Data</button>
            </a>

            <div class="keyword">

                <form action="" method="post">
            <input class="cari" type="text" name="keyword" autofocus placeholder="search" autocomplete="of">
            <button type="submit" name="cari">Cari</button>
            <a href="http://localhost/tampilan/suplier/suplier.php">
            <button type="submit" name="refresh">Refresh</button>
            </a>
            </form>

            </div>
        </div>
        
           
        <div class="content">
      <table border="1" cellspacing="0">

      <tr>
                <th>NO.URUT</th>
                <th>NAMA SUPLIER</th>
                <th>NO.HP</th>
                <th>ALAMAT</th>
                <th colspan="2">AKSI</th>
     </tr>

        <?php while ($row = mysqli_fetch_assoc($suplier)): ?>
        <tr>
           <td><?= $no ?></td>
           <td><?= $row['nama'] ?></td>
           <td><?= $row['nohp'] ?></td>
           <td><?= $row['alamat'] ?></td>

           <td>
            <a href="ubah.php?ubah=<?php echo $row['id_suplier']; ?>">
                <img class="edit" src="../image/update.svg" alt="">
            </a>
           </td>
           <td>
            <a href="hapus.php?hapus=<?= $row[
                'id_suplier'
            ] ?>" onclick="return confirm('Apakah Data Akan di Hapus?')">
            <img class="hapus" src="../image/Delete.svg" alt="">
            </a>
           </td>

        </tr>
           <?php $no++; ?>
        <?php endwhile; ?>

      </table>
      <div class="content-navigasi">
      <div class="jmldata">
      <p>Jumlah Data <?= $jumlahData ?></p>
      </div>
      <!-- navigasi -->
      <div class="navigasi">
        <?php if ($halamanAktif > 1): ?>
            <a href="?halaman=<?= $halamanAktif - 1 ?>">&laquo;</a>
        <?php endif; ?>

      <?php for ($i = 1; $i <= $jumlahHalaman; $i++): ?>
        <?php if ($i == $halamanAktif): ?>
        <a class="halaman" href="penjualan.php?halaman=<?= $i ?>"><?= $i ?></a>
        <?php else: ?>
            <a href="penjualan.php?halaman=<?= $i ?>"><?= $i ?></a>
            <?php endif; ?>
      <?php endfor; ?>

      <?php if ($halamanAktif < $jumlahHalaman): ?>
            <a href="?halaman=<?= $halamanAktif + 1 ?>">&raquo;</a>
        <?php endif; ?>
        </div>
        </div>

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

            <div class="obat">
                <img src="../image/obatn.svg" alt="obat" class="img">
                <a href="../obat/obat.php">
                <button type="button">OBAT</button>
                </a>
            </div>

            <!-- <div class="satuan">
                <a href="../satuan/satuan.php">
                <img src="../image/obatn.svg" alt="satuan" class="img">
                <button type="button">SATUAN</button>
                </a>
            </div> -->

            <!-- <div class="suplier">
                <a href="../suplier/suplier.php">
                <img src="../image/user1.svg" alt="suplier" class="img">
                <button type="button">SUPLIER</button>
                </a>
            </div> -->

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