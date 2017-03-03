<?php
require_once 'init.php';
error_reporting(0);
$login=false;
if($_SESSION['pengguna']) {
  $login=true;
}

 include 'view/header.php'; ?>
<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <div class="left-sidebar">

          <!--div class="brands_products"><!--brands_products-->
            <!--h2>Brands</h2>
            <!--div class="brands-name">
              <ul class="nav nav-pills nav-stacked">
                <li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
                <li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                <li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
                <li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
                <li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
                <li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
                <li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
              </ul>
            </div>
          </div--><!--/brands_products-->

        </div>
      </div>

      <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
          <h2 class="title text-center">Features Items</h2>
          <?php $tampil_produk=tampil_produk();
          while ($row=mysqli_fetch_assoc($tampil_produk)) :?>
          <div class="col-sm-4" id='products'>
            <div class="product-image-wrapper">
              <div class="single-products">
                <div class='product-image-wrapper'>
                  <div class='box-body no-padding'>
                      <img class='img-responsive pad' src='admin/<?=$row['gambar']?>' alt='Photo'>

                    </div>
                    <h2>IDR <?=number_format($row['harga']);?></h2>
                    <p><?php echo $row['nama']; ?></p>
                  </div>
                <div class="product-overlay">
                  <div class="overlay-content">
                    <h2>IDR <?=number_format($row['harga']);?></h2>
                    <p><?php echo $row['nama']; ?></p>
                    <a href='keranjang.php?add=<?=$row['id_produk']?>' class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                  </div>
                </div>
              </div>
              <div class="choose">
                <ul class="nav nav-pills nav-justified">
                  <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                  <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                </ul>
              </div>
            </div>
          </div>
          <?php endwhile; ?>

          </div>

          <ul class="pagination">
            <li class="active"><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">&raquo;</a></li>
          </ul>
        </div><!--features_items-->
      </div>
    </div>
  </div>
</section>
<?php include 'view/footer.php'; ?>
