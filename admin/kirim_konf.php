<?php
require_once 'init.php';
$kd_pemesanan=$_POST['id'];
$no_resi=$_POST['resi'];
global $con;

$qr="select * from pengiriman";
$hs=mysqli_query($con, $qr);
$ni=mysqli_num_rows($hs);
$nilai=$ni+1;
$kd="KRM-$nilai";

$qry="INSERT INTO `pengiriman` ( `id_pengiriman`, `kd_pemesanan`, `no_resi`)
VALUES ( '$kd', '$kd_pemesanan', '$no_resi' );";
if ($hasil=mysqli_query($con, $qry)) {
  header('location:penjualan.php');
}else {
  echo "gagal";
}

 ?>
