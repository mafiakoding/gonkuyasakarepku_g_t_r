<?php
require_once 'init.php';
error_reporting(0);
$login=false;
if($_SESSION['pengguna']) {
  $login=true;
}
$tampil_pelanggan=tampil_pelanggan($_SESSION['pengguna']);
while ($rw=mysqli_fetch_assoc($tampil_pelanggan)) {
  $kd_pelanggan=$rw['kd_pelanggan'];
  $nama=$rw['nama'];
}
?>


 <?php if ($login==true): ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | G-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">


		<!-- ace styles -->
		<link rel="stylesheet" href="css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="js/ace-extra.min.js"></script>

</head><!--/head-->

<body>
  <header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
      <div class="container">
        <div class="row">
          <div class="col-sm-6 ">
            <div class="contactinfo">
              <ul class="nav nav-pills">
                <li><a href=""><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                <li><a href=""><i class="fa fa-envelope"></i> info@domain.com</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="social-icons pull-right">
              <ul class="nav navbar-nav">
                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                <li><a href=""><i class="fa fa-google-plus"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
      <div class="container">
        <div class="row">

          <div class="col-sm-8">
            <div class="shop-menu pull-right">
              <ul class="nav navbar-nav">
                <?php if ($login==true): ?>
                  <li><a href="laporan_belanja.php"><i class="fa fa-file-text"></i> Report Shops</a></li>
                  <!--li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li-->
                  <li><a href="keranjang.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                  <?php if ($login==true): ?>
                    <li><a href="logout.php"><i class="fa fa-lock"></i> Logout</a></li>
                    <?php else: ?>
                    <li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
                  <?php endif; ?>
                  <?php else: ?>
                    <li><a href="keranjang.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                    <?php if ($login==true): ?>
                      <li><a href="logout.php"><i class="fa fa-lock"></i> Logout</a></li>
                      <?php else: ?>
                      <li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
                    <?php endif; ?>
                <?php endif; ?>


              </ul>
            </div>
          </div>
        </div>
      </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
      <div class="container">
        <div class="row">
          <div class="col-sm-9">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="mainmenu pull-left">
              <ul class="nav navbar-nav collapse navbar-collapse">
                <li><a href="index.php">Home</a></li>
                <li class="dropdown"><a href="#" >Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="produk.php" >Products</a></li>
                                        <li><a href="productcustom.php" >Products Customs</a></li>

                    <li><a href="keranjang.php">Cart</a></li>
                    <?php if ($login==true): ?>
                    <li><a href="logout.php">Logout</a></li>
                      <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                    <?php endif; ?>

                                    </ul>
                                </li>

                <li><a href="custom.php">Custom Guitar</a></li>
                <li><a href="chat.php">Chat</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="search_box pull-right">
            </div>
          </div>
        </div>
        </div>
      </div>
  </header>



  <!--mulai halaman-->
  <div class="main-content">
    <div class="main-content-inner">


      <div class="page-content">


        <div class="page-header">

        </div><!-- /.page-header -->

        <div class="row">
          <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->



            <div class="row">


              <div class="col-sm-12">
                <div class="widget-box">
                  <div class="widget-header">
                    <h4 class="widget-title lighter smaller">
                      <i class="ace-icon fa fa-comment blue"></i>
                      Percakapan
                    </h4>
                  </div>

                  <div class="widget-body">
                    <div class="widget-main no-padding">
                      <div class="dialogs" id="isi_chat">

                        <?php
                          global $con;
                          $query1="(SELECT tgl, isi_chat, kd_admin, kd_pelanggan FROM chat_admin where kd_pelanggan='$kd_pelanggan') union (select tgl, isi_chat, kd_pelanggan, kd_pelanggan from chat_anggota where kd_pelanggan='$kd_pelanggan') order by tgl ASC ";
                          $hasil1=mysqli_query($con, $query1);
                          while ($rw=mysqli_fetch_assoc($hasil1)) { ?>
                            <?php if ($rw['kd_admin']=='ADM'): ?>
                              <div class="itemdiv dialogdiv">
                                <div class="user">
                                  <!--img alt="Bob's Avatar" src="admin/assets/avatars/user.jpg" /-->
                                </div>

                                <div class="body">
                                  <div class="time">
                                    <i class="ace-icon fa fa-clock-o"></i>
                                    <span class="orange"><?=$rw['tgl']?></span>
                                  </div>

                                  <div class="name">                                  
                                    <span class="label label-info arrowed arrowed-in-right">admin</span>
                                  </div>
                                  <div class="text"><?=$rw['isi_chat']?></div>

                                  <div class="tools">
                                    <a href="#" class="btn btn-minier btn-info">
                                      <i class="icon-only ace-icon fa fa-share"></i>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <?php else: ?>
                                <div class="itemdiv dialogdiv">
                                  <div class="user">
                                    <!--img alt="Alexa's Avatar" src="admin/assets/avatars/avatar1.png" /-->
                                  </div>

                                  <div class="body">
                                    <div class="time">
                                      <i class="ace-icon fa fa-clock-o"></i>
                                      <span class="green"><?=$rw['tgl']?></span>
                                    </div>

                                    <div class="name">
                                      <a href="#"><?=$nama?></a>
                                    </div>
                                    <div class="text"><?=$rw['isi_chat']?></div>

                                    <div class="tools">
                                      <a href="#" class="btn btn-minier btn-info">
                                        <i class="icon-only ace-icon fa fa-share"></i>
                                      </a>
                                    </div>
                                  </div>
                                </div>
                            <?php endif; ?>
                        <?php }
                         ?>




                      </div>

                      <form method="post">
                        <div class="form-actions">
                          <div class="input-group">
                            <input placeholder="Type your message here ..." type="text" id="pesan" class="form-control" name="message" />
                            <input type="hidden" name="kd_pelanggan" id="kd_pelanggan" value="<?=$kd_pelanggan?>">
                            <span class="input-group-btn">
                              <button class="btn btn-sm btn-info no-radius" id="kirim_pesan" type="button">
                                <i class="ace-icon fa fa-share"></i>
                                Send
                              </button>
                            </span>
                          </div>
                        </div>
                      </form>
                    </div><!-- /.widget-main -->
                  </div><!-- /.widget-body -->
                </div><!-- /.widget-box -->
              </div><!-- /.col -->
            </div><!-- /.row -->

            <!-- PAGE CONTENT ENDS -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.page-content -->
    </div>
  </div><!-- /.main-content -->


  <!--akhir halaman-->

	<footer id="footer"><!--Footer-->
	   <div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>

	</footer><!--/Footer-->




  <script src="admin/assets/js/jquery.2.1.1.min.js"></script>

  <!-- <![endif]-->

  <!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

  <!--[if !IE]> -->
  <script type="text/javascript">
    window.jQuery || document.write("<script src='admin/assets/js/jquery.min.js'>"+"<"+"/script>");
  </script>

  <!-- <![endif]-->

  <!--[if IE]>
