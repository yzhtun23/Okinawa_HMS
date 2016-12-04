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
  <script type="text/javascript">
  function preventBack(){
    window.history.forward();
  }
  setTimeout("preventBack()",0);
  window.onunload=function(){null};
  window.history.forward();

  </script>
  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css"/>

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

  session_start();

  display();

  function display(){

    ?>
    <!-- Static navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button"   class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
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
            <li><a href="AboutView.php">About</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>


    <div id="reservationwrap">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-lg-offset-3">
            <h1>CUSTOMER INFO</h1>

          </div>
        </div><!--/row -->
      </div> <!-- /container -->
    </div><!--/reservationwrap -->

    <!-- Check Room Availability -->
    <div class="container">
      <div class="row centered mt mb">

        <div class="col-md-10 col-md-offset-1" style="margin-top:15px;">
          <h1 style="margin-bottom:80px;color:green;">SUCCESSFULLY UPDATED  !!!</h1>
          <h2 style="margin-bottom:40px;">NEW CUSTOMER INFO</h2>


          <div class="jumbotron">
            <form class="form-horizontal" name="makeReservation" method="post" action="../View/ReservationView.php">
              <fieldset>
                <div class="form-group">
                  <label for="ReserveNoCR" class="col-md-5 col-md-offset-1 control-label">RESERVE NO. : </label>
                  <div class="col-md-5" align="left">
                    <h4 style="color: #E10000;">
                      <?php  echo $_SESSION['RID'];?>
                    </h4>
                  </div>
                </div>

                <div class="form-group">
                  <label for="NameCR" class="col-md-5 col-md-offset-1 control-label">NAME : </label>
                  <div class="col-md-5" align="left">
                    <h4>
                      <?php  echo $_SESSION['nameupdate'] ;?>
                    </h4>
                  </div>
                </div>

                <div class="form-group">
                  <label for="Gender" class="col-md-5 col-md-offset-1 control-label">GENDER : </label>
                  <div class="col-md-5" align="left">
                    <?php  if ($_SESSION['optradioupdate']=="Male") {?>
                      <h4>
                        Male<?php } else   {?>   <h4>
                          Female<?php } ?>
                        </h4>
                      </h4>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="phNo" class="col-md-5 col-md-offset-1 control-label">PHONE NO. : </label>
                    <div class="col-md-5" align="left">
                      <h4>
                        <?php  echo $_SESSION['phonenoupdate'] ;?>
                      </h4>
                    </div>
                  </div>

                  <div class="form-group" align="left">
                    <label for="arrivalDateCR" class="col-md-5 col-md-offset-1 control-label">ARRIVAL DATE : </label>
                    <div class="col-md-5">
                      <h4>
                        <?php  echo $_SESSION['arrivaldateupdate'] ;?>
                      </h4>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="departureDateCR" class="col-md-5 col-md-offset-1 control-label">DEPARTURE DATE : </label>
                    <div class="col-md-5" align="left">
                      <h4>
                        <?php  echo $_SESSION['departuredateupdate'] ;?>
                      </h4>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="roomType" class="col-md-5 col-md-offset-1 control-label">ROOM TYPE : </label>
                    <div class="col-md-5" align="left">
                      <h4>
                        Single : <h4 style="color: green;"><?php  echo $_SESSION['singleroomupdate'];?></h4>
                        Double : <h4 style="color: green;"><?php  echo $_SESSION['doubleroomupdate'] ;?></h4>
                      </h4>

                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-3" style="margin-top: 30px;">
                      <input type="submit" name="done" value="DONE" class="btn btn-primary btn-lg" />
                    </div>
                  </div>
                </fieldset>
              </form>
            </div><!--/jumbotron-->
          </div>
        </div><!--/row -->
      </div><!--/container -->

      <div id="social">
        <div class="container">
          <div class="row centered">

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
      <!--  jQuery -->
      <script type="text/javascript" src="assets/js/jquery.min.js"></script>

      <script src="assets/js/bootstrap.min.js"></script>


      <?php

    }


    ?>
  </script>
</body>
</html>
