<?php

class CheckReservation_Controller{
  public function checkReservation() {
    include  ('../Model/dao/ReservationDAO.php');

    $RDAO = new ReservationDAO();
    $Reserve_list = $RDAO->CheckReserve();
    $_SESSION['WrongReserve']=$Reserve_list;


  }

}


?>
