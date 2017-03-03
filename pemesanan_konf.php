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

$qry="UPDATE `pembayaran` SET    `status` = 1 WHERE	`kd_pemesanan` = '$kd_pemesanan';";
$qry.="UPDATE `pemesanan` SET    `status` = 1 WHERE	`kd_pemesanan` = '$kd_pemesanan';";
if ($hasil=mysqli_multi_query($con, $qry)) {
  header('location:pemesanan.php');
}else {
  echo "gagal";
}

 ?>
