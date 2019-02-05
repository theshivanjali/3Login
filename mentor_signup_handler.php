<?php 

$mentor_name="";
$mentor_email="";
$mentor_email2="";
$mentor_password="";
$mentor_password2="";
$error_array=array();


if(isset($_POST['mentor_register'])){


	//name
    $mentor_name = strip_tags($_POST['mentor_name']);  
    $$mentor_name = str_replace(" ", "",$mentor_name); 
    $$mentor_name = ucfirst(strtolower($mentor_name));
    $_SESSION['mentor_name'] = $mentor_name;


    //email
    $mentor_email = strip_tags($_POST['mentor_email']); 
    $mentor_email = str_replace(" ", "", $mentor_email); 
    $mentor_email = ucfirst(strtolower($mentor_email));
    $_SESSION['mentor_email'] = $mentor_email;


    //confirmemail
    $mentor_email2 = strip_tags($_POST['mentor_email2']); 
    $mentor_email2 = str_replace(" ", "", $mentor_email2); 
    $mentor_email2 = ucfirst(strtolower($mentor_email2));
    $_SESSION['mentor_email2'] = $mentor_email2;

    //password
    $mentor_password = strip_tags($_POST['mentor_password']);
     $_SESSION['mentor_password'] = $mentor_password;


    //confirm password
    $mentor_password2 = strip_tags($_POST['mentor_password2']);
     $_SESSION['mentor_password2'] = $mentor_password2;



//////////////////////////////////////////////////////////////Email/////////////////////////////////////////////////////////
 if ($mentor_email == $mentor_email2) {

        if (filter_var($mentor_email, FILTER_VALIDATE_EMAIL)) {

            $mentor_email = filter_var($mentor_email, FILTER_VALIDATE_EMAIL); 

            //check if email already exists
            $e_check = mysqli_query($con, "SELECT email FROM mentor WHERE email = '$mentor_email'");

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

     if ($mentor_password != $mentor_password2) {

        array_push($error_array, "Your passwords don't match");

    } else {
        if (preg_match('/[^A-Za-z0-9]/', $mentor_password)) {                                    //checks if there are alphabets and numerals only

            array_push($error_array, "Your password can only contain english characters or numbers");


        }
    }

    if (strlen($mentor_password) > 30 || strlen($mentor_password) < 8) {                       //checks the length of the string

        array_push($error_array, "Your password must be in between 8 and 30 characters");

    }

     if(empty($error_array)){

        $mentor_password = password_hash($mentor_password, PASSWORD_DEFAULT); //ecrypting password before sending it to database

      $query = mysqli_query($con, "INSERT INTO mentor VALUES ('','$mentor_name','$mentor_email','$mentor_password')");

          	array_push($error_array, "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>");

             $_SESSION['mentor_name'] = "";
             $_SESSION['mentor_email'] = "";
             $_SESSION['mentor_password'] = "";
             $_SESSION['mentor_email2'] = "";
            
          }

}
?>