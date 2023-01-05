
<?php









require 'functionobat.php';
$id = $_GET['hapus'];
if (hapus($id) > 0) {
    echo "
    <script>
    alert('data berhasil hapus');
    document.location.href='obat.php';
    </script>
    
    ";
} else {
    echo "
    
    <script>
    alert('gagal');
    document.location.href='obat.php';
    </script>
    
    ";
    echo mysqli_error($conn);
}


?>
