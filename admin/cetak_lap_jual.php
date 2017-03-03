<?php
 // Define relative path from this script to mPDF
 $nama_dokumen='Formulir Booking Sunrisedive'; //Beri nama file PDF hasil.
define('_MPDF_PATH','mpdf60/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document

//Beginning Buffer to save PHP variables and HTML tags
ob_start();
require_once 'init.php';
global $con;
$tgl_awal=$_POST['tgl_awal'];
$tgl_akhir=$_POST['tgl_akhir'];
$barang=$_POST['barang'];
$bhs_qry="SELECT * from pemesanan, det_pemesanan, pembayaran where pemesanan.status=1 and pemesanan.kd_pemesanan = det_pemesanan.kd_pemesanan and pemesanan.kd_pemesanan = pembayaran.kd_pemesanan;";
$bhs_qry2="SELECT  sum(hrg_total) as jumlashkeseluruhan from pemesanan, pembayaran where pemesanan.status=1 and pemesanan.kd_pemesanan = pembayaran.kd_pemesanan ";
$ini_hasil=mysqli_query($con, $bhs_qry);
$ini_hasil2=mysqli_query($con, $bhs_qry2);
?>
<!--sekarang Tinggal Codeing seperti biasanya. HTML, CSS, PHP tidak masalah.-->
<!--CONTOH Code START-->
<style>
  table,tr,td{
    border: 1px solid black;
  }
  th, #tfoot{
    background-color: rgb(173, 162, 164);
    font-style: normal;color: white;
  }
</style>
<h2><center>Laporan Penjualan Sepatu Berdasarkan Kode Barang</center></h2>
<p>Dari Tanggal :<?=$tgl_awal?>  S/D Tanggal : <?=$tgl_akhir?></p>
<table>
  <tr>
    <th>Kode Transaksi</th>
    <th>Tanggal Transaksi</th>
    <th>Nama Barang</th>
    <th>Harga Barang</th>
    <th>Jumlah Pembelian</th>
    <th>Total Harga</th>
  </tr>
    <?php while ($rows=mysqli_fetch_assoc($ini_hasil)) :?>
  <tr>
      <td><?=$rows['kd_pemesanan']?></td>
      <td><?=$rows['tgl_transfer']?></td>
      <td><?=$rows['id_produk']?></td>
      <td>Rp <?=number_format($rows['hrg_produk'])?>,-</td>
      <td><?=$rows['jml_produk']?></td>
      <td>Rp <?=number_format($rows['hrg_total'])?>,-</td>
  </tr>
  <?php endwhile; ?>
  <tr id="tfoot">
    <td colspan="5">Total:</td>
    <?php while ($rows=mysqli_fetch_assoc($ini_hasil2)) : ?>
    <td>Rp <?=number_format($rows['jumlashkeseluruhan'])?>,-</td>
  <?php endwhile; ?>
  </tr>
</table>
<?php
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>
