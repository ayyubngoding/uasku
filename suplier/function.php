<?php

$conn = mysqli_connect('localhost', 'root', '', 'apoetek');

function tambah($data)
{
    global $conn;
    // ambil data dari tiap element dalam form
    $nama = htmlspecialchars($data['nama']);
    $nohp = htmlspecialchars($data['nohp']);
    $alamat = htmlspecialchars($data['alamat']);

    // query insert data
    $addmasuk = mysqli_query(
        $conn,
        "INSERT INTO suplier VALUES('','$nama','$nohp','$alamat')"
    );

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;

    // ambil data dari tiap element dalam form
    $id = htmlspecialchars($data['id']);
    $nama = htmlspecialchars($data['nama']);
    $nohp = htmlspecialchars($data['nohp']);
    $alamat = htmlspecialchars($data['alamat']);

    // query update data
    mysqli_query(
        $conn,
        "UPDATE  suplier SET
     nama='$nama',
     nohp='$nohp',
     alamat='$alamat'
     WHERE id_suplier=$id"
    );

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM suplier WHERE id_suplier=$id");
    // mysqli_affected akan mengembalikan nilai min1 jika eror
    // namun jika benar akan mengembalikan nilai lebih dari 0
    return mysqli_affected_rows($conn);
}

?>
