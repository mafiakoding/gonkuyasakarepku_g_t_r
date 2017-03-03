<?php
require_once 'init.php';
error_reporting(0);
$login=false;
if($_SESSION['pengguna']) {
  $login=true;
}
$kd_transaksi=$_GET['id'];
if(isset($_POST['submit'])){
  $norek=$_POST['norek'];
  $nmrek=$_POST['nmrek'];
  $bank=$_POST['bank'];
  $tgltran=$_POST['tgltran'];
  //echo "$norek,$nmrek,$bank,$tgltran";
  if (!empty(trim($norek))&&!empty(trim($nmrek))&&!empty(trim($_FILES["gambar"]["name"]))) {
        $target_dir = "nota/";
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "gambar tidak terupload.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                echo "Gambar ". basename( $_FILES["gambar"]["name"]). " terlah diupload.";
            } else {
                echo "Ada masalah saat upload gambar.".basename( $_FILES["gambar"]["name"]);
            }

    }
    if (bayar($norek,$nmrek,$bank,$tgltran,$target_file,$kd_transaksi)) {
      header("location:laporan_det_belanja.php?kd_pemesanan=$kd_transaksi");
    }else {
      echo "gagal2";
    }
  }else {
    echo "DATA BELUM LENGKAP!!";
  }
}

 include 'view/header.php'; ?>
<div id="page-wrapper" >
    <div id="page-inner">

         <!-- /. ROW  -->
         <hr />
         <section id="cart_items">
       		<div class="container">

       			<div class="shopper-informations">
       				<div class="row">
       					<div class="col-sm-12">
       						<div class="form-two">
       							<p>Infromasi Pembayaran</p>
       							<form method="post" enctype="multipart/form-data">
       								<input type="text" name="norek" placeholder="Nomer Rekening">
       								<input type="text" name="nmrek" placeholder="Nama Rekening">

                      <select name="bank" >
                        <option value="">-- Bank --</option>
                        <option value="MANDIRI">MANDIRI</option>
                        <option value="BRI">BRI</option>
                      </select><br>
                        <input type="date" name="tgltran" placeholder="Tanggal Transfer">
                        <input type="file" name="gambar" value="">

                    <input type="submit" name="submit" class="btn btn-primary" value="Continue"><br><br>
                    	</form>
       						</div>
       					</div>


       				</div>
       			</div>

       		</div>
       	</section> <!--/#cart_items-->
       </div>
     <!-- /. PAGE INNER  -->
    </div>
<?php include 'view/footer.php'; ?>
