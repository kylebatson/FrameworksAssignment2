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

			if(isset($this -> vars['Message'])){
				echo '<h3>'.$this -> vars['Message'].'</h3>';
			}else{
				$instructors = $this -> vars['instructors'];	
				$faculty_dept_ids = $this -> vars['faculty_dept_ids'];
				$departments = $this -> vars['faculty'];

				for($i = 0; $i < count($this -> vars['courses']);$i++){
					$course_instructor = $instructors[$this -> vars['courses'][$i]['course_id']-1]['instructor_name'];
					$fac_id = $faculty_dept_ids[$i]['faculty_dept_id'] -1;
					$department = $departments[$fac_id]['faculty_dept_name'];
						echo '
						<li>
							<div>
								<a href="#"><img src="images/'. $this -> vars['courses'][$i]['course_image'] .'" alt="course image"></a>
							</div>
	
							<div>
								<a href="#"><span class="faculty-department">'.$department.'</span>	
								<span class="course-title">'. $this -> vars['courses'][$i]['course_name'] .'</span>
								<span>'. $course_instructor .'</span>
							</div>
	
							<div>
								<a href="#" class="startnow-btn startnow-button">Go to Class!</a>
								<a href="questionUnenroll.php?courseid='. $this -> vars['courses'][$i]['course_id'] .'&faculty='. $department .'&instructor='. $course_instructor .'&coursename='. $this -> vars['courses'][$i]['course_name'] .'&courseimage='. $this -> vars['courses'][$i]['course_image'].' " class="startnow-btn unenroll-button">Unenroll</a>

							</div>
						</li>
						';
					
					
				}
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