<?php 

require_once(__DIR__ . '/config/includes/session.php');
?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>BEM FIKTI UG Absen</title>
	<link rel="shortcut icon" href="resource/img/favicon.png">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="resource/css/bootstrap.css">
	<style type="text/css">
	body {
		background-color: #243854;
	}

	/* Full-width inputs */
	input[type=text], input[type=password] {
	    width: 100%;
	    padding: 12px 20px;
	    margin: 8px 0;
	    display: inline-block;
	    border: 1px solid #ccc;
	    box-sizing: border-box;
	}

	/* Set a style for all buttons */
	button {
	    background-color: #4CAF50;
	    color: white;
	    padding: 14px 20px;
	    margin: 8px 0;
	    border: none;
	    cursor: pointer;
	    width: 100%;
	}

	/* Add a hover effect for buttons */
	button:hover {
	    opacity: 0.8;
	}

	/* Extra style for the cancel button (red) */
	.cancelbtn {
	    width: auto;
	    padding: 10px 18px;
	    background-color: #f44336;
	}

	/* Center the logo_bem image inside this container */
	.imgcontainer {
	    text-align: center;
	    margin: 24px 0 12px 0;
	}

	/* logo_bem image */
	img.logo_bem {
	    width: 40%;
	    border-radius: 50%;
	}

	/* Add padding to containers */
	.container {
	    padding: 10px;
	}

	/* The "Forgot password" text */
	span.psw {
	    float: right;
	    padding-top: 16px;
	}

	/* Change styles for span and cancel button on extra small screens */
	@media screen and (max-width: 300px) {
	    span.psw {
	        display: block;
	        float: none;
	    }
	    .cancelbtn {
	        width: 100%;
	    }
	} 

	/* bikin content di tengah */
	.centred {
		margin-top: 10%;
		margin-left: auto;
	  	margin-right: auto;
	  	float: none;
	}

	label {
		color: white;
	}

	</style>

</head>
<body>


	<div class="container">
		
		<div class="col-lg-4"> </div>

			<div class="col-lg-4 centred">
			
			<div class="imgcontainer">
   			  <img src="resource/img/bemfikti.png" alt="Logo" class="logo_bem">
 			</div> 

			<form method="POST" action="config/includes/do_login.php">
 			<div class="container">
   			 <label><b>Username</b></label>
    		 <input type="text" placeholder="Enter Username" name="username" required>
	
   			 <label><b>Password</b></label>
   			 <input type="password" placeholder="Enter Password" name="pass" required>
			 
  	    	 <input type="submit" name="submit" class="btn btn-lg btn-success btn-block" value="Login">

			 <p style="color: red;"> <?php include "config/includes/login_error_handlers.php" ?> </p>
			 </div>
			
			</form> 

		</div>


		<div class="col-lg-4"> </div>
	</div>
</body>
</html>
