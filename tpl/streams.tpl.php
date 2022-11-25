<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<title>Streams | Quwius</title>
		<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen">
		<meta charset="utf-8">
	</head>
	<body>
		<nav>
			<a href="#"><img src="images/logo.png" alt="UWI online"></a>
			<ul>
				
				<li><a href="profile.php">Profile</a></li>
				<li><a href="streams.php">Streams</a></li>
				<li><a href="courses.php">Courses</a></li>
				<li><a href="Logout.php">LogOut</a></li>
			</ul>
		</nav>
		<div id="streams-lead-in">
		<h1>Take specialized courses<br>
				Earn Streams Certifications</h1>

				<?php
				$stream = $this -> vars['data'];	
				$instructors = $this -> vars['instructors'];	
				$stream_instructors = $this -> vars['stream_instructors'];	
				
				
			?>
		</div>
		<header id="streams-header"></header>
		<main class="streams">
		<h1>Streams</h1>
		<div class="centered">
		<?php
		for($i = 0; $i < 4; $i++){
			$img_src = '<img src = images/' . $stream[$i]['stream_image'] . '>';
			$course_title = '<span class="course-title">'. $stream[$i]['stream_name'] .'</span>';
			$streaminstructor_id = $stream_instructors[$stream[$i]['stream_id']-1]['instructor_id'];
			$stream_instructor = '<span>'.$instructors[$streaminstructor_id-1]['instructor_name'] .'</span>';

			?>
			
		
			<section> 
				<a href="#">
					<?php echo $img_src; ?>
					<?php echo  $course_title?>
					<?php echo  $stream_instructor?>


				</a>
			</section>
		<?php
			
		}

		?>  

		</div>

		<div class="centered">
		<?php
		for($i = 4; $i < 8; $i++){
			$img_src = '<img src = images/' . $stream[$i]['stream_image'] . '>';
			$course_title = '<span class="course-title">'. $stream[$i]['stream_name'] .'</span>';
			$streaminstructor_id = $stream_instructors[$stream[$i]['stream_id']-1]['instructor_id'];
			$stream_instructor = '<span>'.$instructors[$streaminstructor_id-1]['instructor_name'] .'</span>';

			?>
			
		
			<section> 
				<a href="#">
					<?php echo $img_src; ?>
					<?php echo  $course_title?>
					<?php echo  $stream_instructor?>

				</a>
			</section>
		<?php
			
		}

		?> 
		</div>

		<div class="centered">
		<?php
		for($i = 8; $i < 10; $i++){
			$img_src = '<img src = images/' . $stream[$i]['stream_image'] . '>';
			$course_title = '<span class="course-title">'. $stream[$i]['stream_name'] .'</span>';
			$streaminstructor_id = $stream_instructors[$stream[$i]['stream_id']-1]['instructor_id'];
			$stream_instructor = '<span>'.$instructors[$streaminstructor_id-1]['instructor_name'] .'</span>';

			?>
			
		
			<section> 
				<a href="#">
					<?php echo $img_src; ?>
					<?php echo  $course_title?>
					<?php echo  $stream_instructor?>

				</a>
			</section>
		<?php
			
		}

		?> 
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