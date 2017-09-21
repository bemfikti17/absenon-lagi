
<?php

session_start();

if (isset($_POST['submit'])) {
	include '../../config/conn.php';

	$uid = mysqli_real_escape_string($conn, $_POST['username']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pass']);

	//error handlers
	//check if input are empty
	if (empty($uid) || empty($pwd)) {
		header("Location:" .$SERVER['DOCUMENT_ROOT']."/absenon/login.php?login=empty");
			exit();
	} else {
		$sql = "SELECT * FROM koordinator WHERE username='$uid'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
		header("Location:" .$SERVER['DOCUMENT_ROOT']."/absenon/login.php?login=user_error");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				//De-Hashing the password!
				$hashedPwdCheck = password_verify($pwd, $row['password']);
				if ($hashedPwdCheck == false) {
					header("Location:" .$SERVER['DOCUMENT_ROOT']."/absenon/login.php?login=pass_error");
					exit();
				} elseif ($hashedPwdCheck == true) {
					//log in the user here
					$_SESSION['user'] = $row[username];
					header('location: ../pages/index.php');
				}
			}
		}
	}
} else {
	header("Location: ../login.php?login=error");
	exit();
}


?>
