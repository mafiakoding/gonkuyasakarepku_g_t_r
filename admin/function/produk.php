<?php
//===========================fungsi produk
function tampil_produk(){
  global $con;

  $qry = 'SELECT * FROM produk;';
  $hasil = mysqli_query($con,$qry)or die('gagal menampilkan produk');
  return $hasil;
}

function tmp_produk_id($id){
  global $con;

  $qry="SELECT * FROM produk WHERE id_produk = '$id'";
  $hasil=mysqli_query($con,$qry)or die('gagal menampilkan produk');
  return $hasil;
}

function tmb_dt_pr($kd,$nm,$hrg,$jml,$berat,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $berat= escape($berat);
  //$gambar = escape($gambar);
  $qry="INSERT INTO produk VALUES ('$kd','$nm','$hrg','$target_file','$jml','$berat');";
  return run($qry);

}

function ed_pr($kd,$nm,$hrg,$jml,$berat,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $berat= escape($berat);
  //$gambar = escape($gambar);
  $qry="UPDATE produk SET nama='$nm',harga='$hrg',gambar='$target_file',jumlah='$jml',berat='$berat' WHERE id_produk='$kd';";
  return run($qry);

}

function del_pr($id){
  global $con;
  $id = escape($id);
  $qry="DELETE FROM produk WHERE id_produk='$id';";
  return run($qry);
}
//==================================================end produk

//==================================================fungsi headstock
function tmp_hs(){
  global $con;
  $qry = 'SELECT * FROM headstock;';
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan headstock');
  return $hasil;
}

function tmp_hs_id($id){
  global $con;
  $qry = "SELECT * FROM headstock WHERE kd_headstock = '$id';";
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan headstock');
  return $hasil;
}

function tmb_dt_hs($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="INSERT INTO `headstock` ( `gambar`, `harga`, `kd_headstock`, `merek`, `nama`) VALUES ('$target_file','$hrg','$kd','$mrk','$nm');";
  return run($qry);
}

function ed_hs($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="UPDATE headstock SET nama='$nm',harga='$hrg',gambar='$target_file',merek='$mrk' WHERE kd_headstock='$kd';";
  return run($qry);
}

function del_hs($id){
  global $con;
  $id = escape($id);
  $qry="DELETE FROM headstock WHERE kd_headstock='$id';";
  return run($qry);
}
//======================================================end headstock

//======================================================fungsi nut
function tmp_nut(){
  global $con;
  $qry = 'SELECT * FROM nut;';
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan nut');
  return $hasil;
}

function tmp_nut_id($id){
  global $con;
  $qry = "SELECT * FROM nut WHERE kd_nut = '$id';";
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan nut');
  return $hasil;
}

function tmb_dt_nut($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="INSERT INTO nut VALUES ('$kd','$nm','$hrg','$jml','$mrk','$target_file');";
  return run($qry);
}

function ed_nut($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="UPDATE nut SET nama='$nm',harga='$hrg',gambar='$target_file',jumlah='$jml',merek='$mrk' WHERE kd_nut='$kd';";
  return run($qry);
}

function del_nut($id){
  global $con;
  $id = escape($id);
  $qry="DELETE FROM nut WHERE kd_nut='$id';";
  return run($qry);
}
//======================================================end nut
//======================================================fungsi tuner
function tmp_tn(){
  global $con;
  $qry = 'SELECT * FROM tuner;';
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan tuner');
  return $hasil;
}

function tmp_tn_id($id){
  global $con;
  $qry = "SELECT * FROM tuner WHERE kd_tuner = '$id';";
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan tuner');
  return $hasil;
}

function tmb_dt_tn($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="INSERT INTO tuner VALUES ('$kd','$nm','$hrg','$jml','$mrk','$target_file');";
  return run($qry);
}

function ed_tn($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="UPDATE tuner SET nama='$nm',harga='$hrg',gambar='$target_file',jumlah='$jml',merek='$mrk' WHERE kd_tuner='$kd';";
  return run($qry);
}

function del_tn($id){
  global $con;
  $id = escape($id);
  $qry="DELETE FROM tuner WHERE kd_tuner='$id';";
  return run($qry);
}
//======================================================end tuner

//======================================================fungsi fret
function tmp_fr(){
  global $con;
  $qry = 'SELECT * FROM fret;';
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan fret');
  return $hasil;
}

