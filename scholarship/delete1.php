<?php
$con=new mysqli('localhost','root','','student');
if($con->connect_error)
{
	die("Connection failed:".$con->connect_error);
}

if(isset($_GET['deletern']))
{
	$rn=$_GET['deletern'];
	
	$sql="delete from user where rn='$rn'";
	$rslt=mysqli_query($con,$sql);
	if($rslt)
	{
		echo '<script type="text/javascript">alert("Deleted Successfully");
		window.location="studentdelete.php";
		</script>';
	}
	else
	{
		die("Connection failed:".$con->connect_error);
	}
}

?>