<script type="text/javascript">
window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
  <script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='admin/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
  </script>

  <!-- page specific plugin scripts -->

  <!--[if lte IE 8]>
    <script src="assets/js/excanvas.min.js"></script>
  <![endif]-->
  <script src="admin/assets/js/jquery-ui.custom.min.js"></script>
  <script src="admin/assets/js/jquery.ui.touch-punch.min.js"></script>
  <script src="admin/assets/js/jquery.easypiechart.min.js"></script>
  <script src="admin/assets/js/jquery.sparkline.min.js"></script>
  <script src="admin/assets/js/jquery.flot.min.js"></script>
  <script src="admin/assets/js/jquery.flot.pie.min.js"></script>
  <script src="admin/assets/js/jquery.flot.resize.min.js"></script>

  <script src="admin/assets/js/bootstrap.min.js"></script>

  <!-- page specific plugin scripts -->

  <!-- ace scripts -->
  <script src="admin/assets/js/ace-elements.min.js"></script>
  <script src="admin/assets/js/ace.min.js"></script>

  <!-- inline scripts related to this page -->
  <script type="text/javascript">
  $('#kirim_pesan').on('click', function(){
    var isi  = $('#pesan').val();
    var isi1 = $('#kd_pelanggan').val();
    $.ajax({
      method   : "POST",
      url    : "function/pesan.php",
      data   :{pesan:isi, kd_pelanggan:isi1},
      success:function(data){
        $('#isi_chat').append(data);
      }
    });
  });
    jQuery(function($) {

      $('.dialogs,.comments').ace_scroll({
        size: 300
        });


    });

  </script>
</body>
</html>
<?php else: header('location:login.php');?>
<?php endif; ?>
