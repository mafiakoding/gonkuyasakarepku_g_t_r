<?php
function tampil_pemesanan(){
  global $con;

  $qry="SELECT * from pemesanan where status=0";
  $hasil=mysqli_query($con, $qry);

 // if(mysqli_num_rows($hasil)>0){
    return $hasil;
//  }else{ return false; }
}

function tampil_pemesanan2(){
  global $con;

  $qry="SELECT * from pemesanan where status=1";
  $hasil=mysqli_query($con, $qry);
  return $hasil;
}

function tampil_pembayaran_by_id($kd_transaksi){
  global $con;

  $qry="SELECT * from pembayaran where pembayaran.kd_pemesanan='$kd_transaksi'";
  $hasil=mysqli_query($con, $qry);
  return $hasil;
}

function tampil_pc(){
  global $con;

  $qry="SELECT * from produk_custom";
  $hasil=mysqli_query($con, $qry);
  return $hasil;
}

 ?>
