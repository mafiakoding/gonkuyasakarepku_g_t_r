<?php
require_once 'init.php';
error_reporting(0);
$login=false;
if($_SESSION['pengguna']) {
  $login=true;
}
$kd_transaksi=$_GET['id'];

 ?>
 <?php if ($login==true): ?>
<?php include_once 'view/header.php' ?>

			<div class="main-content">
				<div class="main-content-inner">
						<div class="row">
							<div class="col-xs-12">
                <div id="page-wrapper" >
                    <div id="page-inner">
                        <div class="row">
                            <div class="col-md-12">
                             <h2>Input Nomer Resi Pengiriman Barang</h2>
                                <h5>Welcome Jhon Deo , Love to see you back. </h5>

                            </div>
                        </div>
                         <!-- /. ROW  -->
                         <hr />
                          <form class="" action="kirim_konf.php" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Advanced Tables -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                             Advanced Tables
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                    <thead>
                                                        <tr>
                                                            <th>Nomer Resi</th>
                                                            <th>No Rek</th>
                                                            <th>Nama Rek</th>
                                                            <th>Tanggal Transfer</th>
                                                            <th>Bank</th>
                                                            <th> </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                      <?php $tampil_pembayaran_by_id=tampil_pembayaran_by_id($kd_transaksi);
                                                      while ($rw=mysqli_fetch_assoc($tampil_pembayaran_by_id)) { ?>
                                                        <tr class="odd gradeX">
                                                          <td>  <input type="text" name="resi" value=""></td>
                                                          <td><?=$rw['no_rek']?></td>
                                                          <td><?=$rw['nm_rek']?></td>
                                                          <td class="center"> <?=$rw['tgl_transfer']?></td>
                                                          <td class="center"> <?=$rw['tgl_transfer']?></td>
                                                          <td class="center">
                                                            <input type="submit" name="submit" value="Kirim">
                                                            <!--a href="pemesanan_konf.php?id=<?=$rw['kd_pemesanan']?>" class="btn btn-success btn-xs" onclick="return konfirmasi();">Konfirmasi</a-->
                                                          </td>
                                                        </tr>
                                                        <tr>
                                                          <!--img src="/../kerajinan/<?=$rw['nota_bukti']?>" alt="" class="col-md-2"/-->
                                                          <label><b>Input Nomer Resi:</b></label><br>

                                                          <input type="hidden" name="id" value="<?=$rw['kd_pemesanan']?>">
                                                        </tr>
                                                    <?php  } ?>
                                                    </tbody>
                                                </table>

                                            </div>

                                        </div>
                                    </div>
                                    <!--End Advanced Tables -->
                                </div>
                            </div>
                          </form>


								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->


			<!--akhir halaman-->
		<?php include_once 'view/footer.php' ?>

<?php else: header('location:login.php');?>

 <?php endif; ?>
