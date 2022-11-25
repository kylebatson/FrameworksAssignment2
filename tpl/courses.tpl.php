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
				<li><a href="profile.php">Profile</a></li>
				<li><a href="streams.php">Streams</a></li>
				<li><a href="aboutus.php">About Us</a></li>
				<li><a href="Logout.php">LogOut</a></li>
			</ul>
		</nav>
		<main>
		<h1>Courses</h1>
		<ul class="course-list">
            <?php

		
				$instructors = $this -> vars['instructors'];	
				$faculty_dept_ids = $this -> vars['faculty_dept_ids'];
				$departments = $this -> vars['faculty'];


                for($i = 0; $i < count($this -> vars['data']);$i++){
					$course_instructor = $instructors[$this -> vars['data'][$i]['course_id']-1]['instructor_name'];
					$fac_id = $faculty_dept_ids[$i]['faculty_dept_id'] -1;
					$department = $departments[$fac_id]['faculty_dept_name'];
				
					echo '
                        <li>
                            <div>
                                <a href="#"><img src=" images/'. $this -> vars['data'][$i]['course_image'] .'" alt="course image"></a>
                            </div>
            
                            <div>
                            <a href="#"><span class="faculty-department">'.$department.'</span>	
                                <span class="course-title">'. $this -> vars['data'][$i]['course_name'] .'</span>
								<span>'. $course_instructor .'</span>
                            </div>
            
                            <div>
                                <p>Get Curious.</p>
                                <a href="enroll.php?courseid='. $this -> vars['data'][$i]['course_id'] .'&coursename='. $this -> vars['data'][$i]['course_name'].'  " class="startnow-button startnow-btn">Regisiter!</a>
                            </div>
                        </li>
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