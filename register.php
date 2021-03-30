


<!DOCTYPE HTML>
 
<html>
	<head>
		<title>Binimoy Register</title>
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
				<h1>Register</h1>
			</div>

		<!-- Main -->
			<section id="main" class="wrapper">
			 
				<section class="wrapper">
					  <?php 
						include "database.php";


						if(isset($_POST["submitClick"])){

							$u_name=$_POST["u_name"];
							$phone=$_POST["phone"];
							$email=$_POST["email"];
							$description=$_POST["description"];
							$password=$_POST["password"];

							$sql="INSERT INTO bi_user(u_name, phone, email, password, description) VALUES('$u_name', '$phone', '$email', '$password', '$description')";

							$result=$conn->query($sql);

							if($result){
								header("Location:login.php");
							}else{
								echo "Use Another Email";
							}

						}

					?>

				    <form class="form-class" method="POST" action="">
						<h3 style="text-align: center;">Register</h3>
						<input type="text" name="u_name" placeholder="name" required>  		
						<input type="text" name="phone" placeholder="phone" required>
						<input type="text" name="email" placeholder="email" required>  
						<input type="password" name="password" placeholder="password" required>  
						<textarea name="description" placeholder="description" required></textarea> 
						<br>
						<button type="submit" name="submitClick">JOIN</button>
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