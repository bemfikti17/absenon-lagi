<?php
 if(session_id() == '') {
    session_start();
}  //implementasi perintah PHP 5.3

require_once(__DIR__ . '/../db/conn.php');

if ($_SESSION):

//mari kita bongkar data user itu apakah dia sebagai ketuplak, kabir,ka.. dll

$sql = "SELECT id_koor,username,password,npm,izin,last_login FROM koordinator WHERE username =?";
$smd->prepare($sql);
$smd->bind_param("s",$username);
$smd->execute();
$smd->bind_result($idkoor,$usrname,$pasw,$npm,$izin,$lastlogin);


endif;


if (isset($username)) {
	$sql = "SELECT * FROM koordinator where username='$username'";
	$result = mysqli_query($conn, $sql);
	
		if($row = mysqli_fetch_assoc($result)){	
			$koor	 = $row['npm'];
		}

	$sql2 = "SELECT * FROM anggota where npm='$koor'";
	$result2 = mysqli_query($conn, $sql2);
	
		if($row2 = mysqli_fetch_assoc($result2)){	
			$nm_koor	 = $row2['nama'];
		}
}		
else {
	header('Location: ../login.php');
}

?>
