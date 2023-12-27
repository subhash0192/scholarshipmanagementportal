<?php
	$name=$_POST['name'];
	$Occ=$_POST['Occ'];
	$ad=$_POST['ad'];
	$ph=$_POST['ph'];
	$amt=$_POST['amt'];
	@$con=new mysqli('localhost','root','','student');
	if($con->connect_error)
	{
		echo '<script>alert("could not connect")</script>';
		exit;
	}
	$qry="insert into sponser values('".$name."','".$Occ."','".$ad."',".$ph.",".$amt.")";
	$rslt=$con->query($qry);
	echo '<script type="text/javascript">alert("Added Successfully");
		window.location="admin.php";
		</script>';
	$con->close();
?>
