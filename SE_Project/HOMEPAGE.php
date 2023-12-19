<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 
  <title>Car Rental Service</title>
   <link href="bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
     
    }
		
    header {
      background-color: #333;
      color: #fff;
      padding: 20px;
	  display:flex;
    }

    header h1 {
      margin: 0;
    }

    nav ul {
      list-style: none;
      padding: 0;
	  margin-left:600px;
    }

    nav ul li {
      display: inline;
      margin-right: 20px;
    }

    nav ul li a {
      color: #fff;
      text-decoration: none;
    }
    main {
          margin-bottom:0px;
          color:white;
        }
    section {
      padding: 40px;
      margin-top:1px;
      width:100%;
      background-color:#333;
       color:white;
    }


    .text{
        position:absolute;
        bottom:100px;
        left:16px;
        font-size:large;
        color:WHITE;}

    .details{
        display:flex;
		width:100%;


     }
    footer {
          background-color: #333;
          color: #fff;
          text-align: center;
          padding: 1px ;
          bottom: 0;
          width: 100%;
        }
     .rent-button {
          margin-right: 15px;
          display: block;
          width:50%;
          padding: 5px;
          border: none;
          border-radius: 3px;
          background-color: #333;
          color: #fff;
          text-align: center;
          text-decoration: none;
          cursor: pointer;
          transition: background-color 0.5s ease;
        }
     .rent-button:hover{
            background-color:blue;}

     .logos{

          text-align:center;
          padding:5px;}

     .vw{
          margin-right:50px;}

     .benz{
          margin-right:50px;}
     .bmw{
          margin-right:50px;}

     .ford{
          margin-right:50px;}

      .chevrolet{
          margin-right:50px;}
		  
		.syslogo{
			display:border;
			border-radius:50px;
			}
		footer{
			width:100%;}
  </style>

</head>
<body>
<header>

	<img class="syslogo" src="systemlogo.jpg" alt="" style="width:5%;" style="height:5%;" >
	<h1>Tseleng Car Rentals</h1>

  <nav>
    <ul>
      <li><a href="login.html">Log-In</a></li>
      <li><a href="Registerworking.html">Sign Up</a></li>
    </ul>
  </nav>
</header>

<main>
    <div class="image">
      <img src="WEB9.jpg" alt="" style="width:100%;" style="height:30%;">
      <div class="text">
        <h2><b>Unleash the thrill<br>
          Where style meets the road!</b><br></h2>
        <p>Looking for the best cars to rent whenever you need to?</p>
        <a href="login.html" class="rent-button">RENTNOW</a>
      </div>
    </div>

</main>
<div class="logos">
  <img class="vw" src="logo1.png" alt="" style="width:5%;" style="height:5%;" >
  <img class="benz" src="logo2.png" alt="" style="width:5%;" style="height:5%;">
  <img class="bmw" src="logo3.png" alt="" style="width:5%;" style="height:5%;;">
  <img class="ford" src="logo4.png" alt="" style="width:5%;" style="height:5%;">
  <img class="chevrolet" src="logo5.png" alt="" style="width:5%;" style="height:5%;">
</div>

<div class="details">

<section id="about">
  <h2>About Us</h2>
  <p>Welcome to our car rental service! We provide a wide range of vehicles for your transportation needs.</p>
</section>

<section id="services">
  <h2>Our Services</h2>
  <ul>
    <li>Various Car Models</li>
    <li>Affordable Rental Plans</li>
    <li>24/7 Customer Support</li>
    <li>Easy Booking Process</li>
    <li>Flexible payment methods(cash or Mpesa/Ecocash)</li>
  </ul>
</section>

<section id="contact">
  <h2>Contact Us</h2>
  <p><img src="logo7.jpg" alt="" style="width:4%;" style="height:4%;"> Email: tseleng@gmail.com</p>
  <p><img src="logo6.jpg" alt="" style="width:4%;" style="height:4%;"> Phone: +266 63317532</p>
</section>
</div>

<footer>
  <p>&copy; 2023 Tseleng Car Rentals</p>
</footer>
</body>
</html>
