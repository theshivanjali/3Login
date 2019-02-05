<?php 

if(isset($_POST['m_login'])){

	 $m_email = filter_var($_POST['m_email'], FILTER_SANITIZE_EMAIL);

	 $_SESSION['m_email'] = $m_email;

	 $password_form = $_POST['m_password'];
  
    $check_database_query = mysqli_query($con,"SELECT * FROM mentor WHERE email = '$m_email'");
    
    $row = mysqli_fetch_array($check_database_query);
    
    $passwordHash = $row['password'];

     if(password_verify($password_form, $passwordHash)){

     	 $user_id = $row['m_id'];
  		
  		 $_SESSION['id'] = $user_id;

  		 //echo $user_id;
  		 //echo $_SESSION['id'];
        header("Location:mentor_login_index.php");
        exit();
    }
    else{
    array_push($error_array, "Email or Password is incorrect") ;
    $_SESSION['m_email'] = "";
    }
}

?>