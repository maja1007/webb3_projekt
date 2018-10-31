<?php
error_reporting(E_ERROR | E_PARSE); 
 
 
//Inställningar för databas
define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "password");
define("DBDATABASE", "martina");
 

 
spl_autoload_register(function ($class){include 'classes/' . $class . '.class.php';});


$login = new Login();
$user = new User();