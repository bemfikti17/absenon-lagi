<?php
if (empty($_GET['pages'])){

} else {
switch ($_GET['pages']) {
	case 'anggota':
		include  __DIR__ . '/../pages/view_anggota.php';
		break;

	case 'kegiatan':
		include __DIR__ .  '/../pages/view_kegiatan.php';
		break;
	
	default:
		header('location: /404.html');
		break;
}

}

?>
