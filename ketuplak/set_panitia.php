<?php
if ($_POST):
//masukkan..
$sql = "INSERT INTO kepanitiaan ( npm, id_kegiatan, jabatan_panitia) VALUES (?,?,?)";
if (!is_numeric($_GET['lihat_id'])) :  die("inputan yang aneh *_*"); endif;
$smd = $conn->prepare($sql);
$smd->bind_param("sss",$_GET['npm'],$_GET['lihat_id'],$_POST['divisi']);
if ($smd->execute()) {
	echo '<div class="alert alert-success">
	<strong>Berhasil tersimpan! </strong> Semangat! :)
	</div>';
} else {
	echo '<div class="alert alert-danger">
	<strong>Galat tersimpan! </strong> Sesuatu telah terjadi! '.$smd->errorInfo.'
	</div>';
}
goto Lompat;

endif;


if (!is_numeric($_GET['lihat_id'])) :  die("inputan yang aneh *_*"); endif;
//alhamdulillah udah sampai sini :")
$sql = "SELECT npm,nama FROM anggota WHERE anggota.npm =?";
$smd = $conn->prepare($sql);
$smd->bind_param("i",$_GET['npm']);
$smd->execute();
$smd->bind_result($arg,$arg2);
while ($smd->fetch()) {
	$npmnya=$arg;
	$namadia = $arg2;
	
}


?>
<div class="jumbotron">
  <h3 class="display-6">Tambah Anggota Kepanitiaan Anda</h3>
  <p class="lead">Anggota anda mau jadi divisi apa?</p>
  <hr class="my-4">
  <form method="post" action="">
  <div class ="form-group">
	<label for "rpt">NPM :
		<input type="text" class="form-control" id="rpt" name="npm" disabled value="<?php echo $npmnya;?>">
	</label>
  </div>
  
  <div class="form-group">
 <label for "bahas">Nama :
		<input type="text" class="form-control" id="bahas" name="nama" disabled value="<?php echo $namadia;?>"> 
	</label>
  </div>
  
  <div class="form-group">
 <label for "bahas">Divisi Kepanitiaan :
		<input type="text" class="form-control" id="bahas" name="divisi" placeholder="misal: koor keamanan..">
	</label>
  </div>
  
  
  <p class="lead">
   <button class="btn btn-primary" input="submit">Simpan!</button>
  </p>
  </form>
</div>

<?php

Lompat:
?>
