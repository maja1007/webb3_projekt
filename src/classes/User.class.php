<?php 
//********************* */ 

// Skapad av:
// Martina Jansson
// Datum: 2018-10-28
// Student Mittuniversitetet, Kurs: DT173G

// **************************/

class User {
 
    private $conn;
 
    /* Connect to database */
    function __construct() {
        $this->conn = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if($this->conn->connect_errno > 0)
        {
            die("Fel vid anslutning: " . $this->conn->connect_error);
        }
    }

    /* Print Out info, only from loggedInUser user */
    public function printUser($loggedInUser){
        $query="SELECT * FROM users WHERE username = '$loggedInUser';";
        $result=$this->conn->query($query);
        $count= 0;

        while ($row=mysqli_fetch_assoc($result)) {
            $count++;
            echo ("<p>" . utf8_encode($row['name']) . "</p>");
            echo ("<p>" . utf8_encode($row['epost']) . "</p>");
            echo ("<p>" . utf8_encode($row['phone']) . "</p>");
        }
    }

}