<?php
require_once "../config/db/conn.php";
$sql = "SELECT kepanitiaan.npm,kepanitiaan.id_kegiatan,jabatan_panitia,nama,kegiatan.nama_kegiatan,hadir,tdk_hadir,keterangan,jam_hadir,presensi.tgl_rapat,presensi.id_rapat,kepanitiaan.id_kepanitiaan FROM kepanitiaan LEFT join presensi on presensi.id_kepanitiaan = kepanitiaan.id_kepanitiaan inner join rapat on presensi.id_rapat = rapat.id_rapat inner join kegiatan on rapat.id_kegiatan = kegiatan.id_kegiatan inner join anggota on kepanitiaan.npm = anggota.npm WHERE kepanitiaan.id_kegiatan =? AND presensi.id_rapat=? AND kepanitiaan.npm = ? ";
$smd = $conn->prepare($sql);
$smd->bind_param("sss",$_GET['lihat_id'],$_GET['id_rapat'],$_GET['npm']);
$smd->execute();
$smd->bind_result($arg1,$arg2,$arg3,$arg4,$arg5,$arg6,$arg7,$arg8,$arg9,$arg10,$arg11,$arg12);
while ($smd->fetch()) {
	$npm=$arg1;	
	$id_kegiatan=$arg2;	
	$jabatan=$arg3;	
	$nama_dia = $arg4;
	$nama_kegiatan = $arg5;
	$hadirkah = $arg6;
	$tdkhadir = $arg7;
	$keterangan = $arg8;
	$jam_hadir = $arg9;
	$tglrapat = $arg10;
	$idkep = $arg12;
	}
	if ($hadirkah === 1) : 
		$hadirkah ="Hadir"; else:
		$hadirkah ="Tdk Hadir";
	endif;
	$json_kips = array("npm" => $npm,"id_kegiatan" => $id_kegiatan,"jabatan"=>$jabatan,"nama_dia"=>$nama_dia,"nama_kegiatan"=>$nama_kegiatan,"hadirkah"=>$hadirkah,"tdkhadir"=>$tdkhadir,"keterangan"=>$keterangan,"jam_hadir"=>$jam_hadir,"tgl_rapat"=>$tglrapat,"idkep"=>$idkep);
	echo json_encode($json_kips);
	?>