<html>
<head>
	<title>Form Pengisian Data Absen Online BEM FIKTI</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  	<script>
  	$( function() {
    	$( "#datepicker" ).datepicker({
  		dateFormat: "dd/mm/yy"
		});
  	} );
  	</script>
	<link rel="stylesheet" href="css/demo.css">
	<link rel="stylesheet" href="css/sky-forms.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<!--[if lt IE 9]>
		<link rel="stylesheet" href="css/sky-forms-ie8.css">
	<![endif]-->
	
	<!--[if lt IE 10]>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="js/jquery.placeholder.min.js"></script>
	<![endif]-->		
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script src="js/sky-forms-ie8.js"></script>
	<![endif]-->
</head>

<?php

if(isset($_POST['kerjasama'])) {
	//PHPMailer library
	include ('./mail/PHPMailerAutoload.php');

	//Buat variabel agar lebih baik
	$nama = $_POST['nama'];
	$npm = $_POST['org'];
	$ttl = $_POST['tgl'];
	$kelas = $_POST['kelas'];
	$jurusan = $_POST['desc'];
	$jenis_k = $_POST['desc1'];
	$domisili = $_POST['kontak'];
	$surel = $_POST['surel'];
	if(isset($_POST['desc2'])){
		$kepengurusan = $_POST['desc2'];
	}else{
		$kepengurusan = 'Volunteer';
	}

	

	$mail = new PHPMailer;
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'localhost;hosting.gunadarma.ac.id';  			  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'bemfikti@gunadarma.ac.id';           // SMTP username
	$mail->Password = '#KolaborasiBermanfaat';                          // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, ssl also accepted
	$mail->Port = 587;                                    // TCP port to connect to

	$mail->setFrom('bemfikti@gunadarma.ac.id', 'Noreply BEM FIKTI UG');
	$mail->addAddress($surel, $nama);     // Add a recipient
	

	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'Data anda telah tersimpan '.$nama;
	$mail->Body    = '<table border="1" style="border-collapse: collapse; border: 1px solid black; text-align: left;">
<tr style="border: 1px solid black; background: #00557F; color: #FFFFFF;"><th colspan="2" style="border: 1px solid black; text-align: center;">Data Anda.</th></tr>
<tr style="border: 1px solid black;"><td style="border: 1px solid black;">Nama : </td><td>'.$nama.'</td></tr>
<tr style="border: 1px solid black; background: #E1EEf4; color: #00557F;"><td style="border: 1px solid black;">NPM: </td><td>'.$npm.'</td></tr>
<tr style="border: 1px solid black;"><td style="border: 1px solid black;">Tanggal Lahir: </td><td>'.$ttl.'</td></tr>
<tr style="border: 1px solid black; background: #E1EEf4; color: #00557F;"><td style="border: 1px solid black;">Jurusan: </td><td>'.$jurusan.'</td></tr>
<tr style="border: 1px solid black;"><td style="border: 1px solid black;">Jenis Kelamin: </td><td>'.$jenis_k.'</td></tr>
<tr style="border: 1px solid black; background: #E1EEf4; color: #00557F;"><td style="border: 1px solid black;">Kepengurusan: </td><td>'.$kepengurusan.'</td></tr>
<tr style="border: 1px solid black;"><td style="border: 1px solid black;">Domisili: </td><td>'.$domisili.'</td></tr>
<tr style="border: 1px solid black; background: #E1EEf4; color: #00557F;"><td style="border: 1px solid black;">E-mail: </td><td>'.$surel.'</td></tr>
</table>';
	//$mail->AltBody = 'Pesan normal tanpa html';

	if(!$mail->send()) {
    	echo 'Message could not be sent.';
    	echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		require_once '../config/db/conn.php';
		//masukkan dalam database..
		$sql ="INSERT INTO anggota(npm, nama, kelas, jurusan, jenis_kelamin, ttl, domisili, kepengurusan, email) VALUES (?,?,?,?,?,?,?,?,?)";
		$smd = $conn->prepare($sql);
		$smd->bind_param("sssssssss",$npm,$nama,$kelas,$jurusan,$jenis_k,$ttl,$domisili,$kepengurusan,$surel);
		$smd->execute();

?>

<body class="bg-green">
		<div class="body body-s">
			<form method="post" name="daftar" action="" class="sky-form">
				<header>Form Pengisian Data Absen Online BEM FIKTI</header>
				
				<fieldset>
					<section>
					<h3>Pengisian data Anda telah kami terima, silahkan tunggu informasi lebih lanjut, terimakasih.</h3>
					</section>
				</fieldset>
			</form>
		</div>
</body>

<?php
	die();
	}
die();
}
?>


