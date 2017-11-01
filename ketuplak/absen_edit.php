<?php
var_dump($_POST);


require_once "../config/db/conn.php";
$sql ="UPDATE presensi SET hadir=?,tdk_hadir=?,keterangan=?,jam_hadir=? WHERE id_kepanitiaan = ?";
$smd = $conn->prepare($sql);


if ($_POST['kehadiran'] === 'Hadir') :
	$hadir = 1;
	$tdkhadir = 0;
else :
	$tdkhadir = 1;
	$hadir = 0;
endif;
$smd->bind_param("iisss",$hadir,$tdkhadir,$_POST['keterangan'],$_POST['jamhadir'],$_POST['id_kepanitiaan']);
echo $smd->execute();
echo  "<script>
        var timer = setTimeout(function() {
         window.history.back();
        }, 1000);
    </script>";
?>