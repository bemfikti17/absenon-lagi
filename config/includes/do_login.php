
<?php
require_once(__DIR__ . '/../db/conn.php');
session_start();

if (isset($_POST['submit'])) {
	

	$uid =  $_POST['username'];
	$pwd = $_POST['pass'];

	//error handlers
	//check if input are empty
	if (empty($uid) || empty($pwd)) {
		header("Location:" .$SERVER['DOCUMENT_ROOT']."/absenon/login.php?login=empty");
			exit();
	} else {
		
		$sql = "SELECT id_koor,username,password,npm,izin,last_login FROM koordinator WHERE username=?";
		$smd = $conn->prepare($sql);
		$smd->bind_param("s",$uid);
		$smd->execute();
		$smd->bind_result($arg1,$arg2,$arg3,$arg4,$arg5,$arg6);
		$resultCheck = 0;
		while ($smd->fetch()) {
			$idkoor = $arg1;
			$usrname = $arg2;
			$passw = $arg3;
			$npm = $arg4;
			$izin = $arg5;
			$last_login =$arg6;
			$resultCheck +=1;
		}
		if ($resultCheck < 1) {
		header("Location:" .$SERVER['DOCUMENT_ROOT']."/absenon/login.php?login=user_error");
			exit();
		} else {
		
					$hashedPwdCheck = password_verify($pwd, $passw);
					if ($hashedPwdCheck === false) {
						header("Location:" .$SERVER['DOCUMENT_ROOT']."/absenon/login.php?login=pass_error");
						exit();
					} elseif ($hashedPwdCheck === true) {
						
						//mari kita cek di id_koornya ada nggak? kalau dia sebagai ketuplak level < 3 maka 
						//ngecek dia masuk anggota mana aja.
						//ambil datanya dari 
						
						$_SESSION['user'] = $usrname;
						$_SESSION['level'] = $izin;
						
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
			
				}
	}
} else {
	header("Location:" .$SERVER['DOCUMENT_ROOT']."/absenon/login.php?login=error");
	exit();
}


?>