<body class="bg-green">
	<div class="body body-s">
	
		<form method="post" name="daftar" action="?status=success" class="sky-form">
			<header>Form Pengisian Data Absen Online BEM FIKTI</header>
			
			<fieldset>
			
				<section>
					<label class="input">
						<input type="text" name="nama" id="nama" placeholder="Nama Lengkap" autocomplete="off" required>
						<b class="tooltip tooltip-bottom-right">Isikan Nama Anda.</b>
					</label>
				</section>

				<!--section>
				<label class="select">
				<select id="deptbir" name="deptbir">
				<option value="" selected disabled>Pilih Departemen / Biro</option>
				<option value="Akademik">Akademik</option>
				<option value="PSDM">PSDM</option>
				<option value="Kewirausahaan">Kewirausahaan</option>
				<option value="Kesejahteraan Mahasiswa">Kesejahteraan Mahasiswa</option>
				<option value="Pengabdian Masyarakat">Pengabdian Masyarakat</option>
				<option value="Olahraga">Olahraga</option>
				<option value="Seni Budaya">Seni Budaya</option>
				<option value="HUMAS">HUMAS</option>
				<option value="PTI">PTI</option>
				</select>
				<i></i>
				</label>
				</section-->
				<section>
					<label class="input">
						<input type="text" name="desc1" id="desc1" placeholder="Jenis Kelamin" autocomplete="off" required>
						<b class="tooltip tooltip-bottom-right">Pria / Wanita.</b>
					</label>
				</section>
				
				<section>
						<label class="input">
						<input type="text" name="org" id="org" placeholder="NPM" autocomplete="off" required>
						<b class="tooltip tooltip-bottom-right">Isikan dengan Nomor Pokok Mahasiswa.</b>
					</label>
				</section>
				
				<section>
						<label class="input">
						<input type="text" name="kelas" id="kelas" placeholder="Kelas anda" autocomplete="off" required>
						<b class="tooltip tooltip-bottom-right">Isikan dengan Kelas saat ini.</b>
					</label>
				</section>

				<section>
					<label class="input">
						<input type="text" name="tgl" id="datepicker" placeholder="Tanggal Lahir" autocomplete="off" required>
						<!--b class="tooltip tooltip-bottom-right"></b-->
					</label>
				</section>

				<section>
					<label class="input">
						<input type="text" name="org" id="org" placeholder="Jurusan" autocomplete="off" required>
						<b class="tooltip tooltip-bottom-right">Isi dengan Sistem Informasi / Sistem Komputer.</b>
					</label>
				</section>

				<section>
					<label class="input">
						<input type="text" name="kontak" id="kontak" placeholder="Domisili" autocomplete="off" required>
						<b class="tooltip tooltip-bottom-right">Depok / Kalimalang / Karawaci / Cengkareng / Salemba</b>
					</label>
				</section>	
					
				<section>
					<label class="input">
						<input type="text" name="desc2" id="desc2" placeholder="Kepengurusan" autocomplete="off" required>
						<b class="tooltip tooltip-bottom-right">Kepengurusan contoh : Staff Biro PTI <br> Jika anda volunteer maka kosongkan bagian ini</b>
					</label>
				</section>	
				
				
				<section>
					<label class="input">
						<input type="text" name="surel" id="surel" placeholder="E-mail Anda" autocomplete="off" required>
						<b class="tooltip tooltip-bottom-right">E-mail Anda akan digunakan sbagai konfirmasi</b>
					</label>
				</section>		
					
			</fieldset>
			<footer>
				<input type="submit" name="kerjasama" class="button" value="Kirim form"/>
			</footer>
			
			<!--footer>
				<a href='index.php?cek=qr'>Lupa QR Kode?</a>
			</footer-->
		</form>
			
	</div>
</body>
</html>