function tmp_fr_id($id){
  global $con;
  $qry = "SELECT * FROM fret WHERE kd_fret = '$id';";
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan fret');
  return $hasil;
}

function tmb_dt_fr($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="INSERT INTO fret VALUES ('$kd','$nm','$hrg','$target_file','$mrk');";
  return run($qry);
}

function ed_fr($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="UPDATE fret SET nama='$nm',harga='$hrg',gambar='$target_file',merek='$mrk' WHERE kd_fret='$kd';";
  return run($qry);
}

function del_fr($id){
  global $con;
  $id = escape($id);
  $qry="DELETE FROM fret WHERE kd_fret='$id';";
  return run($qry);
}
//======================================================end fret
//======================================================fungsi neck
function tmp_nk(){
  global $con;
  $qry = 'SELECT * FROM neck;';
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan neck');
  return $hasil;
}

function tmp_nk_id($id){
  global $con;
  $qry = "SELECT * FROM neck WHERE kd_neck = '$id';";
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan neck');
  return $hasil;
}

function tmb_dt_nk($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="INSERT INTO neck VALUES ('$kd','$nm','$hrg','$jml','$mrk','$target_file');";
  return run($qry);
}

function ed_nk($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="UPDATE neck SET nama='$nm',harga='$hrg',gambar='$target_file',jumlah='$jml',merek='$mrk' WHERE kd_neck='$kd';";
  return run($qry);
}

function del_nk($id){
  global $con;
  $id = escape($id);
  $qry="DELETE FROM neck WHERE kd_neck='$id';";
  return run($qry);
}
//======================================================end neck
//======================================================fungsi penghubung
function tmp_ph(){
  global $con;
  $qry = 'SELECT * FROM penghubung;';
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan penghubung');
  return $hasil;
}

function tmp_ph_id($id){
  global $con;
  $qry = "SELECT * FROM penghubung WHERE kd_penghubung = '$id';";
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan penghubung');
  return $hasil;
}

function tmb_dt_ph($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="INSERT INTO penghubung VALUES ('$kd','$nm','$hrg','$jml','$mrk','$target_file');";
  return run($qry);
}

function ed_ph($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="UPDATE penghubung SET nama='$nm',harga='$hrg',gambar='$target_file',jumlah='$jml',merek='$mrk' WHERE kd_penghubung='$kd';";
  return run($qry);
}

function del_ph($id){
  global $con;
  $id = escape($id);
  $qry="DELETE FROM penghubung WHERE kd_penghubung='$id';";
  return run($qry);
}
//======================================================end penghubung
//======================================================fungsi body
function tmp_bd(){
  global $con;
  $qry = 'SELECT * FROM body;';
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan body');
  return $hasil;
}
function del_wn($id){
  global $con;
  $id = escape($id);
  $qry="DELETE FROM warna WHERE kd_warna='$id';";
  return run($qry);
}
function tmp_wn(){
  global $con;
  $qry = 'SELECT * FROM warna;';
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan kayu');
  return $hasil;
}
function tmb_dt_wn($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="INSERT INTO warna VALUES ('$kd','$nm','$hrg','$target_file','$mrk');";
  return run($qry);
}
function tmp_wn_id($id){
  global $con;
  $qry = "SELECT * FROM warna WHERE kd_warna = '$id';";
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan bridge');
  return $hasil;
}
function ed_wn($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="UPDATE warna SET nama='$nm',harga='$hrg',gambar='$target_file',merek='$mrk' WHERE kd_warna='$kd';";
  return run($qry);
}
function del_ky($id){
  global $con;
  $id = escape($id);
  $qry="DELETE FROM jenis_kayu WHERE kd_kayu='$id';";
  return run($qry);
}
function tmp_ky(){
  global $con;
  $qry = 'SELECT * FROM jenis_kayu;';
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan kayu');
  return $hasil;
}
function tmb_dt_ky($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="INSERT INTO jenis_kayu VALUES ('$kd','$nm','$hrg','$target_file','$mrk');";
  return run($qry);
}
function tmp_ky_id($id){
  global $con;
  $qry = "SELECT * FROM jenis_kayu WHERE kd_kayu = '$id';";
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan bridge');
  return $hasil;
}
function ed_ky($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="UPDATE jenis_kayu SET nama='$nm',harga='$hrg',gambar='$target_file',merek='$mrk' WHERE kd_kayu='$kd';";
  return run($qry);
}

