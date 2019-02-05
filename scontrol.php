<?php 

if(isset($_POST['s_login'])){

	 $st_logemail = filter_var($_POST['st_logemail'], FILTER_SANITIZE_EMAIL);

	 $_SESSION['st_logemail'] = $st_logemail;

	 $password_form = $_POST['st_logpassword'];
  
    $check_database_query = mysqli_query($con,"SELECT * FROM student WHERE email = '$st_logemail'");
    
    $row = mysqli_fetch_array($check_database_query);
    
    $passwordHash = $row['password'];

     if(password_verify($password_form, $passwordHash)){

     	 $user_id = $row['id'];
  		
  		 $_SESSION['id'] = $user_id;

  		 //echo $user_id;
  		 //echo $_SESSION['id'];
        header("Location:login_index.php");
        exit();
    }
    else{
    array_push($error_array, "Email or Password is incorrect") ;
    $_SESSION['st_logemail'] = "";
    }
}

?>