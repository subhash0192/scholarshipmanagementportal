<?php
	$date=$_POST['date'];
	$msg=$_POST['msg'];
	@$con=new mysqli('localhost','root','','student');
	if($con->connect_error)
	{
		echo '<script>alert("could not connect")</script>';
		exit;
	}
	$qry="insert into notification values('".$date."','".$msg."')";
	$rslt=$con->query($qry);
	echo '<script type="text/javascript">alert("Message Sent");
		window.location="admin.php";
		</script>';
	$con->close();
?>