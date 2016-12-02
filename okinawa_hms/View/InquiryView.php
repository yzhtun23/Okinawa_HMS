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

  <!-- Full Calender Styles and Script -->
  <link rel='stylesheet' href='assets/css/fullcalendar.css' />
  <script src='assets/js/jquery.min.js'></script>
  <script src='assets/js/moment.min.js'></script>
  <script src='assets/js/fullcalendar.js'></script>

  <script>
  $(document).ready(function() {

    // page is now ready, initialize the calendar...

    $('#calendar').fullCalendar({
      eventSources: [

        {
          url: 'events/S_events.php', // use the `url` property
          className: "single",
        },

        {
          url: 'events/D_events.php',
          className: "double",
        }

      ],
      //on-hover tooltip
      eventRender: function(event, element) {
        if(event.color=="#E10000") {
          $(element).tooltip({title: "No Room Available"});
        }
        else if(event.color=="#F3E400") {
          $(element).tooltip({title: "Less than 10 Rooms are Available"});
        }
        else if(event.color=="#4BEC00") {
          $(element).tooltip({title: "More than 10 Rooms are Available"});
        }
      }
    }); //fullcalenar close

  }); //ready close

  </script>

  <style>
  .single{
    border-radius: 0px;
    width: 50px;
    float: left;
  }

  .double{
    border-radius: 0px;
    width: 125px;
    float: left;
  }
  </style>

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
            <li class="active"><a href="InquiryView.php">Inquiry</a></li>
            <li><a href="AboutView.php">About</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>


    <div id="inquirywrap">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-lg-offset-3">
            <h1>HOTEL INQUIRY</h1>
          </div>
        </div><!--/row -->
      </div> <!-- /container -->
    </div><!--/inquirywrap -->

    <div class="container">
      <div class="row centered mt mb">
        <div class="col-lg-10 col-lg-offset-1" style="margin-top:15px;">
          <h2>MONTHLY VACANCY STATUS</h2>
          <hr>
          <div id='calendar' style="margin-top:50px;"></div>

          <h4 style="margin-top:50px;margin-bottom:30px;">Description</h4>
          <img src="assets/img/yellow.png" alt="Yellow Block" height="42" width="42"></img> Less Than 10 Rooms are Available
          <img src="assets/img/green.png" alt="Green Block" height="42" width="42"></img> More Than 10 Rooms are Available
          <img src="assets/img/red.png" alt="Red Block" height="42" width="42"></img> No Room Available
        </div>
      </div><!--/row -->
    </div><!--/container -->

    <div id="social">
      <div class="container">
        <div class="row centered">
          <!-- Social Icons -->
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
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
    <script src="assets/js/bootstrap.min.js"></script>
    <?php
  } ?>
</body>
</html>
