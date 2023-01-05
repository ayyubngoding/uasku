<?php

$conn = mysqli_connect('localhost', 'root', '', 'apoetek');

// function query($query)
// {
//     global $conn;
//     $result = mysqli_query($conn, $query);
//     $rows = [];
//     while ($row = mysqli_fetch_assoc($result)) {
//         $rows[] = $row;
//     }
//     return $rows;
// }

function tambah($data)
{
    global $conn;
    // ambil data dari tiap element dalam form
    $kodeobat = htmlspecialchars($data['kodeobat']);
    $namaobat = htmlspecialchars($data['namaobat']);
    $satuan = htmlspecialchars($data['satuan']);
    $kategori = htmlspecialchars($data['kategori']);
    $hargabeli = htmlspecialchars($data['hargabeli']);
    $hargajual = htmlspecialchars($data['hargajual']);
    $expired = htmlspecialchars($data['expired']);
    $stok = htmlspecialchars($data['stock']);

    // query insert data
    $query = "INSERT INTO obat
    values('','$kodeobat','$namaobat','$satuan','$kategori','$hargabeli','$hargajual','$expired','$stok')
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;

    // ambil data dari tiap element dalam form
    $id = htmlspecialchars($data['id']);
    $kodeobat = htmlspecialchars($data['kodeobat']);
    $namaobat = htmlspecialchars($data['namaobat']);
    $satuan = htmlspecialchars($data['satuan']);
    $kategori = htmlspecialchars($data['kategori']);
    $hargabeli = htmlspecialchars($data['hargabeli']);
    $hargajual = htmlspecialchars($data['hargajual']);
    $expired = htmlspecialchars($data['expired']);
    $stok = htmlspecialchars($data['stock']);

    // query update data
    mysqli_query(
        $conn,
        "UPDATE  obat SET
     kode_obat='$kodeobat',
     nama_obat='$namaobat',
     satuan='$satuan',
     kategori='$kategori',
     harga_beli='$hargabeli',
     harga_jual='$hargajual',
     expired='$expired',
     stock='$stok'
     WHERE id_obat='$id'"
    );

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM obat WHERE id_obat=$id");
    // mysqli_affected akan mengembalikan nilai min1 jika eror
    // namun jika benar akan mengembalikan nilai lebih dari 0
    return mysqli_affected_rows($conn);
}

?>
