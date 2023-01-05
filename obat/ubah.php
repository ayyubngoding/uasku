<?php
require 'functionobat.php';
session_start();
if (!isset($_SESSION['login'])) {
    header('Location:../admin/login.php');
    exit();
}
// ambil data di url










$id = $_GET['ubah'];

// query data obat berdasarkan id
$query = mysqli_query($conn, "SELECT * FROM obat WHERE  id_obat=$id");

$row = mysqli_fetch_assoc($query);

// cek apakah tombol sudah di klik atau belum
if (isset($_POST['submit'])) {
    //   cek apakah data berhasil ditambahkan atau tidak
    if (ubah($_POST) > 0) {
        echo "
    <script>
    alert('data berhasil di ubah');
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
            <h2>Page Ubah Data Obat</h2>
        </div>
        <div class="tambah">
            <a href="obat.php">
            <button >Back</button>
            </a>

        </div>

        <div class="content">

     <form action="" method="post">

     <input type="hidden" name="id" value="<?= $row['id_obat'] ?>">

        <div class="kotak">
            <div class="label">
        <label for="kodeobat">Kode Obat</label>
        </div>
        <input class="inputobat" type="text" id="kodeobat" name="kodeobat"value="<?= $row[
            'kode_obat'
        ] ?>">
        </div>


        <div class="kotak">
            <div class="label">
        <label for="namaobat">Nama Obat</label>
        </div>
      <input type="text" class="inputobat" id="namaobat" name="namaobat" value="<?= $row[
          'nama_obat'
      ] ?>">
        </div>

        <div class="kotak">
        <div class="label"><label for="satuan">Satuan</label>
        </div>
        <input type="text" class="inputobat" id="satuan" name="satuan"  value="<?= $row[
            'satuan'
        ] ?>">
        </div>

        <div class="kotak">
        <div class="label"><label for="kategori">Kategori</label>
        </div>
        <input type="text" class="inputobat" id="kategori" name="kategori"  value="<?= $row[
            'kategori'
        ] ?>">
        </div>

        <div class="kotak">
            <div class="label">
        <label for="hargabeli">Harga Beli</label>
        </div>
        <input class="inputobat" type="text" id="hargabeli" name="hargabeli" value="<?= $row[
            'harga_beli'
        ] ?>">
        </div>

        <div class="kotak">
            <div class="label">
        <label for="hargajual">Harga Jual</label>
        </div>
        <input class="inputobat" type="text" id="hargajual" name="hargajual" value="<?= $row[
            'harga_jual'
        ] ?>">
        </div>

        <div class="kotak">
            <div class="label">
        <label for="expired">Expired</label>
        </div>
        <input class="inputobat" type="date" id="expired" name="expired" value="<?= $row[
            'expired'
        ] ?>">
        </div>

        <div class="kotak">
            <div class="label">
        <label for="stock">stock</label>
        </div>
        <input class="inputobat" type="number" id="stock" name="stock" value="<?= $row[
            'stock'
        ] ?>">
        </div>

        <div class="kotak">
            <div class="label">
        <label for="expired"></label>
        </div>
        <button class="inputobat" id="submit" type="submit" name="submit">Update</button>
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

<?php
//  if (isset($_POST['submit'])) {
//     // ambil data dari tiap element dalam form
//     $kodeobat = htmlspecialchars($_POST['kodeobat']);
//     $namaobat = htmlspecialchars($_POST['namaobat']);
//     $satuan = htmlspecialchars($_POST['satuan']);
//     $stok = htmlspecialchars($_POST['stock']);
//     $hargajual = htmlspecialchars($_POST['hargajual']);
//     $expired = htmlspecialchars($_POST['expired']);

//     // query update data
//     mysqli_query(
//         $conn,
//         "UPDATE  obat SET
//    kode_obat='$kodeobat',
//    nama_obat='$namaobat',
//    id_satuan='$satuan',
//    stok='$stok',
//    harga_jual='$hargajual',
//    expired='$expired'
//    WHERE id_obat=$_GET[edit]"
//     );

//     echo "<script>
//        alert('data berhasil diubah');
//        document.location.href='obat.php';
//        </script> ";
// }
?>