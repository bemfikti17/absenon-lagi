<?php
if (empty($_GET['pages'])){
		include 'view_home.php';

} else {
switch ($_GET['pages']) {
	case 'anggota':
		include 'view_anggota.php';
		break;
		
	case 'tambah_panitia':
		include   'set_panitia.php';
		break;

	case 'kegiatan':
		include   'set_kegiatan.php';
		break;
		
	case 'panitia':
		include   'view_panitia.php';
		break;
			
	case 'atur_absen':
		include   'set_absen.php';
		break;
		
	case 'absen':
		include   'view_absen.php';
		break;	
		
	case 'cek_absen':
		include   'check_absen.php';
		break;		
	
	default:
		header('location: /404.html');
		break;
}

}

?>
