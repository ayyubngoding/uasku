<?php

include '../vendor/autoload.php';
require 'functionobat.php';
$no = 1;
$result = mysqli_query(
    $conn,
    'SELECT id_pembelian,nama_obat,nama,qty,harga,total,tanggal from pembelian join obat on obat.id_obat=pembelian.id_obat join suplier on suplier.id_suplier=pembelian.id_suplier'
);

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../obat/style.css">
</head>
<body>

<h1>Apotek Unija</h1>
<h3>Laporan Pembelian</h3>
<hr>
    <table border="1" cellspacing="0" cellpadding="10px">
        <tr>
        <th>NO.URUT</th>
        <th>NAMA OBAT</th>
        <th>NAMA SUPLIER</th>
        <th>QTY</th>
        <th>TANGGAL</th>
        <th>TOTAL</th>
        </tr>';
while ($row = mysqli_fetch_assoc($result)) {
    $html .=
        '<tr>
       
       <td>' .
        $no++ .
        '</td>
       <td>' .
        $row['nama_obat'] .
        '</td>
       <td>' .
        $row['nama'] .
        '</td>
       <td>' .
        $row['qty'] .
        '</td>
       <td>' .
        $row['tanggal'] .
        '</td>
       <td>' .
        $row['total'] .
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



