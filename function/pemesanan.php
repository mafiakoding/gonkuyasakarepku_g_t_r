<?php
function pemesanan($id_produk, $harga_produk, $jumlah_produk, $total_harga,$kd_pelanggan,$ongkirim,$kode_pos,$alamat){
  global $con;
  $date=date("Y-m-d");
  $query="SELECT * from pemesanan";
  $result1=mysqli_num_rows(mysqli_query($con, $query));
  $result=$result1+1;
  if ($result<10) {
    $kd_pemesanan="PESN-00$result";
  }elseif ($result<100) {
    $kd_pemesanan="PESN-0$result";
  }else {
    $kd_pemesanan="PESN-$result";
  }

  $jumarr=count($id_produk);
  for ($i=0; $i <$jumarr ; $i++) {

    $query1="SELECT * from det_pemesanan";
    $result3=mysqli_num_rows(mysqli_query($con, $query1));
    $result2=$result3+1;
    if ($result2<10) {
      $kd_det_pemesanan="DETPESN-00$result2";
    }elseif ($result<100) {
      $kd_det_pemesanan="DETPESN-0$result2";
    }else {
      $kd_det_pemesanan="DETPESN-$result2";
    }

    $qry="INSERT INTO `det_pemesanan` ( `hrg_produk`, `id_produk`, `jml_produk`, `kd_det_pemesanan`, `kd_pemesanan`)
          VALUES ( $harga_produk[$i], '$id_produk[$i]',$jumlah_produk[$i] , '$kd_det_pemesanan', '$kd_pemesanan' );";
    $hasil=mysqli_query($con, $qry);
  }
  $qry1="INSERT INTO `pemesanan` ( `hrg_total`, `kd_pelanggan`, `kd_pemesanan`, `ongkir`, `tgl_pemesanan`,`alamat`,`kode_pos`,`feedback`)
          VALUES ( $total_harga, '$kd_pelanggan', '$kd_pemesanan',$ongkirim , '$date','$alamat','$kode_pos','-' );";
  $hasil1=mysqli_query($con, $qry1);
  return $hasil1;
}

function tampil_pemesanan_by_id($kd_pelanggan){
  global $con;

  $qry="SELECT * from pemesanan where kd_pelanggan='$kd_pelanggan'";
  $hasil=mysqli_query($con, $qry);
  return $hasil;
}

function tampil_det_pemesanan_by_id($kd_pemesanan){
  global $con;

  $qry="SELECT * from det_pemesanan left join produk on produk.id_produk=det_pemesanan.id_produk where kd_pemesanan='$kd_pemesanan'";
  $hasil=mysqli_query($con, $qry);
  return $hasil;
}

function bayar($norek,$nmrek,$bank,$tgltran,$target_file,$kd_transaksi){
  global $con;

  $qry="INSERT INTO `pembayaran` ( `bank`, `kd_pemesanan`, `nm_rek`, `no_rek`, `nota_bukti`, `status`, `tgl_transfer`)
  VALUES ( '$bank', '$kd_transaksi', '$nmrek', '$norek', '$target_file', '0', '$tgltran');";
  $hasil=mysqli_query($con, $qry);
  return $hasil;
}


 ?>
