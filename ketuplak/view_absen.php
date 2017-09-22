
<h3 >Catatan Presensi Absen Rapat</h3>

<?php 
if (isset($_GET['lihat_id'])):
if (cek_pindah($_GET['lihat_id'])):

?>

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
		require_once '../config/db/conn.php';
		$sql_query="SELECT * FROM anggota";
		 $result_set=mysqli_query($conn, $sql_query);
		 if (mysqli_num_rows($result_set) > 0) {
    // output data of each row
    while($data = mysqli_fetch_assoc($result_set)) {
	?>
    <tr>
        <td><?php echo $data['npm']; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $data['kelas']; ?></td>
        <td><?php echo $data['jurusan']; ?></td>
        <td><?php echo $data['jenis_kelamin']; ?></td>
        <td><?php echo $data['ttl']; ?></td>
        <td><?php echo $data['domisili']; ?></td>
        <td><?php echo $data['kepengurusan']; ?></td>
        <td><button class="btn btn-info" style="width:100px;">Edit</button></td>
        <td><button class="btn btn-danger" style="width:100px;">Delete</button></td>
    </tr>
    <?php
    	}
    } else {
    	?><td><?php echo "Result 0"; ?></td><?php
	}
    ?>
</tbody>

</table>

<?php
else:
echo 'Anda lagi iseng ngubah2 nih hehe~';
endif;
else:
?>
<h4>Sedang Berlangsung :</h4>

<?php
//cek absen yang udah maupun yang sedang berjalan..
foreach ($_SESSION['kegiatan_apa'] as $masing2) {
	
$sql = "SELECT rapat_ke,bahasan,tgl,timestamp_selesai,nama_kegiatan FROM rapat INNER JOIN kegiatan ON rapat.id_kegiatan = kegiatan.id_kegiatan WHERE rapat.id_kegiatan =?";
$smd = $conn->prepare($sql);
$smd->bind_param("i",$masing2);
$smd->execute();
$smd->bind_result($arg,$arg2,$arg3,$arg4,$arg5);
while ($smd->fetch()) {
	$kegiatan=$arg5;
	$ket_kegiatan = $arg2;
	$tgl_kegiatan = $arg3;
	$batas = $arg4;
	$rapatke = $arg;
	
	$var = $tgl_kegiatan ." " . $batas;
	$amb = date("Y-m-d H:i:s", strtotime($var) );
	
	if (new DateTime() < new DateTime($amb)) {
		
	   
		

	
	echo '<div class="jumbotron">
  <h1 class="display-3">'.$kegiatan. '</h1>
  <p class="lead">'.$ket_kegiatan.'</p>
  <hr class="my-4">
  <p>Rapat yang ke-'.$rapatke.'</p>
  <p>Tanggal Rapat : '.$tgl_kegiatan.'</p>
  <p>Peserta yang hadir : </p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="?pages=cek_absen&lihat_id='.$masing2.'&tanggal='.$tgl_kegiatan.'&rapat_ke='.$rapatke.'" role="button">Cek Kuy >></a>
  </p>
</div>';
	} //jika masih berjalan..
		
}

}
?>

<h4>Yang sudah berjalan :</h4>


<?php
//cek absen yang udah maupun yang sedang berjalan..
foreach ($_SESSION['kegiatan_apa'] as $masing2) {
	
$sql = "SELECT rapat_ke,bahasan,tgl,timestamp_selesai,nama_kegiatan FROM rapat INNER JOIN kegiatan ON rapat.id_kegiatan = kegiatan.id_kegiatan WHERE rapat.id_kegiatan =?";
$smd = $conn->prepare($sql);
$smd->bind_param("i",$masing2);
$smd->execute();
$smd->bind_result($arg,$arg2,$arg3,$arg4,$arg5);
while ($smd->fetch()) {
	$kegiatan=$arg5;
	$ket_kegiatan = $arg2;
	$tgl_kegiatan = $arg3;
	$batas = $arg4;
	$rapatke = $arg;
	
	$var = $tgl_kegiatan ." " . $batas;
	$amb = date("Y-m-d H:i:s", strtotime($var) );
	
	if (new DateTime() > new DateTime($amb)) {
		
	   
		

	
	echo '<div class="jumbotron">
  <h1 class="display-3">'.$kegiatan. '</h1>
  <p class="lead">'.$ket_kegiatan.'</p>
  <hr class="my-4">
  <p>Rapat yang ke-'.$rapatke.'</p>
  <p>Tanggal Pelaksanaan : '.$tgl_kegiatan.'</p>
  <p>Peserta yang hadir : </p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="?pages=atur_absen&lihat_id='.$masing2.'" role="button">Cek Kuy >></a>
  </p>
</div>';
	} //jika masih berjalan..
		
}

}

	


endif;


?>

