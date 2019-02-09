<?php

session_start();
$authorized = false; //initialize authorized variable to false

$_SESSION['username']=$_POST['username'];

$_SESSION['password']=$_POST['Password']; //remember that variables in PHP are case sensitive

$_SESSION['EMail']=$_POST['E-mail']; //Be sure your POST'ed data has the appropriate names

$_SESSION['News']=$_POST['news'];

if ($_SESSION['News']=="0")
{

$_SESSION['News']="Yes";
}
else
{

$_SESSION['News']="NO";
}

require ('includes/dbconnection.php');

$sql = 'SELECT * from Login';

$rs = $conn->Execute($sql);

while (!$rs->EOF) {
if ($rs->Fields["UserName"]->Value==$_SESSION['username']) {
$authorized = true;
} 
$rs->MoveNext();
}



if (!$authorized) {
header('Location: confirmed.php');
exit();
} else {
header('Location: nameAlreadyTaken.php');     //name of username taken page
exit();
}
?>