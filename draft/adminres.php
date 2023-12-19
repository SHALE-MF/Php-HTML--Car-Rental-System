<?php 

session_start();
if(isset($_SESSION['email'])){
	echo "ke teng";
}
else{
	echo "hakeo";}

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
        font-size:15;}
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
        a {
          display: inline-block;
          padding: 10px 20px;
          background-color: #333;
          color: #fff;
          text-decoration: none;
          border-radius: 10px;
          transition: background-color 0.3s ease;
        }
      a:hover {
          background-color: #555;
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
          <li><a href="Sign%20in%20page.html">Profile</a></li>
          <li><a href="Sign%20Up%20page.html">Logout</a></li>
          <li><a href="#">Rental History</a></li>
        </ul>
      </nav>
    </div>
  </div>
</header>

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Tseleng ADMIN PAGE</h1>
        <p class="lead text-muted">WELCOME ADMIN</p>
        <p>

        </p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        <?php 
        $sql = "SELECT * FROM reservations where returned = 'no'";
        $result = $conn->query($sql);
        if (mysqli_num_rows($result) > 0) {
          while($images= mysqli_fetch_assoc($result)){
			  
			  $placeholder1 = $images['carid'];
			  $placeholder2 = $images['userid'];
			  
			 $query = " SELECT * from cars where id = '$placeholder1'";
			 $query2 = "SELECT * from clients where userid ='$placeholder2'";
			  
			          $result1 = $conn->query($query);
					  $images1= mysqli_fetch_assoc($result1);
						$result2 = $conn->query($query2);
						$images2= mysqli_fetch_assoc($result2);
						$m = $images['reservationid'];
						
        ?>

        <div class="col">
          <div class="card shadow-sm">
            <img src="img/<?=$images1['id']?>.jpg">
            <div class="card-body">
              <p class="card-text">Car Name:<?= $images1['name']?><br>Model:<?=$images1['model']?><br>Client: <?=$images2['firstname']?> <?=$images2['lastname']?><br><?=$images1['year']?><br><?=$images1['price']?> Per day<br><?php
			  if($images['collected']=="YES"){
				  echo "COLLECTED";
			  }
			  else{
				  echo "RESERVED";
			  }
			  
			  
			  
			  ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <form action="collectionscheck.php" method="post" >
					<?php $_SESSION['nama'] = $images['reservationid'];?>
                    <input type="hidden" value="<?=$images['reservationid']?>" name="reservationid">
					<input type="hidden" value="<?=$images1['id']?>" name="carid">
                    <input type="hidden" value="<?=$images2['userid']?>" name="userid">

					<button type="submit" class="btn btn-sm btn-outline-secondary">COLLECTION</button>
                  </form>
				    <form action="returns.php" method="post" >
					
					<?php $_SESSION['papa'] = $images['reservationid'];?>
					<?php echo "$m";?>
                    <input type="hidden" value="<?=$images['reservationid']?>" name="reservationid">
					<input type="hidden" value="<?=$images1['id']?>" name="carid">
                    <input type="hidden" value="<?=$images2['userid']?>" name="userid">

					<button type="submit" class="btn btn-sm btn-outline-secondary">RETURNS</button>
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
    <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
    <p class="mb-0">New to Bootstrap? or read our</p>
  </div>
</footer>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>