<?php
  $APIKeyRaja = "0abef79a2fd5774b453c18df97690ec6"; //API Key Raja

  $AsalKiriman = "501"; //115 Kota Bekasi Jawa Barat
  $TujuanKiriman = $_POST['isi_kab']; //419 Kab Sleman Yk
  $BeratProduk = 1;//$_POST['isi_berat']; //1kg Berat Produk
  $TipeOngkir = $_POST['isi_layanan'];; //Jenis Ongkir jne / tiki / pos
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "http://rajaongkir.com/api/starter/cost",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "origin=$AsalKiriman&destination=$TujuanKiriman&weight=$BeratProduk&courier=$TipeOngkir",
    CURLOPT_HTTPHEADER => array(
      "content-type: application/x-www-form-urlencoded",
      "key: $APIKeyRaja"
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
  $hasil = json_decode($response, true);?>
  <select class="" name="">
  <?php for($i=0; $i<count($hasil['rajaongkir']['results'][0]['costs']); $i++){

  	for($ix=0; $ix<count($hasil['rajaongkir']['results'][0]['costs'][$i]['cost']); $ix++){?>
  	<option><?php echo ($hasil['rajaongkir']['results'][0]['costs'][$i]['cost'][$ix]['value']*$BeratProduk)?></option>
  <?php	}
  }?>
  </select>
<?php  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>



  </body>
</html>
