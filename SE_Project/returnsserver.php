<?php

session_start();
$conn = new mysqli('localhost','root','','tcr_db');
			$reservationid = $_POST['reservationid'];
			$carid = $_POST['carid'];
			$total = $_POST['total'];
			$query = "UPDATE `reservations` SET `returned` = 'YES' WHERE `reservationid`= '$reservationid'";
			$query1 = "UPDATE cars SET `availability` = 'YES' WHERE `id`= '$carid'";
			
			$result2 = $conn->query($query1);
			$result = $conn->query($query);
			
			$query2 = "UPDATE reservations SET datereturned = CURRENT_DATE() WHERE reservationid= '$reservationid'";
			$result3 = $conn->query($query2);
			
			$query3 = "UPDATE reservations SET totalcost = $total WHERE reservationid= '$reservationid'";
			$result4 = $conn->query($query3);

			header('location: adminres.php');
?>