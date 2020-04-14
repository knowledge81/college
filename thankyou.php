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
						<li class="main_nav_item"><a href="#">about us</a></li>
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
		include '/home/knowledge27/.function.php';
		
		if(isset($_POST['newstudent'])) {
			
		$password = rand();
		$password2 = md5($password);
		$firstname = $_SESSION['firstname'];
		$lastname = $_SESSION['lastname'];
		
		$sql = "INSERT INTO students (firstname, lastname, email, phone, address, address2, city, state, postalcode, gender, comment, imagename, password)
		VALUES ('{$_SESSION['firstname']}','{$_SESSION['lastname']}','{$_SESSION['email']}','{$_SESSION['phone']}','{$_SESSION['address']}',
				'{$_SESSION['address2']}','{$_SESSION['city']}','{$_SESSION['state']}','{$_SESSION['postalcode']}','{$_SESSION['gender']}','{$_SESSION['comment']}','{$_SESSION['imagex']}','{$password2}')";

		if (mysqli_query($conn, $sql)) {
		$last_id = mysqli_insert_id($conn);
		}
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		if(!empty($_SESSION['course_id'])) {
		foreach($_SESSION['course_id'] as $course_id) {
		$sql2 = "INSERT INTO enrollments (student_id, course_id)
		VALUES ('{$last_id}', '{$course_id}')";

		if (mysqli_query($conn, $sql2)) {
			//send email to admin
			
			$to = $_SESSION['email'];
			$subject = "Thank You for Registering with Coding University!";

			$message = <<<EOT
			
			<!DOCTYPE html>
			<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" 										
				xmlns:o="urn:schemas-microsoft-com:office:office">
				<head>
					<meta charset="utf-8"> <!-- utf-8 works for most cases -->
					<meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
					<meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
					<meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
					<title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

					<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

					<!-- CSS Reset : BEGIN -->
				<style>
				html,
				body {
					margin: 0 auto !important;
					padding: 0 !important;
					height: 100% !important;
					width: 100% !important;
					background: #f1f1f1;
				}

				/* What it does: Stops email clients resizing small text. */
				* {
					-ms-text-size-adjust: 100%;
					-webkit-text-size-adjust: 100%;
				}

				/* What it does: Centers email on Android 4.4 */
				div[style*="margin: 16px 0"] {
					margin: 0 !important;
				}

				/* What it does: Stops Outlook from adding extra spacing to tables. */
				table,
				td {
					mso-table-lspace: 0pt !important;
					mso-table-rspace: 0pt !important;
				}

				/* What it does: Fixes webkit padding issue. */
				table {
					border-spacing: 0 !important;
					border-collapse: collapse !important;
					table-layout: fixed !important;
					margin: 0 auto !important;
				}

				/* What it does: Uses a better rendering method when resizing images in IE. */
				img {
					-ms-interpolation-mode:bicubic;
				}

				/* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
				a {
					text-decoration: none;
				}

				/* What it does: A work-around for email clients meddling in triggered links. */
				*[x-apple-data-detectors],  /* iOS */
				.unstyle-auto-detected-links *,
				.aBn {
					border-bottom: 0 !important;
					cursor: default !important;
					color: inherit !important;
					text-decoration: none !important;
					font-size: inherit !important;
					font-family: inherit !important;
					font-weight: inherit !important;
					line-height: inherit !important;
				}

				/* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
				.a6S {
					display: none !important;
					opacity: 0.01 !important;
				}

				/* What it does: Prevents Gmail from changing the text color in conversation threads. */
				.im {
					color: inherit !important;
				}

				/* If the above doesn't work, add a .g-img class to any image in question. */
				img.g-img + div {
					display: none !important;
				}

				/* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
				/* Create one of these media queries for each additional viewport size you'd like to fix */

				/* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
				@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
					u ~ div .email-container {
						min-width: 320px !important;
					}
				}
				/* iPhone 6, 6S, 7, 8, and X */
				@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
					u ~ div .email-container {
						min-width: 375px !important;
					}
				}
				/* iPhone 6+, 7+, and 8+ */
				@media only screen and (min-device-width: 414px) {
					u ~ div .email-container {
						min-width: 414px !important;
					}
				}

				</style>

				<!-- CSS Reset : END -->

				<!-- Progressive Enhancements : BEGIN -->
				<style>

				.primary{
					background: #0d0cb5;
				}
				.bg_white{
					background: #ffffff;
				}
				.bg_light{
					background: #fafafa;
				}
				.bg_black{
					background: #000000;
				}
				.bg_dark{
					background: rgba(0,0,0,.8);
				}
				.email-section{
					padding:2.5em;
				}

				/*BUTTON*/
				.btn{
					padding: 5px 15px;
					display: inline-block;
				}
				.btn.btn-primary{
					border-radius: 5px;
					background: #0d0cb5;
					color: #ffffff;
				}
				.btn.btn-white{
					border-radius: 5px;
					background: #ffffff;
					color: #000000;
				}
				.btn.btn-white-outline{
					border-radius: 5px;
					background: transparent;
					border: 1px solid #fff;
					color: #fff;
				}

				h1,h2,h3,h4,h5,h6{
					font-family: 'Poppins', sans-serif;
					color: #000000;
					margin-top: 0;
				}

				body{
					font-family: 'Poppins', sans-serif;
					font-weight: 400;
					font-size: 15px;
					line-height: 1.8;
					color: rgba(0,0,0,.4);
				}

				a{
					color: #0d0cb5;
				}

				table{
				}
				/*LOGO*/

				.logo h1{
					margin: 0;
				}
				.logo h1 a{
					color: #000000;
					font-size: 20px;
					font-weight: 700;
					text-transform: uppercase;
					font-family: 'Poppins', sans-serif;
				}

				.navigation{
					padding: 0;
				}
				.navigation li{
					list-style: none;
					display: inline-block;;
					margin-left: 5px;
					font-size: 13px;
					font-weight: 500;
				}
				.navigation li a{
					color: rgba(0,0,0,.4);
				}

				/*HERO*/
				.hero{
					position: relative;
					z-index: 0;
				}
				.hero .overlay{
					position: absolute;
					top: 0;
					left: 0;
					right: 0;
					bottom: 0;
					content: '';
					width: 100%;
					background: #000000;
					z-index: -1;
					opacity: .3;
				}
				.hero .icon{
				}
				.hero .icon a{
					display: block;
					width: 60px;
					margin: 0 auto;
				}
				.hero .text{
					color: rgba(255,255,255,.8);
				}
				.hero .text h2{
					color: #ffffff;
					font-size: 30px;
					margin-bottom: 0;
				}


				/*HEADING SECTION*/
				.heading-section {
				}
				.heading-section h2{
					color: #000000;
					font-size: 20px;
					margin-top: 0;
					line-height: 1.4;
					font-weight: 700;
					text-transform: uppercase;
				}
				.heading-section .subheading{
					margin-bottom: 20px !important;
					display: inline-block;
					font-size: 13px;
					text-transform: uppercase;
					letter-spacing: 2px;
					color: rgba(0,0,0,.4);
					position: relative;
				}
				.heading-section .subheading::after{
					position: absolute;
					left: 0;
					right: 0;
					bottom: -10px;
					content: '';
					width: 100%;
					height: 2px;
					background: #0d0cb5;
					margin: 0 auto;
				}

				.heading-section-white{
					color: rgba(255,255,255,.8);
				}
				.heading-section-white h2{
					font-family: 
					line-height: 1;
					padding-bottom: 0;
				}
				.heading-section-white h2{
					color: #ffffff;
				}
				.heading-section-white .subheading{
					margin-bottom: 0;
					display: inline-block;
					font-size: 13px;
					text-transform: uppercase;
					letter-spacing: 2px;
					color: rgba(255,255,255,.4);
				}


				.icon{
					text-align: center;
				}
				.icon img{
				}


				/*SERVICES*/
				.services{
					background: rgba(0,0,0,.03);
				}
				.text-services{
					padding: 10px 10px 0; 
					text-align: center;
				}
				.text-services h3{
					font-size: 16px;
					font-weight: 600;
				}

				.services-list{
					padding: 0;
					margin: 0 0 20px 0;
					width: 100%;
					float: left;
				}

				.services-list img{
					float: left;
				}
				.services-list .text{
					width: calc(100% - 60px);
					float: right;
				}
				.services-list h3{
					margin-top: 0;
					margin-bottom: 0;
				}
				.services-list p{
					margin: 0;
				}

				/*BLOG*/
				.text-services .meta{
					text-transform: uppercase;
					font-size: 14px;
				}

				/*TESTIMONY*/
				.text-testimony .name{
					margin: 0;
				}
				.text-testimony .position{
					color: rgba(0,0,0,.3);

				}


				/*VIDEO*/
				.img{
					width: 100%;
					height: auto;
					position: relative;
				}
				.img .icon{
					position: absolute;
					top: 50%;
					left: 0;
					right: 0;
					bottom: 0;
					margin-top: -25px;
				}
				.img .icon a{
					display: block;
					width: 60px;
					position: absolute;
					top: 0;
					left: 50%;
					margin-left: -25px;
				}



				/*COUNTER*/
				.counter{
					width: 100%;
					position: relative;
					z-index: 0;
				}
				.counter .overlay{
					position: absolute;
					top: 0;
					left: 0;
					right: 0;
					bottom: 0;
					content: '';
					width: 100%;
					background: #000000;
					z-index: -1;
					opacity: .3;
				}
				.counter-text{
					text-align: center;
				}
				.counter-text .num{
					display: block;
					color: #ffffff;
					font-size: 34px;
					font-weight: 700;
				}
				.counter-text .name{
					display: block;
					color: rgba(255,255,255,.9);
					font-size: 13px;
				}


				/*FOOTER*/

				.footer{
					color: rgba(255,255,255,.5);

				}
				.footer .heading{
					color: #ffffff;
					font-size: 20px;
				}
				.footer ul{
					margin: 0;
					padding: 0;
				}
				.footer ul li{
					list-style: none;
					margin-bottom: 10px;
				}
				.footer ul li a{
					color: rgba(255,255,255,1);
				}


				@media screen and (max-width: 500px) {

					.icon{
						text-align: left;
					}

					.text-services{
						padding-left: 0;
						padding-right: 20px;
						text-align: left;
					}

				}
				</style>

				</head>

				<body>
					<div class="container" style="background-color: aliceblue;">
						<table class="table">
							<td width="40%" class="logo" style="text-align: left;">
								<h1><a href="#">Coding University</a></h1>
							</td>
							<td style="text-align: right;" class="logo">
								<ul class="navigation">
									<li style="padding-right:30px;"><a href="http://david.knowledge27.webfactional.com/college/index.php">Home</a></li>
									<li style="padding-right:30px;"><a href="http://david.knowledge27.webfactional.com/college/register.php">Register</a></li>
									<li style="padding-right:0px;"><a href="http://david.knowledge27.webfactional.com/college/login.php">Log In</a></li>
								</ul>
							</td>
						</table>

						<div style="background-image: url('http://david.knowledge27.webfactional.com/college/images/blog-2.jpg'); background-size: 100%; padding-bottom: 500px; background-repeat: no-repeat; background-color: #000000;">		
							<div class="text" style="padding: 300px 3em; text-align: center; color:white">
								<h2 style="color:white">We Will Teach You Web Development</h2>
								<p>Thank you for enrolling, $firstname. Your temporary password is Your temporary password is: $password.</p>
								<p>You will learn everything you need to know about coding and web development!</p>
								<div class="icon" style="text-align:center">
									<a href="http://david.knowledge27.webfactional.com/college/login.php" style="color:orange">Log In</a>
								</div>
							</div>
						</div>
					</div>
				
				</body>
			</html>

			EOT;

			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: <webmaster@example.com>' . "\r\n";
			$headers .= 'Cc: ' . "\r\n";

			mail($to,$subject,$message,$headers);
	
		} else {
			echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
		}		
		}	
		}
		
	?>
                
<div class="container" style="color:black; text-align:center; padding-top: 30px; padding-bottom: 50px;">
    <h1>Thank you very much for registering! We will be in touch soon!</h1>
    
</div>      
	<br>
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

<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();
?>

</body>
</html>