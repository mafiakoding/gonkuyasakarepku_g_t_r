<?php
function tampil_produk(){
  global $con;

  $qry='SELECT * FROM produk;';
  $hasil=mysqli_query($con,$qry)or die('gagal menampilkan produk');
  return $hasil;

}
function tampil_body(){
  global $con;

  $qry='SELECT * FROM body;';
  $hasil=mysqli_query($con,$qry)or die('gagal menampilkan produk');
  return $hasil;

}
function tampil_bridge(){
  global $con;

  $qry='SELECT * FROM bridge;';
  $hasil=mysqli_query($con,$qry)or die('gagal menampilkan produk');
  return $hasil;

}
function tampil_headstock(){
  global $con;

  $qry='SELECT * FROM headstock;';
  $hasil=mysqli_query($con,$qry)or die('gagal menampilkan produk');
  return $hasil;

}
function tampil_fret(){
  global $con;

  $qry='SELECT * FROM fret;';
  $hasil=mysqli_query($con,$qry)or die('gagal menampilkan produk');
  return $hasil;

}
function tampil_jeniskayu(){
  global $con;

  $qry='SELECT * FROM jenis_kayu;';
  $hasil=mysqli_query($con,$qry)or die('gagal menampilkan produk');
  return $hasil;

}
function tampil_pickup(){
  global $con;

  $qry='SELECT * FROM pickup;';
  $hasil=mysqli_query($con,$qry)or die('gagal menampilkan produk');
  return $hasil;

}
function tampil_senar(){
  global $con;

  $qry='SELECT * FROM senar;';
  $hasil=mysqli_query($con,$qry)or die('gagal menampilkan produk');
  return $hasil;

}
function tampil_warna(){
  global $con;

  $qry='SELECT * FROM warna;';
  $hasil=mysqli_query($con,$qry)or die('gagal menampilkan produk');
  return $hasil;

}






 ?>
