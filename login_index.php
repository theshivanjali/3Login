<?php 
require 'dbconfig.php';

if (isset($_SESSION['id'])){

    $userLoggedIn = $_SESSION['id'];

    $user_detailed_query = mysqli_query($con, "SELECT * FROM student WHERE id = '$userLoggedIn'"); 

    $user = mysqli_fetch_array($user_detailed_query);
}
else {

    echo "Invalid";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Student Login
	</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
		<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link">Hello, <?php 
						echo $user['fname'];
						?></a>
					</li>
					<li class="nav-item" style="margin-left: 80em;">
						<a class="nav-link"  href="logout.php"><i class="fa fa-sign-out"></i>Log Out</a>
					</li>		
				</ul>
			</nav>

			<div class="container">
				<div class="row">
					<div class="col-12 text-center mt-5">
						<h3>Student Details</h3>
						<hr>
				</div>
				</div>
				<div class="row">		
					<div class="col-2 text-center">
						<h4>Name:</h4>
					</div>
					<div class="col-10 text-center">
						<h4><?php echo $user['fname']." ".$user['lname'] ?></h4>
					</div>		
				</div>
				<div class="row">		
					<div class="col-2 text-center">
						<h4>Email:</h4>
					</div>
					<div class="col-10 text-center">
						<h4><?php echo $user['email']?></h4>
					</div>		
				</div>
				<div class="row">		
					<div class="col-2 text-center">
						<h4>College</h4>
					</div>
					<div class="col-10 text-center">
						<h4><?php echo $user['college']?></h4>
					</div>		
				</div>
			</div>

</body>
</html>