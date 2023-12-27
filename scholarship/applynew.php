<?php
@include 'config.php';

session_start();

if(!isset($_SESSION['rn'])){
   header('location:user.php');
}

if($_SESSION['rn']){
$rn = $_SESSION['rn'];
$sql="select * from user where rn='".$rn."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$fname=$row['fname'];
	$gn=$row['gn'];
	$dob=$row['dob'];
	$email=$row['email'];
	$cn=$row['cn'];
  $cls = $row['cls'];
  $course = $row['course'];
  $year = $row['year'];
  $bnh = $row['bnh'];
	$rn=$row['rn'];
if(isset($_POST['submit']))
{
	//$id=$_POST['id']; 
  $scholarship=$_POST['selected_scholarship'];
	$name=$_POST['name'];
	$fname=$_POST['fname'];
	$gn=$_POST['gn'];
	$dob=$_POST['dob'];
	$email = $_POST['email'];
    $cn = $_POST['cn'];
    $cls = $_POST['cls'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $bnh = $_POST['bnh'];
    $rn = $_POST['rn'];
	$mark=$_POST['mark'];
	$income=$_POST['income'];
	$ad=$_POST['ad'];
	$dis=$_POST['dis'];
	$status=isset($row['status']) ? $row['status'] : '';
    $qry="select * from stud where rn=".$rn."";
	$rslt=$conn->query($qry);
	if($rslt->num_rows!=0)
	{
		echo '<script type="text/javascript">alert("response already submit");
			window.location="user.php";
			</script>';
	}
	else
	{
    $status="processing";
		$qry="insert into stud (selected_scholarship, name, fname, gn, dob, email, cn, cls, course, year, bnh, rn, mark, income, ad, dis, status)  values('".$scholarship."','".$name."','" . $fname . "','" . $gn . "','" . $dob . "','" . $email . "'," . $cn . ",'" . $cls . "','" . $course . "','" . $year . "','" . $bnh . "'," . $rn . ",".$mark.",".$income.",'".$ad."',".$dis.",'".$status."')";
			$rslt=$conn->query($qry);
			echo '<script type="text/javascript">alert("Applied successfully");
			window.location="user.php";
			</script>';
	}
}
}
?>
    
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color:black;
  
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: #708090;
  min-height:100vh;
  overflow-y:auto;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

</style>
</head>
<body>

<form action="" method="POST">
  <div class="container">
    <h1>Application</h1>
    <p>Please fill in this form to apply scholarship.</p>
    <hr>

	

    <label for="scholarship"><b>Select Scholarship</b></label><br>
        <select name="selected_scholarship" style="height: 40px; width: 300px;">
            <?php
            // Fetch available scholarships from the database
            $scholarshipQuery = "SELECT scholarship_name FROM scholarships WHERE start_date <= NOW() AND end_date >= NOW()";
            $scholarshipResult = $conn->query($scholarshipQuery);

            if ($scholarshipResult->num_rows > 0) {
                while ($scholarshipRow = $scholarshipResult->fetch_assoc()) {
                    echo "<option value='" . $scholarshipRow['scholarship_name'] . "'>" . $scholarshipRow['scholarship_name'] . "</option>";
                }
            } else {
                echo "<option value='' disabled>No scholarships available</option>";
            }
            ?>
        </select><br><br>
	
	<label for="name"><b>Name</b></label><br></br>
    <input type="text" placeholder="Enter Name" name="name"  id="name" style="height:30px;width:300px;" required value="<?php echo "$name"?>" readonly><br></br>
	
	<label for="fname"><b>Father Name</b></label><br></br>
    <input type="text" placeholder="Enter father Name" name="fname" id="name" style="height:40px;width:300px;" value="<?php echo "$fname"?>"><br></br>

    <label for="gn"><b>Gender</b></label><br></br>
<input type="radio" id="gn" name="gn" value="Male" <?php if($row["gn"]=='Male'){ echo "checked";}?>>
<b>Male</b>
<input type="radio"  name="gn" value="Female" <?php if($row["gn"]=='Female'){ echo "checked";}?>>
<b>Female</b><br></br>

    
    <label for="dob"><b>Date of Birth</b></label><br></br>
    <input type="date" name="dob" id="dob" style="height:30px;width:300px;" value=<?php echo $dob;?>><br></br>

	<label for="email"><b>Email</b></label><br></br>
    <input type="email" placeholder="Enter Email" name="email" id="email" style="height:40px;width:300px;" value=<?php echo $email;?>><br></br>
    
    <label for="cn"><b>Contact Number</b></label><br></br>
    <input type="number" placeholder="Enter contact Number" name="cn" id="cn"  min=1000000000 max=9999999999 required style="height:40px;width:300px;" value=<?php echo $cn;?>><br></br>
  

	<label for="level"><b>Level</b></label><br></br>
    <select name="cls" width="25"  id="cls" style="height:40px;width:300px;">
	<option>Select Class</option>
	<option value="SSLC" <?php if($cls=='SSLC'){ echo "selected";}?>>SSLC</option>
	<option value="PUC" <?php if($cls=='PUC'){ echo "selected";}?>> PUC</option>
	<option value="UG" <?php if($cls=='UG'){ echo "selected";}?>> UG</option>
	<option value="PG" <?php if($cls=='PG'){ echo "selected";}?>> PG</option>
	</select><br></br>

	<label for="course"><b>COURSE</b></label><br>
	<select name="course" id="course" style="height:40px;width:300px;">
    <option>Select Course</option>
    <option value="Science" <?php if($course=='Science'){ echo "selected";}?>>Science</option>
    <option value="Commerce" <?php if($course=='Commerce'){ echo "selected";}?>>Commerce</option>
    <option value="Arts" <?php if($course=='Arts'){ echo "selected";}?>>Arts</option>
    <option value="BCA" <?php if($course=='BCA'){ echo "selected";}?>>BCA</option>
    <option value="Bsc" <?php if($course=='Bsc'){ echo "selected";}?>>BSc</option>
    <option value="BBA" <?php if($course=='BBA'){ echo "selected";}?>>BBA</option>
    <option value="BCom" <?php if($course=='BCom'){ echo "selected";}?>>BCom</option>
    <option value="BE" <?php if($course=='BE'){ echo "selected";}?>>BE</option>
    <option value="BTech" <?php if($course=='BTech'){ echo "selected";}?>>BTech</option>
    <option value="MCA" <?php if($course=='MCA'){ echo "selected";}?>>MCA</option>
    <option value="MSc" <?php if($course=='MSc'){ echo "selected";}?>>MSc</option>
    <option value="MBA" <?php if($course=='MBA'){ echo "selected";}?>>MBA</option>
    <option value="MCom" <?php if($course=='MCom'){ echo "selected";}?>>MCom</option>
    <option value="ME" <?php if($course=='ME'){ echo "selected";}?>>ME</option>
    <option value="MTech" <?php if($course=='MTech'){ echo "selected";}?>>MTech</option>
    <option value="Not Applicable" <?php if($course=='Not Applicable'){ echo "selected";}?>>Not Applicable</option>
	</select><br><br>

	<label for="year"><b>YEAR</b></label><br>
<select name="year" id="year" style="height:40px;width:300px;">
    <option>Select Year</option>
    <option value="I year" <?php if($year=='I year'){ echo "selected";}?>>I year</option>
    <option value="II year" <?php if($year=='II year'){ echo "selected";}?>>II year</option>
    <option value="III year" <?php if($year=='III year'){ echo "selected";}?>>III year</option>
    <option value="IV year" <?php if($year=='IV year'){ echo "selected";}?>>IV year</option>
    <option value="Not Applicable" <?php if($year=='Not Applicable'){ echo "selected";}?>>Not Applicable</option>
</select><br><br>


<label for="branch"><b>Branch</b></label><br></br>
    <select name="bnh" width="25" style="height:40px;width:300px;">
	<option>Select branch</option>
	<option value="MCA" <?php if($bnh=='MCA'){ echo "selected";}?>>MCA </option>
	<option value="E&E" <?php if($bnh=='E&E'){ echo "selected";}?>>E&E</option>
	<option value="E&C" <?php if($bnh=='E&C'){ echo "selected";}?>> E&C</option>
	<option value="AI&ML" <?php if($bnh=='AI&ML'){ echo "selected";}?>>AI&ML</option>
	<option value="CS" <?php if($bnh=='CS'){ echo "selected";}?>> CS</option>
	</select><br></br>


    <label for="rn"><b>Roll Number</b></label><br></br>
    <input type="number" placeholder="Enter Roll Number" name="rn" id="rn" required  style="height:40px;width:300px;" value=<?php echo $rn;?> readonly="true"><br></br>
    
	<label for="mark"><b>Marks</b></label><br></br>
    <input type="number" placeholder="Enter Total Marks" name="mark"  step="any" id="mark" style="height:30px;width:300px;" required><br></br>
	
	
	
	<label for="income"><b>Annual Income</b></label><br></br>
    <input type="number" placeholder="Enter annual income" name="income"  id="income"  style="height:30px;width:300px;" required><br></br>
	
	<label for="Address"><b>Address</b></label><br/>
	<textarea  rows="9" cols="38" name="ad"  id="ad"></textarea><br></br>

	<label for="distance"><b>Distance(km)</b></label><br></br>
    <input type="number" placeholder="Enter distance" name="dis"  id="dis"  style="height:30px;width:300px;" required><br></br>

	
	
	
 
    <button type="submit" name="submit" class="registerbtn" style="height:40px;width:300px;">Submit</button><br></br>
	<button><a href="user.php">Back</a></button>
  </div>
</form>
  </body>
</html>