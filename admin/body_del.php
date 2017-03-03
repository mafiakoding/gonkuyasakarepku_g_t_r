<?php
require_once 'init.php';
error_reporting(0);
$login = false;
if($_SESSION['pengguna']) {
  $login = true;
  $id = $_GET['kd'];
  if (isset($_GET['kd'])) {
    if(del_bd($id)){
    header('location: body.php');
  }else{
    echo "gagal menghapus data";
  }
}
}
?>
