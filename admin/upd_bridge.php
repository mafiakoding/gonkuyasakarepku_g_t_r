<?php
require_once 'init.php';
error_reporting(0);
$login = false;
if($_SESSION['pengguna']) {
  $login = true;
  $id = $_GET['kd'];
  if (isset($_GET['kd'])) {
    $a  = tmp_br_id($id);
    while ($row = mysqli_fetch_assoc($a)){
      $kd_a  = $row['kd_bridge'];
      $nm_a  = $row['nama'];
      $hrg_a  = $row['harga'];
      $gbr_a = $row['gambar'];
      $jml_a = $row['jumlah'];
      $mrk_a = $row['merek'];

    }
  }
}

$error='';
  //
  // $carikode = mysqli_query($con,"select MAX(id_produk) from produk") ;
  // $datakode = mysqli_fetch_array($carikode);
  // $date=date("y-m-d");
  // if ($datakode) {
  //  $nilaikode = substr($datakode[0], 4);
  //  $kode = (int) $nilaikode;
  //  $kode = $kode + 1;
  //  $hasilkode = "pr_".str_pad($kode, 3, "0", STR_PAD_LEFT);
  // } else {
  //  $hasilkode = "pr_001";
  // }

  if (isset($_POST['submit'])) {

    $kd = $_POST['kd'];
    $nm = $_POST['nama'];
    $hrg= $_POST['harga'];
    $jml= $_POST['jumlah'];
    $mrk = $_POST['merek'];

    if (!empty(trim($kd)) && !empty(trim($nm)) && !empty(trim($hrg)) && !empty(trim($mrk)) && !empty(trim($_FILES["gambar"]["tmp_name"]))) {
      $target_dir = "gambar/";
      $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
      $uploadOk = 1;
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

      if (file_exists($target_file)) {
          echo "Gambar sudah ada.";
          $uploadOk = 0;
      }
      if ($_FILES["gambar"]["size"] > 500000) {
          echo "File terlalu besar, kukuran maks 5MB";
          $uploadOk = 0;
      }
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
          echo "gambar bukan JPG, JPEG, PNG & GIF.";
          $uploadOk = 0;
      }
      if ($uploadOk == 0) {
          echo "gambar tidak terupload.";
      } else {
          if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
              echo "Gambar ". basename( $_FILES["gambar"]["name"]). " terlah diupload.";
          } else {
              echo "Ada masalah saat upload gambar.".basename( $_FILES["gambar"]["name"]);
          }
      }
      if (ed_br($kd,$nm,$hrg,$jml,$mrk,$target_file)) {
    header('location: bridge.php');
    }else {
    $error='ada masalah saat edit data ';
      }
    }else {
      $error='harap isi semua field dengan benar';
    }
  }
 ?>
 <?php if ($login==true): ?>
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
                <li>
                  <a href="#">
                    <i class="ace-icon fa fa-cog"></i>
                    Settings
                  </a>
                </li>

                <li>
                  <a href="profile.html">
                    <i class="ace-icon fa fa-user"></i>
                    Profile
                  </a>
                </li>

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
                <a href="laporan_pemesanan.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Pemesanan
                </a>

                <b class="arrow"></b>
              </li>
              <li >
                <a href="laporan_penjualan.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Penjualan
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
      <!--mulai halaman-->

      <div class="main-content">
        <div class="main-content-inner">
            <div class="row">
              <div class="col-xs-12">
                <div class="row">
                    <div class="col-lg-12">
                      <center> <h3 class="page-header">Ubah Bridge</h3></center>
                    </div>
                </div>
                <div id="wrapper">

                  <!-- start: Container -->
                <div class="container">

                    <!-- start: Table -->
                <div class="table-responsive">
                <table class="table">
 <form class="" action="" method="post" enctype="multipart/form-data">
   <label for="kd">Kode</label><br>
   <input type="text" name="kd" value="<?=$kd_a; ?>"><br><br>

   <label for="nama">Nama</label><br>
   <input type="text" name="nama" value="<?=$nm_a; ?>"><br><br>

   <label for="harga">Harga</label><br>
   <input type="text" name="harga" value="<?=$hrg_a; ?>"><br><br>

   <label for="berat">Merek</label><br>
   <input type="text" name="merek" value="<?=$mrk_a; ?>"><br><br>

   <label for="pict">Gambar</label><br>
   <input type="file" name="gambar" value="<?=$gmb_a; ?>"><br>

   <div id="error">
     <?=$error ?></div><br>

   <input type="submit" name="submit" class="btn btn-sm btn-primary" value="Ubah Data" ><br>
 </form>
 </table>
 </div>
 </div>
 </div>

       </td>
     </tr>
   </tbody>
 </table>
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
 <script src="assets/js/jquery.dataTables.min.js"></script>
 <script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
 <script src="assets/js/dataTables.tableTools.min.js"></script>
 <script src="assets/js/dataTables.colVis.min.js"></script>

 <!-- ace scripts -->
 <script src="assets/js/ace-elements.min.js"></script>
 <script src="assets/js/ace.min.js"></script>

 <!-- inline scripts related to this page -->
 <script type="text/javascript">
 jQuery(function($) {
 //initiate dataTables plugin
 var oTable1 =
 $('#dynamic-table')
 //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
 .dataTable( {
 bAutoWidth: false,
 "aoColumns": [
 { "bSortable": false },
 null, null,null, null, null,
 { "bSortable": false }
 ],
 "aaSorting": [],

 //,
 //"sScrollY": "200px",
 //"bPaginate": false,

 //"sScrollX": "100%",
 //"sScrollXInner": "120%",
 //"bScrollCollapse": true,
 //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
 //you may want to wrap the table inside a "div.dataTables_borderWrap" element

 //"iDisplayLength": 50
 } );
 //oTable1.fnAdjustColumnSizing();


 //TableTools settings
 TableTools.classes.container = "btn-group btn-overlap";
 TableTools.classes.print = {
 "body": "DTTT_Print",
 "info": "tableTools-alert gritter-item-wrapper gritter-info gritter-center white",
 "message": "tableTools-print-navbar"
 }

 //initiate TableTools extension
 var tableTools_obj = new $.fn.dataTable.TableTools( oTable1, {
 "sSwfPath": "assets/swf/copy_csv_xls_pdf.swf",

 "sRowSelector": "td:not(:last-child)",
 "sRowSelect": "multi",
 "fnRowSelected": function(row) {
 //check checkbox when row is selected
 try { $(row).find('input[type=checkbox]').get(0).checked = true }
 catch(e) {}
 },
 "fnRowDeselected": function(row) {
 //uncheck checkbox
 try { $(row).find('input[type=checkbox]').get(0).checked = false }
 catch(e) {}
 },

 "sSelectedClass": "success",
 "aButtons": [
 {
 "sExtends": "copy",
 "sToolTip": "Copy to clipboard",
 "sButtonClass": "btn btn-white btn-primary btn-bold",
 "sButtonText": "<i class='fa fa-copy bigger-110 pink'></i>",
 "fnComplete": function() {
 this.fnInfo( '<h3 class="no-margin-top smaller">Table copied</h3>\
   <p>Copied '+(oTable1.fnSettings().fnRecordsTotal())+' row(s) to the clipboard.</p>',
   1500
 );
 }
 },

 {
 "sExtends": "csv",
 "sToolTip": "Export to CSV",
 "sButtonClass": "btn btn-white btn-primary  btn-bold",
 "sButtonText": "<i class='fa fa-file-excel-o bigger-110 green'></i>"
 },

 {
 "sExtends": "pdf",
 "sToolTip": "Export to PDF",
 "sButtonClass": "btn btn-white btn-primary  btn-bold",
 "sButtonText": "<i class='fa fa-file-pdf-o bigger-110 red'></i>"
 },

 {
 "sExtends": "print",
 "sToolTip": "Print view",
 "sButtonClass": "btn btn-white btn-primary  btn-bold",
 "sButtonText": "<i class='fa fa-print bigger-110 grey'></i>",

 "sMessage": "<div class='navbar navbar-default'><div class='navbar-header pull-left'><a class='navbar-brand' href='#'><small>Optional Navbar &amp; Text</small></a></div></div>",

 "sInfo": "<h3 class='no-margin-top'>Print view</h3>\
     <p>Please use your browser's print function to\
     print this table.\
     <br />Press <b>escape</b> when finished.</p>",
 }
 ]
 } );
 //we put a container before our table and append TableTools element to it
 $(tableTools_obj.fnContainer()).appendTo($('.tableTools-container'));

 //also add tooltips to table tools buttons
 //addding tooltips directly to "A" buttons results in buttons disappearing (weired! don't know why!)
 //so we add tooltips to the "DIV" child after it becomes inserted
 //flash objects inside table tools buttons are inserted with some delay (100ms) (for some reason)
 setTimeout(function() {
 $(tableTools_obj.fnContainer()).find('a.DTTT_button').each(function() {
 var div = $(this).find('> div');
 if(div.length > 0) div.tooltip({container: 'body'});
 else $(this).tooltip({container: 'body'});
 });
 }, 200);



 //ColVis extension
 var colvis = new $.fn.dataTable.ColVis( oTable1, {
 "buttonText": "<i class='fa fa-search'></i>",
 "aiExclude": [0, 6],
 "bShowAll": true,
 //"bRestore": true,
 "sAlign": "right",
 "fnLabel": function(i, title, th) {
 return $(th).text();//remove icons, etc
 }

 });

 //style it
 $(colvis.button()).addClass('btn-group').find('button').addClass('btn btn-white btn-info btn-bold')

 //and append it to our table tools btn-group, also add tooltip
 $(colvis.button())
 .prependTo('.tableTools-container .btn-group')
 .attr('title', 'Show/hide columns').tooltip({container: 'body'});

 //and make the list, buttons and checkboxed Ace-like
 $(colvis.dom.collection)
 .addClass('dropdown-menu dropdown-light dropdown-caret dropdown-caret-right')
 .find('li').wrapInner('<a href="javascript:void(0)" />') //'A' tag is required for better styling
 .find('input[type=checkbox]').addClass('ace').next().addClass('lbl padding-8');



 /////////////////////////////////
 //table checkboxes
 $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

 //select/deselect all rows according to table header checkbox
 $('#dynamic-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
 var th_checked = this.checked;//checkbox inside "TH" table header

 $(this).closest('table').find('tbody > tr').each(function(){
 var row = this;
 if(th_checked) tableTools_obj.fnSelect(row);
 else tableTools_obj.fnDeselect(row);
 });
 });

 //select/deselect a row when the checkbox is checked/unchecked
 $('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
 var row = $(this).closest('tr').get(0);
 if(!this.checked) tableTools_obj.fnSelect(row);
 else tableTools_obj.fnDeselect($(this).closest('tr').get(0));
 });




 $(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
 e.stopImmediatePropagation();
 e.stopPropagation();
 e.preventDefault();
 });


 //And for the first simple table, which doesn't have TableTools or dataTables
 //select/deselect all rows according to table header checkbox
 var active_class = 'active';
 $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
 var th_checked = this.checked;//checkbox inside "TH" table header

 $(this).closest('table').find('tbody > tr').each(function(){
 var row = this;
 if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
 else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
 });
 });

 //select/deselect a row when the checkbox is checked/unchecked
 $('#simple-table').on('click', 'td input[type=checkbox]' , function(){
 var $row = $(this).closest('tr');
 if(this.checked) $row.addClass(active_class);
 else $row.removeClass(active_class);
 });



 /********************************/
 //add tooltip for small view action buttons in dropdown menu
 $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

 //tooltip placement on right or left
 function tooltip_placement(context, source) {
 var $source = $(source);
 var $parent = $source.closest('table')
 var off1 = $parent.offset();
 var w1 = $parent.width();

 var off2 = $source.offset();
 //var w2 = $source.width();

 if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
 return 'left';
 }

 })
 </script>
 </body>
 </html>
 <style>
 #gambar{
 height: 230px;
 }
 </style>
 <?php else: header('location:login.php');?>

 <?php endif; ?>
