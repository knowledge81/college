<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Registration</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/courses_styles.css">
<link rel="stylesheet" type="text/css" href="styles/courses_responsive.css">
</head>
<?
include '/home/knowledge27/.function.php';
?>
<body>

<div class="super_container">

	<!-- Header -->

	<header class="header d-flex flex-row">
		<div class="header_content d-flex flex-row align-items-center">
			<!-- Logo -->
			<div class="logo_container">
				<div class="logo">
					<img src="images/logo.png" alt="">
					<span>course</span>
				</div>
			</div>

			<!-- Main Navigation -->
			<nav class="main_nav_container">
				<div class="main_nav">
					<ul class="main_nav_list">
						<li class="main_nav_item"><a href="index.php">home</a></li>
						<li class="main_nav_item"><a href="#">courses</a></li>
						<li class="main_nav_item"><a href="contact.html">contact</a></li>
						<li class="main_nav_item"><a href="register.php">Register</a></li>
						<li class="main_nav_item"><a href="login.php">Log In</a></li>
					</ul>
				</div>
			</nav>
		</div>
	</header>
	
	<!-- Menu -->
	<div class="menu_container menu_mm">

		<!-- Menu Close Button -->
		<div class="menu_close_container">
			<div class="menu_close"></div>
		</div>

		<!-- Menu Items -->
		<div class="menu_inner menu_mm">
			<div class="menu menu_mm">
				<ul class="menu_list menu_mm">
					<li class="menu_item menu_mm"><a href="index.html">Home</a></li>
					<li class="menu_item menu_mm"><a href="#">About us</a></li>
					<li class="menu_item menu_mm"><a href="#">Courses</a></li>
					<li class="menu_item menu_mm"><a href="contact.html">Contact</a></li>
				</ul>

				<!-- Menu Social -->
				
				<div class="menu_social_container menu_mm">
					<ul class="menu_social menu_mm">
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-pinterest"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-twitter"></i></a></li>
					</ul>
				</div>

				<div class="menu_copyright menu_mm">Colorlib All rights reserved</div>
			</div>

		</div>

	</div>
	
	<!-- Home -->

	<div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url(images/courses_background.jpg)"></div>
		</div>
		<div class="home_content">
			<h1>Registration</h1>
		</div>
	</div><br>

	<?php
		
		$_SESSION['firstname'] = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
		$_SESSION['lastname'] = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['phone'] = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
		$_SESSION['address'] = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
		$_SESSION['address2'] = filter_var($_POST['address2'], FILTER_SANITIZE_STRING);
		$_SESSION['city'] = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
		$_SESSION['state'] = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
		$_SESSION['postalcode'] = filter_var($_POST['postalcode'], FILTER_SANITIZE_STRING);
		$_SESSION['gender'] = $_POST['gender'];
		$_SESSION['comment'] = $_POST['comment'];
		$_SESSION['course_id'] = $_POST['course_id'];
		$_SESSION['coursename'] = $_POST['coursename'];
		$_SESSION['description'] = $_POST['description'];
		$_SESSION['day_time'] = $_POST['day_time'];
		$_SESSION['instructor'] = $_POST['instructor'];
		$_SESSION['credits'] = $_POST['credits'];
		$_SESSION['cost'] = $_POST['cost'];
		$_SESSION['status'] = $_POST['status'];

		$sql = "SELECT * FROM college_students WHERE email='{$_SESSION['email']}'";
		
		$result = $conn->query($sql);

		if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
		echo 'This e-mail has already been registered. Please <a href="login.php">Please Log In</a><br><br><br><br>';
		}
		} else {
	?>
                
    <div class="container" style="color:black">
        <h1>Thank You!</h1>
        You submitted the following:<br><br>
    
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr><td>First Name: <?=$_SESSION['firstname']?></td></tr>
                    <tr><td>Last Name: <?=$_SESSION['lastname']?></td></tr>
                    <tr><td>E-Mail: <?=$_SESSION['email']?></td></tr>
                    <tr><td>Phone Number: <?=$$_SESSION['phone']?></td></tr>
                    <tr><td>Address: <?=$_SESSION['address']?></td></tr>
                    <tr><td>Address 2: <?=$_SESSION['address2']?></td></tr>
                    <tr><td>City: <?=$_SESSION['city']?></td></tr>
                    <tr><td>State: <?=$_SESSION['state']?></td></tr>
                    <tr><td>Zip Code: <?=$$_SESSION['postalcode']?></td></tr>
					<tr><td>Gender: <?=$_SESSION['gender']?></td></tr>
					<tr><td>Notes / Special Needs: <?=$_SESSION['comment']?></td></tr>
					
					<tr><td><h2>You registered for the following courses: </h2>
						<?php
						
						foreach($_SESSION['course_id'] as $course_id) { 
							$sql = "SELECT coursename FROM college_courses WHERE course_id = '{$course_id}'";
						$result = mysqli_query($conn, $sql);
					

							if (mysqli_num_rows($result) > 0) {
								// output data of each row
								while($row = mysqli_fetch_assoc($result)) {
									echo $row['coursename']. "<br>";
								}
							} else {
								echo "0 results";
							}
						}

						include 'upload.php';
						?>
					</td></tr>
                </tbody>
				<div class= "container">
					<tbody>
						<tr>
							<td>
								<form action="thankyou.php" method="POST" enctype="multipart/form-data">
									<input type="submit" name="newstudent" value="Register" class="btn btn-success">
								</form>
							</td>
							<td>
								<form action="register.php" method="POST" enctype="multipart/form-data">
									<input type="submit" name="editenroll" value="Edit" class="btn btn-danger" style="margin-right:10px;">
								</form>
							</td>
						</tr>
						<!-- <td>
							<button type="submit" class="btn btn-primary" name="newstudent">Confirm</button>
						</td> -->
					</tbody>
				<div>
            </table><br>   
        <div>
    </div>
	<?
	mysqli_close($conn);
	}
	?>
	
	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			
			<!-- Footer Content -->

			<div class="footer_content">
				<div class="row">

					<!-- Footer Column - About -->
					<div class="col-lg-3 footer_col">

						<!-- Logo -->
						<div class="logo_container">
							<div class="logo">
								<img src="images/logo.png" alt="">
								<span>course</span>
							</div>
						</div>

						<p class="footer_about_text">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum, tempor lacus.</p>

					</div>

					<!-- Footer Column - Menu -->

					<div class="col-lg-3 footer_col">
						<div class="footer_column_title">Menu</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_list_item"><a href="index.html">Home</a></li>
								<li class="footer_list_item"><a href="#">About Us</a></li>
								<li class="footer_list_item"><a href="#">Courses</a></li>
								<li class="footer_list_item"><a href="contact.html">Contact</a></li>
							</ul>
						</div>
					</div>

					<!-- Footer Column - Usefull Links -->

					<div class="col-lg-3 footer_col">
						<div class="footer_column_title">Useful Links</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_list_item"><a href="#">Testimonials</a></li>
								<li class="footer_list_item"><a href="#">FAQ</a></li>
								<li class="footer_list_item"><a href="#">Community</a></li>
								<li class="footer_list_item"><a href="#">Campus Pictures</a></li>
								<li class="footer_list_item"><a href="#">Tuitions</a></li>
							</ul>
						</div>
					</div>

					<!-- Footer Column - Contact -->

					<div class="col-lg-3 footer_col">
						<div class="footer_column_title">Contact</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="images/placeholder.svg" alt="https://www.flaticon.com/authors/lucy-g">
									</div>
									Blvd Libertad, 34 m05200 Arévalo
								</li>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="images/smartphone.svg" alt="https://www.flaticon.com/authors/lucy-g">
									</div>
									0034 37483 2445 322
								</li>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="images/envelope.svg" alt="https://www.flaticon.com/authors/lucy-g">
									</div>hello@company.com
								</li>
							</ul>
						</div>
					</div>

				</div>
			</div>

			<!-- Footer Copyright -->

			<div class="footer_bar d-flex flex-column flex-sm-row align-items-center">
				<div class="footer_copyright">
					<span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
				</div>
				<div class="footer_social ml-sm-auto">
					<ul class="menu_social">
						<li class="menu_social_item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-twitter"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/courses_custom.js"></script>

</body>
</html>