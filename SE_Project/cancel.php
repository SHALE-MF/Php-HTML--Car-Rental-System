<?php
session_start();
$del = $_SESSION['cancel'];
$vehicle = $_SESSION['vehicle'];
$conn = new mysqli('localhost','root','','tcr_db');

//echo "$del";
$query = "DELETE FROM `reservations` WHERE reservationid = '$del' and collected = 'NO'";
			$result = $conn->query($query);
					$query1 = "UPDATE cars SET `availability` = 'YES' WHERE `id`= '$vehicle'";
			
			$result2 = $conn->query($query1);
			$result = $conn->query($query);
header('location: rental.php');




?>