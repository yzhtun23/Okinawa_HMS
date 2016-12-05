<?php
session_start();

include  ('../Model/dao/ReservationDAO.php');
$CancelDAO = new ReservationDAO();
$Flag=$CancelDAO->CancelReserve();
include  ('../Model/dao/RoomDAO.php');
$CancelRoomDAO=new RoomDAO();
$CC=$CancelRoomDAO->CancelRoom();

if ($Flag==1){
header('location:../View/CancelUpdateReservationView.php');
}
?>