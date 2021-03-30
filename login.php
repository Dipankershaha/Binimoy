 <?php  
    error_reporting(0); 
	session_start();
	 if(isset($_SESSION["user"])){  
	 	header("Location:index.php");
	  }
	  else{ 
	  		 
	  }
?>



 <?php 
	include "database.php";


	if(isset($_POST["submitClick"])){

		$email=$_POST["email"]; 
		$password=$_POST["password"];

		$sql="select * from bi_user where email='$email' and password='$password'";

 		$result_sql=$conn->query($sql);

 		$rows=mysqli_num_rows($result_sql);

 		if($rows>0){  

 			while($row=$result_sql->fetch_assoc()){
 				session_start();
                $_SESSION["id"] = $row["id"]; 
                $_SESSION["user"]="true";
 				$_SESSION["name"]=$row["u_name"]; 

	 			header("Location:index.php");
            } 
 				
 		}
 		else{
 			echo '<script type="text/javascript">
			  	alert("Wrong Email or Password");
			  </script>';
 		}


 		 if(isset($_SESSION["user"])){  
		 	header("Location:index.php");
		  }
		  else{ 
		  		 
		  }

	}

?>


<!DOCTYPE HTML>
 
<html>
	<head>
		<title>Binimoy Log in</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"> 
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<?php include "menu.php"; ?>

		<!-- Heading -->
			<div id="heading" >
				<h1>Log in</h1>
			</div>

		<!-- Main -->
			<section id="main" class="wrapper">
				




				<section class="wrapper">
					  

				    <form class="form-class" method="POST" action="">
						<h3 style="text-align: center;">Log in</h3> 
						<input type="text" name="email" placeholder="email" required>  
						<input type="password" name="password" placeholder="password" required>   
						<br>
						<button type="submit" name="submitClick">Log in</button>
					</form>


				</section>



			</section>

		<!-- Footer -->
			<footer id="footer">
				<?php include "footer.php"; ?>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script type="text/javascript" src="assets/js/bootstrap.min.js"> </script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>