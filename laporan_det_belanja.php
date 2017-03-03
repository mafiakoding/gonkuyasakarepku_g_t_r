
<?php
require_once 'init.php';

$login=false;
if($_SESSION['pengguna']) {
  $login=true;
}


if(isset($_POST['submit'])){
  $fb=$_POST['feedback'];
  $kd=$_POST['kd'];
  $kd_pembelian=$_GET['kd_tran'];

 mysqli_query($con,"update pemesanan set feedback='$fb' where kd_pemesanan='$kd' ");

}


include 'view/header.php'; ?>
<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->


	<section id="cart_items">
		<div class="container">
			

			<div class="review-payment">
        <?php
        global $con;
        $kd_tran=$_GET['kd_pemesanan'];
        $qry="SELECT pembayaran.status,pemesanan.status as status_pesan
              from pemesanan, pembayaran
              where  pembayaran.kd_pemesanan = pemesanan.kd_pemesanan
              and pembayaran.kd_pemesanan='$kd_tran';";
        $result=mysqli_query($con, $qry) or die("gagal menampilkan laporan pembayaran1");
        while ($row=mysqli_fetch_assoc($result)) {
          $status=$row['status'];
          $status2=$row['status_pesan'];
        }
        $qry2="SELECT pembayaran.kd_pemesanan, pelanggan.nama,pemesanan.feedback, pemesanan.tgl_pemesanan, pembayaran.tgl_transfer, pelanggan.telp,
        (Select no_resi from pengiriman where pengiriman.kd_pemesanan=pemesanan.kd_pemesanan)as kd
          From pemesanan, pembayaran, pelanggan
          where pemesanan.kd_pemesanan = pembayaran.kd_pemesanan
          and pelanggan.kd_pelanggan = pemesanan.kd_pelanggan
          and `pembayaran`.`status`=1
          and pembayaran.kd_pemesanan='$kd_tran'
          and pembayaran.kd_pemesanan in(Select pengiriman.kd_pemesanan from pengiriman)";
        $result2=mysqli_query($con, $qry2) or die("gagal menampilkan laporan pembayaran2");
        if (mysqli_num_rows($result2)!=0){ 
          $resi = mysqli_fetch_assoc($result2);
          ?>
        <ol class="cd-multi-steps text-bottom count">
        <li class="visited"><a id="nama" href="#">Pemesanan</a></li>
        <li class="visited"><a id="nama" href="#">Pembayaran</a></li>
        <li class="visited"><a id="nama" href="#">Pengiriman</a>
                  <?php if(!empty($resi['kd'])){ echo " ( ".$resi['kd']." )"; } ?> </a></li>
                  <li <?php if($resi['feedback']!='-'){ ?> class="visited" <?php }else{ echo '#'; } ?> > 
                  <a href="<?php if($resi['feedback']=='-'){ ?>komentar.php?kd_transaksi=<?=$kd_tran?><?php }else{ echo '#'; } ?>" id="nama">Feedback</a></li>
                  </ol>
        </ol>
        <?php
      }else if($status!=0 ){?>
          <ol class="cd-multi-steps text-bottom count">
          <li class="visited"><a id="nama" href="#">Pemesanan</a></li>
          <li class="visited"><a id="nama" href="#">Pembayaran</a></li>
          <li class=""><a id="nama" href="#">Pengiriman</a>
          <li class=""><a id="nama" href="#">Umpan balik</a>
          </ol>

        <?php } else{
          $qry1="SELECT pemesanan.kd_pemesanan, pembayaran.bank, pemesanan.tgl_pemesanan as tgl_pesan, pembayaran.tgl_transfer,
                        pemesanan.kd_pelanggan, pembayaran.status
                from pemesanan, pembayaran
                where  pembayaran.kd_pemesanan = pemesanan.kd_pemesanan
                and pembayaran.kd_pemesanan='$kd_tran'";
          $result1=mysqli_query($con, $qry1) or die("gagal menampilkan laporan pembayaran3");
          if (mysqli_num_rows($result1)!=0) {?>
            <ol class="cd-multi-steps text-bottom count">
            <li class="visited"><a id="nama" href="#">Pemesanan</a></li>
            <li ><em>Pembayaran</em></li>
            <li><em id="nama">Pengiriman</em></li>
            <li><em id="nama">Umpan balik</em></li>
            </ol>
          <?php }else{
          ?>
          <ol class="cd-multi-steps text-bottom count">
          <li class="visited"><a id="nama" href="#">Pemesanan</a></li>
          <li ><a href="bayar.php?id=<?php echo $kd_tran?>" id="nama">Pembayaran</a></li>
          <li><em id="nama">Pengiriman</em></li>
          <li><em id="nama">Umpan balik</em></li>
          </ol>
        <?php }
      }
         ?>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Kode Transaksi</td>
							<td class="price">Nama Barang</td>
              <td class="price">Jumlah</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
            <?php $tampil_pemesanan_by_id=tampil_det_pemesanan_by_id($_GET['kd_pemesanan']);
            while ($row=mysqli_fetch_assoc($tampil_pemesanan_by_id)) {?>
              <tr>
  							<td class="cart_description">
  								<h4><a href=""><?=$row['kd_pemesanan']?></a></h4>
  								<p>Web ID: 1089772</p>
  							</td>
  							<td class="cart_price"><img src="admin/<?=$row['gambar']?>" width=150>
  								<p><?=$row['nama']?></p>
  							</td>
                <td class="cart_price">
  								<p><?=$row['jml_produk']?> Unit</p>
  							</td>
  							<td class="cart_total">
  								<p class="cart_total_price">IDR <?=number_format($row['hrg_produk'])?></p>
  							</td>
  						</tr>
          <?php  } ?>


					</tbody>
				</table>
			</div>

		</div>
	</section> <!--/#cart_items-->


<?php include 'view/footer.php'; ?>
