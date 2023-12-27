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
<title>View Sponsers</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="form">
<h2>View Sponsers Details</h2>
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
while($row = mysqli_fetch_assoc($rslt)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["name"]; ?></td>
<td align="center"><?php echo $row["Occ"]; ?></td>
<td align="center"><?php echo $row["ad"]; ?></td>
<td align="center"><?php echo $row["ph"]; ?></td>
<td align="center"><?php echo $row["amt"]; ?></td>
</tr>
<?php $count++; } ?>
</tbody>
<a href="admin.php">Back</a>
</table>
</div>
</body>
</html>