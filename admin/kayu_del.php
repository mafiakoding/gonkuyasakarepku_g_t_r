<?php
require_once 'init.php';
error_reporting(0);
$login = false;
if($_SESSION['pengguna']) {
  $login = true;
  $id = $_GET['kd'];
  if (isset($_GET['kd'])) {
    if(del_ky($id)){
    header('location: jenis_kayu.php');
  }else{
    echo "gagal menghapus data";
  }
}
}
?>
