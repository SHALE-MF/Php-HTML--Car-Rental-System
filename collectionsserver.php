<?php
session_start();
$e = $_SESSION['nama'];
echo "$e";
$conn = new mysqli('localhost','root','','tcr_db');
			$reservationid = $_POST['reservationid'];
			echo "$reservationid";
			$query = "UPDATE reservations SET collected = 'YES' WHERE reservationid= '$reservationid'";
			$result = $conn->query($query);
			header('location: adminres.php');



?>