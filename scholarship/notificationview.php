<?php
@$con=new mysqli('localhost','root','','student');
	if($con->connect_error)
	{
		echo '<script>alert("could not connect")</script>';
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>View Notification</title>

   <!-- custom css file link  -->
   <!<link rel="stylesheet" href="view.css">
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   
   <div class="form-container">

   <form action="" method="post">
      <h3>Notification</h3>
<?php
$qry="Select * from notification";
$rslt = mysqli_query($con,$qry);
while($row = mysqli_fetch_assoc($rslt)) { ?>
<?php echo $row['date'];?><br></br>
<?php echo $row['msg'];?><br></br>
<?php } ?>


<a href="user.php" class="btn btn-primary">Back</a>
</div>
</body>
</html>
