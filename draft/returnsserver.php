<?php

session_start();
$e = $_SESSION['papa'];

$conn = new mysqli('localhost','root','','tcr_db');
			$reservationid = $_POST['reservationid'];
			$carid = $_POST['carid'];
			$query = "UPDATE `reservations` SET `returned` = 'YES' WHERE `reservationid`= '$reservationid'";
			$query1 = "UPDATE cars SET `availability` = 'YES' WHERE `id`= '$carid'";
			
			$result2 = $conn->query($query1);
			$result = $conn->query($query);

			header('location: adminres.php');



?>