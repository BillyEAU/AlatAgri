<?php
include('../koneksi.php');
require_once("../dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$query = mysqli_query($koneksi, "SELECT * FROM tbl_pembelian");
$html = '<center><h3>Data Transaksi</h3></center><hr/><br>';
$html .= '<table border="1" width="100%">
            <tr style="background-color: red;">
                <th>No</th>
                <th>Pembeli</th>
                <th>Nomor Hp</th>
                <th>Total</th>
                <th>Alamat</th>
                <th>Kurir</th>
                <th>Resi</th>
                <th>Status</th>
                <th>Tanggal Pembelian</th>
            </tr>';
$no = 1;
while ($transaction = mysqli_fetch_array($query)) {
    $html .= "<tr>
                <td>" . $no . "</td>
                <td>" . $transaction['nama_user'] . "</td>
                <td>" . $transaction['nomor_hp'] . "</td>
                <td>Rp. " . number_format($transaction['total_harga']) . "</td>
                <td>" . $transaction['alamat_pengiriman'] . "</td>
                <td>" . $transaction['kurir'] . "</td>
                <td>" . $transaction['resi'] . "</td>
                <td>" . $transaction['status_pembelian'] . "</td>
                <td>" . $transaction['tgl_pembelian'] . "</td>
            </tr>";
    $no++;
}
$html .= "</table>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan-transaksi.pdf');
?>
