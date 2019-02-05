<?php 

require 'dbconfig.php';
require 'sregister.php';
require 'scontrol.php';
require 'mlogin.php';
require 'unilogin.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Campus Recruitment System</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-4 form-group mt-5">
				<div class="text-center display-2">
					<h3>Student Login</h3>
				</div>
			<form method="POST" action="index.php">
				<input type="email" name="st_logemail" class="form-control" placeholder="Enter Email">
				<input type="password" name="st_logpassword" class="form-control" placeholder="Enter Password">
				<?php if (in_array( "Email or Password is incorrect", $error_array)){
                                      echo "<p class='text-bold text-center text-danger'>Email or Password is incorrect</p>";
                                  }
                                      ?>

				<input type="submit" Value="Login" class="btn btn-success btn-block" name="s_login">
				<br>
				<a href="ssignup.php">Sign Up</a>
			</form>
			</div>
			<div class="col-lg-2">
			</div>

			<!-----------------------------Mentor--------------------------------------------------------------------->
			<div class="col-lg-4 form-group mt-5">
				<div class="text-center display-2">
					<h3>Mentor Login</h3>
				</div>
			<form method="POST" action="index.php">
				<input type="email" name="m_email" class="form-control" placeholder="Enter Email">
				<input type="password" name="m_password" class="form-control" placeholder="Enter Password">
				<input type="submit" Value="Login" class="btn btn-success btn-block" name="m_login">
				<br>
				<a href="mentor_sign_up.php">Sign Up</a>
			</form>
			</div>
			<div class="col-lg-2">
			</div>
		</div>

		<!-------------------------------------------Unviersity------------------------------------------------------------->
		<div class="row">
		<div class="col-lg-4 form-group mt-5">
			<div class="text-center display-2">
					<h3>University Login</h3>
				</div>
			<form method="POST" action="index.php">
				<input type="email" name="u_email" class="form-control" placeholder="Enter Email">
				<input type="password" name="u_password" class="form-control" placeholder="Enter Password">
				<input type="submit" Value="Login" class="btn btn-success btn-block" name="u_login">
				<br>
				<a href="uni_signup.php">Sign Up</a>
			</form>
			</div>

		</div>
		</div>
	</div>
</body>
</html>