<?php
$_SESSION['kegiatan_apa'] = array(); //ini buat cek misal dia kegiatan 1,2,3 tapi kalau lihat_id iseng diganti jadi 4 maka nggak bisa hehe..,
//variabel ini bersifat global

$sql = "SELECT kegiatan FROM koordinator  WHERE username =?";
$smd = $conn->prepare($sql);
$smd->bind_param("s",$_SESSION['user'] );
$smd->execute();
$smd->bind_result($arg);
while ($smd->fetch()) {
	$kegiatan=$arg;
	
	
}

$pisah = explode(":",$kegiatan);
foreach ($pisah as $perkeg) {
	tampil_proker($perkeg);
	array_push($_SESSION['kegiatan_apa'],$perkeg);
}


function tampil_proker ($id_kegiatan) {
	include(__DIR__ . '/../config/db/conn.php'); //harusnya pakai construct karena ada fungsi tapi yaa gitu mager.. wkkw

$sql = "SELECT nama_kegiatan,ket_kegiatan,tgl_kegiatan FROM kegiatan  WHERE id_kegiatan =?";
$smd = $conn->prepare($sql);
$smd->bind_param("i",$id_kegiatan);
$smd->execute();
$smd->bind_result($arg,$arg2,$arg3);
while ($smd->fetch()) {
	$kegiatan=$arg;
	$ket_kegiatan = $arg2;
	$tgl_kegiatan = $arg3;
}
	echo '<div class="jumbotron">
  <h1 class="display-3">'.$kegiatan. '</h1>
  <p class="lead">'.$ket_kegiatan.'</p>
  <hr class="my-4">
  <p>Tanggal Pelaksanaan : '.$tgl_kegiatan.'</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="?pages=atur_absen&lihat_id='.$id_kegiatan.'" role="button">Absensi Kuy >></a>
  </p>
</div>';
}
?>
