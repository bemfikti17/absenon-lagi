<script>
function dapet_data_id(json) {
	 var nama = json["nama_dia"];
	 var jabatan = json["jabatan"];
	 var kehadiran = "Pilihan saat ini : " + json["hadirkah"];
	 var keterangan = json["keterangan"];
	 var jamhadir = json["jam_hadir"];
	 var tglrapat = json["tglrapat"];
	 var idkep = json["idkep"];

     $(".modal-body #name").val(nama );
     $(".modal-body #jabatan").val(jabatan );
     $(".modal-body #kehadiran").val(kehadiran );
     $(".modal-body #jamhadir").val(jamhadir );
     $(".modal-body #tglrapat").val(tglrapat );
     $(".modal-body #keterangan").val(keterangan );
     $(".modal-body #idkep").val(idkep);

$('#myModal').modal('show');
 
}

	 function ambil_data_id(npm,id_rapat,id_keg) {
//alert("hai" + c);
jQuery.getJSON("http://localhost/absenon/ketuplak/handle_edit_absen.php?lihat_id=" + id_keg + "&npm=" + npm + "&id_rapat=" + id_rapat,
    function(json){dapet_data_id(json);
});

}
</script>

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
//SELECT kepanitiaan.npm,kepanitiaan.id_kegiatan,jabatan_panitia,nama,kegiatan.nama_kegiatan,hadir,tdk_hadir,keterangan,jam_hadir,presensi.tgl_rapat,presensi.id_rapat FROM `kepanitiaan` LEFT join presensi on presensi.id_kepanitiaan = kepanitiaan.id_kepanitiaan inner join rapat on presensi.id_rapat = rapat.id_rapat inner join kegiatan on rapat.id_kegiatan = kegiatan.id_kegiatan inner join anggota on kepanitiaan.npm = anggota.npm  WHERE kepanitiaan.id_kegiatan =4 AND presensi.id_rapat=6
$sql = "SELECT kepanitiaan.npm,kepanitiaan.id_kegiatan,jabatan_panitia,nama,kegiatan.nama_kegiatan,hadir,tdk_hadir,keterangan,jam_hadir,presensi.tgl_rapat,presensi.id_rapat FROM kepanitiaan LEFT join presensi on presensi.id_kepanitiaan = kepanitiaan.id_kepanitiaan inner join rapat on presensi.id_rapat = rapat.id_rapat inner join kegiatan on rapat.id_kegiatan = kegiatan.id_kegiatan inner join anggota on kepanitiaan.npm = anggota.npm  WHERE kepanitiaan.id_kegiatan =? AND presensi.id_rapat=? or presensi.id_rapat=?";
$smd = $conn->prepare($sql);
$smd->bind_param("sss",$_GET['lihat_id'],$_GET['id_rapat'],$_GET['id_rapat']);
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
        <td><!-- Trigger the modal with a button -->
        <td><button type="button" class="btn btn-info btn-xs edit_data" data-toggle="modal" name="edit" value="<?php echo $npm; ?>"
        id="<?php echo $npm; ?>" onclick="ambil_data_id(<?php echo $npm; ?>,
        												<?php echo $_GET['id_rapat']; ?>,
        												<?php echo $_GET['lihat_id']; ?>)">Edit</button></td>
      <!--data-target="#myModal"-->
    </tr>
<?php

    }
?> 
    
    
    	
</tbody>

</table>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">EDIT DATA</h4>
      </div>
      <div class="modal-body">
        		
      		<form method="post" action="absen_edit.php">
      		  <input type="hidden" name="id_kepanitiaan" id="idkep"  >

			  <div class="form-group">
			    <label for="name">Nama</label>
			    <input type="text" class="form-control" id="name" name="name">
			  </div>
			
			  <div class="form-group">
			        <label class="col-xs-3 control-label">Kehadiran</label>
			        <div class="col-xs-5 selectContainer">
			          <input type="text" class="form-control"  id="kehadiran" value="Pilihan saat ini :">
			          <br>
			            <select class="form-control" name="kehadiran">
			                <option value="Hadir">Hadir</option>
			                <option value="TdkHadir">Tdk Hadir</option>

			            </select>
			        </div>
			    </div>

			  <div class="form-group">
			    <label for="keterangan">Keterangan</label>
			    <input type="text" class="form-control" id="keterangan" name="keterangan">
			  </div>

			  <div class="form-group">
			    <label for="jamhadir">Jam Hadir</label>
			    <input type="text" class="form-control" id="jamhadir" name="jamhadir">
			  </div>

			  <div class="form-group">
			    <label for="tglrapat">Tanggal Rapat</label>
			    <input type="text" class="form-control" id="tglrapat" name="tglrapat" disabled>
			  </div>
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>	

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>




