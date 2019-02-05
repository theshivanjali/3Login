<?php 

if(isset($_POST['u_login'])){

	 $u_email = filter_var($_POST['u_email'], FILTER_SANITIZE_EMAIL);

	 $_SESSION['u_email'] = $u_email;

	 $password_form = $_POST['u_password'];
  
    $check_database_query = mysqli_query($con,"SELECT * FROM unviersity WHERE email = '$u_email'");
    
    $row = mysqli_fetch_array($check_database_query);
    
    $passwordHash = $row['password'];

     if(password_verify($password_form, $passwordHash)){

     	 $user_id = $row['u_id'];
  		
  		 $_SESSION['id'] = $user_id;

  		 //echo $user_id."<br>";
  		// echo $_SESSION['id'];
        header("Location: uni_login_index.php");
        exit();
    }
    else{
    array_push($error_array, "Email or Password is incorrect") ;
    $_SESSION['u_email'] = "";
    }
}

?>