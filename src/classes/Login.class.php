<?php 
//********************* */ 

// Skapad av:
// Martina Jansson
// Datum: 2018-10-28
// Student Mittuniversitetet, Kurs: DT173G

// **************************/
 
class Login {


    /* Connect to database */
    public $conn;

    public function __construct(){
        $this->conn = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);

        if(mysqli_connect_errno()) {
            echo "Error: Could not connect to database.";
                exit;
        }
    }



    /* Login */
    public function checkInput($username, $password){

        $username = $this->conn->real_escape_string($username);
        $password = $this->conn->real_escape_string($password);
        $query ="SELECT * FROM users WHERE username = '$username' and password = '$password'";
        $result = $this->conn->query($query);
        mysqli_query($this->conn, $query);
        if(mysqli_num_rows($result) > 0){
            header("Location: home.php");
        }
        else {
            header("Location: error.php");
        }
        mysqli_close($conn);
    }
}