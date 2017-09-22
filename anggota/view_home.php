<h3>Mintalah ketuplak anda untuk scan absen anda!</h3>
<?php

$sql = "SELECT username,nama,anggota.npm FROM koordinator INNER JOIN anggota ON koordinator.npm = anggota.npm  WHERE username =?";
$smd = $conn->prepare($sql);
$smd->bind_param("s",$_SESSION['user'] );
$smd->execute();
$smd->bind_result($arg1,$arg2,$arg3);
while ($smd->fetch()) {
	$username=$arg1;
	$nama = $arg2;
	$npm = $arg3;
	
	
}
$acaklah = rand(0,98999);
$jadikan = array("user"=>$username,"nama"=>$nama,"npm"=>$npm,"acak"=>$acaklah);
$jadikan =json_encode($jadikan);


$data = $jadikan;
$size =  '300x300';
$logo = 'resource/img/bemfikti.png';

//header('Content-type: image/png');

$QR = imagecreatefrompng('https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs='.$size.'&chl='.urlencode($data));
if($logo !== FALSE){
	$logo = imagecreatefromstring(file_get_contents($logo));

	$QR_width = imagesx($QR);
	$QR_height = imagesy($QR);
	
	$logo_width = imagesx($logo);
	$logo_height = imagesy($logo);
	
	// Scale logo to fit in the QR Code
	$logo_qr_width = $QR_width/3;
	$scale = $logo_width/$logo_qr_width;
	$logo_qr_height = $logo_height/$scale;
	
	imagecopyresampled($QR, $logo, $QR_width/3, $QR_height/3, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
}
ob_start();
imagepng($QR);
$image = ob_get_clean();

echo ' <img src="data:image/png;base64,'.base64_encode($image) . '" alt="Scan kuy~~" >';
imagedestroy($QR);



?>
