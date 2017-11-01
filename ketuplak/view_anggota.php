
<button class="btn btn-success" style="width:150px; margin-bottom: 10px">Tambah Data</button>
<ul class="nav nav-tabs" style="margin-bottom: 20px;">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#home">Voluunteer</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#menu1">Pengurus</a>
  </li>
</ul>

<div class="tab-content">
  
  <!-- TAB DATA VOLUNTEER -->

  <div id="home" class="tab-pane active">
    
    <h3>Data Volunteer</h3>
    <table class="table" style="margin-top:10px;">

    <thead>
               <tr>
                 <th>NPM</th>
                 <th>Nama</th>
                 <th>Tanggal Lahir</th>  
                 <th>Jenis Kelamin</th>
                 <th>Kelas</th>
                 <th>Jurusan</th>
                 <th>Domisili</th>
                 <th>Kepengurusan</th>
                 <th>Action</th>
               </tr>
    </thead>
        <tbody>
  <?php 
  require_once '../config/db/conn.php';
  $sql_anggota="SELECT*FROM ANGGOTA WHERE kepengurusan = 'volunteer' ";
  $result_anggota=mysqli_query($conn, $sql_anggota);
       if (mysqli_num_rows($result_anggota) > 0) {
      
      while($tblanggota = mysqli_fetch_assoc($result_anggota)) {
  ?>


    <tr>
        <td><?php echo $tblanggota['npm']; ?></td>
        <td><?php echo $tblanggota['nama']; ?></td>
        <td><?php echo $tblanggota['ttl']; ?></td>
        <td><?php echo $tblanggota['jenis_kelamin']; ?></td>
        <td><?php echo $tblanggota['kelas']; ?></td>
        <td><?php echo $tblanggota['jurusan']; ?></td>
        <td><?php echo $tblanggota['domisili']; ?></td>
        <td><?php echo $tblanggota['kepengurusan']; ?></td>
        <td><button class="btn btn-info" style="width:100px;">Edit</button></td>
        <td><button class="btn btn-danger" style="width:100px;">Delete</button></td>
    </tr>   
 <?php
      }
    }
  ?>
        </tbody>
    </table>

</div>
  

 <!-- TAB PANITIA -->  

  <div id="menu1" class="tab-pane">
   
    <h3>Data Pengurus</h3>
    <table class="table" style="margin-top:10px;">

    <thead>
               <tr>
                 <th>NPM</th>
                 <th>Nama</th>
                 <th>Tanggal Lahir</th>  
                 <th>Jenis Kelamin</th>
                 <th>Kelas</th>
                 <th>Jurusan</th>
                 <th>Domisili</th>
                 <th>Kepengurusan</th>
                 <th>Action</th>
               </tr>
    </thead>
        <tbody>
  <?php 
  require_once '../config/db/conn.php';
  $sql_anggota="SELECT*FROM ANGGOTA WHERE kepengurusan != 'volunteer' ";
  $result_anggota=mysqli_query($conn, $sql_anggota);
       if (mysqli_num_rows($result_anggota) > 0) {
      
      while($tblanggota = mysqli_fetch_assoc($result_anggota)) {
  ?>


    <tr>
        <td><?php echo $tblanggota['npm']; ?></td>
        <td><?php echo $tblanggota['nama']; ?></td>
        <td><?php echo $tblanggota['ttl']; ?></td>
        <td><?php echo $tblanggota['jenis_kelamin']; ?></td>
        <td><?php echo $tblanggota['kelas']; ?></td>
        <td><?php echo $tblanggota['jurusan']; ?></td>
        <td><?php echo $tblanggota['domisili']; ?></td>
        <td><?php echo $tblanggota['kepengurusan']; ?></td>
        <td><button class="btn btn-info" style="width:100px;">Edit</button></td>
        <td><button class="btn btn-danger" style="width:100px;">Delete</button></td>
    </tr>   
 <?php
      }
    }
  ?>
        </tbody>
    </table>

  </div>
</div>


