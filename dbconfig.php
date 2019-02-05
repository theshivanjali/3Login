<?php
   
$con = mysqli_connect("localhost", "root", "", "loginsystem"); //checking the connnection

session_start();

if (mysqli_connect_errno()) {

    echo "Failed to connect" . mysqli_connect_errno();

}

?>