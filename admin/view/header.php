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
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.php" class="navbar-brand">
						<small>
							<i class="fa fa-music"></i>
							Toko Guitar's
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">

						<li class="light-blue">
              <?php if($login==true): ?>
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<span class="user-info">
									<small>Welcome,</small>
									User
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

              <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">


								<li class="divider"></li>

								<li>
									<a href="logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
              <?php else: ?>
                <a href="#" data-toggle="dropdown" href="#" class="dropdown-toggle" >
                  <span class="user-info">
                    <small>Welcome,</small>
                    User
                  </span>

                  <i class="ace-icon fa fa-caret-down"></i>
                </a>
                <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
  								<li>
  									<a href="#">
  										<i class="ace-icon fa fa-user"></i>
  										Daftar
  									</a>
  								</li>

  								<li class="divider"></li>

  								<li>
  									<a href="login.php">
  										<i class="ace-icon fa fa-power-off"></i>
  										Login
  									</a>
  								</li>
  							</ul>
              <?php endif; ?>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>
				<ul class="nav nav-list">
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-file-o"></i>
							<span class="menu-text">Master</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>

						<ul class="submenu">
							<li>
								<a href="produk.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Produk
								</a>

								<b class="arrow"></b>
							</li>
							<li >
								<a href="headstock.php">
									<i class="menu-icon fa fa-caret-right"></i>
									headstock
								</a>

								<b class="arrow"></b>
							</li>
              <li >
                <a href="fret.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  fret
                </a>

                <b class="arrow"></b>
              </li>
              <li >
                <a href="body.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  body
                </a>

                <b class="arrow"></b>
              </li>
              <li >
                <a href="bridge.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  bridge
                </a>

                <b class="arrow"></b>
              </li>
              <li >
                <a href="pickup.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  pickup
                </a>

                <b class="arrow"></b>
              </li>
              <li >
                <a href="senar.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  senar
                </a>

                <b class="arrow"></b>
              </li>
							<li >
                <a href="jenis_kayu.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Jenis Kayu
                </a>

                <b class="arrow"></b>
              </li>
							<li >
                <a href="warna.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Warna
                </a>

                <b class="arrow"></b>
              </li>
						</ul>
					</li>
				</ul>
        <ul class="nav nav-list">
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-file-o"></i>
							<span class="menu-text">Transaksi</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>

						<ul class="submenu">
							<li>
								<a href="pemesanan.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Pemesanan
								</a>

								<b class="arrow"></b>
							</li>
							<li >
								<a href="penjualan.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Penjualan
								</a>

								<b class="arrow"></b>
							</li>
            </ul>
          </li>
        </ul>
        <ul class="nav nav-list">
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-file-o"></i>
							<span class="menu-text">Laporan</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>

						<ul class="submenu">
							<li>
								<a href="laporan_penjualan.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Penjualan
								</a>

								<b class="arrow"></b>
							</li>
							<li >
								<a href="laporan_cus_pro.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Custom Product
								</a>

								<b class="arrow"></b>
							</li>
            </ul>
          </li>
					<li class="">
						<a href="chat.php">
							<i class="menu-icon fa  fa-comments "></i>
							<span class="menu-text"> Chat </span>
						</a>

						<b class="arrow"></b>
					</li>
        </ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>
