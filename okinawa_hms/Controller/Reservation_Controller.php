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
		$updatereserve=new CustomerDAO();
		$updateflag=$updatereserve->updatereservation($email, $arrivaldate, $departuredate);
		$_SESSION['updateflag']=$updateflag;
		if($updateflag==1){
			echo "Reserve";
			$_SESSION['RID']=$_SESSION['reseveID'];
			$reserveDAO=new CustomerDAO();
			$reserveDAO->reservationInfo($name, $email, $gender, $phoneno, $address, $arrivaldate, $departuredate, $singleno, $doubleno);
			$_SESSION['RID']=$_SESSION['reseveID'];
			return 1;
		}
		elseif($updateflag==2)
		{
			echo "ReserveUpdate";
			$rid1=$_SESSION['rid'];
			$custemail1=$_SESSION['custemail'];
			echo "{$rid1}:<br>";
			echo "{$custemail1}:<br>";
			include  ('../Model/dao/ReservationDAO.php');
			$RDAO = new ReservationDAO();
			$Reserve_list = $RDAO->CheckReserve($rid1,$custemail1);
			 ?>	 
	<script language="javascript">
	var r=confirm("You have already reserved for that days.\n  Do you want to update that reservation");
	if (r==true){
		
		document.location="../View/CancelUpdateReservationView.php";
	}
	else {

		document.location="../View/ReservationView.php";
	}
	 </script>
			 <?php 
			 return 2;
		}	 
	}
}


?>
