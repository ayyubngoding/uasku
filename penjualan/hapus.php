
<?php
require 'functionobat.php';
session_start();
if (!isset($_SESSION['login'])) {
    header('Location:../admin/login.php');
    exit();
}
$id = $_GET['hapus'];
if (hapus($id) > 0) {
    echo "
    <script>
    alert('data berhasil hapus');
    document.location.href='penjualan.php';
    </script>
    
    ";
} else {
    echo "
    
    <script>
    alert('gagal');
    document.location.href='penjualan.php';
    </script>
    
    ";
    echo mysqli_error($conn);
}


?>
