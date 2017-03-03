<?php
$ongkir=$_POST['ongkir'];
$total_bayar=$_POST['total_bayar'];
$tot=number_format($ongkir+$total_bayar);
echo "<p>Rp $tot,00</p>";
 ?>
