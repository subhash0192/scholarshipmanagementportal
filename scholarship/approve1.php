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
<th><strong>ID</strong></th>
<th><strong>Applied for</strong></th>
<th><strong>Name</strong></th>
<th><strong>Adhaar</strong></th>
<th><strong>Roll Number</strong></th>
<th><strong>Class</strong></th>
<th><strong>Branch</strong></th>
<th><strong>Number</strong></th>
<th><strong>Marks</strong></th>
<th><strong>Income</strong></th>
<th><strong>Distance</strong></th>
<th><strong>Address</strong></th>
<th><strong>Status</strong></th>
<th><strong>Documents</strong></th>

</tr>
</thead>
<tbody>
<?php
$count=1;
$qry="SELECT user.rn, user.name, user.cls,user.adhar,stud.bnh,stud.cn,stud.mark,stud.dis,stud.ad,stud.status,stud.income,stud.id,stud.file_name,stud.selected_scholarship
FROM user
INNER JOIN stud ON user.rn=stud.rn";
$rslt = mysqli_query($con,$qry);
if($rslt)
{
	while($row = mysqli_fetch_assoc($rslt))
	{
		$id=$row['id'];
		$scholarship=$row['selected_scholarship'];
		$name=$row['name'];
		$adhar=$row['adhar'];
		$rn=$row['rn'];
		$cls=$row['cls'];
		$bnh=$row['bnh'];
		$cn=$row['cn'];
		$mark=$row['mark'];
		$income=$row['income'];
		$dis=$row['dis'];
		$ad=$row['ad'];
		$status=$row['status'];
		$fileName = $row['file_name'];

		$filePath = "pdf_files/" . $fileName;

		echo ' <tr>
		<td>' . $count . '</td>
		<td>' . $id . '</td>
		<td>' .$scholarship. '</td>
		<td>' . $name . '</td>
		<td>' . $adhar . '</td>
		<th scope="row">' . $rn . '</th>
		<td>' . $cls . '</td>
		<td>' . $bnh . '</td>
		<td>' . $cn . '</td>
		<td>' . $mark . '</td>
		<td>' . $income . '</td>
		<td>' . $dis . '</td>
		<td>' . $ad . '</td>
		<td>' . $status . '</td>
		<td>
			<a href="view_pdf.php?rn=' . $rn . '" target="_blank">View PDF</a>
		</td>
	
		</tr>';
		$count++;
	}
}
 ?>
</tbody>
</table>
<div class="text-center">
	<button onclick="window.print()" class="btn btn-primary">Print</button>
</div>

</div>
<a href="admin.php" class="btn btn-primary">Back</a>

<p>click here to approve or reject applications</p>
<button name="approve" ><a href="approve2.php">Click here</a></button>
	
</body>
</html>