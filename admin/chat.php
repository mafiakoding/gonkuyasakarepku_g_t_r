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
		                  <center> <h3 class="page-header"> Daftar Chat Pelanggan</h3></center>
		                </div>
		            </div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
            <?php
            global $con;
            $query="SELECT * from chat_anggota a inner join pelanggan p on p.kd_pelanggan=a.kd_pelanggan group by a.kd_pelanggan";
            $hasil=mysqli_query($con, $query);
            while ($rw=mysqli_fetch_assoc($hasil)) {
              $kd_pelanggan=$rw['kd_pelanggan'];
              $nama=$rw['nama']; ?>
              <div class="col-sm-6">
                <div class="dd dd-draghandle">
                  <ol class="dd-list">
                    <li class="dd-item dd2-item" data-id="13">
                      <div class="dd-handle dd2-handle">
                        <i class="normal-icon ace-icon fa fa-comments blue bigger-130"></i>

                        <i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
                      </div>
                      <div class="dd2-content"><a href="chat_det.php?id=<?=$kd_pelanggan?>">id : <?=$kd_pelanggan?> ( <?=$nama?> )</a></div>
                    </li>
                  </ol>
                </div>
              </div>
            <?php }
             ?>


					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->


			<!--akhir halaman-->
		<?php include_once 'view/footer.php' ?>

<?php else: header('location:login.php');?>

 <?php endif; ?>
