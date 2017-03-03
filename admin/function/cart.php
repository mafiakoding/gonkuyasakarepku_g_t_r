<?php
error_reporting(0);
global $con;
if(isset($_GET['add'])){
	$id = $_GET['add'];
	$qt = mysqli_query($con, "SELECT * FROM produk WHERE id_produk='$id'");
	while($qt_row = mysqli_fetch_assoc($qt)){
		if($qt_row['jumlah'] != $_SESSION['cart_'.$_GET['add']] && $qt_row['jumlah'] > 0){
			$_SESSION['cart_'.$_GET['add']]+='1';
			header("Location: keranjang.php");
		} else {
			echo '<script language="javascript">alert("Stok produk tidak mencukupi!"); document.location="keranjang.php";</script>';
		}
	}

}

function cart(){
	global $con;
	foreach($_SESSION as $name => $value){
		if($value > 0){
			if(substr($name, 0, 5) == 'cart_'){
				$id = substr($name, 5, (strlen($name)-5));
				$get = mysqli_query($con,"SELECT * FROM produk WHERE id_produk='$id'");
				while($get_row = mysqli_fetch_assoc($get)){
					$no++;
					$sub = $get_row['harga'] * $value;
					$sub_berat=$get_row['berat'];
					echo 	'     <td><center>'. $no .'</center></td>
											<td class="hidden-480"><center>'. $get_row['id_produk'].'</center></td>
											<td><center>'. $get_row['nama'].'</center></td>
			                <td class="hidden-480"><center>Rp. '.number_format($get_row['harga']).'</center></td>
			                <td><center>'. $value. ' Pcs</center></td>
			                <td><center>Rp. '.number_format($sub).'</center></td>
											<td><center><a href="keranjang.php?add='.$id.'" class="btn btn-xs btn-success">Tambah</a>
											<a href="keranjang.php?remove='.$id.'" class="btn btn-xs btn-warning">Kurang</a>
											<a href="keranjang.php?delete='.$id.'" class="btn btn-xs btn-danger" onclick="return confirm(\'Anda Yakin?\');">Hapus</a></center></td>
			                </tr>';
					}
			}
			$total +=$sub;
			$total_berat +=$sub_berat;
		}
	}
	if($total == 0){
		echo '<td>Keranjang Belanja Kosong!<td>';
	}else {
		echo '
			<tr style="background-color: #DDD;"><td colspan="3" align="right"><b>Total :</b></td><td align="right"><b>Rp. '.number_format($total,2,",",".").'</b></td></td></td><td></td></tr></table>
			<p><div align="right">
			<a href="index.php" class="btn btn-info">&laquo; CONTINUE SHOPPING</a>
			<a href="checkout.php?total='.$total.'&&total_berat='.$total_berat.'"
			class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> CHECK OUT &raquo;</a>
			</div></p>
		';
	}
		//echo '<td colspan="4" style="font-size: 16px;"><b><div class="pull-right">Total Belanja Anda : Rp. '.number_format($total).',- </div> </b></td>';
}



 ?>
