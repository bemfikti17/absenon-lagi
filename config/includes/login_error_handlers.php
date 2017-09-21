<?php
if (empty($_GET['login'])) {
	
} else {

switch ($_GET['login']) {
	case 'pass_error':
		echo "Password anda salah!";
		break;

	case 'user_error':
		echo "User tidak ditemukan!";
		break;
	
	default:
		echo "Login Error! Silahkan coba lagi.";
		break;
}
}
 
?>