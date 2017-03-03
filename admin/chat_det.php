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
                      $kd_pelanggan=$_GET['id'];
                        global $con;
                        $query1="(SELECT tgl, isi_chat, kd_admin, kd_pelanggan FROM chat_admin where kd_pelanggan='$kd_pelanggan') union (select tgl, isi_chat, kd_pelanggan, kd_pelanggan from chat_anggota where kd_pelanggan='$kd_pelanggan') order by tgl ASC ";
                        $hasil1=mysqli_query($con, $query1);
                        while ($rw=mysqli_fetch_assoc($hasil1)) { ?>
                          <?php if ($rw['kd_admin']=='ADM'): ?>
                            <div class="itemdiv dialogdiv">
                              <div class="user">
                                <!--img alt="Bob's Avatar" src="assets/avatars/user.jpg" /-->
                              </div>

                              <div class="body">
                                <div class="time">
                                  <i class="ace-icon fa fa-clock-o"></i>
                                  <span class="orange">2 min</span>
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
                                  <!--img alt="Alexa's Avatar" src="assets/avatars/avatar1.png" /-->
                                </div>

                                <div class="body">
                                  <div class="time">
                                    <i class="ace-icon fa fa-clock-o"></i>
                                    <span class="green">4 sec</span>
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

                    <form>
                      <div class="form-actions">
                        <div class="input-group">
                          <input placeholder="Type your message here ..." type="text" id="pesan" class="form-control" name="message" />
                          <input type="hidden" name="kd_pelanggan" id="kd_pelanggan" value="<?=$_GET['id']?>">
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
		<?php include_once 'view/footer.php' ?>
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

    <!-- page specific plugin scripts -->

    <!--[if lte IE 8]>
      <script src="assets/js/excanvas.min.js"></script>
    <![endif]-->
    <script src="assets/js/jquery-ui.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="assets/js/jquery.easypiechart.min.js"></script>
    <script src="assets/js/jquery.sparkline.min.js"></script>
    <script src="assets/js/jquery.flot.min.js"></script>
    <script src="assets/js/jquery.flot.pie.min.js"></script>
    <script src="assets/js/jquery.flot.resize.min.js"></script>

    <!-- ace scripts -->
    <script src="assets/js/ace-elements.min.js"></script>

    <!-- inline scripts related to this page -->
    <script type="text/javascript">
    $('#kirim_pesan').on('click', function(){
      var isi  = $('#pesan').val();
      var isi1 = $('#kd_pelanggan').val();
      $.ajax({
        method   : "POST",
        url    : "function/pesan_admin.php",
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


      })
    </script>

<?php else: header('location:login.php');?>

 <?php endif; ?>
