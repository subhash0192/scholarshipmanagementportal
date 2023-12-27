<?php
	@$con=new mysqli('localhost','root','','student');
	if($con->connect_error)
	{
		echo '<script>alert("could not connect")</script>';
		exit;
	}

	function getAllDistricts($con) {
		$query = "SELECT * FROM districts";
		$result = $con->query($query);
	
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				echo '<option value="' . $row['district_name'] . '">' . $row['district_name'] . '</option>';
			}
		}
	}
	
	function getAllColleges($con) {
		$query = "SELECT * FROM colleges";
		$result = $con->query($query);
	
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				echo '<option value="' . $row['college_name'] . '">' . $row['college_name'] . '</option>';
			}
		}
	}

	$rn=$_GET['updatern'];
	$qry="select * from user where rn=$rn";
	$rslt=mysqli_query($con,$qry);
	$row=mysqli_fetch_assoc($rslt);
	$name=$row['name'];
	$fname=$row['fname'];
	$gn=$row['gn'];
	$dob=$row['dob'];
	$email=$row['email'];
  $adhar=$row['adhar'];
	$cn=$row['cn'];
	$state_id = $row['state']; // Fixed state ID for Karnataka
    $district_id = $row['district'];
    $college = $row['college'];
    $cls = $row['cls'];
    $course = $row['course'];
    $year = $row['year'];
    $bnh = $row['bnh'];
	$rn=$row['rn'];
	$role=$row['role'];
	
	if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$fname=$_POST['fname'];
	$gn=$_POST['gn'];
	$dob=$_POST['dob'];
	$email = $_POST['email'];
  $adhar = $_POST['adhar'];
    $cn = $_POST['cn'];
    $state_id = 'karnataka'; // Fixed state ID for Karnataka
    $district_id = $_POST['district'];
    $college = $_POST['college'];
    $cls = $_POST['cls'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $bnh = $_POST['bnh'];
    $rn = $_POST['rn'];
    $role = $_POST['role'];
	$qry="Update user set
						name='$name' ,
                        fname='$fname' ,
                        gn='$gn' ,
                        dob='$dob' ,
						email='$email' ,
            adhar='$adhar' ,
						cn='$cn' ,
						state='$state_id' ,
						district='$district_id' ,
						college='$college' ,
						cls='$cls' ,
						course='$course' ,
						year='$year' ,
						bnh='$bnh' ,
                        rn='$rn' ,
                        role='$role' where rn=$rn";
	
$rslt=$con->query($qry);
	if($rslt){
		echo '<script type="text/javascript">alert("Updated successfully");
		window.location="display.php";
		</script>';
	}
	else
	{
		echo "error:",$sql,"<br>",$con->error;
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

<form  method="POST">
  <div class="container">
    <h1>Update</h1>
    <p>Please fill in this form to update data</p>
    <hr>

	 <label for="name"><b>Name</b></label><br></br>
    <input type="text" placeholder="Enter Name" name="name"  id="name" style="height:40px;width:300px;" value="<?php echo "$name"?>"><br></br>
    
    <label for="fname"><b>Father Name</b></label><br></br>
    <input type="text" placeholder="Enter father Name" name="fname" id="name" style="height:40px;width:300px;" value="<?php echo "$fname"?>"><br></br>

	<label for="gn"><b>Gender</b></label><br></br>
    <input type="radio" id="gn" name="gn" value="Male" <?php if($row["gn"]=='Male'){ echo "checked";}?>>
    <b>Male</b>
    <input type="radio" name="gn" value="Female" <?php if($row["gn"]=='Female'){ echo "checked";}?>>
    <b>Female</b><br></br>
    
    <label for="dob"><b>Date of Birth</b></label><br></br>
    <input type="date" name="dob" id="dob" style="height:30px;width:300px;" value=<?php echo $dob;?>><br></br>

	<label for="email"><b>Email</b></label><br></br>
    <input type="email" placeholder="Enter Email" name="email" id="email" style="height:40px;width:300px;" value=<?php echo $email;?>><br></br>
    
    <label for="adhar"><b>Adhaar number</b></label><br></br>
    <input type="text" placeholder="Enter adhar number" name="adhar" id="adhar" style="height:40px;width:300px;" value="<?php echo "$adhar"?>"><br></br>

    <label for="cn"><b>Contact Number</b></label><br></br>
    <input type="number" placeholder="Enter contact Number" name="cn" id="cn"  min=1000000000 max=9999999999 required style="height:40px;width:300px;" value=<?php echo $cn;?>><br></br>
    
	<label for="state"><b>Select State</b></label><br>
    <select name="state" id="state" width="25" style="height:40px;width:300px;">
        <option>Karnataka</option>
	</select><br><br>

    <label for="district"><b>Select District</b></label><br>
    <select name="district" width="25" style="height:40px;width:300px;">
        <option value="">Select District</option>
        <?php
            $districts = getAllDistricts($con, $state);
            foreach ($districts as $district) {
                echo '<option value="' . $district['id'] . '"';
                if ($district['id'] == $selectedDistrict) {
                    echo ' selected';
                }
                echo '>' . $district['name'] . '</option>';
            }
        ?>
    </select><br><br>

        <label for="college"><b>Select College</b></label><br>
        <select name="college" width="25" style="height:40px;width:300px;">
            <option value="">Select College</option>
            <?php
              
                $colleges = getAllColleges($con, $selectedDistrict);
                foreach ($colleges as $college) {
                    echo '<option value="' . $college['id'] . '"';
                    if ($college['id'] == $selectedCollege) {
                        echo ' selected';
                    }
                    echo '>' . $college['name'] . '</option>';
                }
            ?>
        </select><br><br>

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
    
    
    
   
    
   

    <label for="role"><b>Role</b></label><br></br>
    <select name="role" width="25" style="height:40px;width:300px;" value=<?php echo $role;?>>
	<option>user</option>
	<option>admin</option>
	</select><br></br>
  
    <button type="submit" class="registerbtn" name="submit" style="height:40px;width:300px;">Update</button><br></br>
	<button><a href="admin.php">Back</a></button>
  </div>
  
</form>

</body>
</html>




