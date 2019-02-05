<?php 
require 'dbconfig.php';

if (isset($_SESSION['id'])){

    $userLoggedIn = $_SESSION['id'];

    $user_detailed_query = mysqli_query($con, "SELECT * FROM unviersity WHERE u_id = '$userLoggedIn'"); 

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
						echo $user['name'];
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
						<h3>List Of Students</h3>
						<hr>
				</div>
				</div>
				<div>
					<table class="table">
						<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>College</th>
							<th>Modify</th>
						</tr>
						</thead>
						<tbody>
					
					<?php

						$list = mysqli_query($con, "SELECT * FROM student");

						if (mysqli_num_rows($list) > 0) {
   							 while($row = mysqli_fetch_assoc($list)) 
   							 {

       						 echo "<tr><td>".$row['fname'].' '.$row['lname']."</td>";
       						 echo "<td>".$row['email']."</td>";
       						 echo "<td>".$row['college']."</td>";
       						 echo "<td>"."<a href='#' class='btn btn-danger'>Delete</a>"."</td></tr>";
   								 
   								 }
								} else {
   									 echo "No record";
							}


					 ?>
					 </tbody>
					 </table>
				</div>	
				
			</div>

			<div class="container">
				<div class="row">
					<div class="col-12 text-center mt-5">
						<h3>List Of Mentors</h3>
						<hr>
				</div>
				</div>
				<div>
					<table class="table">
						<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Modify</th>
						</tr>
						</thead>
						<tbody>
					
					<?php

						$list = mysqli_query($con, "SELECT * FROM mentor");

						if (mysqli_num_rows($list) > 0) {
   							 while($row = mysqli_fetch_assoc($list)) 
   							 {

       						 echo "<tr><td>".$row['name']."</td>";
       						 echo "<td>".$row['email']."</td>";
       						 echo "<td>"."<a href='#' class='btn btn-danger'>Delete</a>"."</td></tr>";
   								 
   								 }
								} else {
   									 echo "No record";
							}


					 ?>
					 </tbody>
					 </table>
				</div>	
				
			</div>

</body>
</html>