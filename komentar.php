
<?php
require_once 'init.php';

$login=false;
if($_SESSION['pengguna']) {
  $login=true;
}

include 'view/header.php'; 

$kd=$_GET['kd_transaksi'];

?>
<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->


	<div id="wrapper">
    	<div class="container">
        <div id="wrapper">
            <div class="container">
              <div class="title"><h3>Berikan Feedback</h3></div><br>
              <form method="post" action="laporan_det_belanja.php?kd_pemesanan=<?=$kd?>">
                <input type="text" class="form-control" name="feedback" style="width:30%;" value=""><br>
                <input type="hidden" name="kd" value="<?=$kd?>"><br>
                <input type="submit" name="submit" value="Simpan" required="required" class="btn btn-xs btn-success">
              </form>
            </div>
          </div>
<br>

<?php include 'view/footer.php'; ?>

