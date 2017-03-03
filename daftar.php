
<?php
include_once 'init.php';

echo "string";
echo $_POST['username'];
  $user=$_POST['username'];
  $pass=$_POST['password'];
  $nama=$_POST['nama'];
  $alamat=$_POST['alamat'];
  $telp=$_POST['telp'];
  $email=$_POST['email'];
	echo $_POST['username'];
    mysqli_query($con,"insert into pelanggan values('','$nama','$alamat','$telp','$user','$pass','$email')");


    header('location:login.php?daftar=ok');

 ?>