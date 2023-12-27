 <?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $rn = $_POST['rn'];

   $select = " SELECT * FROM user WHERE email = '$email' && rn = '$rn' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['role'] == 'admin'){

         $_SESSION['email'] = $row['email'];
		 $_SESSION['rn'] = $row['rn'];
         header('location:admin.php');

      }elseif($row['role'] == 'user'){

         $_SESSION['email'] = $row['email'];
		 $_SESSION['rn'] = $row['rn'];
         header('location:user.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style-1.css">

</head>
<body>
   
   <div class="form-container">

   <form action="" method="post">

	<div>
            <img src="images/bg.png" width="300" style="text-align: center;" height="208" onmousedown="return false;"  />
        </div><br><br>
      
	 
		<h3>Login</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
        };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="rn" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <label for="register">Don't have an accound?<a href="r.php">Register</a></label>
      
   </form>

</div>

</body>
</html>