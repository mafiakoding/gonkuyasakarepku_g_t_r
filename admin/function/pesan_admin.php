<?php
date_default_timezone_set("asia/jakarta");
$host="localhost";
$user='root';
$pass='';
$db='gitar';

$con=mysqli_connect($host,$user,$pass,$db)or die('gagal melakukan koneksi');

$pesan=$_POST['pesan'];
$kd_pelanggan=$_POST['kd_pelanggan'];
$date=date('Y-m-d G:i:s');
$query="INSERT INTO `chat_admin` ( `isi_chat`, `kd_admin`, `kd_pelanggan`, `status`, `tgl`)
        VALUES ( '$pesan','ADM', '$kd_pelanggan', '0', '$date' );";
if ($hasil=mysqli_query($con, $query)) {
  echo '<div class="itemdiv dialogdiv">
    <div class="user">
      <img  src="assets/avatars/user.jpg" />
    </div>

    <div class="body">
      <div class="time">
        <i class="ace-icon fa fa-clock-o"></i>
        <span class="green">4 sec</span>
      </div>

      <div class="name">
        <a href="#">Alexa</a>
      </div>
      <div class="text">'.$pesan.'</div>

      <div class="tools">
        <a href="#" class="btn btn-minier btn-info">
          <i class="icon-only ace-icon fa fa-share"></i>
        </a>
      </div>
    </div>
  </div>';
}else {
  echo "gagal";
}


 ?>
