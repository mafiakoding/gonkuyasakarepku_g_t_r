<?php
require_once 'init.php';
error_reporting(0);
$login=false;
if($_SESSION['pengguna']) {
  $login=true;
}



include 'view/header.php'; 

if(!empty($_GET['login'])){
  ?>
  <script type="text/javascript">alert('Anda Berhasil Login..');</script>
  <?php
}

?>

<section id="slider"><!--slider-->
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div id="slider-carousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#slider-carousel" data-slide-to="1"></li>
            <li data-target="#slider-carousel" data-slide-to="2"></li>
          </ol>

          <div class="carousel-inner">
            <div class="item active">
              <div class="col-sm-6">
                <h1><span>G</span>-SHOPPER</h1>
                <h2>Gitar terbaik se indonesia</h2>
                <p>Silahkan pesan produk kami dijamin memuaskan </p>
              </div>
              <div class="col-sm-6">

                <img src="images/home/pricing.png"  class="pricing" alt="" />
              </div>
            </div>
            <div class="item">
              <div class="col-sm-6">
                <h1><span>G</span>-SHOPPER</h1>
                <h2>Berkualitas</h2>
                <p>Dengan bahan berkualitas menghasilkan produk berkualitas</p>

              </div>
              <div class="col-sm-6">

                <img src="images/home/pricing.png"  class="pricing" alt="" />
              </div>
            </div>

            <div class="item">
              <div class="col-sm-6">
                <h1><span>G</span>-SHOPPER</h1>
                <h2>Bisa custom produk</h2>
                <p>Anda dapat memilih bahan sesuai selera</p>

              </div>
              <div class="col-sm-6">

                <img src="images/home/pricing.png" class="pricing" alt="" />
              </div>
            </div>

          </div>

          <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
            <i class="fa fa-angle-left"></i>
          </a>
          <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>
        </div>

      </div>
    </div>
  </div>
</section><!--/slider-->

<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <div class="left-sidebar">

          <!--div class="brands_products"><!--brands_products-->
            <!--h2>Brands</h2>
            <div class="brands-name">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
                <li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                <li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
                <li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
                <li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
                <li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
                <li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
              </ul>
            </div>
          </div--><!--/brands_products-->

        </div>
      </div>

      <div class="col-sm-9 padding-right">

        <div class="recommended_items"><!--recommended_items-->
          <h2 class="title text-center">recommended items</h2>

          <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div>
                <?php $tampil_produk=tampil_produk();
                while ($row=mysqli_fetch_assoc($tampil_produk)) :?>
                <div class='col-sm-4' id='products'>
                  <div class='product-image-wrapper'>
                    <div class='box-body no-padding'>
                        <img class='img-responsive pad' src='admin/<?=$row['gambar']?>' alt='Photo'>

                      </div>
                      <h2>IDR <?=number_format($row['harga']);?></h2>
                      <p><?php echo $row['nama']; ?></p>
                    </div><!-- /.box-body -->
                    <div class='box-footer'>
                      <div class='btn-group' style='width:100%;'>
                        <a href='keranjang.php?add=<?=$row['id_produk']?>' style='width:100%;' class="btn btn-default add-to-cart"><i class='fa fa-shopping-cart'></i> Add to cart</a>
                      </div>
                    </div>
                  </div><!-- /.box -->
                </div>
                	<?php endwhile; ?>
              </div>
            </div>
             <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
              <i class="fa fa-angle-left"></i>
              </a>
              <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
              <i class="fa fa-angle-right"></i>
              </a>
          </div>
        </div><!--/recommended_items-->

      </div>
    </div>
  </div>
</section>

<?php include 'view/footer.php'; ?>