function tmp_bd_id($id){
  global $con;
  $qry = "SELECT * FROM body WHERE kd_body = '$id';";
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan body');
  return $hasil;
}

function tmb_dt_bd($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="INSERT INTO body VALUES ('$kd','$nm','$hrg','$target_file','$mrk');";
  return run($qry);
}

function ed_bd($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="UPDATE body SET nama='$nm',harga='$hrg',gambar='$target_file',merek='$mrk' WHERE kd_body='$kd';";
  return run($qry);
}

function del_bd($id){
  global $con;
  $id = escape($id);
  $qry="DELETE FROM body WHERE kd_body='$id';";
  return run($qry);
}
//======================================================end body
//==================================================fungsi bridge
function tmp_br(){
  global $con;
  $qry = 'SELECT * FROM bridge;';
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan bridge');
  return $hasil;
}

function tmp_br_id($id){
  global $con;
  $qry = "SELECT * FROM bridge WHERE kd_bridge = '$id';";
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan bridge');
  return $hasil;
}

function tmb_dt_br($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="INSERT INTO bridge VALUES ('$kd','$nm','$hrg','$target_file','$mrk');";
  return run($qry);
}

function ed_br($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="UPDATE bridge SET nama='$nm',harga='$hrg',gambar='$target_file',merek='$mrk' WHERE kd_bridge='$kd';";
  return run($qry);
}

function del_br($id){
  global $con;
  $id = escape($id);
  $qry="DELETE FROM bridge WHERE kd_bridge='$id';";
  return run($qry);
}
//======================================================end bridge
//======================================================fungsi Pickup
function tmp_pu(){
  global $con;
  $qry = 'SELECT * FROM pickup;';
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan pickup');
  return $hasil;
}

function tmp_pu_id($id){
  global $con;
  $qry = "SELECT * FROM pickup WHERE kd_pickup = '$id';";
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan pickup');
  return $hasil;
}

function tmb_dt_pu($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="INSERT INTO pickup VALUES ('$kd','$nm','$hrg','$target_file','$mrk');";
  return run($qry);
}

function ed_pu($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="UPDATE pickup SET nama='$nm',harga='$hrg',gambar='$target_file',merek='$mrk' WHERE kd_pickup='$kd';";
  return run($qry);
}

function del_pu($id){
  global $con;
  $id = escape($id);
  $qry="DELETE FROM pickup WHERE kd_pickup='$id';";
  return run($qry);
}
//======================================================end pickup
//======================================================fungsi Tone Control
function tmp_tc(){
  global $con;
  $qry = 'SELECT * FROM tone_control;';
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan tone control');
  return $hasil;
}

function tmp_tc_id($id){
  global $con;
  $qry = "SELECT * FROM tone_control WHERE kd_tone_control = '$id';";
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan tone control');
  return $hasil;
}

function tmb_dt_tc($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="INSERT INTO tone_control VALUES ('$kd','$nm','$hrg','$jml','$mrk','$target_file');";
  return run($qry);
}

function ed_tc($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="UPDATE tone_control SET nama='$nm',harga='$hrg',gambar='$target_file',jumlah='$jml',merek='$mrk' WHERE kd_tone_control='$kd';";
  return run($qry);
}

function del_tc($id){
  global $con;
  $id = escape($id);
  $qry="DELETE FROM tone_control WHERE kd_tone_control='$id';";
  return run($qry);
}
//======================================================end tone_control
//======================================================fungsi Senar
function tmp_sn(){
  global $con;
  $qry = 'SELECT * FROM senar;';
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan senar');
  return $hasil;
}

function tmp_sn_id($id){
  global $con;
  $qry = "SELECT * FROM senar WHERE kd_senar = '$id';";
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan senar');
  return $hasil;
}

function tmb_dt_sn($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="INSERT INTO senar VALUES ('$kd','$nm','$hrg','$target_file','$mrk');";
  return run($qry);
}

function ed_sn($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="UPDATE senar SET nama='$nm',harga='$hrg',gambar='$target_file',merek='$mrk' WHERE kd_senar='$kd';";
  return run($qry);
}

function del_sn($id){
  global $con;
  $id = escape($id);
  $qry="DELETE FROM senar WHERE kd_senar='$id';";
  return run($qry);
}
//======================================================end senar
//==================================================fungsi tuning_lock
function tmp_tl(){
  global $con;
  $qry = 'SELECT * FROM tuning_lock;';
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan tuninglock');
  return $hasil;
}

