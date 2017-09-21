<?php
if (empty($_GET['pages'])){
		include 'view_home.php';

} else {
switch ($_GET['pages']) {
	case 'anggota':
		include 'view_anggota.php';
		break;

	case 'kegiatan':
		include   'view_kegiatan.php';
		break;
	
	default:
		header('location: /404.html');
		break;
}

}

?>
