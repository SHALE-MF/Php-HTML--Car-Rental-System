<?php

session_start();

$conn = new mysqli('localhost','root','','tcr_db');
$user = $_SESSION['userid'];


$vehicle=$_SESSION['vehicle'] ;


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Checkout example · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">



    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }

        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }

       .col-md-3{
        margin-left:400px;}
    </style>


    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container">
    <main>
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="confirmedlogo.jpg" alt="" width="72" height="57">
            <h2>RESERVATION COMPLETED</h2>
            <p class="lead">Your Car is ready for collection.Come to our location along with your <B>ID</B> and <B>driver's licence</B> for validity</p>
        </div>
		<p><b>WARNING:</b>The car will not be given to you without the required documents</p>


        <?php
		$userid = $_SESSION['userid'];
		$sql = "SELECT * FROM reservations where userid='$userid' and returned != 'YES'";
        $result = $conn->query($sql);
        $reservations= mysqli_fetch_assoc($result);
		if(mysqli_num_rows($result)!=0){
		$carid = $reservations['carid'];
		
		
		$res = $reservations['reservationid'];
		$queryy =  "SELECT DATEDIFF(CURRENT_DATE(),(SELECT collecteddate FROM reservations where reservationid='$res')) AS DATEDIFF;";
        $resultt = $conn->query($queryy);
        $ress = mysqli_fetch_assoc($resultt);
        $days = $ress['DATEDIFF']; 

	
        $sql = "SELECT * FROM cars where id='$carid'";
        $result = $conn->query($sql);
        $images= mysqli_fetch_assoc($result);
			
				
					$amount = $images['price'];
				    $amounti=(int)$amount;
					$daysi=(int)$days;
					$total=$daysi*$amounti;
						
        ?>


        <hr class="my-4">

        <div class="col-md-3">
            <div class="card shadow-sm">
                <img src="CARS/<?=$carid?>.jpg">
                <div class="card-body">
                    <p class="card-text">Name:<?= $images['name']?><br>Model:<?=$images['model']?><br><?=$images['cardescription']?><br><?=$images['year']?><br><?=$images['price']?> Per day<br>Amount due: M:<?=$total?><br><?php
					
					if($reservations['collected']=="NO"){
					
							echo "Please collect car at Tseleng rentals";
					
					
					}
					
					
					?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
						<a type="button" href="rental.php "/>GO BACK</a>
						<a type="button" href="cancel.php "/>CANCEL-RESERVATION</a>
						<?php $_SESSION['cancel'] = $res;?>
                        </div>
                    </div>
                </div>
            </div
        </div>
        <hr class="my-4">
	
		<?php }
			else{
			echo "NO RESERVATIONS MADE";
			?><a type="button" href="rental.php "/>GO BACK</a>;<?php
			}
		?>
		
		


</div>
</div>
</main>

<footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; Tseleng Car Rental</p>
</footer>
</div>


<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

<script src="form-validation.js"></script>
</body>
</html>
