<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<title>Login|Quwius</title>
		<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen">
		<meta charset="utf-8">
	</head>
	<body>
		<nav>
			<a href="#"><img src="images/logo.png" alt="UWI online"></a>
			<ul>
				<li><a href="courses.php">Courses</a></li>
				<li><a href="streams.php">Streams</a></li>
				<li><a href="aboutus.php">About Us</a></li>
				<li><a href="login.php">Login</a></li>
				<li><a href="signup.php">Sign Up</a></li>
			</ul>
		</nav>
		<main>
		   <div class="login-box">
			<div class="login-box-body">
			
			<h1>Unenrollment Confirmed</h1>
			
			<p>
				<?php
					echo $this -> vars["Result"];
				?>
			</p>

			 	
			<a href="profile.php">Go To Profile</a>

			

			
       </div><!-- /.login-box-body -->
	  </div>
			<footer>
				<nav>
					<ul>
						<li>&copy;2015 Quwius Inc.</li>
						<li><a href="#">Company</a></li>
						<li><a href="#">Connect</a></li>
						<li><a href="#">Terms &amp; Conditions</a></li>
					</ul>
				</nav>
			</footer>
		</main>
	</body>
</html>