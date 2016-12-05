<?php

class CheckReservation_Controller{
  public function checkReservation() {
    include  ('../Model/dao/ReservationDAO.php');

    $RDAO = new ReservationDAO();
    $Reserveno=$_SESSION['Reserveno'];
	$Email=$_SESSION['Email'];
    $Reserve_list = $RDAO->CheckReserve($Reserveno,$Email);
    $_SESSION['WrongReserve']=$Reserve_list;
  }

}


?>
