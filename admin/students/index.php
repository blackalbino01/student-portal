<?php require "../../config/students.php";
	if (isset($_POST['admstatus'])) {
		$admstatus = $_POST['admstatus'];
		$id = $_GET['id'];


		$update = new Student();
		$update->editAdmstatus($admstatus,$id);
	}

    if (isset($_GET['id'])) {
        $student = new Student();
        $result = $student->viewStudent($_GET['id']);
    } else {
        echo "Something went wrong!";
        exit;
    } ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no initial-scale=1.0">
	<title>Portal - Student Infromation</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
</head>
<body>
	<div class="container" style="position: relative;height: 100%;">
		<header>
			<nav>
				<div class="nav-menu flex">
					<div class="logo">
						<h1>
							<a href="../../">USTACKY</a>
						</h1>
					</div>
					<div class="nav-items-student-info flex">
						<a href="../../students/portal">
							Portal
						</a>
						<a href="../dashboard">
							Dashboard
						</a>
						<a href="#">
							Student Information
						</a>
					</div>
				</div>
			</nav>	
		</header>
		<section>
			<div class="content-student-info">
				<div class="info flex">
					<div class="left-info">
						<div class="left-info-img">
							<img src="../../students/images/hussain.jpg">
						</div>
						<p>Name: <?php echo $result['fname'].' '.$result['mname'].' '.$result['lname']; ?></p>
						<div class="status"><p>Status: <span id="updatestatus">Undecided</span></p></div>
					</div>
					<div class="right-info">
						<h3>Personal Information</h3>
						<div class="right-info-items">
							<p>Email: <?php echo $result['email']; ?></p>
							<p>Gender: <?php echo $result['gender']; ?></p>
							<p>Phone Number: <?php echo $result['phone']; ?></p>
							<p>Date Of Birth: <?php echo $result['birthday']; ?></p>
							<p>Address: <?php echo $result['address']; ?></p>
						</div>
					</div>
				</div>
				<div class="other-info">
					<h3>Other Information</h3>
					<div class="other-info-items flex">
						<p>State Of Origin: <?php echo $result['state']; ?></p>
						<p>Local Govt: <?php echo $result['localgovt']; ?></p>
				    </div>
				</div>
				<div class="academic-info">
					<h3>Academics Related Information</h3>
					<div class="academic-info-items flex">
						<p>Next Of Kin: <?php echo $result['nextofkin']; ?></p>
						<p>Jamb Score: <?php echo $result['jambscore']; ?></p>
						<p><form method="POST" id="formid" ><input type="checkbox" id="status" name="admstatus" value="Admitted" <?php if($result['admstatus']=="Admitted"){ echo "checked";}?> ></form>Status: Admitted</p>
				    </div>
				</div>
			</div>
		</section>
		<footer>
			<p class="footer">All Right Reserved @Ustacky 2021</p>
		</footer>
	</div>
	<script language="javascript" type="text/javascript" src="../../assets/js/script.js"></script>
</body>
</html>