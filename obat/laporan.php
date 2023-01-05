<?php

include '../vendor/autoload.php';
require 'functionobat.php';
$no = 1;
$result = mysqli_query($conn, 'SELECT * FROM obat');

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Apotek Unija</h1>
<h3>Laporan Data Obat</h3>
<hr>
    <table border="1" cellspacing="0" cellpadding="10px">
        <tr>
        <th>NO.URUT</th>
                <th>KODE OBAT</th>
                <th>NAMA OBAT</th>
                <th>SATUAN</th>
                <th>KATEGORI</th>
                <th>HARGA</th>
                <th>EXPIRED</th>
                <th>STOK</th>
        </tr>';
while ($row = mysqli_fetch_assoc($result)) {
    $html .=
        '<tr>
       
       <td>' .
        $no++ .
        '</td>
       <td>' .
        $row['kode_obat'] .
        '</td>
       <td>' .
        $row['nama_obat'] .
        '</td>
       <td>' .
        $row['satuan'] .
        '</td>
       <td>' .
        $row['kategori'] .
        '</td>
       <td>' .
        $row['harga_jual'] .
        '</td>
       <td>' .
        $row['expired'] .
        '</td>
       <td>' .
        $row['stock'] .
        '</td>
       
       </tr>';
}
$html .= '</table>
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output('Data_Obat.pdf', 'I');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
 
</body>
</html>



