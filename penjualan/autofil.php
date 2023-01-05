<?php

require 'functionobat.php';
//variabel namaobat yang dikirimkan tambah.php
$nama = $_GET['namaobat'];
// echo $nama;
//mengambil data
$query = mysqli_query(
    $conn,
    "select * from obat where nama_obat LIKE '" . $nama . "%'"
);
$userid = mysqli_fetch_array($query);
// echo print_r($userid);
$data = [
    // 'nama_obat' => @$userid['namaobat'],
    'harga_jual' => @$userid['harga_jual'],
];

//tampil data
echo json_encode($data);
?>
