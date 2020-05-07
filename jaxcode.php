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

	

	

	
	<div class="container" style="color:black">
		<form action="registered.php" method="POST" enctype="multipart/form-data">
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
							<input type="tel" class="form-control" id="phone" name="phone" minlength="10" maxlength="10" placeholder="ten-digit phone number (no dashes)" pattern="^\d{10}$" value="<?
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
							<input type="number" class="form-control" id="postalcode" name="postalcode" minlength="5" maxlength="9" value="<?
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
					<td>
						<div class="form-group">
							<label for="comment">Notes / Special Needs:</label>
							<textarea class="form-control" rows="5" name="comment" id="comment" style="float:left" maxlength="500" value="
							<?if(isset($_SESSION['comment'])) {echo $_SESSION['comment'];}?>"></textarea>
						</div>
					</td>
				</tr>
			</table>
				<label for="image">Upload Image:</label><br>
				<input type="file" name="fileToUpload" id="fileToUpload" ><br><br>
			<br>
			<h1>Course Catalog</h1>					
			<!-- <div class="home">
				<div class="home_background_container prlx_parent">
					<div class="home_background prlx" style="background-image:url(images/courses_background.jpg)">
				</div>
			</div>
			<div class="home_content">
				<h1>Course Catalog</h1>
			</div> -->
			<br>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>Select</th>
							<th>Course ID</th>
							<th>Course Name</th>
							<th>Description</th>
							<th>Day and Time</th>
							<th>Instructor</th>
							<th>Credits</th>
							<th>Cost</th>
							<th>Status</th>
						</tr>
					</thead>
					<?
					include '/home/knowledge27/.function.php';

						$sql = "SELECT * FROM college_courses";
						$result = mysqli_query($conn, $sql);
						
						if (mysqli_num_rows($result) > 0) {
						// output data of each row
						while($row = mysqli_fetch_assoc($result)) {
					?>
					<tbody> 
						<tr>
							<td>
								<div class="custom-checkbox">
									<input type="checkbox" id="course_id" name="course_id[]" value="<?=$row['course_id']?>" 
									<?
										if(isset($_SESSION['course_id'])) {
										foreach($_SESSION['course_id'] as $enrolled) {
										if($row['course_id'] == $enrolled) { 
											echo 'checked'; }
										}
										}
									?>>
								</div>
							</td>
							
							<td><?=$row['course_id'];?></td>
							<td><?=$row['coursename'];?></td>
							<td><?=$row['description'];?></td>
							<td><?=$row['day_time'];?></td>
							<td><?=$row['instructor'];?></td>
							<td><?=$row['credits'];?></td>
							<td>$<?=$row['cost'];?></td>
							<td><?=$row['status'];?></td>
						</tr>
					</tbody>
					<?
						}
						} else {
							echo "0 results";
						}
						$conn->close();
					?>
				</table>
			</div>
			<div class="checkbox">
  				<label><input type="checkbox" value="" required> I agree to the terms and conditions of enrollment.</label>
			</div><br>
			<br>
			<button type="submit" class="btn btn-primary" name="submit">Submit</button>
		</form>
	</div><br>
	<!-- Popular -->

	



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