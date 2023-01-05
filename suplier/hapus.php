<?php
require 'function.php';
session_start();
if (!isset($_SESSION['login'])) {
    header('Location:../admin/login.php');
    exit();
}
$id = $_GET['hapus'];
if (hapus($id) > 0) {
    echo "<script>
        alert ('Data Berhasil Disimpan');
        document.location.href='suplier.php';
        </script>";
} else {
    echo "<script>
        alert ('Data Gagal Disimpan');
        </script>";
    mysqli_error($conn);
}

?>
