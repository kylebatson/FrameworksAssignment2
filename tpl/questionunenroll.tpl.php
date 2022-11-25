<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<title>Quwius - Course Unenrollment</title>
		<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen">
		<meta charset="utf-8">
	</head>
	<body>
		<nav>
			<a href="#"><img src="images/logo.png" alt="UWI online"></a>
			<ul>
				<li><a href="index.php?controller=Courses">Courses</a></li>
				<li><a href="index.php?controller=Streams">Streams</a></li>
				<li><a href="index.php?controller=AboutUs">About Us</a></li>
				<li><a href="index.php?controller=Login">Login</a></li>
				<li><a href="index.php?controller=SignUp">Sign Up</a></li>
			</ul>
		</nav>
		<main>
		<h1>Are You Sure You Want to Unenroll from this Course?</h1>
		<ul class="course-list">
			<li>
				<?php
				echo '
				<div>
				<a href="#"><img src="images/'.$_GET['courseimage'].'" alt="course image"></a>
				</div>
				<div>
				<a href="#"><span class="faculty-department">'.$_GET['faculty'].'</span>	
					<span class="course-title">'.$_GET['coursename'].'</span>
					<span class="instructor">'.$_GET['instructor'].'</span></a>
				</div>';
				?>
				<div>
					<a href="profile.php" class="startnow-btn startnow-button">Cancel</a>
					<?php

					echo '<a href=unenrollConfirmed.php?courseid='. $_GET['courseid'] . '&coursename='.$_GET['coursename'].' class="startnow-btn unenroll-button">Okay</a>';
					
					?>
				</div>
			</li>

		</ul>
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