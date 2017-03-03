<?php
require_once 'init.php';

$login=false;
if($_SESSION['pengguna']) {
  $login=true;
}
$tampil_pelanggan=tampil_pelanggan($_SESSION['pengguna']);
while ($rw=mysqli_fetch_assoc($tampil_pelanggan)) {
  $kd_pelanggan=$rw['kd_pelanggan'];
}

 ?>


 <?php if ($login==true): ?>

<?php include 'view/header.php'; ?>

<section id="cart_items">
  <div class="container">
    <div class="breadcrumbs">
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Shopping Cart</li>
      </ol>
    </div>
    <div class="table-responsive cart_info">
      <table class="table table-condensed">
        <thead>
          <tr class="cart_menu">
            <td class="image">Produk custom</td>
            <td class="description">ID PRODUK</td>
            <td class="price">HARGA</td>
            <td class="quantity"></td>
            <td class="total"></td>
            <td></td>
          </tr>
        </thead>
        <tbody>
          <?php
          global $con;
$qry="SELECT *,(h.harga+f.harga+d.harga+b.harga+w.harga+k.harga+j.harga+s.harga) as tot 
FROM `produk_custom` p
inner join headstock h on h.kd_headstock=p.kd_headstock
inner join fret f on f.kd_fret=p.kd_fret
inner join body d on d.kd_body=p.kd_body
inner join bridge b on b.kd_bridge=p.kd_bridge
inner join pickup k on k.kd_pickup=p.kd_pickup
inner join warna w on w.kd_warna=p.kd_warna
inner join senar s on s.kd_senar=p.kd_senar
inner join jenis_kayu j on j.kd_kayu=p.kd_jenis_kayu where kd_pelanggan='$kd_pelanggan'";
          $hasil=mysqli_query($con, $qry);
          while ($row=mysqli_fetch_assoc($hasil)) {?>
            <tr>
              <td class="cart_product">
                <a href=""><img src="images/cart/one.png" alt=""></a>
              </td>
              <td class="cart_description">
                <h4><a href=""><?=$row['id_produk_custom']?></a></h4>
                <p></p>
              </td>
              <td class="cart_price">
                <p><?=number_format($row['tot'])?></p>
              </td>
              <td class="cart_quantity">
              </td>
              <td class="cart_total">
                <a href='keranjang.php?add=<?=$row['id_produk_custom']?>' class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </td>
              <td class="cart_delete">
                <!--a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a-->
              </td>
            </tr>
          <?php }
           ?>


        </tbody>
      </table>
    </div>
  </div>
</section> <!--/#cart_items-->

<?php include 'view/footer.php'; ?>
<?php else: header('location:login.php');?>
<?php endif; ?>
