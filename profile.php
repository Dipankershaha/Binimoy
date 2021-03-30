<?php 
	
	session_start();
	 if(isset($_SESSION["user"])){ 
	 	$user_id = $_SESSION["id"];
	  }
	  else{ 
	  		header("Location:index.php");
	  }
	

	include "database.php";


	if(isset($_POST["submitClick"])){

		$p_name=$_POST["p_name"];
		$rate=$_POST["rate"];
		$category=$_POST["category"];
		$description=$_POST["description"];

		$photo=microtime().".jpg";
        $photo=str_replace(" ", "", $photo);
        $temp=$_FILES['file']['tmp_name'];
        $location="images/post/";

		$sql="INSERT INTO bi_post(user_id, p_name, rate, description, photo, category, status) VALUES('$user_id','$p_name', '$rate', '$description', '$photo', '$category', '1')";

		$result=$conn->query($sql);

		if($result){

			if(move_uploaded_file($temp, $location.$photo)){
				echo '<script type="text/javascript">
				  	alert("POSTED");
				  </script>';
            }  
			
		}else{
			echo '<script type="text/javascript">
				  	alert("Problem");
				  </script>';
		}

	}

?>



<!DOCTYPE HTML>
 
<html>
	<head>
		<title>Binimoy Profile</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"> 
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>

	<style type="text/css">

		


	</style>


	<body class="is-preload">

		<?php include "menu.php"; ?>

		<!-- Heading -->
			<div id="heading" >
				<h1>Profile</h1>
			</div>

		<!-- Main -->
			<section id="main" class="wrapper">
				
 
				<section class="wrapper">
					<form class="form-class" method="POST" action="" enctype="multipart/form-data">
						<h3 style="text-align: center;">Post a product</h3>
						<input type="text" name="p_name" placeholder="product name">  		
						<input type="text" name="rate" placeholder="rate">  
						<textarea name="description" placeholder="description"></textarea>
						<input type="file" name="file">
						<select name="category">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
						<button type="submit" name="submitClick">Post</button>
					</form>



					<br>
					<br><br><br><br>
					<div class="option-table" >
						
						<h3 style="text-align: center;">Transition</h3>
						<table class="table">
						    <thead>
						      <tr>
						        <th>Name</th>
						        <th>Rate</th>
						        <th>Info</th>
						        <th>Photo</th>
						        <th>Option</th>
						        <th>Status</th>
						      </tr>
						    </thead>
						    <tbody>



						    	<?php 


						    		if(isset($_POST["doneClick"])){
						    			$post_id = $_POST["post_id"];

						    			$sql="UPDATE bi_transition set status='done' where id='$post_id'";
						    			$result=$conn->query($sql); 
						    		}
						    		


						    		$sql = "SELECT bi_transition.*, bi_post.p_name , bi_post.rate , bi_post.description , bi_post.photo , bi_user.u_name, bi_user.phone from bi_transition INNER JOIN bi_post on bi_transition.post_id=bi_post.id INNER JOIN bi_user on bi_transition.user_id=bi_user.id";

						    		$result=$conn->query($sql); 

				                    while($row=$result->fetch_assoc()){
				                        $id = $row["id"];  
				                        $photo = $row["photo"];   
				                        $status = $row["status"]; 
				                    
						    	?> 




						      <tr>
						        <td><?php echo $row["p_name"] ?></td>
						        <td><?php echo $row["rate"] ?></td>
						        <td><?php echo $row["u_name"] ?>
						        	<br>
						        	<?php echo $row["phone"] ?>
						        </td>
						        <td class="table-img"><img src="images/post/<?php echo $photo ?>"></td>
						        <td><?php echo $row["way"] ?>
						        	 	
						        </td>
						        <td>
						        	<form method="POST" action="">
						        		<input type="text" name="post_id" value="<?php echo $id ?>" hidden>
						        		<?php 

						        		if($status=="done"){
						        		 ?>
						        		Transition Done
						        		<?php } 
						        			else{


						        		?>	
						        		<button type="submit" name="doneClick">Undone</button>
						        		<?php } ?>
						        	</form>
						        </td>
						      </tr> 

						  <?php } ?> 

						    </tbody>
						  </table>


					</div>








					<br><br><br><br>
					<div class="option-table" >
						
						<h3 style="text-align: center;">My post</h3>
						<table class="table">
						    <thead>
						      <tr>
						        <th>Name</th>
						        <th>Rate</th>
						        <th>Info</th>
						        <th>Photo</th>
						        <th>Option</th>
						      </tr>
						    </thead>
						    <tbody>


						    	<?php 


						    		if(isset($_POST["hideClick"])){
						    			$post_id = $_POST["post_id"];

						    			$sql="UPDATE bi_post set status='0' where id='$post_id'";
						    			$result=$conn->query($sql); 
						    		}


						    		if(isset($_POST["showClick"])){
						    			$post_id = $_POST["post_id"];

						    			$sql="UPDATE bi_post set status='1' where id='$post_id'";
						    			$result=$conn->query($sql); 
						    		}






						    		$sql="SELECT * from bi_post where user_id='$user_id' ORDER BY id DESC" ;

						    		$result=$conn->query($sql); 

				                    while($row=$result->fetch_assoc()){
				                        $id = $row["id"];  
				                        $photo = $row["photo"]; 
				                        $status = $row["status"]; 
				                    
						    	?>




						      <tr>
						        <td><?php echo $row["p_name"]; ?></td>
						        <td><?php echo $row["rate"]; ?></td>
						        <td><?php echo $row["description"]; ?> 
						        </td>
						        <td class="table-img"><img src="images/post/<?php echo $photo ?>"></td>
						         <td>
						        	<form method="POST" action="">
						        		<input type="text" name="post_id" value="<?php echo $id ?>" hidden>
						        		<?php 

						        			if($status=="1"){



						        		 ?>
						        		<button type="submit" name="hideClick">Hide</button>
						        		<?php } 
						        			else{


						        		?>	
						        		<button type="submit" name="showClick">Show</button>
						        		<?php } ?>
						        	</form>
						        	
						        </td>
						      </tr>   

						      <?php } ?> 
						    </tbody>
						  </table>


					</div>
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