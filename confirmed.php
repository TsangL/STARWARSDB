<?php

ob_start();//turn on output buffering 
session_start(); //start session variables
ini_set('display_errors', 1); //display all errors

$Auth = 1; //create initial authorization variable for security

require ('includes/dbconnection.php');





$sql = "INSERT INTO Login (UserName, Password, EMail, Auth, News) VALUES('$_SESSION[username]','$_SESSION[password]','$_SESSION[EMail]','$Auth','$_SESSION[News]')"; //insert values, notice the direct use of the session variables

$rs = $conn->Execute($sql); //execute $sql statement

$_SESSION['auth'] = 1; //assign auth value for security or $_SESSION['auth'] = $Auth;
header('Location: index.php'); //redirect user to index.php page
exit(); //use for NN for header to redirect properly

# close the connection
$rs->Close();
$conn->Close();

$rs = null;
$conn = null;
$ob_end_flush;
?>