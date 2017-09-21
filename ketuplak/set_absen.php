<?php

if ($_POST):
if (isset($_GET['lihat_id'])):

//INSERT INTO `rapat`(`id_rapat`, `rapat_ke`, `bahasan`, `tgl`, `timestamp_selesai`, `id_kegiatan`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])
$sql = "INSERT INTO rapat (rapat_ke,bahasan,tgl,timestamp_selesai,id_kegiatan) VALUES (?,?,?,?,?)";
$smd = $conn->prepare($sql);
$smd->bind_param("sssss",$_POST['rpt'],$_POST['bahas'],$_POST['tgl'],$_POST['timestampd'],$_GET['lihat_id']);
if ($smd->execute()) {
	echo '<div class="alert alert-success">
	<strong>Berhasil tersimpan! </strong> Semoga anggota anda tidak telat absen :)
	</div>';
}



endif;
endif;
?>

<div class="jumbotron">
  <h2 class="display-3">Buat presensi rapat baru..</h2>
  <p class="lead">Silahkan isi presensi rapat berikut ini, pastikan anda tidak salah input!</p>
  <hr class="my-4">
  <form method="post" action="">
  <div class ="form-group">
	<label for "rpt">Rapat ke :
		<input type="text" class="form-control" id="rpt" name="rpt">
	</label>
  </div>
  
  <div class="form-group">
 <label for "bahas">Bahasan : {silahkan tulis deskripsi singkat rapat anda}
		<textarea  class="form-control" id="bahas" name="bahas" rows="5"></textarea>
	</label>
  </div>
  
  <div class="form-group">
  <label for "tgl">Tanggal :
		<input type="text" class="form-control" id="tgl" name="tgl" value="<?php echo date("d-m-Y"); ?>">
	</label>
  </div>
  
  <div class="form-group">
  <label for "timestampd">Presensi Rapat ditutup pada : {gunakan format JAM:MENIT:DETIK}
		<input type="text" class="form-control" id="timestampd" name="timestampd" value="<?php echo date("H:i:s"); ?>">
	</label>
  </div>
  
  <p class="lead">
   <button class="btn btn-primary" input="submit">Yuk Rapat!</button>
  </p>
  </form>
</div>
