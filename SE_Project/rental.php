<?php 

session_start();
if(isset($_SESSION['userid'])){
	$e = $_SESSION['userid'];
	
}
else{
	echo "USERID NOT FOUND!!!!!";}

$conn = new mysqli('localhost','root','','tcr_db');?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Album example · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">

    

    <!-- Bootstrap core CSS -->
<link href="bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
	

      h1{
        font-size:50;}
		color:white;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
	  
       nav ul {
          list-style-type: none;
        }

        nav ul li {
          display: inline;
          margin-right: 20px;
        }

        nav ul li a {
          color: white;
          text-decoration: none;
        }
        a{
          display: inline-block;
          padding: 10px 20px;
          background-color: #333;
          color: #fff;
          text-decoration: none;
          border-radius: 10px;
          transition: background-color 0.3s ease;
        }
		a:hover {
          background-color: green;
        }
		
		 .rent-button {
          margin-left: 20px;
          display: block;
          width:500%;
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

        .rent-button:hover {
          background-color: blue;
        }
		
		 .col {
          
          background-color: white;
          border-radius: 10px;
          transition: transform 0.3s ease;
        }
       .col:hover {
          transform: translateY(-5px);
        }
    </style>

    
  </head>
  <body>
    
<header>
	
  <div class="navbar navbar-dark bg-dark shadow-sm">
	
    <div class="container">
	 
      <a href="#" class="navbar-brand d-flex align-items-center">
        <h1>BOOKINGS</h1>
      </a>
	  
      <nav>
        <ul>
		  <li><a href="HOMEPAGE.html">Home</a></li>
		   <li><a href="reservations2.php">Current-Reservation</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </nav>
    </div>
  </div>
</header>

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Tseleng's finest cars</h1>
        <p class="lead text-muted">Here is a list of our cars,each car is at your disposal,browse through the gallery and choose you desired car </p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        <?php 
        $sql = "SELECT * FROM cars";
        $result = $conn->query($sql);
        $place = 0;
        if (mysqli_num_rows($result) > 0) {
          while($images= mysqli_fetch_assoc($result)){
        ?>

        <div class="col">
          <div class="card shadow-sm">
            <img src="CARS/<?=$images['id']?>.jpg">
            <div class="card-body">
              <p class="card-text">Name:<?= $images['name']?><br>Model:<?=$images['model']?><br>Year:<?=$images['year']?><br><?=$images['cardescription']?><br><?=$images['price']?> Per day<br>Available:<?=$images['availability'] ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <form action="payments.php" method="post" >
                    <input type="hidden" value="<?=$images['id']?>" name="id">
					<button type="submit" class="rent-button">Rent</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        
       <?php }} ?>
	   
      </div>
    </div>
  </div>

</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">&copy; Tseleng 2023</p>
  </div>
</footer>
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>