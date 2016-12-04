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
        <div class="col-md-8 col-md-offset-2" style="margin-top:15px;">
          <h2 style="margin-bottom:40px;">CUSTOMER INFORMATION</h2>

          <?php    if ($_SESSION['CancelFlag']==1){?>
            <h2 id="successAlert" style="color:red; margin-bottom: 30px;">
              <center><strong>Reservation is Successfully  Canceled</strong></center>
            </h2>
            <?php }

            elseif($_SESSION['CancelFlag']==4) {
              ?>
              <h2 id="successAlert" style="color:red; margin-bottom: 30px;">
                <center><strong>Your  Reservation is  Already   Canceled</strong></center>
              </h2><?php
            }




            elseif($_SESSION['CancelFlag']==2) {
              ?>
              <h2 id="successAlert" style="color:green; margin-bottom: 30px;">
                <center><strong>Reservation Successfully Updated!!!!</strong></center>
              </h2><?php
            }
            elseif($_SESSION['CancelFlag']==5) {
              ?>
              <h2 id="successAlert" style="color:red; margin-bottom: 30px;">
                <center><strong>Sorry . Your Edited Room Is Not Available</strong></center>
              </h2><?php
            }


            elseif ($_SESSION['checkupdateroomflag']=0){
              ?>
              <h2 id="successAlert" style="color:green; margin-bottom: 30px;">
                <center><strong>Sorry  Unavailable Room!!!!</strong></center>
              </h2><?php
            }?>

            <div class="jumbotron">
              <form class="form-horizontal" name="makeReservation" method="post" action="../Controller/MainController.php">
                <fieldset>
                  <div class="form-group">
                    <label for="ReserveNoCR" class="col-md-2 col-md-offset-2 control-label">Reserve No.</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" id="ReserveNoCR" placeholder="<?php echo $_SESSION['RID'];?>" disabled="true">
                    </div>
                  </div>



                  <div class="form-group">
                    <label for="NameCR" class="col-md-2 col-md-offset-2 control-label">Name</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" id="NameCR"  name="nameupdate" placeholder="<?php  echo $_SESSION['name']; ?>" <?php if($_SESSION['CancelFlag']==4 ||  $_SESSION['CancelFlag']==1){?>  disabled="true" <?php }?>/>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="NameCR" class="col-md-2 col-md-offset-2 control-label">Email</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" id="NameCR"  name="emailupdate" placeholder="<?php  echo $_SESSION['email']; ?>" <?php if($_SESSION['CancelFlag']==4 ||  $_SESSION['CancelFlag']==1){?>  disabled="true" <?php }?>/>
                    </div>
                  </div>



                  <div class="form-group">
                    <label for="Gender" class="col-md-2 col-md-offset-2 control-label">Gender</label>
                    <div class="col-md-3">
                      <label class="radio-inline"><input type="radio" name="optradioupdate"  value="Male" <?php  if ($_SESSION['gender']=='Male') {?>checked="true"<?php }?>>Male</label>
                    </div>
                    <div class="col-md-3">
                      <label class="radio-inline"><input type="radio" name="optradioupdate"  value="Female"<?php  if ($_SESSION['gender']=='Female') {?>checked="true"<?php }?>>Female</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="phNo" class="col-md-2 col-md-offset-2 control-label">Phone No.</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" id="phNo" name="phonenoupdate"  placeholder="<?php  echo $_SESSION['phone'] ;?>"  <?php if($_SESSION['CancelFlag']==4 ||  $_SESSION['CancelFlag']==1){?>  disabled="true" <?php }?>/>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="arrivalDateCR" class="col-md-2 col-md-offset-2 control-label">Arrival Date</label>
                    <div class="col-md-6">
                      <div class="input-group date" data-provide="datepicker">
                        <input type="text" class="form-control" name="arrivaldateupdate" placeholder="<?php  echo $_SESSION['ArrivalDate'] ;?>"  <?php if($_SESSION['CancelFlag']==4 ||  $_SESSION['CancelFlag']==1){?> readonly="readonly" <?php }?>/>
                        <div class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="departureDateCR" class="col-md-2 col-md-offset-2 control-label">Departure Date</label>
                    <div class="col-md-6">
                      <div class="input-group date" data-provide="datepicker">
                        <input type="text" class="form-control" name="departuredateupdate" placeholder="<?php  echo $_SESSION['DeparatureDate'] ;?>"  <?php if($_SESSION['CancelFlag']==4 ||  $_SESSION['CancelFlag']==1){?> readonly="readonly" <?php }?>/>
                        <div class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar "></span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">

                    <label for="roomType" class="col-md-2 col-md-offset-2 control-label">Room Type</label>
                    <div class="col-lg-4">
                      <select  class="form-control"  name="singleroomupdate"  placeholder=""  required <?php if($_SESSION['CancelFlag']==4 ||  $_SESSION['CancelFlag']==1){?>  disabled="true" <?php }?>/>
                        <option><?php  echo  $_SESSION['Single' ]; ?></option>
                        <option>0</option>
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
                      <select class="form-control" name="doubleroomupdate"  placeholder=""  required="true"  <?php if($_SESSION['CancelFlag']==4 ||  $_SESSION['CancelFlag']==1){?> disabled="true" <?php }?>/>
                        <option><?php  echo  $_SESSION['Double' ]; ?></option>
                        <option>0</option>
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




                  <!-- <h4 id="successAlert" style="color:green; margin-top: 30px;">
                  <center><strong>Rerservation Success</strong></center>
                </h4> -->
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3" style="margin-top: 30px;">

                    <?php if($_SESSION['CancelFlag']==4 ||  $_SESSION['CancelFlag']==1){?>

                      <input type="submit"   name="CheckButton"  value="BACK" class="btn btn-primary" />
                      <?php } elseif($_SESSION['CancelFlag']!=4  ||  $_SESSION['CancelFlag']!=1){ ?>

                        <input type="submit"   name="CheckButton"  value="CANCLE" class="btn btn-danger" />
                        <input  type="submit" class="btn btn-primary" name="CheckButton" value="UPDATE" />
                        <?php }?>

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
