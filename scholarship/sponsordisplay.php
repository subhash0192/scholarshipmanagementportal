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
<th><strong>Occupation</strong></th>
<th><strong>Address</strong></th>
<th><strong>Phone Number</strong></th>
<th><strong>Donation</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$qry="Select * from sponser";
$rslt = mysqli_query($con,$qry);
if($rslt)
{
	while($row = mysqli_fetch_assoc($rslt))
	{
		$name=$row['name'];
		$Occ=$row['Occ'];
		$ad=$row['ad'];
		$ph=$row['ph'];
		$amt=$row['amt'];

		echo ' <tr>
		<td>'.$count.'</td>
		<td>'.$name.'</td>
		<td>'.$Occ.'</td>
		<td>'.$ad.'</td>
		<td>'.$ph.'</td>
		<td>'.$amt.'</td>
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