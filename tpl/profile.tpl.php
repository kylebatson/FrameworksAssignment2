<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<title>Quwius</title>
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
				<li><a href="Logout.php">Logout</a></li>
			</ul>
		</nav>
		<main>
		<h1>Profile Page</h1>
		<h2>Enrolled Courses</h2>
		<ul class="course-list">

            <?php
				$id = $_SESSION['ID'];
				$content = false;

                for($i = 0; $i < count($this -> vars);$i++){
					if($id == $this -> vars[$i]['User_id']){
						$content = true;
						echo '
						<li>
							<div>
								<a href="#"><img src="'. $this -> vars[$i]['course_image'] .'" alt="course image"></a>
							</div>
	
							<div>
								<a href="#"><span class="faculty-department">Faculty or Department</span>	
								<span class="course-title">'. $this -> vars[$i]['course_name'] .'</span>
								<span class="instructor">Course Instructor</span></a>
							</div>
	
							<div>
								<a href="#" class="startnow-btn startnow-button">Go to Class!</a>
								<a href="#" class="startnow-btn unenroll-button">Unenroll</a>
							</div>
						</li>
						';
					}
					
                }

				if($content == false){
					echo '
					
						<h1>You are not registered for any courses!</h1>
					
					';
				}

                
            ?>
			
			
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