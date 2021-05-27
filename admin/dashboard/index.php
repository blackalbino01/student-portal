<!DOCTYPE html>
<html style="position: relative;height: 100%">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no initial-scale=1.0">
	<title>Portal - Dashboard</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
</head>
<body style="position: relative;">
	<header>
		<nav>
			<div class="nav-menu flex">
				<div class="logo">
					<h1>
						<a href="../../">USTACKY</a>
					</h1>
				</div>
				<div class="nav-items-dashboard flex">
					<a href="../../students/portal">
						Portal
					</a>
					<a href="../../admin/dashboard">
						Dashboard
					</a>
				</div>
			</div>
		</nav>
	</header>
	<section>
		<div class="content-dashboard">
			<p class="notice">
				<strong>Info!</strong>All Students records table
			</p>
			<form method="GET">
				<div class="dashboard-row flex">
						<div class="col1">
					    	<input type="text" id="search" name="name" placeholder="Search Record By Name Only">
					    </div>
					    <div class="col2">
						    <select name="admstatus">
			                	<option value="" hidden selected>Select Admission Status</option>
			                	<option value="Undecided">Undecided</option>
			                	<option value="Admitted">Admitted</option>
			                </select>
			            </div>
		                <div class="col3">
			                <select name="gender">
			                	<option value="" hidden selected>Select Gender</option>
			                	<option value="male">Male</option>
			                	<option value="female">Female</option>
			                </select>
			            </div>
		                <div class="col4">
		                	<input type="text" name="jambscore" placeholder="Enter Jamb Score">
		                </div>
		                <div class="col5">
		                	<input type="submit" class="search" name="submit" value="Search">
		                </div>
				</div>
			</form>
			<div class="table">
				<table>
					<tr>
						<th>S/n</th>
						<th>Name</th>
						<th>Gender</th>
						<th>Jamb Score</th>
						<th>Admission Status</th>
						<th>Action</th>
					</tr>
					<?php 
						require_once '../../config/students.php';
						if(isset($_GET['submit'])){
							$name = $_GET['name'];
							$admstatus = $_GET['admstatus'];
							$gender = $_GET['gender'];
							$jambscore = $_GET['jambscore'];

							$s = new Student();
							$result = $s->searchStudents($name,$admstatus,$gender,$jambscore);
							$counter = 0;
							if (is_array($result) || is_object($result)){
								foreach ($result as $row) {
									echo "<tr>";
										echo "<td>" .++$counter. "</td>";
										echo "<td>" .$row['fname'].' '.$row['mname'].' '.$row['lname']."</td>";
										echo "<td>" .$row['gender']. "</td>";
										echo "<td>" .$row['jambscore']. "</td>";
										echo "<td>" .$row['admstatus']. "</td>";
										echo "<td><a href=\"../../admin/students?id=".$row['id']."\"><i class=\"fas fa-eye\"></i></a></td>";
									echo "</tr>";
								}
							}

							else{
								echo "<tr>
								<td colspan=6>No Student Record Found!</td>
								</tr>";
							}
						}
						else{

							$d = new Student();
							$result = $d->viewStudents();
							$counter = 0;
							if (is_array($result) || is_object($result))
							{
								foreach ($result as $row){
									echo "<tr>";
										echo "<td>" .++$counter. "</td>";
										echo "<td>" .$row['fname'].' '.$row['mname'].' '.$row['lname']."</td>";
										echo "<td>" .$row['gender']. "</td>";
										echo "<td>" .$row['jambscore']. "</td>";
										echo "<td>" .$row['admstatus']. "</td>";
										echo "<td><a href=\"../students?id=".$row['id']."\"><i class=\"fas fa-eye\"></i></a></td>";
									echo "</tr>";
								}
							}
							else{
								echo "<tr>
								<td colspan=6>No Student Record Found!</td>
								</tr>";
							}
						}
					?>
				</table> 
			</div>
		</div>
	</section>
	<footer>
		<p class="footer">All Right Reserved @Ustacky 2021</p>
	</footer>
</body>
</html>