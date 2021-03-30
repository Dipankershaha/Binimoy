<?php  
	error_reporting(0); 
    session_start();

 

  if(isset($_SESSION["user"])){ 
  }
  else{ 
  }
?>

<!-- Header -->
<header id="header">
	<a class="logo" href="index.php">BINIMOY</a>
	<nav>
		<a href="#menu">Menu</a>
	</nav>
</header>

<!-- Nav -->
<nav id="menu">
	<ul class="links">
		<li><a href="index.php">Home</a></li>


		<?php 

            if(isset($_SESSION["user"])){
          ?> 

             <li><a href="profile.php"><?php echo $_SESSION["name"] ?></a></li>
              <li><a href="logout.php">Log out</a></li>
          <?php 
              }  
            else{ 

            ?> 

             <li><a href="login.php">Log in</a></li>
			<li><a href="register.php">Sign up</a></li>
          <?php 
              } 

           ?>




		
		
	</ul>
</nav>