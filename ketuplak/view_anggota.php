<?php 







function tampil_proker ($id_kegiatan) {
	include(__DIR__ . '/../config/db/conn.php'); //harusnya pakai construct karena ada fungsi tapi yaa gitu mager.. wkkw

$sql = "SELECT nama_kegiatan,ket_kegiatan,tgl_kegiatan FROM kegiatan  WHERE id_kegiatan =?";
$smd = $conn->prepare($sql);
$smd->bind_param("i",$id_kegiatan);
$smd->execute();
$smd->bind_result($arg,$arg2,$arg3);
while ($smd->fetch()) {
	$kegiatan=$arg;
	$ket_kegiatan = $arg2;
	$tgl_kegiatan = $arg3;
}
	return $kegiatan;
}






if ($_SESSION['level'] === 0 || $_SESSION['level'] === 1) {
                     echo '
<button class="btn btn-success" style="width:100px;">Tambah Anggota</button>';
}

if (!isset($_GET['lihat_id'])):




?>
<h3>Penambahan anggota kepanitiaan : Silahkan pilih acara anda..</h3>
  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Pilihan
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
<?php
$sql = "SELECT kegiatan FROM koordinator  WHERE username =?";
$smd = $conn->prepare($sql);
$smd->bind_param("s",$_SESSION['user'] );
$smd->execute();
$smd->bind_result($arg);
while ($smd->fetch()) {
	$kegiatan=$arg;
	
$pisah = explode(":",$kegiatan);
foreach ($pisah as $perkeg) {
	echo '<li><a href="?pages=anggota&lihat_id='.$perkeg.'">'.tampil_proker($perkeg).'</a></li>';
      
      
        
}	
}
?>      
    </ul>
  </div>
  <?php
  
else:
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
             <?php if ($_SESSION['level'] === 0 || $_SESSION['level'] === 1 || $_SESSION['level'] === 2) {
                     echo '
             <th colspan="2"><center>Action</center></th>';
                                }
                                ?>
             
           </tr>
</thead>

<tbody>
	<?php 
        //SELECT * FROM `anggota` inner join kepanitiaan on anggota.npm = kepanitiaan.npm WHERE kepanitiaan.npm=anggota.npm AND kepanitiaan.id_kegiatan !='2'
        //SELECT * FROM anggota LEFT JOIN kepanitiaan on anggota.npm = kepanitiaan.npm WHERE kepanitiaan.npm IS NULL 
        //SELECT * FROM anggota LEFT JOIN kepanitiaan on anggota.npm = kepanitiaan.npm WHERE kepanitiaan.npm IS NULL OR kepanitiaan.id_kegiatan != '1'
		require_once '../config/db/conn.php';
                if (is_numeric($_GET['lihat_id'])) :
		$sql_query="SELECT * FROM anggota LEFT JOIN kepanitiaan on anggota.npm = kepanitiaan.npm WHERE kepanitiaan.npm IS NULL OR kepanitiaan.id_kegiatan !='".$_GET['lihat_id']."'";
                $lihatnya = htmlentities($_GET['lihat_id']);
                else:
                $sql_query="SELECT * FROM anggota";
                endif;
		 $result_set=mysqli_query($conn, $sql_query);
		 if (mysqli_num_rows($result_set) > 0) {
    
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
        <?php if ($_SESSION['level'] === 0 || $_SESSION['level'] === 1) {
                     echo '
        <td><button class="btn btn-info" style="width:100px;">Edit</button></td>
        <td><button class="btn btn-danger" style="width:100px;">Delete</button></td>';
                        } elseif ($_SESSION['level'] === 2) {
                    echo '<td><a href="?pages=tambah_panitia&lihat_id='.$lihatnya.'&npm='.$data['npm'].'"><button class="btn btn-success" style="width:150px;">Tambah</button></a></td>';
                        }
        ?>
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
endif;

Loncat:

?>
