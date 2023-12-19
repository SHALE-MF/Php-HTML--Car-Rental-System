<?php

session_start();
if(isset($_SESSION['email'])){
	echo "ke teng";
}
else{
	echo "hakeo";}

$conn = new mysqli('localhost','root','','tcr_db');

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
            <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
            <h2>Checkout form</h2>
            <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
        </div>


        <?php
		$userid = $_SESSION['userid'];
		$sql = "SELECT * FROM reservations where userid='$userid' and returned != 'YES'";
        $result = $conn->query($sql);
        $reservations= mysqli_fetch_assoc($result);
		$carid = $reservations['carid'];
		
        $sql = "SELECT * FROM cars where id='$carid'";
        $result = $conn->query($sql);
        $images= mysqli_fetch_assoc($result);
        ?>


        <hr class="my-4">

        <div class="col-md-3">
            <div class="card shadow-sm">
                <img src="img/<?=$carid?>.jpg">
                <div class="card-body">
                    <p class="card-text">Name:<?= $images['name']?><br>Model:<?=$images['model']?><br><?=$images['cardescription']?><br><?=$images['year']?><br><?=$images['price']?> Per day<br>Available:<?=$images['availability'] ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
											<a type="button" href="rental.php "/>GO BACK</a>

                        </div>
                    </div>
                </div>
            </div
        </div>
        <hr class="my-4">
		


</div>
</div>
</main>

<footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017–2021 Company Name</p>
    <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Privacy</a></li>
        <li class="list-inline-item"><a href="#">Terms</a></li>
        <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
</footer>
</div>


<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

<script src="form-validation.js"></script>
</body>
</html>
