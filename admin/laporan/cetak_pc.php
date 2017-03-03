<?php
 // Define relative path from this script to mPDF
 $nama_dokumen='Formulir Booking Sunrisedive'; //Beri nama file PDF hasil.
define('_MPDF_PATH','../mpdf60/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document

//Beginning Buffer to save PHP variables and HTML tags
ob_start();
require_once '../init.php';
global $con;

$id=$_GET['id_custom'];

$bhs_qry="SELECT  produk_custom.id_produk_custom, headstock.nama as nama_headstock, headstock.harga as harga_headstock,
body.nama as nama_body, body.harga as harga_body,
fret.nama as nama_fret, fret.harga as harga_fret,
bridge.nama as nama_bridge, bridge.harga as harga_bridge,
pickup.nama as nama_pickup, pickup.harga as harga_pickup,
warna.nama as nama_warna, warna.harga as harga_warna,
senar.nama as nama_senar, senar.harga as harga_senar,
jenis_kayu.nama as nama_jk, jenis_kayu.harga as harga_jk
from produk_custom, headstock, fret, bridge, pickup, warna, senar, jenis_kayu, body
where produk_custom.kd_body = body.kd_body
and produk_custom.kd_headstock = headstock.kd_headstock
and produk_custom.kd_fret = fret.kd_fret
and produk_custom.kd_bridge = bridge.kd_bridge
and produk_custom.kd_pickup = pickup.kd_pickup
and produk_custom.kd_jenis_kayu = jenis_kayu.kd_kayu
and produk_custom.kd_senar = senar.kd_senar
and produk_custom.kd_warna = warna.kd_warna
and produk_custom.id_produk_custom='$id'";
$bhs_qry2="select pelanggan.nama,pelanggan.kd_pelanggan,(headstock.harga+body.harga+fret.harga + bridge.harga + pickup.harga + warna.harga+senar.harga +jenis_kayu.harga ) as toharga
from produk_custom, headstock, fret, bridge, pickup, warna, senar, jenis_kayu, body
left join pelanggan on pelanggan.kd_pelanggan=produk_custom.kd_pelanggan
where produk_custom.kd_body = body.kd_body
and produk_custom.kd_headstock = headstock.kd_headstock
and produk_custom.kd_fret = fret.kd_fret
and produk_custom.kd_bridge = bridge.kd_bridge
and produk_custom.kd_pickup = pickup.kd_pickup
and produk_custom.kd_jenis_kayu = jenis_kayu.kd_kayu
and produk_custom.kd_senar = senar.kd_senar
and produk_custom.kd_warna = warna.kd_warna
and produk_custom.id_produk_custom='$id'";
$ini_hasil=mysqli_query($con, $bhs_qry);
$ini_hasil2=mysqli_query($con, $bhs_qry2);
while ($rw=mysqli_fetch_assoc($ini_hasil)) {
  $nama_headstock=$rw['nama_headstock'];
  $nama_body=$rw['nama_body'];
  $nama_fret=$rw['nama_fret'];
  $nama_bridge=$rw['nama_bridge'];
  $nama_pickup=$rw['nama_pickup'];
  $nama_warna=$rw['nama_warna'];
  $nama_senar=$rw['nama_senar'];
  $nama_jk=$rw['nama_jk'];
  $harga_headstock=$rw['harga_headstock'];
  $harga_body=$rw['harga_body'];
  $harga_fret=$rw['harga_fret'];
  $harga_bridge=$rw['harga_bridge'];
  $harga_pickup=$rw['harga_pickup'];
  $harga_warna=$rw['harga_warna'];
  $harga_senar=$rw['harga_senar'];
  $harga_jk=$rw['harga_jk'];
}
while ($r=mysqli_fetch_assoc($ini_hasil2)) {
  $total=$r['toharga'];
}
?>
<!--sekarang Tinggal Codeing seperti biasanya. HTML, CSS, PHP tidak masalah.-->
<!--CONTOH Code START-->
<style>
  table,tr,td{
    border: 0px solid black;
  }
  th, #tfoot{
    background-color: rgb(173, 162, 164);
    font-style: normal;color: white;
  }
</style>
<h4><center>Custom produk '<?=$_GET['id_custom']; ?>'</center></h4>

<table>
  <tr>
    <th>
      Nama barang
    </th>
    <th>Merek</th>
    <th>Harga</th>
  </tr>
  <tr>
    <td>Headstock</td>
    <td><?=$nama_headstock?></td>
    <td><?=number_format($harga_headstock)?></td>
  </tr>
  <tr>
      <td>Body</td>
    <td><?=$nama_body?></td>
    <td><?=number_format($harga_body)?></td>
  </tr>
  <tr>
    <td>Fret</td>
    <td><?=$nama_fret?></td>
    <td><?=number_format($harga_fret)?></td>
  </tr>
  <tr>
    <td>Bridge</td>
    <td><?=$nama_bridge?></td>
    <td><?=number_format($harga_bridge)?></td>
  </tr>
  <tr>
      <td>Pickup</td>
    <td><?=$nama_pickup?></td>
    <td><?=number_format($harga_pickup)?></td>
  </tr>
  <tr>
      <td>Warna</td>
    <td><?=$nama_warna?></td>
    <td><?=number_format($harga_warna)?></td>
  </tr>
  <tr>
      <td>Senar</td>
    <td><?=$nama_senar?></td>
    <td><?=number_format($harga_senar)?></td>
  </tr>
  <tr>
      <td>Jenis Kayu</td>
    <td><?=$nama_jk?></td>
    <td><?=number_format($harga_jk)?></td>
  </tr>
  <tr id="tfoot">
    <td colspan="2">
      Total
    </td>
    <td><?= number_format($total)?>
    </td>
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
