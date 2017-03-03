<?php

if(!empty($_GET['daftar'])){
  ?>
  <script type="text/javascript">alert('Akun sudah terdaftar.. Silahkan login..');</script>
  <?php
}

require_once 'init.php';

$error="";

if(isset($_POST['submit'])){
  $usr_nm=$_POST['username'];
  $pass=$_POST['password'];
  if(!empty(trim($usr_nm))&&!empty(trim($pass))){
    if(cek_login($usr_nm,$pass)) {
      $_SESSION['pengguna']=$usr_nm;
      header('location:index.php?login=ok');
    }else {
      $error="gagal login";
    }
  }else {
    $error="isi data dengan benar";
  }
}
 ?>

<?php include 'view/header.php'; ?>

<section id="form"><!--form-->
  <div class="container">
    <div class="row">
      <div class="col-sm-4 col-sm-offset-1">
        <div class="login-form"><!--login form-->
          <h2>Login sebagai member..</h2>
          <form method="post">
            <input type="text" name="username" placeholder="User Name" />
            <input type="password" name="password" placeholder="Password" />

            <button type="submit" name="submit" class="btn btn-default">Login</button>
          </form>
        </div><!--/login form-->
      </div>
      <div class="col-sm-1">
        <h2 class="or">OR</h2>
      </div>
      <div class="col-sm-4">
        <div class="signup-form"><!--sign up form-->
          <h2>Daftar akun baru..</h2>
          <form action="daftar.php" method="post">
            <input type="text" placeholder="Nama" name="nama" required='required' />
            <textarea name="alamat" placeholder="Alamat" required='required'></textarea><br><br>
            <input type="text" placeholder="Telp" name="telp" required='required' />
            <input type="email" name="email" placeholder="Email Address" required='required' />
            <input type="text" placeholder="Username" name='username' required='required' />
            <input type="password" placeholder="Password" name='password' required='required' />
            <button type="submit" name="daftart" class="btn btn-default">Daftar</button>
          </form>
        </div><!--/sign up form-->
      </div>
    </div>
  </div>
</section><!--/form-->

<?php include 'view/footer.php'; ?>
