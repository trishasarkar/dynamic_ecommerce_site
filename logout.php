<?php require 'connection.php' ?>
<?php
// Initialize the session
//session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
mysqli_close($connect);
// Redirect to login page
header("location: initial.html");
exit;
?>