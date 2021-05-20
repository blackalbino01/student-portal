<?php
	require "../../config/students.php";
	if (isset($_POST['submit'])) {
	    $uploadimg = $_POST['uploadimg'];
	    $fname = $_POST['fname'];
	    $mname = $_POST['mname'];
	    $lname = $_POST['lname'];
	    $email = $_POST['email'];
	    $birthday = $_POST['birthday'];
	    $gender = $_POST['gender'];
	    $phone = $_POST['phone'];
	    $address = $_POST['address'];
	    $state = $_POST['state'];
	    $localgovt = $_POST['localgovt'];
	    $nextofkin = $_POST['nextofkin'];
	    $jambscore = $_POST['jambscore'];
	    $insert = new Student();
	    $insert->addStudent($uploadimg,$fname,$mname,$lname,$email,$birthday,$gender,$phone,$address,$state,$localgovt,$nextofkin,$jambscore);
	    $_SESSION["flash"] = ["type" => "success", "message" => "Student successfully created"];
	    header("Location:index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no initial-scale=1.0">
	<title>Portal - Portal</title>
	<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
</head>
<body onload = dropDown()>
	<header>
		<nav>
			<div class="nav-menu flex">
				<div class="logo">
					<h1>
						<a href="../../">USTACKY</a>
					</h1>
				</div>
				<div class="nav-items-portal flex">
					<a href="students/portal">
						Portal
					</a>
					<a href="../admin/dashboard">
						Dashboard
					</a>
				</div>
			</div>
		</nav>
	</header>
	<section>
		<div class="content-portal">
			<div class="form-container">
				<p class="title">
					Student Portal Form
				</p>
				<p class="note">
					<i>Please fill in all required information</i> 
				</p>
				<div class="personal-form">
					<h3>Personal Information</h3>
					<form method="post">
		                <div class="row flex">
		                    <div class="col-50">
		                        <label for="uploadimg">Upload Image:</label><br>
		                        <input type="file" id="uploadimg" name="uploadimg" required>
		                    </div>
		                </div>
		                <div class="row flex">
		                	<div class="col-50">
			                	<label for="fname">First Name</label><br>
			                    <input type="text" id="fname" name="fname" placeholder="John" required>	
			                </div>
		                	<div class="col-50">
		                		<label for="mname">Middle Name</label><br>
		                        <input type="text" id="mname" name="mname" placeholder="david">
		                	</div>
		                </div>
		                <div class="row flex">
		                	<div class="col-50">
		                		<label for="lname">Last name</label><br>
		                        <input type="text" id="lname" name="lname" placeholder="Doe" required>
		                	</div>
		                	<div class="col-50">
		                		<label for="email">Email</label><br>
		                        <input type="email" id="email" name="email" placeholder="example@email.com" required>
		                	</div>
		                </div>
		                <div class="row flex">
		                	<div class="col-50">
		                		<label for="birthday">Date of Birth</label><br>
		                        <input type="date" id="birthday" name="birthday" placeholder="yyyy/mm/dd" required>
		                	</div>
		                	<div class="col-50 checkbox">
		                		<label for="male">Male</label>
		                		<input type="radio" id="male" name="gender" value="male">
								<label for="female">Female</label>
								<input type="radio" id="female" name="gender" value="female">
		                	</div>
		                </div>
		                <div class="row flex">
		                	<div class="col-50">
		                		<label for="phone">Phone number</label><br>
		                        <input type="tel" id="phone" name="phone" placeholder="Enter PhoneNumber" required>
		                	</div>
		                	<div class="col-50">
		               		<label for="address">Address</label><br>
								<textarea name="address" placeholder="Enter Address" required></textarea>
		                	</div>
		                </div>
		                <div class="row flex personal-info-lastchild">
		                	<div class="col-50">
		                		<label for="state">State Of Origin</label><br>
		                        <select name="state" id="state"  required>
		                        	<option value="" hidden selected>Select State</option>
		                        </select>
		                	</div>
		                	<div class="col-50">
		                		<label for="state">Local Government</label><br>
		                        <select name="localgovt" id="local" required>
		                        	<option value="" hidden selected>Select Local Government</option>
		                        </select>
		                	</div>
		                </div>
		                <h3>Academics Related Information</h3>
		                <div class="row flex">
		                	<div class="col-50">
		                		<label for="nextofkin">Next Of Kin</label><br>
		                		<input type="text" name="nextofkin" placeholder="Enter Next of Kin" required>
		                	</div>
		                	<div class="col-50">
		                		<label for="jambscore">Jamb Score</label><br>
		                		<input type="number" name="jambscore" required><br>
		                	</div>
		                </div>
	                	<div class="row flex submit">
	                		<input type="submit" name="submit" value="Submit">
	                	</div>
		            </form>
				</div>
			</div>
		</div>
	</section>
	<footer>
		<p class="footer">All Right Reserved @Ustacky 2021</p>
	</footer>
	<script language="javascript" type="text/javascript" src="../../assets/js/script.js"></script>
</body>
</html>