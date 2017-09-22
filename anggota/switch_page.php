<?php
if (empty($_GET['pages'])){
		include 'view_home.php';

} else {
switch ($_GET['pages']) {
	case 'absenku':
		include 'view_kinerja.php';
		break;
	
	default:
		header('location: /404.html');
		break;
}

}

?>
