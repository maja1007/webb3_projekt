<?php
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
$input = json_decode(file_get_contents('php://input'),true);

if($request[0] != "users"){ 
	http_response_code(404);
	exit();
}

// Send return header information
header("Content-Type: application/json; charset=UTF-8");


$conn = mysqli_connect("localhost","root","password","martina") or die("Error connecting to database.");;
$db_connected = mysqli_select_db($conn, "martina"); 
session_start();

// HTTP method implementations of GET, POST, PUT and DELETE
switch ($method){
	case "GET":
		$sql = "SELECT userid, name, username, password, epost, phone, disc FROM users";
		if(isset($request[1])) $sql = $sql . " WHERE userid = " . $request[1] . ";";
		break;
	case "PUT":
		$sql = "UPDATE users SET name = '" . $input['name'] . "', username = '" . $input['username'] . "', password = '" . $input['password'] . "',  epost = '" . $input['epost'] . "', phone = '" . $input['phone'] . "' , disc = '" . $input['disc'] . "' WHERE userid = " . $request[1] . ";";
    	break;
	case "POST":
		$sql = "INSERT INTO users (name, username, password, epost, phone, disc) VALUES ('" . $input['name'] . "', '" . $input['username'] . "', '" . $input['password'] . "', '" . $input['epost'] . "',  '" . $input['phone'] . "', '" . $input['disc'] . "');";
		break;

	case "DELETE":
   		$sql = "DELETE FROM users WHERE userid = " . $request[1] . ";";
   		break;
}

// Always response with json array of Users except for GET /users/userid
	$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

	$harr = [];
	if($method != "GET") $sql = "SELECT userid, name, username, password, epost, phone, disc FROM users";
	$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    while($row = mysqli_fetch_assoc($result)){
			$row_arr['userid'] = $row['userid'];
			$row_arr['name'] = $row['name'];
			$row_arr['username'] = $row['username'];
			$row_arr['password'] = $row['password'];
			$row_arr['epost'] = $row['epost'];
			$row_arr['phone'] = $row['phone'];
			$row_arr['disc'] = $row['disc'];
			array_push($harr,$row_arr);
	}
	mysqli_close($conn);
	
	echo json_encode($harr);