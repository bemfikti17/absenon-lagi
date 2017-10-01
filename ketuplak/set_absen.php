<?php

if ($_POST):
if (isset($_GET['lihat_id'])):
//ambil jumlah rapat keberapa..


//INSERT INTO `rapat`(`id_rapat`, `rapat_ke`, `bahasan`, `tgl`, `timestamp_selesai`, `id_kegiatan`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])
$sql = "INSERT INTO rapat (rapat_ke,bahasan,tgl,timestamp_selesai,id_kegiatan) VALUES (?,?,?,?,?)";
$smd = $conn->prepare($sql);
$smd->bind_param("sssss",$_POST['rpt'],$_POST['bahas'],$_POST['tgl'],$_POST['timestampd'],$_GET['lihat_id']);
if ($smd->execute()) {
  //memindahkan kepanitiaan sesuai kegiatan ke presensi
    $lihat_id = $_GET['lihat_id'];
    $sql = "INSERT INTO presensi (id_kepanitiaan) select id_kepanitiaan from kepanitiaan where kepanitiaan.id_kegiatan = $lihat_id";
    if($conn->query($sql) == TRUE){
      //memberikan kode_kegiatan kepada panitia baru yg memiliki id_kegiatan null
      $sql = "SELECT max(id_rapat) as max_idrpt FROM rapat where id_kegiatan = $lihat_id";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $max_idrpt = $row['max_idrpt'];
      $sql = "UPDATE presensi set id_rapat= ? where id_rapat is null";
      $smd = $conn->prepare($sql);
      $smd->bind_param("s",$max_idrpt);
      //cek apakah smd execute? 
        if($smd->execute()){
        } else {echo "error 1";}

    }else{echo " error 2";}
	echo '<div class="alert alert-success">
	<strong>Berhasil tersimpan! </strong> Semoga anggota anda tidak telat absen :)
	</div>';
}



endif;
endif;
if (isset($_GET['lihat_id'])){
  $idkeg =$_GET['lihat_id'];
  $sql_rpt = "SELECT max(rapat_ke) as rapatke from rapat where id_kegiatan=$idkeg";
  $result_rpt = mysqli_query($conn, $sql_rpt);
  $row_rpt = mysqli_fetch_assoc($result_rpt);
  if (!$row_rpt){
    $rapatke = 1;
  } else {
  $rapatke = $row_rpt['rapatke'] +1;
}
}
?>

<div class="jumbotron">
  <h2 class="display-3">Buat presensi rapat baru..</h2>
  <p class="lead">Silahkan isi presensi rapat berikut ini, pastikan anda tidak salah input!</p>
  <hr class="my-4">
  <form method="post" action="">
  <div class ="form-group">
	<label for "rpt">Rapat ke :
		<input type="text" class="form-control" id="rpt" name="rpt" value="<?php echo $rapatke;?>" readonly>
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
