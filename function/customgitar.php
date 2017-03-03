<?php
$body_gitar = $_POST['body_gitar'];
$bridge_gitar = $_POST['bridge_gitar'];
$headstock_gitar = $_POST['headstock_gitar'];
$fret_gitar = $_POST['fret_gitar'];
$kayu_gitar = $_POST['kayu_gitar'];
$pickup_gitar = $_POST['pickup_gitar'];
$senar_gitar = $_POST['senar_gitar'];
$warna_gitar = $_POST['warna_gitar'];
$kd_pelanggan=$_POST['kd_pelanggan'];
//echo "$body_gitar,$bridge_gitar,$headstock_gitar,$fret_gitar,$kayu_gitar,$pickup_gitar,$senar_gitar,$warna_gitar";
$host="localhost";
$user='root';
$pass='';
$db='gitar';

$con=mysqli_connect($host,$user,$pass,$db)or die('gagal melakukan koneksi');

$query="SELECT * FROM produk_custom";
$result1=mysqli_num_rows(mysqli_query($con, $query));
$result=$result1+1;
if($result<10){
  $id_produk_custom="PCOS-00$result";
}elseif ($result<100) {
  $id_produk_custom="PCOS-0$result";
}else {
  $id_produk_custom="PCOS-$result";
}

$qry="INSERT INTO `produk_custom` ( `id_produk_custom`, `kd_body`, `kd_bridge`, `kd_fret`,
                  `kd_headstock`, `kd_jenis_kayu`, `kd_pelanggan`, `kd_pickup`, `kd_senar`, `kd_warna`)
VALUES ( '$id_produk_custom', '$body_gitar', '$bridge_gitar', '$fret_gitar', '$headstock_gitar', '$kayu_gitar', '$kd_pelanggan', '$pickup_gitar', '$senar_gitar', '$warna_gitar' );";

if($hasil=mysqli_query($con, $qry)){
  echo "Data Telah Tersimpan";
}else {
  echo "Gagal";
}


 ?>
