<?php 

session_start();

$conn = new mysqli('localhost','root','','tcr_db');
$reservationid = $_POST['reservationid'];
$carid = $_POST['carid'];
$userid = $_POST['userid'];

$queryy =  "SELECT DATEDIFF(CURRENT_DATE(),(SELECT collecteddate FROM reservations where reservationid='$reservationid')) AS DATEDIFF;";
$resultt = $conn->query($queryy);
$ress = mysqli_fetch_assoc($resultt);
$days = $ress['DATEDIFF']; 

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
	  
	   .confirm{
		
          margin-left:70px;
          display: block;
          width:100%;
          padding: 5px;
          border: none;
          border-radius: 3px;
          background-color: #333;
          color: #fff;
          text-align: center;
          text-decoration: none;
          cursor: pointer;
          transition: background-color 2.0s ease;
        }

        .confirm:hover {
          background-color: blue;
        }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="confirmedlogo.jpg" alt="" width="72" height="57">
      <h2>Returns</h2>
      <p class="lead">Confirm upon approved return of the car.</p>
    </div>

         <?php 
			  $query = "SELECT * from cars where id = '$carid'";
			  $query2 = "SELECT * from clients where userid = '$userid'";
			  $query3 ="SELECT * from reservations where reservationid = '$reservationid'";
			  
			          $result1 = $conn->query($query);
					  $images1= mysqli_fetch_assoc($result1);
						$result2 = $conn->query($query2);
						$images2= mysqli_fetch_assoc($result2);
						$result3 = $conn->query($query3);
						$images3 = mysqli_fetch_assoc($result3);
						
					$amount = $images1['price'];
				    $amounti=(int)$amount;
					$daysi=(int)$days;
					$total=$daysi*$amounti;
						
					//	$query4 = "SELECT DATEDIFF(d, select date from reservations where reservationid = '$reservationid', 'CURRENT_DATE()') AS DateDiff";

					//	$result4 = $conn->query($query4);
					//	$images4 = mysqli_fetch_assoc($result4);
						
        ?>

	
		
          <hr class="my-4">

            <div class="col-md-3">
              <div class="card shadow-sm">
                <img src="CARS/<?=$carid?>.jpg">
                <div class="card-body">
              <p class="card-text">Car Name:<?= $images1['name']?><br>Model:<?=$images1['model']?><br>Client<?=$images2['firstname']?> <?=$images2['lastname']?><br><?=$images1['year']?><br><?=$images1['price']?> Per day<br>RESERVED<BR>AMOUNT TO PAY M<?=$total?>.00</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
					<form action="returnsserver.php" method="post" >
						<input type="hidden" value="<?=$reservationid?>" name="reservationid">
						<input type="hidden" value="<?=$SESSION['id']?>" name="userid">
						<input type="hidden" value="<?=$carid?>" name="carid">
						<input type="hidden" value="<?=$total?>" name="total">

						 <button class="confirm" type="submit">CONFIRM</button>
					</form>
                    </div>
                  </div>
                </div>
              </div
          </div>

          <hr class="my-4">

        
        </form>
      </div>
    </div>
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2023 Tseleng</p>
  </footer>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="form-validation.js"></script>
  </body>
</html>
