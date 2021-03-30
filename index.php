<?php 
	include "database.php";
	session_start();
	 if(isset($_SESSION["user"])){ 
	 	$user_id = $_SESSION["id"];
	  }
	  else{ 
	  		header("Location:login.php");
	  }
?>

<!DOCTYPE HTML>
 
<html>
	<head>
		<title>Binimoy | Home</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"> 
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<?php include "menu.php"; ?>

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h1>binimoy</h1>
					<p>Buy Sell Exchange</p>
				</div>
				<div id="banner-photo"></div>
			</section>

		<!-- Highlights -->
			<section class="wrapper">
				<div class="inner">
					
					<?php 
									

									if(isset($_POST["buyClick"])){ 
										$post_id = $_POST["post_id"];
										$option = "Buy";
										$sql="INSERT INTO bi_transition(user_id, post_id, way) values('$user_id', '$post_id', '$option')";

										$result=$conn->query($sql); 
										if($result){
											echo '<script type="text/javascript">
											  	alert("Buy Request Sent");
											  </script>';
										}
										else{
											echo mysqli_error($conn);	
										}
									}



									if(isset($_POST["exchangeClick"])){
										$post_id = $_POST["post_id"];
										$option = "Exchange";
										$sql="INSERT INTO bi_transition(user_id, post_id, way) values('$user_id', '$post_id', '$option')";

										$result=$conn->query($sql); 
										if($result){
											echo '<script type="text/javascript">
											  	alert("Exchange Request Sent");
											  </script>';
										}
									}





									$sql="SELECT * from bi_post where status='1' ORDER BY id DESC" ;

						    		$result=$conn->query($sql); 

				                    while($row=$result->fetch_assoc()){
				                        $id = $row["id"];  
				                        $photo = $row["photo"]; 
				                        $status = $row["status"]; 
								 ?>


					<div class="news">
						<div class="breakings-news">
							<div class="row">



								



								<div class="photo col-lg-4 col-md-4 col-sm-3 col-xs-12">
									<img src="images/post/<?php echo $photo ?>">
								</div>

								<div class="info col-lg-8 col-md-8 col-sm-9 col-xs-12">
									<h2><?php echo $row["p_name"]; ?></h2>

									<div class="author"> 
										<p class="credit"> <span>Price: </span> <strong><?php echo $row["rate"]; ?></strong> </p>
									</div>

									<p class="article">
										<?php echo $row["description"]; ?> 
									</p>

									<div class="news-info"> 
										<blockquote style="border: none; padding: 0px; margin: 0px;"> <b></b>
											<form method="POST" action="">
												<input type="text" name="post_id" value="<?php echo $id ?>" hidden> 
												<button type="submit" name="buyClick">Buy</button>
												<button type="submit" name="exchangeClick">Exchange</button>
											</form>
											
 										 </blockquote>
									</div>
								</div>

							
							</div>
						</div>
					</div>

					<?php } ?>
 


				</div>
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