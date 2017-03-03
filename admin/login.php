<?php
require_once 'init.php';

$error="";

if(isset($_POST['submit'])){
  $usr_nm=$_POST['user'];
  $pass=$_POST['pass'];
  if(!empty(trim($usr_nm))&&!empty(trim($pass))){
    if(cek_login($usr_nm,$pass)) {
      $_SESSION['pengguna']=$usr_nm;
      header('location:index.php');
    }else {
      $error="gagal login";
    }
  }else {
    $error="isi data dengan benar";
  }
}
 ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Blank Page - Ace Admin</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<!--mulai halaman-->

			<div class="main-content">
				<div class="main-content-inner">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="col-lg-4">
										<div class="panel ">
										</div>
								</div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
      <div class="main-container" id="main-container">
  			<script type="text/javascript">
  				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
  			</script>

  			<!--mulai halaman-->

  			<div class="main-content">
  				<div class="main-content-inner">
  						<div class="row">
  							<div class="col-xs-12">
  								<!-- PAGE CONTENT BEGINS -->
                  <div class="col-lg-4">
  										<div class="panel">	</div>
  								</div>
  								<div class="col-lg-4">
  										<div class="panel panel-default">
  												<div class="panel-heading">
                            User Login
  												</div>
  												<div class="panel-body">
                            <form method="post">
                              <table>
                                <tr>
                                  <td><label>User Name</label></td>
                                  <td><input type="text" name="user" value="" placeholder="User Name" required=""></td>
                                </tr>
                                <tr>
                                  <td><label>Password </label></td>
                                  <td><input type="password" name="pass" value="" placeholder="Password" required=""></td>
                                </tr>
                                <tr>
                                  <td><label></label></td>
                                  <td>
                                    <input type="submit" name="submit" value="Login" class="btn btn-default">
                                  </td>
                                </tr>
                              </table>
                            </form>
                            <p class="text-danger">
                              <b><?=$error; ?></b>
                            </p>
  												</div>
  												<div class="panel-footer">
  												</div>
  										</div>
  								</div>
  								<!-- PAGE CONTENT ENDS -->
  							</div><!-- /.col -->
  						</div><!-- /.row -->
  					</div><!-- /.page-content -->
  				</div>
  			</div><!-- /.main-content -->


			<!--akhir halaman-->
			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Ace</span>
							Application &copy; 2016-2017
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery.2.1.1.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
	</body>
</html>
<style>
table,td,tr{
  margin: 10px;
  padding: 10px;
}

</style>
