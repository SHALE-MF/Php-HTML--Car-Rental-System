<?php

$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$username = $_POST["username"];
$email = $_POST["email"];
$dlicence = $_POST["dlicence"];
$idnumber = $_POST["idnumber"];
$district = $_POST["district"];
$dob = $_POST["dob"];
$password = $_POST["password"];
$number = $_POST["number"];

// Create connection
$conn = new mysqli('localhost', 'root', '', 'tcr_db');

// Check connection
if ($conn->connect_error) {
    die("Connection failed  : " .$conn->connect_error);
}
else{
	$stmt = $conn->prepare("insert into clients(firstname, lastname, username, email, idnumber, dlicence, district, dob, password, number) value(?,?,?,?,?,?,?,?,?,?)");
	$stmt->bind_param( "ssssssssss" ,$firstName, $lastName, $username, $email, $idnumber, $dlicence, $district, $dob, $password, $number);
	
	$stmt->execute();
	
	header('location: login.html');
	
	$stmt->close();
	$conn->close();
}
?>


