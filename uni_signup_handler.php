<?php 

$uni_name="";
$uni_email="";
$uni_email2="";
$uni_password="";
$uni_password2="";
$error_array=array();


if(isset($_POST['uni_register'])){


	//name
    $uni_name = strip_tags($_POST['uni_name']);  
    $uni_name = str_replace(" ", "",$uni_name); 
    $uni_name = ucfirst(strtolower($uni_name));
    $_SESSION['uni_name'] = $uni_name;


    //email
    $uni_email = strip_tags($_POST['uni_email']); 
    $uni_email = str_replace(" ", "", $uni_email); 
    $uni_email = ucfirst(strtolower($uni_email));
    $_SESSION['uni_email'] = $uni_email;


    //confirmemail
    $uni_email2 = strip_tags($_POST['uni_email2']); 
    $uni_email2 = str_replace(" ", "", $uni_email2); 
    $uni_email2 = ucfirst(strtolower($uni_email2));
    $_SESSION['uni_email2'] = $uni_email2;

    //password
    $uni_password = strip_tags($_POST['uni_password']);
     $_SESSION['uni_password'] = $uni_password;


    //confirm password
    $uni_password2 = strip_tags($_POST['uni_password2']);
     $_SESSION['uni_password2'] = $uni_password2;



//////////////////////////////////////////////////////////////Email/////////////////////////////////////////////////////////
 if ($uni_email == $uni_email2) {

        if (filter_var($uni_email, FILTER_VALIDATE_EMAIL)) {

            $uni_email = filter_var($uni_email, FILTER_VALIDATE_EMAIL); 

            //check if email already exists
            $e_check = mysqli_query($con, "SELECT email FROM unviersity WHERE email = '$uni_email'");

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

     if ($uni_email != $uni_email2) {

        array_push($error_array, "Your passwords don't match");

    } else {
        if (preg_match('/[^A-Za-z0-9]/', $uni_password)) {                   //checks if there are alphabets and numerals only

            array_push($error_array, "Your password can only contain english characters or numbers");


        }
    }

    if (strlen($uni_password) > 30 || strlen($uni_password) < 8) {                       //checks the length of the string

        array_push($error_array, "Your password must be in between 8 and 30 characters");

    }

     if(empty($error_array)){

        $uni_password = password_hash($uni_password, PASSWORD_DEFAULT); //ecrypting password before sending it to database

      $query = mysqli_query($con, "INSERT INTO unviersity VALUES ('','$uni_name','$uni_email','$uni_password')");

          	array_push($error_array, "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>");

             $_SESSION['uni_name'] = "";
             $_SESSION['uni_email'] = "";
             $_SESSION['uni_password'] = "";
             $_SESSION['uni_email2'] = "";
            
          }

}
?>