<?php
function cek_login($usr_nm,$pass){
  global $con;

  $qry="SELECT * FROM `pelanggan`WHERE pelanggan.usernm='$usr_nm'and pelanggan.pass='$pass';";
  $hasil=mysqli_query($con, $qry);
  if(mysqli_num_rows($hasil)!=0){
    return true;
  }else {
    return false;
  }

}

function tampil_pelanggan($usr_nm){
  global $con;

  $qry="SELECT * FROM pelanggan where pelanggan.usernm='$usr_nm'";
  $hasil=mysqli_query($con, $qry);
  return $hasil;
}


 ?>
