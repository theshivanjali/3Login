<?php 

$st_fname="";
$st_lname="";
$st_email="";
$st_email2="";
$password="";
$password2="";
$college="";
$error_array=array();


if(isset($_POST['s_register'])){


	//first name
	$st_fname = strip_tags($_POST['st_fname']);  
    $st_fname = str_replace(" ", "", $st_fname); 
    $st_fname = ucfirst(strtolower($st_fname));
    $_SESSION['st_fname'] = $st_fname;

    //last name
    $st_lname = strip_tags($_POST['st_lname']);  
    $st_lname = str_replace(" ", "", $st_lname); 
    $st_lname = ucfirst(strtolower($st_lname));
    $_SESSION['st_lname'] = $st_fname;


    //email
    $st_email = strip_tags($_POST['st_email']); 
    $st_email = str_replace(" ", "", $st_email); 
    $st_email = ucfirst(strtolower($st_email));
    $_SESSION['st_email'] = $st_email;


    //confirmemail
    $st_email2 = strip_tags($_POST['st_email2']); 
    $st_email2 = str_replace(" ", "", $st_email2); 
    $st_email2 = ucfirst(strtolower($st_email2));
    $_SESSION['st_email2'] = $st_email2;

    //password
    $password = strip_tags($_POST['st_password']);
     $_SESSION['st_password'] = $st_password;


    //confirm password
    $password2 = strip_tags($_POST['st_password2']);
     $_SESSION['st_password2'] = $st_password2;


    $college = strip_tags($_POST['clgname']);
     $_SESSION['college'] = $college;

//////////////////////////////////////////////////////////////Email/////////////////////////////////////////////////////////
 if ($st_email == $st_email2) {

        if (filter_var($st_email, FILTER_VALIDATE_EMAIL)) {

            $st_email = filter_var($st_email, FILTER_VALIDATE_EMAIL); 

            //check if email already exists
            $e_check = mysqli_query($con, "SELECT email FROM student WHERE email = '$st_email'");

            //count the number of rows
            $num_rows = mysqli_num_rows($e_check);

            if ($num_rows > 0) {
                array_push($error_array, "This email already exists");
            }

        } else {

            array_push($error_array, "invalid Format for Email");

        }

    } else {
        array_push($error_array, "Emails do not match");
    }

//////////////////////////////////////////////////////////Password///////////////////////////////////////////////////////////////

     if ($password != $password2) {

        array_push($error_array, "Your passwords don't match");

    } else {
        if (preg_match('/[^A-Za-z0-9]/', $password)) {                                    //checks if there are alphabets and numerals only

            array_push($error_array, "Your password can only contain english characters or numbers");


        }
    }

    if (strlen($password) > 30 || strlen($password) < 8) {                       //checks the length of the string

        array_push($error_array, "Your password must be in between 8 and 30 characters");

    }

     if(empty($error_array)){

        $password = password_hash($password, PASSWORD_DEFAULT); //ecrypting password before sending it to database

      $query = mysqli_query($con, "INSERT INTO student VALUES ('','$st_fname','$st_lname','$st_email','$password','$college')");

          	array_push($error_array, "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>");

             $_SESSION['st_fname'] = "";
             $_SESSION['st_lname'] = "";
             $_SESSION['st_email'] = "";
             $_SESSION['st_email2'] = "";
             $_SESSION['college'] = "";
          }

}
?>