<?php
//Setting Ongkir Otomatis Memanfaat akun starter RajaOngkir.Com
$SetPropinsi = $_POST['isi_prov']; //9 Propinsi Jawa Barat
$APIKeyRaja = "0abef79a2fd5774b453c18df97690ec6"; //API Key Raja

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://rajaongkir.com/api/starter/city?province=$SetPropinsi",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: $APIKeyRaja"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
$hasil = json_decode($response, true);
for($i=0; $i<count($hasil['rajaongkir']['results']); $i++){
    echo "<option value=".$hasil['rajaongkir']['results'][$i]['city_id'].">".$hasil['rajaongkir']['results'][$i]['city_name']."</option>";
}
}
?>
