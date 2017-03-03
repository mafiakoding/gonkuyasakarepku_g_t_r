<?php
$host="localhost";
$user='root';
$pass='';
$db='gitar';

$con=mysqli_connect($host,$user,$pass,$db)or die('gagal melakukan koneksi');
$nil = $_POST['nilai_sekarang'];


$qry="select * from bridge where kd_bridge='$nil'";
$hasil=mysqli_query($con, $qry);
while ($row=mysqli_fetch_assoc($hasil)) {
echo  $gambar=$row['gambar'];
//  echo "<img width='250' height='250' alt='150x150' src='admin/$gambar'>";
  //echo "$gambar";
}


 ?>