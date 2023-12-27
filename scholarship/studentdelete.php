<?php
@$con=new mysqli('localhost','root','','student');
	if($con->connect_error)
	{
		echo '<script>alert("could not connect")</script>';
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<body>
<div class="form">
<table class="table">

<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>S.No</strong></th>
<th><strong>Name</strong></th>
<th><strong>Father name</strong></th>
<th><strong>Gender</strong></th>
<th><strong>Date of Birth</strong></th>
<th><strong>Email</strong></th>
<th><strong>Contact</strong></th>
<th><strong>State</strong></th>
<th><strong>District</strong></th>
<th><strong>College</strong></th>
<th><strong>Level</strong></th>
<th><strong>Course</strong></th>
<th><strong>Year</strong></th>
<th><strong>Branch</strong></th>
<th><strong>Roll Number</strong></th>
<th><strong>Role</strong></th>
<th><strong>Operations</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$qry="Select * from user where not email ='admin@gmail.com'";
$rslt = mysqli_query($con,$qry);
if($rslt)
{
	while($row = mysqli_fetch_assoc($rslt))
	{
		$name=$row['name'];
		$fname=$row['fname'];
		$gn=$row['gn'];
		$dob=$row['dob'];
		$email=$row['email'];
		$cn=$row['cn'];
		$state_id = $row['state']; // Fixed state ID for Karnataka
    	$district_id = $row['district'];
    	$college = $row['college'];
    	$cls = $row['cls'];
    	$course = $row['course'];
    	$year = $row['year'];
    	$bnh = $row['bnh'];
		$rn=$row['rn'];
		$role=$row['role'];
		echo ' <tr>
		<td>'.$count.'</td>
		<td>'.$name.'</td>
		<td>'.$fname.'</td>
		<td>'.$gn.'</td>
		<td>'.$dob.'</td>
		<td>'.$email.'</td>
		<td>'.$cn.'</td>
		<td>'.$state_id.'</td>
		<td>'.$district_id.'</td>
		<td>'.$college.'</td>
		<td>'.$cls.'</td>
		<td>'.$course.'</td>
		<td>'.$year.'</td>
		<td>'.$bnh.'</td>
		<th scope="row">'.$rn.'</th>
		<td>'.$role.'</td>
		<td>
		<button class="btn btn-primary"><a href="delete1.php?deletern='.$rn.'" class="text-light">Delete</a></button>
		</td>
		</tr>';
		$count++;
	}
}
 ?>
</tbody>
</table>

</div>
<a href="admin.php" class="btn btn-primary">Back</a>
</body>
</html>