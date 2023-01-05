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
    document.location.href='pembelian.php';
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
            <h2>Page pembelian</h2>
        </div>
        <div class="tambah">
            <a href="pembelian.php">
            <button >Back</button>
            </a>

        </div>

        <div class="content">

     <form action="" method="post">

        <div class="kotak">
            <div class="label">
        <label for="kodeobat">Nama Obat</label>
        </div>
        <select name="idobat" id="idobat" class="inputobat" onchange='changeValue(this.value)' required >  
        <option value="">Pilih </option>

        <?php $pembelian = mysqli_query($conn, 'SELECT * FROM obat'); ?>
                <?php $a = "var harga_jual = new Array();\n;"; ?>
                    <?php while ($row = mysqli_fetch_assoc($pembelian)): ?>
                    <option value="<?= $row['id_obat'] ?>"><?= $row[
    'nama_obat'
] ?></option>
                    <?php $a .=
                        "harga_jual['" .
                        $row['id_obat'] .
                        "'] = {harga_jual:'" .
                        addslashes($row['harga_jual']) .
                        "'};\n"; ?>
                    <?php endwhile; ?>
                     </select>
        </div>


        <div class="kotak">
            <div class="label">
        <label for="namaobat">Nama Suplier</label>
        </div>
        <select name="idsuplier" class="inputobat">
         <option>pilih</option>
        <?php $pembelian = mysqli_query($conn, 'SELECT * FROM suplier'); ?>
            <?php while ($row = mysqli_fetch_assoc($pembelian)): ?>
            <option value="<?= $row['id_suplier'] ?>"><?= $row[
    'nama'
] ?></option>
             <?php endwhile; ?>
        </select>
        </div>

        <div class="kotak">
        <div class="label"><label for="qty">qty</label>
        </div>
        <input type="text" class="inputobat" id="qty" name="qty" >
        </div>

        <div class="kotak">
        <div class="label"><label for="tanggal">tanggal</label>
        </div>
        <input type="date" class="inputobat" id="tanggal" name="tanggal">
        </div>

        
        <div class="kotak">
            <div class="label">
                <label for="harga">Harga</label>
            </div>
            <input class="inputobat" type="text" id="harga" name="harga">
        </div>
        
        <div class="kotak">
            <div class="label">
                <label for="total">Total</label>
            </div>
            <input class="inputobat" type="text" id="total" name="total">
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

            <div class="obat">
                <img src="../image/obatn.svg" alt="obat" class="img">
                <a href="../obat/obat.php">
                <button type="button">OBAT</button>
                </a>
            </div>
<!-- 
            <div class="satuan">
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

            <!-- <div class="pembelian">
                <a href="../pembelian/pembelian.php">
                <img src="../image/transaksi.svg" alt="pembelian" class="img">
                <button type="button">PEMBELIAN</button>
                </a>
            </div> -->
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
<script src="../js/jquery-3.6.1.min.js"></script>
<script>
    $("#qty").keyup(function(){
        let a= parseFloat($("#harga").val());
        let b= parseFloat($("#qty").val());
        let c = a * b;
        $("#total").val(c);
    });
</script>
<script type="text/javascript">   
            <?php echo $a; ?>  
                function changeValue(id){  
                document.getElementById('harga').value = harga_jual[id].harga_jual;
            };  
        </script>  