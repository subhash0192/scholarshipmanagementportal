<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['rn'])){
   header('location:user.php');
}

if($_SESSION['rn']){
	$rn = $_SESSION['rn'];
	$qry="select * from stud where rn='".$rn."' ";
	$result=$conn->query($qry);
	$row=$result->fetch_assoc();
	if($row){
	$id=$row['id'];
	$scholarship=$row['selected_scholarship'];
	$rn=$row['rn'];
	$name=$row['name'];
	$cls=$row['cls'];
	$bnh=$row['bnh'];
	$cn=$row['cn'];
	$mark=$row['mark'];
	$income=$row['income'];
	$dis=$row['dis'];
	$ad=$row['ad'];
	$status=$row['status'];

	$qry1="select * from stud where rn='".$rn."' ";
	$rslt1=$conn->query($qry1);
	$nor=$rslt1->num_rows;

	echo "<html><body><table  border=1 cellpadding=4>
	<thead>
	<tr>
	<th><strong>Application.No</strong></th>
	<th><strong>Applied for</strong></th>
	<th><strong>Name</strong></th>
	<th><strong>RollNumber</strong></th>
	<th><strong>Class</strong></th>
	<th><strong>Branch</strong></th>
	<th><strong>Contact</strong></th>
	<th><strong>Marks</strong></th>
	<th><strong>Income</strong></th>
	<th><strong>Distance</strong></th>
	<th><strong>Address</strong></th>
	<th><strong>Status</strong></th>
	</tr>
	</thead>";
	for ($i=0;$i<$nor;$i++)
	{
		$r=$rslt1->fetch_assoc();
		echo ' <tr>
		<td>'.$id.'</td>
		<td>'.$scholarship.'</td>
		<td>'.$name.'</td>
		<th scope="row">'.$rn.'</th>
		<td>'.$cls.'</td>
		<td>'.$bnh.'</td>
		<td>'.$cn.'</td>
		<td>'.$mark.'</td>
		<td>'.$income.'</td>
		<td>'.$dis.'</td>
		<td>'.$ad.'</td>
		<td>'.$status.'</td>
		</tr>';
	}

	echo "</table></body></html>";
	}
	else
	{
		echo '<script type="text/javascript">alert("Application Details Not Found");
		window.location="user.php";
		</script>';
	}
}
?>

 
   
    
<html>
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="../css/all.min.css">
    
  <style>
        table{
            border-collapse:collapse;
            width:100%;
            color:black;
            background-color:#adb5bd;
            padding-left:20px;
            padding-right:10px;
            border:red;
           
        }
        th{
            text-align:center;
            height:70px;
        }
        td{
            text-align:center;
            height:40px;
        }
        th,td{
            border-bottom:3px solid black;
        }
        tr:hover{background-color:coral;}
       
        body{
            background-color:white;
        }

        th:hover{background-color:red;}
        p{
            background-color:red;
            color:white;
            height:50px;
            width:200px;
        }
        </style>
       
</head>
<body>
    <div><br>
<a style="background-color:red;position:absolute;left:45%;" href="user.php" class="btn btn-success mr-4">Back</a>
    </div>
 <!-- Boostrap JavaScript -->
 <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/all.min.js"></script>

</body>
</html>