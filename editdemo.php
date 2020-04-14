<?php
// Start the session
session_start();
if(!isset($_SESSION['loggedin'])) {
header("Location: login.php");
}
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
						<li class="main_nav_item"><a href="logout.php">Log Out</a></li>
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
			<h2 style="color:white">Edit Personal Information</h2>
		</div>
	</div><br>

	

	<!-- Class Registration Form -->
	<div class="container" style="color:black">
		<form action="editdemoprocess.php" method="POST" enctype="multipart/form-data">
			<table class="table">
				<tr>
					<td>
						<div class="form-group">
							<label for="firstname">First Name:</label>
							<input type="text" class="form-control text-left" id="firstname" name="firstname" maxlength="30" value="<?
								if(isset($_SESSION['firstname'])) { 
								echo $_SESSION['firstname']; }?>"required
							>
						</div>
					</td>
					<td>
						<div class="form-group">
							<label for="lastname">Last Name:</label>
							<input type="text" class="form-control" id="lastname" name="lastname" maxlength="30" value="<?
								if(isset($_SESSION['lastname'])) { 
								echo $_SESSION['lastname']; }?>"required
							>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-group">
							<label for="email">E-Mail:</label>
							<input type="email" class="form-control" id="email" name="email" maxlength="40" value="<?
								if(isset($_SESSION['email'])) { 
								echo $_SESSION['email']; }?>"required
							>
						</div>
					</td>
					<td>
						<div class="form-group">
							<label for="phone">Phone:</label>
							<input type="number" class="form-control" id="phone" name="phone" maxlength="10" value="<?
								if(isset($_SESSION['phone'])) { 
								echo $_SESSION['phone']; }?>"required
							>
						</div>
					</td>
				</tr>
			</table>
			<table class="table">
				<tr>
					<td>
						<div class="form-group">
							<label for="address">Address:</label>
							<input type="text" class="form-control" id="address" name="address" maxlength="50" value="<?
								if(isset($_SESSION['address'])) { 
								echo $_SESSION['address']; }?>"required
							>
						</div>
					</td>
					<td>
						<div class="form-group">
							<label for="address2">Address 2:</label>
							<input type="text" class="form-control" id="address2" name="address2" maxlength="50" value="<?
								if(isset($_SESSION['address2'])) { 
								echo $_SESSION['address2']; }?>"
							>
						</div>
					</td>
				</tr>
			</table>
			<table class="table">
				<tr>
					<td>
						<div class="form-group">
							<label for="city">City:</label>
							<input type="text" class="form-control" id="city" name="city" maxlength="20" value="<?
								if(isset($_SESSION['city'])) { 
								echo $_SESSION['city']; }?>"required
							>
						</div>
					</td>
					<td>
						<div class="form-group">
							<label for="state">State:</label>
							<select class="form-control" id="state" name="state" required>
							<option value="">Please Select</option>
								<?php
									$state =
										array('AL'=>'Alabama','AK'=>'Alaska','AZ'=>'Arizona','AR'=>'Arkansas','CA'=>'California','CO'=>'Colorado','CT'=>'Connecticut','DE'=>'Delaware','DC'=>'District of Columbia','FL'=>'Florida','GA'=>'Georgia','HI'=>'Hawaii','ID'=>'Idaho','IL'=>'Illinois','IN'=>'Indiana','IA'=>'Iowa','KS'=>'Kansas','KY'=>'Kentucky','LA'=>'Louisiana','ME'=>'Maine','MD'=>'Maryland','MA'=>'Massachusetts','MI'=>'Michigan','MN'=>'Minnesota','MS'=>'Mississippi','MO'=>'Missouri','MT'=>'Montana','NE'=>'Nebraska','NV'=>'Nevada','NH'=>'New Hampshire','NJ'=>'New Jersey','NM'=>'New Mexico','NY'=>'New York','NC'=>'North Carolina','ND'=>'North Dakota','OH'=>'Ohio','OK'=>'Oklahoma','OR'=>'Oregon','PA'=>'Pennsylvania','RI'=>'Rhode Island','SC'=>'South Carolina','SD'=>'South Dakota','TN'=>'Tennessee','TX'=>'Texas','UT'=>'Utah','VT'=>'Vermont','VA'=>'Virginia','WA'=>'Washington','WV'=>'West Virginia','WI'=>'Wisconsin','WY'=>'Wyoming');                                                    
										foreach($state as $state) {
										if($_SESSION['state'] == $state) {
										echo '<option value="'.$state.'" selected>'.$state.'</option>';
									} else {
										echo '<option value="'.$state.'">'.$state.'</option>';
									}
									}
								?>
							</select>
						</div>
					</td>
					<td>
						<div class="form-group">
							<label for="postalcode">Zip Code:</label>
							<input type="number" class="form-control" id="postalcode" name="postalcode" maxlength="9" value="<?
								if(isset($_SESSION['postalcode'])) { 
								echo $_SESSION['postalcode']; }?>" required
							>
						</div>
					</td>
				</tr>
			</table>
			<table class="table">
				<tr>
					<td>
						<div class="form-group">
							<label for="gender">Gender:</label>
							<select class="form-control" id="gender" name="gender" required>
								<option value="">Please Select</option>
								<?php
									$gender =
									array('Male','Female','Other');
									foreach($gender as $gender) {
									if($_SESSION['gender'] == $gender) {
									echo '<option value="'.$gender.'" selected>'.$gender.'</option>';
									} else {
									echo '<option value="'.$gender.'"required>'.$gender.'</option>';
									}
									}
								?>	
							</select>
						</div>
					</td>
				</tr>
			</table>
			<br>
			<button type="submit" class="btn btn-primary" name="editdemo">Confirm Updates</button>
		</form><br><br>
		<form action="dashboard.php" method="POST" enctype="multipart/form-data" style="margin-right:900px">
				<input type="submit" name="cancel" value="Cancel and Return" class="btn btn-danger">
		</form>
		
	</div><br>
	<!-- Popular -->

	

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			
			<!-- Newsletter -->

			<div class="newsletter">
				<div class="row">
					<div class="col">
						<div class="section_title text-center">
							<h1>Subscribe to newsletter</h1>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col text-center">
						<div class="newsletter_form_container mx-auto">
							<form action="post">
								<div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-center">
									<input id="newsletter_email" class="newsletter_email" type="email" placeholder="Email Address" required="required" data-error="Valid email is required.">
									<button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">Subscribe</button>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>

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
						<div class="footer_column_title">Usefull Links</div>
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