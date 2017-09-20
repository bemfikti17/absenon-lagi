<?php
$sql = "SELECT nama_kegiatan FROM kegiatan WHERE id_kegiatan =? ";
$smd = $conn->prepare($sql);
$smd->bind_param("s",$_GET['lihat_id']);
$smd->execute();
$smd->bind_result($arg1);
while ($smd->fetch()) {
	$namakeg = $arg1;	
}
?>

<h3>Acara : <?php echo $namakeg; ?></h3>
<table class="table" style="margin-top:10px;">

<thead>
           <tr>

             <th>NPM</th>
             <th>Nama</th>	
             <th>Jabatan</th>
             <th>Kehadiran</th>
             <th>Keterangan</th>
             <th>Jam Hadir</th>
             <th>Tanggal Rapat</th>
             <th colspan="1"><center>Action</center></th>
             
           </tr>
</thead>

<tbody>
<?php
//digunakan untuk bantu absen yang hpnya rusak dan ngeliat aja siapa aja yang udah absen pada sesi itu..
//jika jam < dari timestamp maka tampilkan absen jika tidak maka echo 'TIDAK ADA PRESENSI YANG AKTIF';
//<a class="btn btn-primary btn-lg" href="?pages=cek_absen&lihat_id='.$masing2.'&tanggal='.$tgl_kegiatan.'&rapat_ke='.$rapatke.'" role="button">Cek Kuy >></a>
//SELECT kepanitiaan.npm,kepanitiaan.id_kegiatan,jabatan_panitia,nama,kegiatan.nama_kegiatan,hadir,tdk_hadir,keterangan,jam_hadir,tgl_rapat FROM kepanitiaan INNER JOIN kegiatan on kepanitiaan.id_kegiatan = kegiatan.id_kegiatan INNER JOIN anggota on kepanitiaan.npm = anggota.npm INNER JOIN presensi on presensi.id_kepanitiaan = kepanitiaan.id_kepanitiaan WHERE kepanitiaan.id_kegiatan ='1' AND tgl_rapat='29-09-2017'
//UPDET
//SELECT kepanitiaan.npm,kepanitiaan.id_kegiatan,jabatan_panitia,nama,kegiatan.nama_kegiatan,hadir,tdk_hadir,keterangan,jam_hadir,tgl_rapat,presensi.id_rapat FROM kepanitiaan INNER JOIN kegiatan on kepanitiaan.id_kegiatan = kegiatan.id_kegiatan INNER JOIN anggota on kepanitiaan.npm = anggota.npm INNER JOIN presensi on presensi.id_kepanitiaan = kepanitiaan.id_kepanitiaan INNER JOIN rapat on presensi.id_rapat = rapat.id_rapat WHERE kepanitiaan.id_kegiatan ='1' AND presensi.id_rapat='1' 
//SELECT kepanitiaan.npm,kepanitiaan.id_kegiatan,jabatan_panitia,nama,kegiatan.nama_kegiatan,hadir,tdk_hadir,keterangan,jam_hadir,tgl_rapat,presensi.id_rapat FROM `kepanitiaan` LEFT JOIN `anggota` ON `kepanitiaan`.`npm` = `anggota`.`npm` LEFT JOIN `kegiatan` ON `kepanitiaan`.`id_kegiatan` = `kegiatan`.`id_kegiatan` LEFT JOIN `rapat` ON `rapat`.`id_kegiatan` = `kegiatan`.`id_kegiatan` LEFT JOIN `presensi` ON `presensi`.`id_rapat` = `rapat`.`id_rapat` WHERE kepanitiaan.id_kegiatan ='1' AND presensi.id_rapat='1'
$sql = "SELECT kepanitiaan.npm,kepanitiaan.id_kegiatan,jabatan_panitia,nama,kegiatan.nama_kegiatan,hadir,tdk_hadir,keterangan,jam_hadir,presensi.tgl_rapat,presensi.id_rapat FROM `kepanitiaan` LEFT JOIN `anggota` ON `kepanitiaan`.`npm` = `anggota`.`npm` LEFT JOIN `kegiatan` ON `kepanitiaan`.`id_kegiatan` = `kegiatan`.`id_kegiatan` LEFT JOIN `rapat` ON `rapat`.`id_kegiatan` = `kegiatan`.`id_kegiatan` LEFT JOIN `presensi` ON `presensi`.`id_rapat` = `rapat`.`id_rapat` WHERE kepanitiaan.id_kegiatan =? AND presensi.id_rapat=?";
$smd = $conn->prepare($sql);
$smd->bind_param("ss",$_GET['lihat_id'],$_GET['id_rapat']);
$smd->execute();
$smd->bind_result($arg1,$arg2,$arg3,$arg4,$arg5,$arg6,$arg7,$arg8,$arg9,$arg10,$arg11);
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
	
	?>
   <tr>
		<td><?php echo $npm; ?></td>
		<td><?php echo $nama_dia; ?></td>
		<td><?php echo $jabatan; ?></td>
		<td><?php if ($hadirkah === 1) { echo '<i class="fa fa-thumbs-o-up"></i>'; } elseif ($tdkhadir === 1) { echo '<i class="fa fa-thumbs-o-down"></i>'; } else { echo '<i class="fa fa-hourglass-o"></i>';}?></td>
		<td><?php if ($hadirkah === 1) { echo '-'; } else { echo $keterangan; } ?></td>
		<td><?php if ($hadirkah === 1) { echo $jam_hadir; } else { echo '-'; } ?></td>
		<td><?php if ($hadirkah === 1) { echo $tglrapat; } else { echo '-'; } ?></td>
        <td><button class="btn btn-info" style="width:100px;">Edit</button></td>
      
    </tr>
<?php

    }
?> 
    
    
    	
</tbody>

</table>



