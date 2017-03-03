<?php
require_once 'init.php';
error_reporting(0);
$login=false;
if($_SESSION['pengguna']) {
  $login=true;
}

 ?>
 <?php if ($login==true): ?>
<?php include_once 'view/header.php' ?>

			<div class="main-content">
				<div class="main-content-inner">
						<div class="row">
							<div class="col-xs-12">
								<div class="row">
		                <div class="col-lg-12">
		                  <center> <h3 class="page-header"> Slamat Datang di Sistem Penjualan Toko Gitar</h3></center>
		                </div>
		            </div>

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
