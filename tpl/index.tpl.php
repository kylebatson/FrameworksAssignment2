<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<title>Quwius</title>
		<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen">
		<meta charset="utf-8">
	</head>
	<body>
		<nav>
			<a href="/"><img src="images/logo.png" alt="Quwius"></a>
			<ul>
				<li><a href="courses.php">Courses</a></li>
				<li><a href="streams.php">Streams</a></li>
				<li><a href="aboutus.php">About Us</a></li>
				<?php
			
				if (isset($_SESSION['Email'])){
					echo '
						<li><a href="logout.php">LogOut</a></li>
					';
				}else{
					echo '
						<li><a href="login.php">Login</a></li>
					';
				}
				

				?>
				<li><a href="signup.php">Sign Up</a></li>
			</ul>
		</nav>
		<div id="lead-in">
		<h1>Feed Your Curiosity,<br>
				Take Online Courses from UWI</h1>

			<form name="course_search" method="post" action="index.php?controller=">
				<div class="wide-thick-bordered" >
				<input class="c-banner-search-input" type="text" name="formSearch" value="" placeholder="Find the right course for you">
				<button class="c-banner-search-button"></button>
				</div>
			</form>
		</div>
		<header></header>
		<main>
			<h1>Most Popular</h1>
			
					
		
		<?php

		$popular = $this -> vars[1];
		$recommended = $this -> vars[0];
		?>

		<div class="centered">
		<?php
		for($i = 0; $i < 4; $i++){
			$img_src = '<img src = ' . $popular[$i]['course_image'] . '>';
			$course_title = '<span class="course-title">'. $popular[$i]['course_name'] .'</span>';
			

			?>
			
		
			<section> 
				<a href="#">
					<?php echo $img_src; ?>
					<?php echo  $course_title?>
					<span>Course Instructor</span>
				</a>
			</section>
		<?php
			
		}

		?>  

		</div>


		<div class="centered">
		<?php
		for($i = 4; $i < 8; $i++){
			$img_src = '<img src = ' . $popular[$i]['course_image'] . '>';
			$course_title = '<span class="course-title">'. $popular[$i]['course_name'] .'</span>';
			

			?>
			
		
			<section> 
				<a href="#">
					<?php echo $img_src; ?>
					<?php echo  $course_title?>
					<span>Course Instructor</span>
				</a>
			</section>
		<?php
			
		}

		?>  

		</div>


	
			
			<h1>Learner Recommended</h1>
			<div class="centered">
		<?php
		for($i = 0; $i < 4; $i++){
			$img_src = '<img src = ' . $recommended[$i]['course_image'] . '>';
			$course_title = '<span class="course-title">'. $recommended[$i]['course_name'] .'</span>';
			

			?>
			
		
			<section> 
				<a href="#">
					<?php echo $img_src; ?>
					<?php echo  $course_title?>
					<span>Course Instructor</span>
				</a>
			</section>
		<?php
			
		}

		?>  

		</div>


		<div class="centered">
		<?php
		for($i = 4; $i < 8; $i++){
			$img_src = '<img src = ' . $recommended[$i]['course_image'] . '>';
			$course_title = '<span class="course-title">'. $recommended[$i]['course_name'] .'</span>';
			

			?>
			
		
			<section> 
				<a href="#">
					<?php echo $img_src; ?>
					<?php echo  $course_title?>
					<span>Course Instructor</span>
				</a>
			</section>
		<?php
			
		}

		?>  

		</div>


			<footer>
				<nav>
					<ul>
						<li>&copy;2018 Quwius Inc.</li>
						<li><a href="#">Company</a></li>
						<li><a href="#">Connect</a></li>
						<li><a href="#">Terms &amp; Conditions</a></li>
					</ul>
				</nav>
			</footer>
		</main>
	</body>
</html>