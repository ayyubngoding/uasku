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
    $idobat = htmlspecialchars($data['idobat']);
    $idsuplier = htmlspecialchars($data['idsuplier']);
    $qty = htmlspecialchars($data['qty']);
    $tanggal = htmlspecialchars($data['tanggal']);
    $harga = htmlspecialchars($data['harga']);
    $total = htmlspecialchars($data['total']);

    $cekstockobat = mysqli_query(
        $conn,
        "SELECT * FROM obat WHERE id_obat=$idobat"
    );
    $ambildatanya = mysqli_fetch_assoc($cekstockobat);

    $stocksekarang = $ambildatanya['stock'];
    $tambahstocksekarangdgnqty = $stocksekarang + $qty;

    // query insert data
    $addmasuk = mysqli_query(
        $conn,
        "INSERT INTO pembelian VALUES('','$idobat','$idsuplier','$qty','$tanggal','$harga','$total')"
    );
    $updatestockobat = mysqli_query(
        $conn,
        "UPDATE obat SET stock='$tambahstocksekarangdgnqty' WHERE id_obat=$idobat"
    );

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;

    // ambil data dari tiap element dalam form
    $idpembelian = htmlspecialchars($data['id']);
    $idobat = htmlspecialchars($data['idobat']);
    $idsuplier = htmlspecialchars($data['idsuplier']);
    $qty = htmlspecialchars($data['qty']);
    $tanggal = htmlspecialchars($data['tanggal']);
    $harga = htmlspecialchars($data['harga']);
    $total = htmlspecialchars($data['total']);

    // query update data
    mysqli_query(
        $conn,
        "UPDATE  pembelian SET
     id_obat='$idobat',
     id_suplier='$idsuplier',
     qty='$qty',
     tanggal='$tanggal',
     harga='$harga',
     total='$total'
     WHERE id_pembelian=$idpembelian"
    );

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM pembelian WHERE id_pembelian=$id");
    // mysqli_affected akan mengembalikan nilai min1 jika eror
    // namun jika benar akan mengembalikan nilai lebih dari 0
    return mysqli_affected_rows($conn);
}

?>
