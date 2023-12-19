<?php
session_start();
$conn = new mysqli('localhost','root','','tcr_db');
			$reservationid = $_POST['reservationid'];
			$query = "UPDATE reservations SET collected = 'YES' WHERE reservationid= '$reservationid'";
			$query1 = "UPDATE reservations SET collecteddate = CURRENT_DATE() WHERE reservationid= '$reservationid'";
			$result1 = $conn->query($query1);
			
			header('location: adminres.php');

		
		
	
?>