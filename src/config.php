<?php
session_start();

// Enable error reporting
error_reporting(-1);              // Report all type of errors
ini_set("display_errors", 1);     // Display all errors  
 
//Inställningar för databas
define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "password");
define("DBDATABASE", "martina");

$conn = mysqli_connect("localhost","root","password","martina") or die("Error connecting to database.");;
$db_connected = mysqli_select_db($conn, "martina"); // Work with the database named 'testrest'

//define('BASE_DIR','');
//define('BASE_PATH',BASE_DIR);
 
spl_autoload_register(
    function ($class){
        include 'classes/' . $class . '.class.php';
    });

$login = new Login($conn);
$user = new User($conn);