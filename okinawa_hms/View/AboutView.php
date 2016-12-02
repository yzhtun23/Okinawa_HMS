<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <title>Okinawa</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
<?php

display();
function display(){
	?>

    <!-- Static navbar -->
    <div class="navbar navbar-default" role="navigation" style="margin:0; padding:0;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="HomeView.php">OKINAWA</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="HomeView.php">Home</a></li>
            <li><a href="ReservationView.php">Reservation</a></li>
            <li><a href="InquiryView.php">Inquiry</a></li>
            <li class="active"><a href="AboutView.php">About</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>


	<div id="aboutwrap">
	    <div class="container">
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3">
          <h1>HOTEL INFO</h1>
				</div>
			</div><!--/row -->
	    </div> <!-- /container -->
	</div><!--/aboutwrap -->

	<div class="container">
		<div class="row centered mt mb">
			<div class="col-lg-8 col-lg-offset-2" style="margin-top:10px;">
				<h2 style="margin-bottom: 50px;">HOTEL OKINAWA ROOM INFO</h2>
				<div class="col-lg-4">
          <img src="assets/img/single_room.jpg" class="img-circle" alt="Single Room" width="250" height="250">
          <h3>Single Room</h3>
          <hr>
          <h4>No. of Available Rooms</h4>
          <h5 style="color: green;">20</h5>
          <h4>Price</h4>
          <h5 style="color: green;">8,000 yen</h5>
        </div>
        <div class="col-lg-4 col-lg-offset-4">
          <img src="assets/img/double_room.jpg" class="img-circle" alt="Double Room" width="250" height="250">
          <h3>Double Room</h3>
          <hr>
          <h4>No. of Available Rooms</h4>
          <h5 style="color: green;">10</h5>
          <h4>Price</h4>
          <h5 style="color: green;">15,000 yen</h5>
        </div>
			</div>

		</div><!--/row -->
	</div><!--/container -->

	<div id="social">
		<div class="container">
			<div class="row centered">
				<div class="col-lg-2 col-lg-offset-3">
					<a href="#"><i class="fa fa-facebook"></i></a>
				</div>
				<div class="col-lg-2">
					<a href="#"><i class="fa fa-twitter"></i></a>
				</div>
				<div class="col-lg-2">
					<a href="#"><i class="fa fa-instagram"></i></a>
				</div>
			</div><!--/row -->
		</div><!--/container -->
	</div><!--/social -->

  <div id="footerwrap">
		<div class="container">
			<div class="row centered">
				<div class="col-lg-6 col-lg-offset-3">
					<p><b>OKINAWA HOTEL MANAGEMENT SYSTEM</b></p>
				</div>
			</div>
		</div>
	</div><!--/footerwrap -->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
   <?php
} ?>
  </body>
</html>
