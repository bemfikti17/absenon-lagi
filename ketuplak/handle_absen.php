<?php
if ($_POST):
if (isset($_POST['data_absen'])):
$dapet = base64_decode($_POST['data_absen']);
$dari_json = json_decode($dapet,true);
//$jadikan = array("status"=>"200","user"=>$username,"nama"=>$nama,"npm"=>$npm,"acak"=>$acaklah);
$sql = "SELECT username,nama,anggota.npm FROM koordinator INNER JOIN anggota ON koordinator.npm = anggota.npm  WHERE username =?";
$smd = $conn->prepare($sql);
$smd->bind_param("s",$dari_json['user']);
$smd->execute();
$smd->bind_result($arg1,$arg2,$arg3);
while ($smd->fetch()) {
	$username=$arg1;
	$nama = $arg2;
	$npm = $arg3;
	
	
}

if ($dari_json['npm'] === $npm):
//konfirmasi berhasil masukkan ke tabel presensi..
$sql ="INSERT INTO `presensi`(`id_presensi`, `id_rapat`, `id_kepanitiaan`, `hadir`, `tdk_hadir`, `keterangan`, `jam_hadir`, `tgl_rapat`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8])";
$feedback = array("status"=>"200","pesan"=>"Berhasil terabsen pada pukul .." . date("H:i:s"));
$feedback = json_encode($feedback);
echo $feedback;

else:
$feedback = array("status"=>"400","pesan"=>"Error validation failed!");
$feedback = json_encode($feedback);
echo $feedback;


endif;

else:
$feedback = array("status"=>"400","pesan"=>"Error input not found");
$feedback = json_encode($feedback);
echo $feedback;

endif;
else:
$feedback = array("status"=>"400","pesan"=>"Error input not found");
$feedback = json_encode($feedback);
echo $feedback;

endif;



?>
