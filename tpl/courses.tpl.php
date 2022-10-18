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
                for($i = 0; $i < count($this -> vars);$i++){
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
                                <p>Get Curious.</p>
                                <a href="#" class="startnow-button startnow-btn">Start Now!</a>
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