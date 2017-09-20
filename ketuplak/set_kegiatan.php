<?php

// BELOM KONEK AMA KOORDINATORNYA !!!!
if ($_POST):

$sql = "INSERT INTO kegiatan (nama_kegiatan,ket_kegiatan,tgl_kegiatan) VALUES (?,?,?)";
$smd = $conn->prepare($sql);
$smd->bind_param("sss",$_POST['kgt'],$_POST['ket'],$_POST['tgl']);
if ($smd->execute()) {
	echo '<div class="alert alert-success">
	<strong>Berhasil tersimpan! </strong> Semoga kegiatannya berjalan lancar :)
	</div>';
}

endif;
?>
<div class="jumbotron">
  <h2 class="display-3">Tambah kegiatan baru...</h2>
  <p class="lead">Silahkan isi detail kegiatan dengan benar!</p>
  <hr class="my-4">
  <form method="post" action="">

  <div class ="form-group" hidden >
	<label for "id_kgt">ID
		<input type="text" class="form-control" id="id_kgt" name="id_kgt" value="">
	</label>
  </div>

  <div class ="form-group">
	<label for "kgt">Nama Kegiatan :
		<input type="text" class="form-control" id="kgt" name="kgt">
	</label>
  </div>
  
  <div class="form-group">
 <label for "ket">Keterangan : (Silahkan deskripsikan kegiatan anda)
		<textarea  class="form-control" id="ket" name="ket" rows="5"></textarea>
	</label>
  </div>
  
  <div class="form-group">
  <label for "tgl">Tanggal Pelaksanaan :
		<input type="text" class="form-control" id="tgl" name="tgl" value="<?php echo date("d-m-Y"); ?>">
	</label>
  </div>
  
  <p class="lead">
   <button class="btn btn-primary" input="submit">Tambahkan Kegiatan ini!</button>
  </p>
  </form>
</div>