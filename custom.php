<?php
require_once 'init.php';
error_reporting(0);
$login=false;
if($_SESSION['pengguna']) {
  $login=true;
  $tampil_pelanggan=tampil_pelanggan($_SESSION['pengguna']);
  while ($rw=mysqli_fetch_assoc($tampil_pelanggan)) {
    $id_pelanggan=$rw['kd_pelanggan'];
  }
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


</head><!--/head-->

<body>
  <header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6 ">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i> +0896767878</a></li>
								<li><a href=""><i class="fa fa-envelope"></i> gitar@gmail.com</a></li>
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
						<!--div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div-->
					</div>
				</div>
				</div>
			</div>
	</header>



  <!--mulai halaman-->

  <div class="main-content">
    <div class="main-content-inner">
        <div class="row">
          <div class="col-xs-12">
            <div class="row">
                <div class="col-lg-12">
                  <center>  <h3 class="page-header">Custom Gitar</h3></center>
                </div>
            </div>
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div class="hr hr-18 hr-double dotted"></div>

                <div class="widget-box">
                  <div class="widget-header widget-header-blue widget-header-flat">
                    <h4 class="widget-title lighter">New Item Wizard</h4>


                  </div>

                  <div class="widget-body">
                    <div class="widget-main">
                      <div id="fuelux-wizard-container">
                        <div>
                          <ul class="steps">
                            <li data-step="1" class="active">
                              <span class="step">1</span>
                              <span class="title">Body</span>
                            </li>

                            <li data-step="2">
                              <span class="step">2</span>
                              <span class="title">Bridge</span>
                            </li>

                            <li data-step="3">
                              <span class="step">3</span>
                              <span class="title">Headstock</span>
                            </li>

                            <li data-step="4">
                              <span class="step">4</span>
                              <span class="title">Fret</span>
                            </li>
                            <li data-step="5">
                              <span class="step">5</span>
                              <span class="title">Jenis Kayu</span>
                            </li>
                            <li data-step="6">
                              <span class="step">6</span>
                              <span class="title">Pickup</span>
                            </li>
                            <li data-step="7">
                              <span class="step">7</span>
                              <span class="title">Senar</span>
                            </li>
                            <li data-step="8">
                              <span class="step">8</span>
                              <span class="title">Warna</span>
                            </li>
                            <li data-step="9">
                              <span class="step">9</span>
                              <span class="title">Finish</span>
                            </li>
                          </ul>
                        </div>

                        <hr />

                        <div class="step-content pos-rel">
                          <div class="step-pane active" data-step="1">
                            <h3 class="blue lighter">This is Body Guitar</h3>
                            <form method="post">
                              <div class="widget-body">
                                <div class="widget-main">
                                  <div>

                              <div>

                                <input type="hidden" name="name" id="kd_pelanggan" value="<?=$id_pelanggan?>">
  															<br />
  															<select style="width:25%;" class="chosen-select form-control" id="body_gitar" data-placeholder="Choose a State...">
  																<?php
                                  $tampil_body=tampil_body();
                                  while ($rw=mysqli_fetch_assoc($tampil_body)) {?>
  																  <option value="<?=$rw['kd_body']?>"><?=$rw['nama']?> : <?=number_format($rw['harga'])?></option>
  																<?php } ?>
  															</select>
                                <br><br><br>
                                <p id="gambar1">

                                </p>

  														</div>
                            </div>
                          </div>
                        </div>
                            </form>
                          </div>

                          <div class="step-pane" data-step="2">
                            <div>
                              <h3 class="blue lighter">This is step 2</h3>
                              <div class="widget-body">
                                <div class="widget-main">
                                  <div>

                              <div>


  															<br />
  															<select style="width:25%;" class="chosen-select form-control" id="bridge_gitar" data-placeholder="Choose a State...">
  																<?php
                                  $tampil_body=tampil_bridge();
                                  while ($rw=mysqli_fetch_assoc($tampil_body)) {?>
  																  <option value="<?=$rw['kd_bridge']?>"><?=$rw['nama']?> : <?=number_format($rw['harga'])?></option>
  																<?php } ?>
  															</select>
                                <br><br><br>
                                <p id="gambar2">

                                </p>

  														</div>
                            </div>
                          </div>
                        </div>
                            </div>
                          </div>

                          <div class="step-pane" data-step="3">
                            <div class="center">
                              <h3 class="blue lighter">This is step 3</h3>
                              <div class="widget-body">
                                <div class="widget-main">
                                  <div>

                              <div>


                                <br />
                                <select style="width:25%;" class="chosen-select form-control" id="headstock_gitar" data-placeholder="Choose a State...">
                                  <?php
                                  $tampil_body=tampil_headstock();
                                  while ($rw=mysqli_fetch_assoc($tampil_body)) {?>
                                    <option value="<?=$rw['kd_headstock']?>"><?=$rw['nama']?> : <?=number_format($rw['harga'])?></option>
                                  <?php } ?>
                                </select>
                                <br><br><br>
                                <p id="gambar3">

                                </p>

                              </div>
                            </div>
                          </div>
                        </div>
                            </div>
                          </div>

                          <div class="step-pane" data-step="4">
                            <div class="center">
                              <h3 class="green">Congrats!</h3>
                              <div class="widget-body">
                                <div class="widget-main">
                                  <div>

                              <div>


                                <br />
                                <select style="width:25%;" class="chosen-select form-control" id="fret_gitar" data-placeholder="Choose a State...">
                                  <?php
                                  $tampil_body=tampil_fret();
                                  while ($rw=mysqli_fetch_assoc($tampil_body)) {?>
                                    <option value="<?=$rw['kd_fret']?>"><?=$rw['nama']?></option>
                                  <?php } ?>
                                </select>
                                <br><br><br>
                                <p id="gambar4">
                                </p>

                              </div>
                            </div>
                          </div>
                        </div>
                            </div>
                          </div>

                          <div class="step-pane" data-step="5">
                            <div class="center">
                              <h3 class="green">Congrats!</h3>
                              <div class="widget-body">
                                <div class="widget-main">
                                  <div>

                              <div>


                                <br />
                                <select style="width:25%;" class="chosen-select form-control" id="kayu_gitar" data-placeholder="Choose a State...">
                                  <?php
                                  $tampil_body=tampil_jeniskayu();
                                  while ($rw=mysqli_fetch_assoc($tampil_body)) {?>
                                    <option value="<?=$rw['kd_kayu']?>"><?=$rw['nama']?></option>
                                  <?php } ?>
                                </select>
                                <br><br><br>
                                <p id="gambar5">

                                </p>

                              </div>
                            </div>
                          </div>
                        </div>
                            </div>
                          </div>

                          <div class="step-pane" data-step="6">
                            <div class="center">
                              <h3 class="green">Congrats!</h3>
                              <div class="widget-body">
                                <div class="widget-main">
                                  <div>

                              <div>


                                <br />
                                <select style="width:25%;" class="chosen-select form-control" id="pickup_gitar" data-placeholder="Choose a State...">
                                  <?php
                                  $tampil_body=tampil_pickup();
                                  while ($rw=mysqli_fetch_assoc($tampil_body)) {?>
                                    <option value="<?=$rw['kd_pickup']?>"><?=$rw['nama']?></option>
                                  <?php } ?>
                                </select>
                                <br><br><br>
                                <p id="gambar6">

                                </p>

                              </div>
                            </div>
                          </div>
                        </div>
                            </div>
                          </div>

                          <div class="step-pane" data-step="7">
                            <div class="center">
                              <h3 class="green">Congrats!</h3>
                              <div class="widget-body">
                                <div class="widget-main">
                                  <div>

                              <div>


                                <br />
                                <select style="width:25%;" class="chosen-select form-control" id="senar_gitar" data-placeholder="Choose a State...">
                                  <?php
                                  $tampil_body=tampil_senar();
                                  while ($rw=mysqli_fetch_assoc($tampil_body)) {?>
                                    <option value="<?=$rw['kd_senar']?>"><?=$rw['nama']?></option>
                                  <?php } ?>
                                </select>
                                <br><br><br>
                                <p id="gambar7">

                                </p>

                              </div>
                            </div>
                          </div>
                        </div>
                            </div>
                          </div>

                          <div class="step-pane" data-step="8">
                            <div class="center">
                              <h3 class="green">Congrats!</h3>
                              <div class="widget-body">
                                <div class="widget-main">
                                  <div>

                              <div>


                                <br />
                                <select style="width:25%;" class="chosen-select form-control" id="warna_gitar" data-placeholder="Choose a State...">
                                  <?php
                                  $tampil_body=tampil_warna();
                                  while ($rw=mysqli_fetch_assoc($tampil_body)) {?>
                                    <option value="<?=$rw['kd_warna']?>"><?=$rw['nama']?></option>
                                  <?php } ?>
                                </select>
                                <br><br><br>
                                <p id="gambar8">

                                </p>

                              </div>
                            </div>
                          </div>
                        </div>

                            </div>
                          </div>
<img width='250' id="gbr"  height='250' alt='150x150' >

                          <div class="step-pane" data-step="9">
                            <div class="center">
                              <h3 class="green">Congrats!</h3>
                              Your product is ready to ship! Click finish to continue!13
                            </div>
                          </div>
                        </div>
                      </div>

                      <hr />
                      <div class="wizard-actions">
                        <button class="btn btn-prev">
                          <i class="ace-icon fa fa-arrow-left"></i>
                          Prev
                        </button>

                        <button class="btn btn-success btn-next" data-last="Finish">
                          Next
                          <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                        </button>
                      </div>
                    </div><!-- /.widget-main -->
                  </div><!-- /.widget-body -->
                </div>

                <div id="modal-wizard" class="modal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div id="modal-wizard-container">
                        <div class="modal-header">
                          <ul class="steps">
                            <li data-step="1" class="active">
                              <span class="step">1</span>
                              <span class="title">Validation states</span>
                            </li>

                            <li data-step="2">
                              <span class="step">2</span>
                              <span class="title">Alerts</span>
                            </li>

                            <li data-step="3">
                              <span class="step">3</span>
                              <span class="title">Payment Info</span>
                            </li>

                            <li data-step="4">
                              <span class="step">4</span>
                              <span class="title">Other Info</span>
                            </li>
                          </ul>
                        </div>

                        <div class="modal-body step-content">
                          <div class="step-pane active" data-step="1">
                            <div class="center">
                              <h4 class="blue">Step 1</h4>
                            </div>
                          </div>

                          <div class="step-pane" data-step="2">
                            <div class="center">
                              <h4 class="blue">Step 2</h4>
                            </div>
                          </div>

                          <div class="step-pane" data-step="3">
                            <div class="center">
                              <h4 class="blue">Step 3</h4>
                            </div>
                          </div>

                          <div class="step-pane" data-step="4">
                            <div class="center">
                              <h4 class="blue">Step 4</h4>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="modal-footer wizard-actions">
                        <button class="btn btn-sm btn-prev">
                          <i class="ace-icon fa fa-arrow-left"></i>
                          Prev
                        </button>

                        <button class="btn btn-success btn-sm btn-next" data-last="Finish">
                          Next
                          <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                        </button>

                        <button class="btn btn-danger btn-sm pull-left" data-dismiss="modal">
                          <i class="ace-icon fa fa-times"></i>
                          Cancel
                        </button>
                      </div>
                    </div>
                  </div>
                </div><!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div>

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
				</div>
			</div>
		</div>

	</footer><!--/Footer-->



  <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <!-- basic scripts -->

    <!--[if !IE]> -->
    <script src="js/jquery.2.1.1.min.js"></script>

    <!-- <![endif]-->

    <!--[if IE]>
<script src="js/jquery.1.11.1.min.js"></script>
<![endif]-->

    <!--[if !IE]> -->
    <script type="text/javascript">
      window.jQuery || document.write("<script src='js/jquery.min.js'>"+"<"+"/script>");
    </script>

    <!-- <![endif]-->

    <!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
    <script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>
    <script src="js/bootstrap.min.js"></script>

    <!-- page specific plugin scripts -->
    <script src="js/fuelux.wizard.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/additional-methods.min.js"></script>
    <script src="js/bootbox.min.js"></script>
    <script src="js/jquery.maskedinput.min.js"></script>
    <script src="js/select2.min.js"></script>

    <!-- ace scripts -->
    <script src="js/ace-elements.min.js"></script>
    <script src="js/ace.min.js"></script>

    <!-- inline scripts related to this page -->
    <script type="text/javascript">

    $('#body_gitar').on('change', function(){
      var nilai = $('#body_gitar').val();
      $.ajax({
        method : "POST",
        url    : "function/body.php",
        data   :{nilai_sekarang:nilai},
        success:function(data){
           $("#gbr").attr("src","admin/"+data);
        }
      });
    });

      $('#bridge_gitar').on('change', function(){
      var nilai = $('#bridge_gitar').val();
      $.ajax({
        method : "POST",
        url    : "function/bridge_gitar.php",
        data   :{nilai_sekarang:nilai},
        success:function(data){
           $("#gbr").attr("src","admin/"+data);
        }
      });
    });

      $('#headstock_gitar').on('change', function(){
      var nilai = $('#headstock_gitar').val();
      $.ajax({
        method : "POST",
        url    : "function/headstock.php",
        data   :{nilai_sekarang:nilai},
        success:function(data){
          $("#gbr").attr("src","admin/"+data);
        }
      });
    });

            $('#fret_gitar').on('change', function(){
      var nilai = $('#fret_gitar').val();
      $.ajax({
        method : "POST",
        url    : "function/fret.php",
        data   :{nilai_sekarang:nilai},
        success:function(data){
           $("#gbr").attr("src","admin/"+data);
        }
      });
    });

                  $('#kayu_gitar').on('change', function(){
      var nilai = $('#kayu_gitar').val();
      $.ajax({
        method : "POST",
        url    : "function/jenis_kayu.php",
        data   :{nilai_sekarang:nilai},
        success:function(data){
           $("#gbr").attr("src","admin/"+data);
        }
      });
    });

                       $('#pickup_gitar').on('change', function(){
      var nilai = $('#pickup_gitar').val();
      $.ajax({
        method : "POST",
        url    : "function/pickup.php",
        data   :{nilai_sekarang:nilai},
        success:function(data){
           $("#gbr").attr("src","admin/"+data);
        }
      });
    });
 
                              $('#pickup_gitar').on('change', function(){
      var nilai = $('#pickup_gitar').val();
      $.ajax({
        method : "POST",
        url    : "function/senar.php",
        data   :{nilai_sekarang:nilai},
        success:function(data){
           $("#gbr").attr("src","admin/"+data);
        }
      });
    });

                                    $('#warna_gitar').on('change', function(){
      var nilai = $('#warna_gitar').val();
      $.ajax({
        method : "POST",
        url    : "function/warna.php",
        data   :{nilai_sekarang:nilai},
        success:function(data){
           $("#gbr").attr("src","admin/"+data);
        }
      });
    });


      jQuery(function($) {

        $('[data-rel=tooltip]').tooltip();

        $(".select2").css('width','200px').select2({allowClear:true})
        .on('change', function(){
          $(this).closest('form').validate().element($(this));
        });


        var $validation = false;
        $('#fuelux-wizard-container')
        .ace_wizard({
          //step: 2 //optional argument. wizard will jump to step "2" at first
          //buttons: '.wizard-actions:eq(0)'
        })
        .on('actionclicked.fu.wizard' , function(e, info){
          if(info.step == 1 && $validation) {
            if(!$('#validation-form').valid()) e.preventDefault();
          }
        })
        .on('finished.fu.wizard', function(e) {
          var p = $('#kd_pelanggan').val();
          var p1 = $('#body_gitar').val();
          var p2 = $('#bridge_gitar').val();
          var p3 = $('#headstock_gitar').val();
          var p4 = $('#fret_gitar').val();
          var p5 = $('#kayu_gitar').val();
          var p6 = $('#pickup_gitar').val();
          var p7 = $('#senar_gitar').val();
          var p8 = $('#warna_gitar').val();

//var p = $('#kdtilang').val();

          $.ajax({
            method:"POST",
            url:"function/customgitar.php",
            data:{kd_pelanggan:p, body_gitar:p1, bridge_gitar:p2, headstock_gitar:p3, fret_gitar:p4, kayu_gitar:p5, pickup_gitar:p6, senar_gitar:p7, warna_gitar:p8},
            success: function(data){
              alert(data);
              document.location="productcustom.php";
            }
          });
        }).on('stepclick.fu.wizard', function(e){
          //e.preventDefault();//this will prevent clicking and selecting steps
        });


        //jump to a step
        /**
        var wizard = $('#fuelux-wizard-container').data('fu.wizard')
        wizard.currentStep = 3;
        wizard.setState();
        */

        //determine selected step
        //wizard.selectedItem().step



        //hide or show the other form which requires validation
        //this is for demo only, you usullay want just one form in your application
        $('#skip-validation').removeAttr('checked').on('click', function(){
          $validation = this.checked;
          if(this.checked) {
            $('#sample-form').hide();
            $('#validation-form').removeClass('hide');
          }
          else {
            $('#validation-form').addClass('hide');
            $('#sample-form').show();
          }
        })



        //documentation : http://docs.jquery.com/Plugins/Validation/validate


        $.mask.definitions['~']='[+-]';
        $('#phone').mask('(999) 999-9999');

        jQuery.validator.addMethod("phone", function (value, element) {
          return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
        }, "Enter a valid phone number.");

        $('#validation-form').validate({
          errorElement: 'div',
          errorClass: 'help-block',
          focusInvalid: false,
          ignore: "",
          rules: {
            email: {
              required: true,
              email:true
            },
            password: {
              required: true,
              minlength: 5
            },
            password2: {
              required: true,
              minlength: 5,
              equalTo: "#password"
            },
            name: {
              required: true
            },
            phone: {
              required: true,
              phone: 'required'
            },
            url: {
              required: true,
              url: true
            },
            comment: {
              required: true
            },
            state: {
              required: true
            },
            platform: {
              required: true
            },
            subscription: {
              required: true
            },
            gender: {
              required: true,
            },
            agree: {
              required: true,
            }
          },

          messages: {
            email: {
              required: "Please provide a valid email.",
              email: "Please provide a valid email."
            },
            password: {
              required: "Please specify a password.",
              minlength: "Please specify a secure password."
            },
            state: "Please choose state",
            subscription: "Please choose at least one option",
            gender: "Please choose gender",
            agree: "Please accept our policy"
          },


          highlight: function (e) {
            $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
          },

          success: function (e) {
            $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
            $(e).remove();
          },

          errorPlacement: function (error, element) {
            if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
              var controls = element.closest('div[class*="col-"]');
              if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
              else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
            }
            else if(element.is('.select2')) {
              error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
            }
            else if(element.is('.chosen-select')) {
              error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
            }
            else error.insertAfter(element.parent());
          },

          submitHandler: function (form) {
          },
          invalidHandler: function (form) {
          }
        });




        $('#modal-wizard-container').ace_wizard();
        $('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');


        /**
        $('#date').datepicker({autoclose:true}).on('changeDate', function(ev) {
          $(this).closest('form').validate().element($(this));
        });

        $('#mychosen').chosen().on('change', function(ev) {
          $(this).closest('form').validate().element($(this));
        });
        */


        $(document).one('ajaxloadstart.page', function(e) {
          //in ajax mode, remove remaining elements before leaving page
          $('[class*=select2]').remove();
        });
      })
    </script>
</body>
</html>

<style>
  #gambar1{
    max-width: 100px;
  }
</style>
<?php else: header('location:login.php');?>
<?php endif; ?>
