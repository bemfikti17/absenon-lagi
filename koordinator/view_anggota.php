<button class="btn btn-success" style="width:100px;">Insert</button>
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
