
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

	$name = $_GET['name'];

	$s = new Student();
	$result = $s->searchWithName($name);
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

?>	