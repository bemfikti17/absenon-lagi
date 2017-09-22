<table class="table" style="margin-top:10px;">

<thead>
           <tr>

             <th>NPM</th>
             <th>Nama</th>	
             <th>Kelas</th>
             <th>Jurusan</th>
             <th>Jenis Kelamin</th>
             <th>Tanggal Lahir</th>
             <th>Domisili</th>
             <th>Jabatan</th>
             <th colspan="2"><center>Action</center></th>
             
           </tr>
</thead>

<tbody>
<?php
//digunakan untuk bantu absen yang hpnya rusak dan ngeliat aja siapa aja yang udah absen pada sesi itu..
//jika jam < dari timestamp maka tampilkan absen jika tidak maka echo 'TIDAK ADA PRESENSI YANG AKTIF';
//<a class="btn btn-primary btn-lg" href="?pages=cek_absen&lihat_id='.$masing2.'&tanggal='.$tgl_kegiatan.'&rapat_ke='.$rapatke.'" role="button">Cek Kuy >></a>
//SELECT kepanitiaan.npm,kepanitiaan.id_kegiatan,jabatan_panitia,nama,kegiatan.nama_kegiatan,hadir,tdk_hadir,keterangan,jam_hadir,tgl_rapat FROM kepanitiaan INNER JOIN kegiatan on kepanitiaan.id_kegiatan = kegiatan.id_kegiatan INNER JOIN anggota on kepanitiaan.npm = anggota.npm INNER JOIN presensi on presensi.id_kepanitiaan = kepanitiaan.id_kepanitiaan WHERE kepanitiaan.id_kegiatan ='1' AND tgl_rapat='29-09-2017'
$sql = "SELECT kepanitiaan.npm,kepanitiaan.id_kegiatan,jabatan_panitia,nama,kegiatan.nama_kegiatan,hadir,tdk_hadir,keterangan,jam_hadir,tgl_rapat FROM kepanitiaan INNER JOIN kegiatan on kepanitiaan.id_kegiatan = kegiatan.id_kegiatan INNER JOIN anggota on kepanitiaan.npm = anggota.npm INNER JOIN presensi on presensi.id_kepanitiaan = kepanitiaan.id_kepanitiaan WHERE kepanitiaan.id_kegiatan =? AND tgl_rapat=?";
$smd = $conn->prepare($sql);
$smd->bind_param("ss",$_GET['lihat_id'],$_GET['tanggal']);
$smd->execute();
$smd->bind_result($arg1,$arg2,$arg3,$arg4,$arg5,$arg6,$arg7,$arg8,$arg9,$arg10);
while ($smd->fetch()) {
	$npm=$arg1;	
	$id_kegiatan=$arg2;	
	$jabatan=$arg3;	
	$nama_dia = $arg4;
	
	?>
   <tr>
        <td><button class="btn btn-info" style="width:100px;">Edit</button></td>
        <td><button class="btn btn-danger" style="width:100px;">Delete</button></td>
    </tr>
<?php

    }
?> 
    
    <?php
    	}
    } else {
    	?><td><?php echo "Result 0"; ?></td><?php
	}
    ?>
</tbody>

</table>



