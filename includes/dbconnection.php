<?php
$db = realpath('database/users.mdb'); //this path is mentioned in the SQL section
$conn = new COM('ADODB.Connection') or exit('Cannot start ADO.'); //The exit() function provides and error if the connection is not made.
$conn->Open("DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=$db");
?>