
<?php

$filename= 'PESN-003.pdf';// $_GET['kd'].'.pdf';
$path='file/';

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
$replyto =   "riadia72@gmail.com"; 
$mailto =  "riadia72@gmail.com"; 

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
    echo 'email dengan attachement '.$filename.' berhasil dikirim';
}
else{
        echo 'email gagal terkirim';
}
   
?>