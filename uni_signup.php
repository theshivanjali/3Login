<?php

require 'dbconfig.php';
require 'uni_signup_handler.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>University SignUp</title>
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-4 form-group mt-5">
				<div class="text-center display-2">
					<h3>University SignUp</h3>
				</div>
			<form method="POST" action="uni_signup.php">
				<input type="text" name="uni_name" class="form-control" placeholder="Enter Name">
			
				<input type="email" name="uni_email" class="form-control" placeholder="Enter Email">

						 <?php if (in_array( "This email already exists", $error_array)){
                                      echo "<p class='text-bold text-center text-danger'>This Email already exists</p>";
                                  }
                                      ?>

                         <?php
						if (in_array( "invalid Format for Email", $error_array)){
                                      echo "<p class='text-bold text-center text-danger'>invalid Format for Email</p>";
                                  }
                          ?>

				<input type="email" name="uni_email2" class="form-control" placeholder="Confirm Email">
                  <?php
						if (in_array( "Emails do not match", $error_array))
                                      echo "<p class=' text-bold text-center text-danger'>Emails do not match</p>";

                 ?>   
				<input type="password" name="uni_password" class="form-control" placeholder="Password">

				        <?php

                        if (in_array("Your password must be in between 5 and 30 characters", $error_array)) {
                          echo "<p class=' text-bold text-center text-danger'>Your password must be in between 5 and 30 characters</p><br>";
                        }
                        if (in_array("Your password can only contain english characters or numbers", $error_array))
                          echo "<p class=' text-bold text-center text-danger'>Your password can only contain english characters or numbers</p>";
                        ?>

				<input type="password" name="uni_password2" class="form-control" placeholder="Confirm Password">

				        <?php
                        if (in_array("Your passwords don't match", $error_array))
                          echo "<p class=' text-bold text-center text-danger'>Your passwords don't match</p>";
                        ?>

				

				<input type="submit" Value="Register" class="btn btn-warning btn-block" name="uni_register">

				<?php if (in_array("<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>", $error_array)) echo "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>"; ?>

				<a href="index.php">Sign in here!</a>

				<br>	
			</form>
			</div>
		</div>
	</div>
</body>
</html>