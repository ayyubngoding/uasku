
<?php
require 'functionobat.php';
$id = $_GET['hapus'];
if (hapus($id) > 0) {
    echo "
    <script>
    alert('data berhasil hapus');
    document.location.href='pembelian.php';
    </script>
    
    ";
} else {
    echo "
    
    <script>
    alert('gagal');
    document.location.href='pembelian.php';
    </script>
    
    ";
    echo mysqli_error($conn);
}


?>
