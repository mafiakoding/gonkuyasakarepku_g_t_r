<?php 
include '../function/db.php';
ini_set('memory_limit','25M');
session_start();
$cari = mysqli_query($con,"SELECT *,produk.nama as nama_pr from det_pemesanan 
    left join produk on produk.id_produk=det_pemesanan.id_produk
    inner join pemesanan on pemesanan.kd_pemesanan=det_pemesanan.kd_pemesanan
    left join pelanggan on pelanggan.kd_pelanggan=pemesanan.kd_pelanggan
    where det_pemesanan.kd_pemesanan='".$_GET['id']."'") or die ('Gagal Pencarian Data!!!...');
$cari2 = mysqli_query($con,"SELECT * from pemesanan 
    left join pelanggan on pelanggan.kd_pelanggan=pemesanan.kd_pelanggan
    where pemesanan.kd_pemesanan='".$_GET['id']."'") or die ('Gagal Pencarian Data!!!...');
$row2=mysqli_fetch_assoc($cari2);
$content = "
<div style='margin-left:15;'>  
    <strong> <font size='5'> LAPORAN PENJUALAN BARANG </font>  </strong> <br>

    Nama pelanggan      : ".$row2['nama']." <br>
    Tanggal pemesanan   : ".$row2['tgl_pemesanan']." <br>
    Biaya total barang  : <font color='green'><b>".number_format($row2['hrg_total'])."<b></font> <br>
    Ongkos kirim barang : <font color='red'><b>".number_format($row2['ongkir'])."<b></font> <br>
    <b>Alamat tujuan       : ".$row2['alamat']."</b> <br>   
    Tanggal Cetak : ".date('Y - m - d')." <br>
    <br>
</div>
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
                            <td class='cart_price'><img src='../".$row['gambar']."' width=150>
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
    $nama_dokumen='daftar_belanja'; //Beri nama file PDF hasil.
    define('_MPDF_PATH','../MPDF60/');
    include(_MPDF_PATH . "mpdf.php");
    $mpdf=new mPDF('c', 'A4-L'); // Create new mPDF Document
    //Beginning Buffer to save PHP variables and HTML tags
    ob_start(); 
        echo $content;
    $html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
    ob_end_clean();
    //Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
    $mpdf->WriteHTML(utf8_encode($html));
    $mpdf->Output($nama_dokumen.".pdf" ,'I');
    exit;

    
?>