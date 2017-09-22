<ul class="nav nav-tabs" style="margin-bottom: 20px;">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#home">Analisis Panitia</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#menu1">Panitia</a>
  </li>
</ul>

<div class="tab-content">
  
  <!-- TAB ANALISIS KEAKTIFAN ANGGOTA -->

  <div id="home" class="tab-pane active">
    
    <h3>Fitur ini belum aktif untuk versi beta 1.0.0..</h3>
    <table class="table" style="margin-top:10px;">

    <thead>
               <tr>

                 <th>No.</th>
                 <th>NPM </th>  
                 <th>Nama </th>
                 <th>Keaktifan Panitia</th>
                 <th>Action</th>
                 
               </tr>
    </thead>

    <tbody>
            </tbody>

    </table>

</div>
  

 <!-- TAB PANITIA -->  

  <div id="menu1" class="tab-pane">
   
    <h3>Silahkan Atur Panitia Anda </h3>
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


