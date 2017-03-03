<?php 
include '../function/db.php';
ini_set('memory_limit','25M');
session_start();
$cari = mysqli_query($con,"SELECT *,produk.nama as nama_pr from det_pemesanan 
    left join produk on produk.id_produk=det_pemesanan.id_produk
    inner join pemesanan on pemesanan.kd_pemesanan=det_pemesanan.kd_pemesanan
    left join pelanggan on pelanggan.kd_pelanggan=pemesanan.kd_pelanggan
    where det_pemesanan.kd_pemesanan='".$_GET['kd']."'") or die ('Gagal Pencarian Data!!!...');
$cari2 = mysqli_query($con,"SELECT * from pemesanan 
    left join pelanggan on pelanggan.kd_pelanggan=pemesanan.kd_pelanggan
    where pemesanan.kd_pemesanan='".$_GET['kd']."'") or die ('Gagal Pencarian Data!!!...');
$row2=mysqli_fetch_assoc($cari2);
$email = $row2['email']; 
$content = "
<div style='margin-left:15;'>  
    <strong> <font size='5'> LAPORAN PENJUALAN BARANG </font>  </strong> <br>

    Nama pelanggan      : ".$row2['nama']." <br>
    Nama email      : ".$email." <br>
    Tanggal pemesanan   : ".$row2['tgl_pemesanan']." <br>
    Biaya total barang  : <font color='black'><b>".number_format($row2['hrg_total'])."<b></font> <br>
    Ongkos kirim barang : <font color='black'><b>".number_format($row2['ongkir'])."<b></font> <br>
    Total biaya         : <font color='red'><b>".number_format($row2['ongkir']+$row2['hrg_total'])."<b></font> <br>
    Alamat tujuan       : <b>".$row2['alamat']."</b> <br>   
</div>
<h4><b>Silahkan lakukan pembayaran pada salah satu rekening kami, sebelum konfirmasi pembayaran.. :</b></h4>
      <table>
        <tr>
          <td style='width:150px'><img src='../gambar/mandiri.png' height='40' width='100' style='border-radius:10px 10px 10px 10px; margin:10px;' ></td>
          <td><h5>0256-2342-23462-2345-04<br><h5>An : Adika<h5></h3></td>
        </tr>
        <tr>
          <td><img src='../gambar/bca.png' height='40' width='100' style='border-radius:10px 10px 10px 10px; margin:10px;' ></td>
          <td><h5>4566-45656-456555-456-5<br><h5>An : Adika<h5></h3></td>
        </tr>
        <tr>
          <td><img src='../gambar/bni.png' height='40' width='100' style='border-radius:10px 10px 10px 10px; margin:10px;' ></h3></td>
          <td><h5>234-56467-4556-4566-546<br><h5>An : Adika<h5></h3></td>
        </tr>
        <tr>
          <td><img src='../gambar/bri.png' height='40' width='100' style='border-radius:10px 10px 10px 10px; margin:10px;' ></h3></td>
          <td><h5>4565-56-567-678-0456456<br><h5>An : Adika<h5></h3></td>
        </tr>
      </table>
                                <table width='100%' border=0 id='example' cellpadding=5 >
                                        <thead>
                                        <tr class='cart_menu' bgcolor='green' >
                                            <td class='image'>Kode Transaksi</td>
                                            <td class='price'>Nama Barang</td>
                                            <td class='price'>Jumlah</td>
                                            <td class='total'>Total</td>
                                        </tr>
                    </thead>";
    if(mysqli_num_rows($cari)==0)
        {
              $content .= "<tr>
                    <td colspan='9'>Data Kosong!!!...</td>
              </tr>";
    }
    else{
        $no=1;


        while($row=mysqli_fetch_assoc($cari))
        {
  
            
           $content .= "
                    <tbody>
                    <tr bgcolor='gainsboro' >
                            <td class='cart_description'>
                                <h4>".$no."</h4>
                                <p></p>
                            </td>
                            <td class='cart_price'><img src='../admin/".$row['gambar']."' width=150>
                                <p>".$row['nama_pr']."</p>
                            </td>
                            <td class='cart_price'>
                                <p>".$row['jml_produk']." Unit</p>
                            </td>
                            <td class='cart_total'>
                                <p class='cart_total_price'>IDR ".number_format($row['hrg_produk'])."</p>
                            </td>
                    </tr>
                    </tbody>";
                    $no++;
                 }
          }
 $content .= ";   
</table>";
    
    $tglnow = date('Y - m - d');


    // Define relative path from this script to mPDF
    $nama_dokumen='keranjang_belanja'; //Beri nama file PDF hasil.
    define('_MPDF_PATH','../admin/MPDF60/');
    include(_MPDF_PATH . "mpdf.php");
    $mpdf=new mPDF('c', 'A4'); // Create new mPDF Document
    //Beginning Buffer to save PHP variables and HTML tags
    ob_start(); 
        echo $content;
    $html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
    ob_end_clean();
    //Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
    $mpdf->WriteHTML(utf8_encode($html));
    $mpdf->Output($nama_dokumen.".pdf" ,'I');

//save file
$mpdf -> Output ('../file/'.$_GET['kd'].'.pdf' , 'F' );



$filename= $_GET['kd'].'.pdf';
$path='../file/';


$file = $path . $filename; 


$file_size = filesize($file); 
$handle = fopen($file, "r"); 
$content = fread($handle, $file_size); 
fclose($handle); 
$content = chunk_split(base64_encode($content)); 
$uid = md5(uniqid(time())); 
$name = basename($file); 
$eol = PHP_EOL; 

$subject = "Mail Out Certificate"; 
$message = '<h1>Berikut rincian pembelanjaan</h1>'; 
$from_name = "Toko gitar"; 
$from_mail = "Gitar_online@yahoo.com"; 
$replyto =  $email; // "riadia72@gmail.com"; 
$mailto = $email; // "riadia72@gmail.com"; 

$header = "From: " . $from_name . " <" . $from_mail . ">\n"; 
$header .= "Reply-To: " . $replyto . "\n"; 
$header .= "MIME-Version: 1.0\n"; 
$header .= "Content-Type: multipart/mixed; boundary=\"" . $uid . "\"\n\n"; 
$emessage = "--" . $uid . "\n"; $emessage .= "Content-type:text/html; charset=iso-8859-1\n"; 

//$emessage .= "Content-Transfer-Encoding: 7bit\n\n"; 
//$emessage .= $message . "\n\n"; 
//$emessage .= "--" . $uid . "\n"; 
//$emessage .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"\n"; 
// use different content types here 
$emessage .= "Content-Transfer-Encoding: base64\n"; 
$emessage .= "Content-Disposition: attachment; filename=\"" . $filename . "\"\n\n"; 
$emessage .= $content . "\n\n"; 
$emessage .= "--" . $uid . "--"; 

if(mail($mailto, $subject, $emessage, $header))
{
}
else{
}
    
exit;
?>