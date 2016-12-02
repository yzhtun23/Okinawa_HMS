<?php


class Reservation_Controller {
	public function checkAvaliability(){
		$arrivaldate=$_SESSION['arrivalDate'];
		$departuredate=$_SESSION['departureDate'];
		$singleno=$_SESSION['roomTypeSingle'];
		$doubleno=$_SESSION['roomTypeDouble'];
		include  ('../Model/dao/ReservationDAO.php');
		$checkDAO=new ReservationDAO();
		$check_room=$checkDAO->checkroom($arrivaldate,$departuredate,$singleno,$doubleno);
		$_SESSION['check_room']=$check_room;

	}
	public function reserveRoom(){
		$arrivaldate=$_SESSION['arrivalDate'];
		$departuredate=$_SESSION['departureDate'];
		$singleno=$_SESSION['roomTypeSingle'];
		$doubleno=$_SESSION['roomTypeDouble'];
		$name=$_SESSION['name'];
		$email=$_SESSION['email'];
		$gender=$_SESSION['gender'];
		$phoneno=$_SESSION['phoneno'];
		$address=$_SESSION['address'];
		include  ('../Model/dao/CustomerDAO.php');
		$reserveDAO=new CustomerDAO();
		$reserveflag=$reserveDAO->reservationInfo($name, $email, $gender, $phoneno, $address, $arrivaldate, $departuredate, $singleno, $doubleno);
		$_SESSION['reserveflag']=$reserveflag;
		$_SESSION['RID']=$_SESSION['reseveID'];
	}
}

?>
