<ul class="nav nav-tabs" style="margin-bottom: 20px;">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#home">Kegiatan</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#menu1">Rapat</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#menu2">Panitia</a>
  </li>
</ul>

<div class="tab-content">
  
  <!-- TAB KEGIATAN -->

  <div id="home" class="tab-pane active">
    
    <button class="btn btn-success" style="width:100px;">Insert</button>
    <table class="table" style="margin-top:10px;">

    <thead>
               <tr>

                 <th>No.</th>
                 <th>Nama Kegiatan</th>  
                 <th>Nama Koordinator</th>
                 <th>NPM Koordinator</th>
                 <th>Action</th>
                 
               </tr>
    </thead>

    <tbody>
        <?php 
            require_once '../config/db/conn.php';
            $sql_kegiatan="SELECT * FROM kegiatan inner join koordinator on kegiatan.id_koor = koordinator.id_koor
            inner join anggota on koordinator.npm = anggota.npm";
             $result_kegiatan=mysqli_query($conn, $sql_kegiatan);
             if (mysqli_num_rows($result_kegiatan) > 0) {
        // output data of each row
        while($data_kegiatan = mysqli_fetch_assoc($result_kegiatan)) {
        ?>
        <tr>
            <td><?php echo $data_kegiatan['id_koor']; ?></td>
            <td><?php echo $data_kegiatan['nama_kegiatan']; ?></td>
            <td><?php echo $data_kegiatan['nama']; ?></td>
            <td><?php echo $data_kegiatan['npm']; ?></td>
            <td><button class="btn btn-info" style="width:100px;">Edit</button>
            <button class="btn btn-danger" style="width:100px;">Delete</button></td>
        </tr>
        <?php
            }
        } else {
            ?><td><?php echo "Result 0"; ?></td><?php
        }
        ?>
    </tbody>

    </table>

</div>
  
  <!--  TAB RAPAT  -->

  <div id="menu1" class="tab-pane">
    
    <button class="btn btn-success" style="width:100px;">Insert</button>
    <table class="table" style="margin-top:10px;">

    <thead>
               <tr>
                 <th>Nama Kegiatan</th>
                 <!-- <th>Rapat Ke</th> -->
                 <th>Pembahasan</th>  
                 <th>Tanggal Rapat</th>
                 <th>Action</th>
               </tr>
    </thead>

    <tbody>
        <?php 
            require_once '../config/db/conn.php';
            $pp = 0;
            $sql_rapat="SELECT * FROM rapat inner join kegiatan on rapat.id_kegiatan = kegiatan.id_kegiatan";
             $result_rapat=mysqli_query($conn, $sql_rapat);
             if (mysqli_num_rows($result_kegiatan) > 0) {
        // output data of each row
        while($data_rapat = mysqli_fetch_assoc($result_rapat)) {
        ?>
        <tr>
            <td><?php echo $data_rapat['nama_kegiatan']; ?></td>
          <!--  <td><?php //echo $pp++;?></td> -->
            <td><?php echo $data_rapat['bahasan']; ?></td>
            <td><?php echo $data_rapat['tgl']; ?></td>
            <td><button class="btn btn-info" style="width:100px;">Edit</button>
            <button class="btn btn-danger" style="width:100px;">Delete</button></td>
        </tr>
        <?php
            }
        } else {
            ?><td><?php echo "Result 0"; ?></td><?php
        }
        ?>
    </tbody>

    </table>

  </div>

 <!-- TAB PANITIA -->  

  <div id="menu2" class="tab-pane">
   
    <button class="btn btn-success" style="width:100px;">Insert</button>
    <table class="table" style="margin-top:10px;">

    <thead>
               <tr>
                 <th>NPM</th>
                 <th>Nama</th>
                 <th>Kegiatan</th>  
                 <th>Jabatan</th>
                 <th>Action</th>
               </tr>
    </thead>

    <tbody>
        <?php 
            require_once '../config/db/conn.php';
            $sql_panitia="SELECT * FROM kepanitiaan inner join kegiatan on kepanitiaan.id_kegiatan = kegiatan.id_kegiatan 
            inner join anggota on kepanitiaan.npm = anggota.npm";
             $result_panitia=mysqli_query($conn, $sql_panitia);
             if (mysqli_num_rows($result_panitia) > 0) {
        // output data of each row
        while($data_panitia = mysqli_fetch_assoc($result_panitia)) {
        ?>
        <tr>
            <td><?php echo $data_panitia['npm']; ?></td>
            <td><?php echo $data_panitia['nama']; ?></td>
            <td><?php echo $data_panitia['nama_kegiatan']; ?></td>
            <td><?php echo $data_panitia['jabatan_panitia']; ?></td>
            <td><button class="btn btn-info" style="width:100px;">Edit</button>
            <button class="btn btn-danger" style="width:100px;">Delete</button></td>
        </tr>
        <?php
            }
        } else {
            ?><td><?php echo "Result 0"; ?></td><?php
        }
        ?>
    </tbody>

    </table>

  </div>
</div>


