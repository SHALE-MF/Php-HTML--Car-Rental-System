<?php
session_start();
$email = $_POST["email"];
$password = $_POST["password"];

// Create connection
$conn = new mysqli('localhost', 'root', '', 'tcr_db');

// Check connection
if ($conn->connect_error) {
    die("Connection failed  : " .$conn->connect_error);
}
else{
	
	$query = "SELECT * FROM clients where email='$email' and password='$password'";
	
	$results = $conn->query($query);
	$images= mysqli_fetch_assoc($results);
	if(mysqli_num_rows($results)!=0){
		
	
	$userid = $images['userid'];
	
	if($images['role']=="admin"){
	header('location: adminres.php');}
	else{
	if(mysqli_num_rows($results)==1){
		$_SESSION['userid']=$userid;
		$_SESSION['password']=$password;
	header('location: rental.php');}
	}
	}
	else{
		echo "incorrect password and/or email please try again";
		
		?>
		<a type="button" href="login.html "/>GO BACK</a>;
		<?php
}}

?>


