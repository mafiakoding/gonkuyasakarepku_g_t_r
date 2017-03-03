<?php
require_once 'init.php';

$login=false;
if($_SESSION['pengguna']) {
  $login=true;
}
 ?>
<?php include 'view/header.php'; ?>
	<div class="container">
    <div class="register-req">
      <p><h4><b>Silahkan lakukan pembayaran pada salah satu rekening kami, sebelum konfirmasi pembayaran.. :</b></h4></p>
      " Setelah melakukan pemesanan No rekening pembayaran dan daftar belanja akan dikirim ke email anda "
      <table>
        <tr>
          <td style="width:150px"><img src="gambar/mandiri.png" height="90" width="300" style="border-radius:10px 10px 10px 10px; margin:10px;" ></td>
          <td><h3>0256-2342-23462-2345-04<br><h5>An : Adika<h5></h3></td>
        </tr>
        <tr>
          <td><img src="gambar/bca.png" height="90" width="300" style="border-radius:10px 10px 10px 10px; margin:10px;" ></td>
          <td><h3>4566-45656-456555-456-5<br><h5>An : Adika<h5></h3></td>
        </tr>
        <tr>
          <td><img src="gambar/bni.png" height="90" width="300" style="border-radius:10px 10px 10px 10px; margin:10px;" ></h3></td>
          <td><h3>234-56467-4556-4566-546<br><h5>An : Adika<h5></h3></td>
        </tr>
        <tr>
          <td><img src="gambar/bri.png" height="90" width="300" style="border-radius:10px 10px 10px 10px; margin:10px;" ></h3></td>
          <td><h3>4565-56-567-678-0456456<br><h5>An : Adika<h5></h3></td>
        </tr>
      </table>
    </div><!--/register-req-->
  </div>

<?php include 'view/footer.php'; ?>

<?php  

if (!empty($_GET['kd'])){ ?>
<form method="post" id="formku" action="email/daftar_belanja.php?kd=<?php echo $_GET['kd']; ?>" target="_blank" >
<button type="submit"></button>
</form>
<script type="text/javascript"> document.getElementById('formku').submit(); </script>

<form method="post" id="formku" action="test.php?kd=<?php echo $_GET['kd']; ?>" target="_blank" >
<button type="submit"></button>
</form>
<script type="text/javascript"> document.getElementById('formku').submit(); </script>
<?php
}

?>