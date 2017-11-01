
<?php

date_default_timezone_set("Asia/Jakarta");
 if(session_id() == '') {
    session_start();
}  //implementasi perintah PHP 5.3

require_once(__DIR__ . '/../db/conn.php');

if ($_SESSION):

if (isset($_SESSION['otentikasi']) && ($_SESSION['otentikasi'] === true )) {
//mari kita bongkar data user itu apakah dia sebagai ketuplak, kabir,ka.. dll
//SELECT * From koordinator INNER JOIN anggota on koordinator.npm = anggota.npm where koordinator.username = 'kips08' 
//SELECT id_koor,username,password,izin,last_login,nama,koordinator.npm FROM koordinator inner join anggota on  koordinator.npm =anggota.npm  WHERE koordinator.username ='jibrilhp'
$sql = "SELECT id_koor,username,password,koordinator.npm,izin,last_login,nama FROM koordinator inner join anggota on  koordinator.npm =anggota.npm WHERE koordinator.username =?";
$smd = $conn->prepare($sql);
$smd->bind_param("s",$_SESSION['user'] );
$smd->execute();
$smd->bind_result($idkoor,$usrname,$pasw,$npm,$izin,$lastlogin,$nama);
while ($smd->fetch()) {
	$idkoor = $idkoor;
	$usrname = $usrname;
	$pasw = $pasw;
	$npm = $npm;
	$izin = $izin;
	$lastlogin = $lastlogin;
	$nama = $nama;
}



//mari kita cek di id_koornya ada nggak? kalau dia sebagai ketuplak level < 3 maka 
						//ngecek dia masuk anggota mana aja.
						//ambil datanya dari 
						
						
						$_SESSION['level'] = $izin;
						$_SESSION['npm'] = $npm;
						$_SESSION['idkoor'] = $idkoor;
						$_SESSION['nmkoor'] = $nama;
						
						if (!$pilihan === $izin) {
						
						switch ($izin) {
							
							case 0:
							header("Location:" .$SERVER['DOCUMENT_ROOT']."/absenon/admin/index.php");
							break;
							
							case 1:
							header("Location:" .$SERVER['DOCUMENT_ROOT']."/absenon/bph/index.php");
							break;
							
							case 2:
							header("Location:" .$SERVER['DOCUMENT_ROOT']."/absenon/ketuplak/index.php");
							break;
							
							case 3:
							header("Location:" .$SERVER['DOCUMENT_ROOT']."/absenon/anggota/index.php");
							break;
							
							default:
							header("Location:" .$SERVER['DOCUMENT_ROOT']."/absenon/anggota/index.php");
							break;
							
					
						}
					}
 }else {
session_destroy(true);
session_commit();
//$_SESSION['user'] = "Pengguna";
if ($_SERVER['REQUEST_URI'] === "/absenon/login.php") {
} else {
header("Location:" .$SERVER['DOCUMENT_ROOT']."/absenon/login.php");
exit();				


}					
 }



endif;




function cek_pindah ($lihat_id_bener) {
	

if (in_array($lihat_id_bener,$_SESSION ['kegiatan_apa'])) {
	return true;
} else {
	return false;
}
}
?>
