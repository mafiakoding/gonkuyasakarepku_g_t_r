<?php
error_reporting(0);
global $con;
if(isset($_GET['add'])){
	$id = $_GET['add'];
	$qt = mysqli_query($con, "SELECT * FROM produk WHERE id_produk='$id' union
		SELECT id_produk_custom,id_produk_custom, (body.harga+bridge.harga+fret.harga+jenis_kayu.harga+headstock.harga+pickup.harga+senar.harga+warna.harga) as jumlah_harga, produk_custom.kd_bridge,3,produk_custom.kd_jenis_kayu
		FROM `produk_custom`,body,bridge,fret,headstock,jenis_kayu,pickup,senar,warna
		where produk_custom.kd_body = body.kd_body
		and produk_custom.kd_bridge = bridge.kd_bridge
		and produk_custom.kd_fret = fret.kd_fret
		and produk_custom.kd_headstock = headstock.kd_headstock
		and produk_custom.kd_jenis_kayu = jenis_kayu.kd_kayu
		and produk_custom.kd_pickup = pickup.kd_pickup
		and produk_custom.kd_senar = senar.kd_senar
		and produk_custom.kd_warna = warna.kd_warna
		and id_produk_custom='$id'");
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
				$get = mysqli_query($con,"SELECT * FROM produk WHERE id_produk='$id' union
					SELECT id_produk_custom, id_produk_custom, (body.harga+bridge.harga+fret.harga+jenis_kayu.harga+headstock.harga+pickup.harga+senar.harga+warna.harga) as jumlah_harga, produk_custom.kd_bridge,3,produk_custom.kd_jenis_kayu
					FROM `produk_custom`,body,bridge,fret,headstock,jenis_kayu,pickup,senar,warna
					where produk_custom.kd_body = body.kd_body
					and produk_custom.kd_bridge = bridge.kd_bridge
					and produk_custom.kd_fret = fret.kd_fret
					and produk_custom.kd_headstock = headstock.kd_headstock
					and produk_custom.kd_jenis_kayu = jenis_kayu.kd_kayu
					and produk_custom.kd_pickup = pickup.kd_pickup
					and produk_custom.kd_senar = senar.kd_senar
					and produk_custom.kd_warna = warna.kd_warna
					and id_produk_custom='$id'");
				while($get_row = mysqli_fetch_assoc($get)){
					$no++;
					$sub = $get_row['harga'] * $value;
					$sub_berat=$get_row['berat'];
					echo 	'<tr>
									<input type="hidden" name="id_produk[]" value="'. $get_row['id_produk'].'">
											<td class="cart_description">
												<h4>'. $get_row['nama'].'</h4>
												<p>Prod. ID:'. $get_row['id_produk'].'</p>
											</td>
											<td class="cart_price">
					              <p>Rp. '.number_format($get_row['harga']).'</p>
					            </td>
											<td class="cart_quantity">
					              <div class="cart_quantity_button">
					                <a class="cart_quantity_up"  href="keranjang.php?remove='.$id.'"> - </a>
					                <input class="cart_quantity_input" type="text" name="quantity" value="'. $value. '" autocomplete="off" size="2">
					                <a class="cart_quantity_down" href="keranjang.php?add='.$id.'"> + </a>
					              </div>
					            </td>
											<td class="cart_total">
												<p>Rp. '.number_format($sub).'</p>
											</td>
											<td class="cart_delete">
												<a class="cart_quantity_delete" href="keranjang.php?delete='.$id.'" onclick="return confirm(\'Anda Yakin?\');"><i class="fa fa-times"></i></a>
											</td><tr>
											<input type="hidden" name="harga_produk[]" value="'. $sub.'">
														<input type="hidden" name="jumlah_produk[]" value="'. $value.'">';
					}
			}
			$total +=$sub;
			$total_berat +=$sub_berat;
			echo '';
		}
	}
	if($total == 0){
		echo '<td>Keranjang Belanja Kosong!<td>';
	}else {
		echo '<!--tr>
		<td colspan=3><h3>Total Bayar</h3></td>
		<td class="cart_total">
			<p class="cart_total_price">Rp. '.number_format($total,2,",",".").'</p>
		</td-->

			</tr></table>
			<p><div align="right">

			</div></p>
			<div class="row">
				<div class="col-sm-12">
					<div class="total_area">
						<ul>
							<li>Total <p class="cart_total_price">Rp. '.number_format($total,2,",",".").'</p></li>
						</ul>

							<!--a class="btn btn-default check_out" href="checkout.php">Check Out</a-->
					</div>
				</div>
			</div>
			<section id="do_action">
				<div class="container">
					<div class="heading">
						<h3>Isi kode pos : </h3>
						<p><input type="text" name="kode_pos" placeholder="isi kode pos" required=required class="form-control" style="width:40%;" /></p>
					<br>
					<div class="heading">
						<h3>Isi alamat lengkap disini : </h3>
						<p><textarea class="form-control" style="width:40%;" name="alamat" placeholder="isi alamat pengiriman" ></textarea></p>
					<br>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="chose_area">
								<ul class="user_info">
									<li class="single_field">
										<label>Layanan Ekspedisi:</label>
										<select name="layanan" id="layanan">
			                <option></option>
			                  <option value="pos">POS Indonesia  </option>
			                  <option value="jne">JNE  </option>
			              </select>

									</li>
									<li class="single_field">
										<label>Prov :</label>
										<select name="prov" id="prov">
			                <option></option>
			                  <option value="1">1 - Bali  </option>
			                  <option value="2">2 - Bangka Belitung  </option>
			                  <option value="3">3 - Banten  </option>
			                  <option value="4">4 - Bengkulu  </option>
			                  <option value="5">5 - DI Yogyakarta  </option>
			                  <option value="6">6 - DKI Jakarta  </option>
			                  <option value="7">7 - Gorontalo  </option>
			                  <option value="8">8 - Jambi  </option>
			                  <option value="9">9 - Jawa Barat  </option>
			                  <option value="10">10 - Jawa Tengah  </option>
			                  <option value="11">11 - Jawa Timur  </option>
			                  <option value="12">12 - Kalimantan Barat  </option>
			                  <option value="13">13 - Kalimantan Selatan  </option>
			                  <option value="14">14 - Kalimantan Tengah  </option>
			                  <option value="15">15 - Kalimantan Timur  </option>
			                  <option value="16">16 - Kalimantan Utara  </option>
			                  <option value="17">17 - Kepulauan Riau  </option>
			                  <option value="18">18 - Lampung  </option>
			                  <option value="19">19 - Maluku  </option>
			                  <option value="20">20 - Maluku Utara  </option>
			                  <option value="21">21 - Nanggroe Aceh Darussalam (NAD)  </option>
			                  <option value="22">22 - Nusa Tenggara Barat (NTB)  </option>
			                  <option value="23">23 - Nusa Tenggara Timur (NTT)  </option>
			                  <option value="24">24 - Papua  </option>
			                  <option value="25">25 - Papua Barat  </option>
			                  <option value="26">26 - Riau  </option>
			                  <option value="27">27 - Sulawesi Barat  </option>
			                  <option value="28">28 - Sulawesi Selatan  </option>
			                  <option value="29">29 - Sulawesi Tengah  </option>
			                  <option value="30">30 - Sulawesi Tenggara  </option>
			                  <option value="31">31 - Sulawesi Utara  </option>
			                  <option value="32">32 - Sumatera Barat  </option>
			                  <option value="33">33 - Sumatera Selatan  </option>
			                  <option value="34">34 - Sumatera Utara  </option>
			              </select>


									</li>
									<li class="single_field zip-field">
										<label>Kab/Kota:</label>
										<select name="kab" id="kab"></select>
									</li>
									<li class="single_field zip-field">
										<label>Ongkos:</label>
										<td><select name="biaya" id="biaya"><option></option></select></td>
									</li>
								</ul>
								<input type="button" class="btn btn-default update" name="con" id="con" value="Continue">
							</div>
						</div>
						<div class="col-sm-5">
							<div class="total_area">
								<ul>
									<li>Total Pembelian <span>Rp. '.number_format($total,2,",",".").'</span></li>
									<li>Ongkos Kirim<span><p id="ongkir" value=""> </p></span></li>

									<li>Total <span id="tot_pay"></span></li>
								</ul>
										<input type="hidden" name="total_harga" id="nilai" value="'. $total.'">
										<input type="hidden" name="ongkirim" id="ongkirim" value="">
										<input type="submit" class="btn btn-default check_out" name="submit" value="Check Out">
							</div>
						</div>
					</div> <h3> " <font color="green"> Setelah Checkout data pemesanan akan dikirim melalui email.. " </font> </h3>
				</div>
			</section>
		';
	}
		//echo '<td colspan="4" style="font-size: 16px;"><b><div class="pull-right">Total Belanja Anda : Rp. '.number_format($total).',- </div> </b></td>';
}



 ?>
