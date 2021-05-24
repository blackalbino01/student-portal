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
					<div class="logo-student-info">
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
				<?php 
					require_once "../../config/students.php";
					if (isset($_GET['id'])) {
				        $student = new Student();
				        $result = $student->viewStudent($_GET['id']);

						echo "<div class=\"info flex\">";
							echo "<div class=\"left-info\">";
								echo "<div class=\"left-info-img\">";
									echo "<img src=\"../../students/images/".$result['uploadimg']."\">";
								echo "</div>";
								echo "<p>Name: ".$result['fname'].' '.$result['mname'].' '.$result['lname']."</p>";
								echo "<div class=\"status\"><p>Status: <span id=\"updatestatus\">Undecided</span></p></div>";
							echo "</div>";
							echo "<div class=\"right-info\">";
								echo "<h3>Personal Information</h3>";
								echo "<div class=\"right-info-items\">";
									echo "<p>Email: ".$result['email']."</p>";
									echo "<p>Gender: ".$result['gender']."</p>";
									echo "<p>Phone Number: ".$result['phone']."</p>";
									echo "<p>Date Of Birth: ".$result['birthday']."</p>";
									echo "<p>Address: ".$result['address']."</p>";
								echo "</div>";
							echo "</div>";
						echo "</div>";
						echo "<div class=\"other-info\">";
							echo "<h3>Other Information</h3>";
							echo "<div class=\"other-info-items flex\">";
								echo "<p>State Of Origin: ".$result['state']."</p>";
								echo "<p>Local Govt: ".$result['localgovt']."</p>";
						    echo "</div>";
						echo "</div>";
						echo "<div class=\"academic-info\">";
							echo "<h3>Academics Related Information</h3>";
							echo "<div class=\"academic-info-items flex\">";
								echo "<p>Next Of Kin: ".$result['nextofkin']."</p>";
								echo "<p>Jamb Score: ".$result['jambscore']."</p>";
								echo "<p><form method=\"POST\" id=\"formid\" action=".$_SERVER['PHP_SELF'].'?id='.$_GET['id']." ><input type=\"checkbox\" id=\"status\" name=\"admstatus\" value=\"Admitted\""; 
								if($result['admstatus']=="Admitted"){ 
									echo "checked";
								}
								echo "></form>Status: Admitted</p>";
						    echo "</div>";
						echo "</div>";


						if($_SERVER["REQUEST_METHOD"] == "POST"){

							if(isset($_POST['admstatus'])){
								$admstatus = $_POST['admstatus'];
								$id = $_GET['id'];


								$update = new Student();
								$update->editAdmstatus($admstatus,$id);
							}
							else{
								$admstatus = 'Undecided';
								$id = $_GET['id'];


								$update = new Student();
								$update->editAdmstatus($admstatus,$id);
							}
							
						}
					}
				?>
			</div>
		</section>
		<footer>
			<p class="footer">All Right Reserved @Ustacky 2021</p>
		</footer>
	</div>
	<script language="javascript" type="text/javascript" src="../../assets/js/script.js"></script>
</body>
</html>