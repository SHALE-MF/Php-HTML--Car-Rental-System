<?php
session_start();
$conn = new mysqli('localhost','root','','tcr_db');

$vehicle = $_POST['id'];
$user = $_SESSION['userid'];

$_SESSION['vehicle'] =$vehicle ;


			$query = "INSERT INTO `reservations` ( `carid`, `userid`, `date`, `totalcost`) VALUES ('$vehicle', '$user', CURRENT_DATE(), NULL)";
			$query2 = "UPDATE `cars` SET `availability` = 'NO' WHERE `id`= '$vehicle'";
			$result2 = $conn->query($query2);

			$result = $conn->query($query);
	header('location: reservations.php');

?>