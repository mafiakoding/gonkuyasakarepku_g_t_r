
<?php
require_once 'init.php';

$login=false;
if($_SESSION['pengguna']) {
  $login=true;
}
$tampil_pelanggan=tampil_pelanggan($_SESSION['pengguna']);
while ($rw=mysqli_fetch_assoc($tampil_pelanggan)) {
  $kd_pelanggan=$rw['kd_pelanggan'];
}

 if ($login==true):
include 'view/header.php'; ?>


	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="checkout.php">View Check out</a></li>
				</ol>
			</div><!--/breadcrums-->


			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Kode Transaksi</td>
							<td class="price">Tanggal Pemesanan</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
            <?php $tampil_pemesanan_by_id=tampil_pemesanan_by_id($kd_pelanggan);
            while ($row=mysqli_fetch_assoc($tampil_pemesanan_by_id)) {?>
              <tr>
  							<td class="cart_description">
  								<h4><a href="laporan_det_belanja.php?kd_pemesanan=<?=$row['kd_pemesanan']?>"><?=$row['kd_pemesanan']?> ( View detail ) </a></h4>
  								<p>Web ID: 1089772</p>
  							</td>
  							<td class="cart_price">
  								<p><?=$row['tgl_pemesanan']?></p>
  							</td>
  							<td class="cart_total">
  								<p class="cart_total_price">IDR <?=number_format($row['hrg_total'])?></p>
  							</td>
  						</tr>
          <?php  } ?>


					</tbody>
				</table>
			</div>

		</div>
	</section> <!--/#cart_items-->


<?php include 'view/footer.php'; ?>
<?php else: header('location:login.php');?>
<?php endif; ?>
