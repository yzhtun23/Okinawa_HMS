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
  <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css"/>

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
  $_SESSION['reserveno']=4;
  $_SESSION['rID']=" ";
  function display(){

    ?>
    <!-- Static navbar -->
    <div class="navbar navbar-default" role="navigation" style="margin:0; padding:0;">
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
            <li class="active"><a href="ReservationView.php">Reservation</a></li>
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
            <h1>RESERVATION</h1>
          </div>
        </div><!--/row -->
      </div> <!-- /container -->
    </div><!--/reservationwrap -->

    <!-- Check Room Availability -->
    <div class="container">
      <div class="row centered mt mb">
        <div class="col-lg-8 col-lg-offset-2" style="margin-top:15px;">
          <h2 style="margin-bottom:40px;">RESERVATION</h2>
          <div class="jumbotron">
            <form class="form-horizontal"  name="checkAvailability" method="post" action="../Controller/MainController.php">
              <fieldset>
                <legend>Check Room Availability</legend>
                <div class="form-group">
                  <label for="arrivalDate" class="col-lg-3 control-label">Arrival Date</label>
                  <div class="col-lg-8">
                    <div class="input-group date" data-provide="datepicker" id="arrivalDatepicker">
                      <input type="text" class="form-control" name="arrivalDate" placeholder="Arrival Date" required/>
                      <div class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="departureDate" class="col-lg-3 control-label">Departure Date</label>
                  <div class="col-lg-8">
                    <div class="input-group date" data-provide="datepicker" id="departureDatepicker">
                      <input type="text" class="form-control" name="departureDate" placeholder="Departure Date" required/>
                      <div class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="roomType" class="col-lg-3 control-label">Room Type</label>
                  <div class="col-lg-4">
                    <label class="control-label">Single</label>
                    <select  class="form-control" name="roomTypeSingle" placeholder="Single" required style="text-align-last:center;">
                      <option selected="selected">0</option>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                      <option>6</option>
                      <option>7</option>
                      <option>8</option>
                      <option>9</option>
                      <option>10</option>
                      <option>11</option>
                      <option>12</option>
                      <option>13</option>
                      <option>14</option>
                      <option>15</option>
                      <option>16</option>
                      <option>17</option>
                      <option>18</option>
                      <option>19</option>
                      <option>20</option>
                    </select>
                  </div>
                  <div class="col-lg-4">
                    <label class="control-label">Double</label>
                    <select class="form-control" name="roomTypeDouble" placeholder="Double"  required="true" style="text-align-last:center;"/>
                    <option selected="selected">0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="roomStatus" class="col-lg-3 control-label">Room Status</label>
                <div class="col-lg-6">
                  <h4 style="color:red;">
                    <?php  if($_SESSION['check_room']==0){
                      echo  "NOT AVAILABLE" ; }
                      ?>
                    </h4>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-lg-12">
                    <input type="submit"   name="CheckButton"   value="CHECK RESERVATION" class="btn btn-success btn-lg" />
                  </div>
                </div>
              </fieldset>
            </form>


          </div><!--/jumbotron-->
        </div>
      </div><!--/row -->
    </div><!--/container -->


    <!-- Check Reservation -->
    <div class="container">
      <div class="row centered mt mb">
        <div class="col-lg-8 col-lg-offset-2" style="margin-top:15px;">
          <h2 style="margin-bottom:40px;">CHECK RESERVATION</h2>
          <div class="jumbotron">
            <form class="form-horizontal" name="checkReserve" method="post" action="../Controller/MainController.php" >
              <fieldset>
                <legend>Check Your Reservation</legend>
                <?php    if ($_SESSION['WrongReserve']==1){?>
                  <h4 id="successAlert" style="color:red; margin-bottom: 30px;">
                    <center><strong>Reservation Number and Email  does not match  !!Please Enter Again!!</strong></center>
                  </h4>
                  <?php }       ?>



                  <div class="form-group">
                    <label for="reserveNo" class="col-lg-3 control-label">Reserve No.</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" id="reserveNo" placeholder="Reservation Number" name='Reserveno' pattern="^[0-9\-]+$" 	required />
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="EmailCR" class="col-lg-3 control-label" >Email</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" id="EamilCR" placeholder="Email(example@gmail.com)" name='Email'   	pattern="(\W|^)[\w.+\-]{0,25}@(yahoo|hotmail|gmail)\.com(\W|$)"	required />
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-lg-12">
                      <input type="submit"   name="CheckButton"  value="CHECK2" class="btn btn-success btn-lg" >
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
      <script type="text/javascript" src="assets/js/moment.min.js"></script>

      <script src="assets/js/bootstrap.min.js"></script>

      <!-- Bootstrap Date-Picker Plugin -->
      <script type="text/javascript" src="assets/js/bootstrap-datepicker.min.js"></script>

      <script type="text/javascript">
      $(document).ready(function () {
        var date = new Date();
        date.setDate(date.getDate()-1);
        $('#arrivalDatepicker').datepicker({
          format: "yyyy-mm-dd",
          startDate: date
        });

      });
      $(document).ready(function () {
        var date = new Date();
        date.setDate(date.getDate()-1);
        $('#departureDatepicker').datepicker({
          format: "yyyy-mm-dd",
          startDate: date
        });

      });
      </script>
      <?php }?>
    </body>
    </html>
