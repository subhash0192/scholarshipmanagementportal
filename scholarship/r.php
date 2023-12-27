<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: black;
        }

        * {
            box-sizing: border-box;
        }

        /* Add your CSS styles here */

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


<?php

$con = mysqli_connect('localhost', 'root', '', 'student');
if ($con->connect_error) {
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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $gn = $_POST['gn'];
    $dob = $_POST['dob'];
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
   
   


    @$con = new mysqli('localhost', 'root', '', 'student');
    if ($con->connect_error) {
        echo '<script>alert("could not connect")</script>';
        exit;
    }
   
    
    if (empty($district_id)) {
        //echo '<script>alert("Please select district");</script>';
        echo '<script>
                setTimeout(function() {
                    alert("Please select district");
                    history.go(-1);
                }, 50);
              </script>';
    } elseif (empty($college)) {
        echo '<script>
        setTimeout(function() {
            alert("Please select college");
            history.go(-1);
        }, 50);
      </script>';
    } elseif (empty($cls) || $cls == 'Select Level') {
        echo '<script>
        setTimeout(function() {
            alert("Please select level");
            history.go(-1);
        }, 50);
      </script>';
    } elseif (empty($course) || $course == 'Select Course') {
        echo '<script>
                setTimeout(function() {
                    alert("Please select course");
                    history.go(-1);
                }, 50);
              </script>';
    } elseif (empty($year) || $year == 'Select Year') {
        echo '<script>
                setTimeout(function() {
                    alert("Please select year");
                    history.go(-1);
                }, 50);
              </script>';
    } elseif (empty($bnh) || $bnh == 'Select Branch') {
        echo '<script>
                setTimeout(function() {
                    alert("Please select branch");
                    history.go(-1);
                }, 50);
              </script>';
    } else {
        $qry = "select * from user where rn=" . $rn . "";
        $rslt = $con->query($qry);
        if ($rslt->num_rows != 0) {
            echo '<script type="text/javascript">alert("already exist");
                    window.location="login.php";
                    </script>';
        }else{
            // Proceed with inserting the record
            $qry = "insert into user values('" . $name . "','" . $fname . "','" . $gn . "','" . $dob . "','" . $email . "','" . $adhar . "'," . $cn . ",'" . $state_id . "','" . $district_id . "','" . $college . "','" . $cls . "','" . $course . "','" . $year . "','" . $bnh . "'," . $rn . ",'" . $role . "')";
            $rslt = $con->query($qry);

           
                echo '<script type="text/javascript">
                        alert("Record inserted");
                        window.location="login.php";
                      </script>';
        
        }
    }

    $con->close();

    
}



?>

<form action="" method="POST">
    <div class="container">

	<h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

	 
      
	 <label for="name"><b>Name</b></label><br></br>
    <input type="text" placeholder="Enter Name" name="name"  id="name" style="height:30px;width:300px;" required><label for="iname" style="color:green;"> (Maximum 60 characters)</label><br></br>
    
    <label for="fname"><b>Father Name</b></label><br></br>
    <input type="text" placeholder="Enter father Name" name="fname" id="name" style="height:30px;width:300px;" required><label for="ifname" style="color:green;"> (Maximum 60 characters)</label><br></br>

	<label for="gn"><b>Gender</b></label><br></br>
    <input type="radio" id="gn" name="gn" value="Male" required>
    <b>Male</b>
    <input type="radio" name="gn" value="Female" required>
    <b>Female</b><br></br>
    
    <label for="dob"><b>Date of Birth</b></label><br></br>
    <input type="date" name="dob" id="dob" style="height:30px;width:300px;" required><br></br>

    <label for="email"><b>Email</b></label><br></br>
    <input type="email" placeholder="Enter Email" name="email" id="email" style="height:40px;width:300px;" required> <label for="iemail" style="color:green;"> (Add personal Email id)</label><br></br>
    
    <label for="adhar"><b>Adhaar Number</b></label><br></br>
    <input type="text" placeholder="Enter Adhaar number" name="adhar" id="adhar" style="height:30px;width:300px;" required><label for="iadhar" style="color:green;"> (Maximum 60 characters)</label><br></br>

    <label for="cn"><b>Contact Number</b></label><br></br>
    <input type="number" placeholder="Enter contact Number" name="cn" id="cn"  min=1000000000 max=9999999999 required style="height:40px;width:300px;"> <label for="icn" style="color:green;"> (Only 10 digits. Do not add +91 country code)</label><br></br>

<label for="state"><b>Select State</b></label><br></br>
        <!-- Hardcoded value for Karnataka -->
        <select name="state" id="state" width="25" style="height:40px;width:300px;">
            <option value="1">Karnataka</option>
        </select><br></br>

        <label for="district"><b>Select District</b></label><br></br>
        <select name="district" width="25" style="height:40px;width:300px;">
            <!-- This will be populated dynamically based on the selected state -->
            <option value="">Select District</option>
            <?php getAllDistricts($con);?>
        </select><br></br>

        <label for="college"><b>Select College</b></label><br></br>
        <select name="college" width="25" style="height:40px;width:300px;">
            <!-- This will be populated dynamically based on the selected district -->
            <option value="">Select College</option>
            <?php getAllColleges($con); ?>
        </select><br></br>

	<label for="level"><b>LEVEL</b></label><br></br>
    <select name="cls" width="25" style="height:40px;width:300px;">
	<option>Select Level</option>
	<option> SSLC</option>
	<option> PUC</option>
	<option> UG</option>
	<option> PG</option>
	</select><br></br>

	<label for="course"><b>COURSE</b></label><br></br>
    <select name="course" width="25" style="height:40px;width:300px;">
	<option>Select Course</option>
	<option> Science</option>
	<option> Commerce</option>
	<option> Arts</option>
	<option> BCA</option>
	<option> Bsc</option>
	<option> BBA</option>
	<option> BCom</option>
	<option> BE</option>
	<option> BTech</option>
	<option> MCA</option>
	<option> MSc</option>
	<option> MBA</option>
	<option> MCom</option>
	<option> ME</option>
	<option> MTech</option>
	<option> Not Applicable</option>
	</select><br></br>

	<label for="year"><b>YEAR</b></label><br></br>
    <select name="year" width="25" style="height:40px;width:300px;">
	<option>Select Year</option>
	<option> I year</option>
	<option> II year</option>
	<option> III year</option>
	<option> IV year</option>
	<option> Not Applicable</option>
	</select><br></br>

	<label for="branch"><b>Branch</b></label><br></br>
    <select name="bnh" width="25" style="height:40px;width:300px;">
	<option>Select Branch</option>
	<option>MCA </option>
	<option> E&E</option>
	<option> E&C</option>
	<option> AI&ML</option>
	<option> CS</option>
	</select><br></br>
    
    <label for="rn"><b>Roll Number</b></label><br></br>
    <input type="number" placeholder="Enter Roll Number" name="rn" id="rn" required  style="height:40px;width:300px;"><br></br>
      

    <label for="role"><b>Role</b></label><br></br>
    <select name="role" width="25" style="height:40px;width:300px;">
	<option>user</option>
	<option disabled>admin</option>
	</select><br></br>       

        <button type="submit" class="registerbtn" style="height:40px;width:300px;">Register</button><br><br>
        <a href="login.php">Back</a>
    </div>
</form>

</body>
</html>
