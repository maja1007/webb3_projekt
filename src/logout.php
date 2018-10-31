<?php
//********************* */ 

// Skapad av:
// Martina Jansson
// Datum: 2018-10-28
// Student Mittuniversitetet, Kurs: DT173G

// **************************/
?>
<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: index.php");
exit;
?>