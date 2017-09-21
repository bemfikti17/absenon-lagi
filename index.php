<?php 
include 'session.php';

 ?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>BEM FIKTI UG Absen</title>
	<link rel="shortcut icon" href="resource/img/favicon.png">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="resource/css/bootstrap.css">

	<!-- Custom styles for this template -->
	<link href="resource/css/simple-sidebar.css" rel="stylesheet">
</head>
	
<body>

    <div id="wrapper">


				
            
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                       BEM FIKTI UG Absen
                    </a>
                </li>
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">Data Anggota</a>
                </li>
                <li>
                    <a href="#">Data Kegiatan</a>
                </li>
                <li>
                    <a href="#">Data Absen</a>
                </li>
                <li>
                    <a href="#">Laporan</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
        
        <nav class="navbar" style="background-color: #243854;">
			 <a href="#menu-toggle" class="btn" id="menu-toggle">
			   <img src="resource/img/bemfikti.png" width="35" height="35" class="" alt="Menu">
			   <label style="color:#FFFFFF;">Menu</label>
			  </a>

			  <ul class="nav navbar-nav navbar-right">
				<label style="color:#FFFFFF;">Selamat Datang, <?php echo $nm_koor ?> </label>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li><a href="logout.php"><button >Logout</button></a></li>
			</ul>
			
		</nav>
        
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
            	<!-- Image and text -->
				
                
            	
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="resource/js/jquery.min.js"></script>
    <script src="resource/js/popper.min.js"></script>
    <script src="resource/js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>
</html>