function tmp_tl_id($id){
  global $con;
  $qry = "SELECT * FROM tuning_lock WHERE kd_tuning_lock = '$id';";
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan tuninglock');
  return $hasil;
}

function tmb_dt_tl($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="INSERT INTO tuning_lock VALUES ('$kd','$nm','$hrg','$jml','$mrk','$target_file');";
  return run($qry);
}

function ed_tl($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="UPDATE tuning_lock SET nama='$nm',harga='$hrg',gambar='$target_file',jumlah='$jml',merek='$mrk' WHERE kd_tuning_lock='$kd';";
  return run($qry);
}

function del_tl($id){
  global $con;
  $id = escape($id);
  $qry="DELETE FROM tuning_lock WHERE kd_tuning_lock='$id';";
  return run($qry);
}
//======================================================end tuning_lock

//==================================================fungsi freatboard
function tmp_fb(){
  global $con;
  $qry = 'SELECT * FROM freatboard;';
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan freatboard');
  return $hasil;
}

function tmp_fb_id($id){
  global $con;
  $qry = "SELECT * FROM freatboard WHERE kd_freatboard = '$id';";
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan freatboard');
  return $hasil;
}

function tmb_dt_fb($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="INSERT INTO freatboard VALUES ('$kd','$nm','$hrg','$jml','$mrk','$target_file');";
  return run($qry);
}

function ed_fb($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="UPDATE freatboard SET nama='$nm',harga='$hrg',gambar='$target_file',jumlah='$jml',merek='$mrk' WHERE kd_freatboard='$kd';";
  return run($qry);
}

function del_fb($id){
  global $con;
  $id = escape($id);
  $qry="DELETE FROM freatboard WHERE kd_freatboard='$id';";
  return run($qry);
}
//======================================================end freatboard
//==================================================fungsi strappin
function tmp_sp(){
  global $con;
  $qry = 'SELECT * FROM strap_pin;';
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan strappin');
  return $hasil;
}

function tmp_sp_id($id){
  global $con;
  $qry = "SELECT * FROM strap_pin WHERE kd_strap_pin = '$id';";
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan strappin');
  return $hasil;
}

function tmb_dt_sp($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="INSERT INTO strap_pin VALUES ('$kd','$nm','$hrg','$jml','$mrk','$target_file');";
  return run($qry);
}

function ed_sp($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="UPDATE strap_pin SET nama='$nm',harga='$hrg',gambar='$target_file',jumlah='$jml',merek='$mrk' WHERE kd_strap_pin ='$kd';";
  return run($qry);
}

function del_sp($id){
  global $con;
  $id = escape($id);
  $qry="DELETE FROM strap_pin WHERE kd_strap_pin ='$id';";
  return run($qry);
}
//======================================================end strappin
//==================================================fungsi pickup_selector
function tmp_ps(){
  global $con;
  $qry = 'SELECT * FROM pickup_selector;';
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan Pickup Selector');
  return $hasil;
}

function tmp_ps_id($id){
  global $con;
  $qry = "SELECT * FROM pickup_selector WHERE kd_pickup_selector = '$id';";
  $hasil = mysqli_query($con, $qry)or die('gagal menampilkan Pickup Selector');
  return $hasil;
}

function tmb_dt_ps($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="INSERT INTO pickup_selector VALUES ('$kd','$nm','$hrg','$jml','$mrk','$target_file');";
  return run($qry);
}

function ed_ps($kd,$nm,$hrg,$jml,$mrk,$target_file){
  global $con;
  $kd= escape($kd);
  $nm= escape($nm);
  $hrg= escape($hrg);
  $jml= escape($jml);
  $mrk= escape($mrk);
  //$gambar = escape($gambar);
  $qry="UPDATE pickup_selector SET nama='$nm',harga='$hrg',gambar='$target_file',jumlah='$jml',merek='$mrk' WHERE kd_pickup_selector ='$kd';";
  return run($qry);
}

function del_ps($id){
  global $con;
  $id = escape($id);
  $qry="DELETE FROM pickup_selector WHERE kd_pickup_selector ='$id';";
  return run($qry);
}
//======================================================end pickup_selector
function run($qry){
  global $con;
  if (mysqli_query($con,$qry)) return true;
  else return false;
}

function escape($data){
  global $con;
  return mysqli_real_escape_string($con, $data);
}
 ?>
