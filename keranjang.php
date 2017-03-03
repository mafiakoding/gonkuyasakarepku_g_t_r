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

if(isset($_GET['remove'])){
  $_SESSION['cart_'.$_GET['remove']]--;
  header('location:keranjang.php');
}

//PROSES HAPUS SEMUA ITEM PRODUK//
if(isset($_GET['delete'])){
  $_SESSION['cart_'.$_GET['delete']]='0';
  header('location:keranjang.php');
}
 ?>


<?php
  if(isset($_POST['submit'])){
    $id_produk=$_POST['id_produk'];
    $kode_pos=$_POST['kode_pos'];
    $alamat=$_POST['alamat'];
    $harga_produk=$_POST['harga_produk'];
    $jumlah_produk=$_POST['jumlah_produk'];
    $total_harga=$_POST['total_harga'];
    $ongkirim=$_POST['ongkirim'];
    //print_r($id_produk);
    //print_r($harga_produk);
    //print_r($jumlah_produk);
    //echo "$total_harga";
    if (!empty($id_produk)&&!empty($harga_produk)&&!empty($jumlah_produk)&&!empty($total_harga)&&! empty($ongkirim) && $ongkirim!=0) {
      if (pemesanan($id_produk, $harga_produk, $jumlah_produk, $total_harga,$kd_pelanggan,$ongkirim,$kode_pos,$alamat)) {
        $cr=mysqli_query($con,'select kd_pemesanan,l.email from pemesanan p 
        inner join pelanggan l on l.kd_pelanggan=p.kd_pelanggan
        order by kd_pemesanan desc limit 1');
        $v = mysqli_fetch_assoc($cr);
        $kd_pemesanan = $v['kd_pemesanan'];
        $email = $v['email'];
        header('location:checkout.php?kd='.$kd_pemesanan);
      }else {
        echo "gagal";
      }
    }else {
      echo "ada kesalahan data";
    }
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
      <form method="post">
        <table class="table table-condensed">
          <thead>
            <tr class="cart_menu">
              <td class="description"></td>
              <td class="price">Price</td>
              <td class="quantity">Quantity</td>
              <td class="total">Total</td>
              <td></td>
            </tr>
          </thead>
          <tbody>

                <?php cart();?>



          </tbody>
        </table>

      </form>

    </div>
  </div>
</section> <!--/#cart_items-->

<?php include 'view/footer.php'; ?>
<script type="text/javascript">
$('#prov').on('change', function(){
  var isi = $('#prov').val();
  $.ajax({
    type   : "POST",
    url    : "kabupatn.php",
    data   :{isi_prov:isi},
    success:function(data){
       $('#kab').html(data);
    }
  });
});
$('#kab').on('change', function(){
  var isi2 = $('#kab').val();
  var isi3 = $('#berat').val();
  var isi4 = $('#layanan').val();
  $.ajax({
    type   : "POST",
    url    : "biaya.php",
    data   :{isi_kab:isi2, isi_berat:isi3, isi_layanan:isi4},
    success:function(data){
       $('#biaya').html(data);
    }
  });
});
$('#con').on('click', function(){
  var isi4 = $('#biaya').val();
  $.ajax({
    type   : "POST",
    url    : "ongkir.php",
    data   :{ongkir:isi4},
    success:function(data){
      $('#ongkir').html(data);
    }
  });
});
$('#con').on('click', function(){
  var isi4 = $('#biaya').val();
  var isi5 = $('#nilai').val();
  $.ajax({
    type   : "POST",
    url    : "total_bayar.php",
    data   :{ongkir:isi4, total_bayar:isi5},
    success:function(data){
      $('#tot_pay').html(data);
    }
  });
});
$('#con').on('click', function(){
  var isi4 = $('#biaya').val();
  $('#ongkirim').val(isi4);
});

</script>
<?php else: header('location:login.php');?>
<?php endif; ?>
