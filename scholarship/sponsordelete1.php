<?php
$con=new mysqli('localhost','root','','student');
if($con->connect_error)
{
	die("Connection failed:".$con->connect_error);
}

if(isset($_GET['deleteph']))
{
	$ph=$_GET['deleteph'];
	
	$sql="delete from sponser where ph=$ph";
	$rslt=mysqli_query($con,$sql);
	if($rslt)
	{
		echo '<script type="text/javascript">alert("Deleted Successfully");
		window.location="sponsordelete.php";
		</script>';
	}
	else
	{
		die("Connection failed:".$con->connect_error);
	}
}

?>