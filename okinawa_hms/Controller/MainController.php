<?php

session_start();

$check=$_POST["CheckButton"];
$_SESSION['CancelFlag']=3;
$_SESSION['checkupdateroomflag']=2;

if($check=="CHECK RESERVATION"){
	$arrival=$_POST['arrivalDate'];
	$departure=$_POST['departureDate'];
	$_SESSION['arrivalDate']=$_POST['arrivalDate'];
	$_SESSION['departureDate']=$_POST['departureDate'];
	$_SESSION['roomTypeSingle']=$_POST['roomTypeSingle'];
	$_SESSION['roomTypeDouble']=$_POST['roomTypeDouble'];
	if($arrival<$departure){
		include 'Reservation_Controller.php';
		$RC=new Reservation_Controller();
		$RC->checkAvaliability();
		$checkroom=$_SESSION['check_room'];
		if ($checkroom==1){
			header("location:../View/MakeReservationView.php");
		}
		else{
			header("location:../View/ReservationView.php");
		}
	}else {

		echo '<script language="javascript">';
		header("refresh:0.000001 ;url=../View/ReservationView.php");
		echo 'alert("Reenter your date arrival date is greater than deparaturedate")';

		echo "</script>";
		exit;
	}




}
elseif ($check=="Reserve"){
	$_SESSION['arrivalDate']=$_POST['arrivalDate'];
	$_SESSION['departureDate']=$_POST['departureDate'];
	$_SESSION['roomTypeSingle']=$_POST['roomTypeSingle'];
	$_SESSION['roomTypeDouble']=$_POST['roomTypeDouble'];
	$_SESSION['name']=$_POST['name'];
	$_SESSION['email']=$_POST['email'];
	$_SESSION['gender']=$_POST['gender'];

	$_SESSION['phoneno']=$_POST['phoneno'];
	$_SESSION['address']=$_POST['address'];
	include 'Reservation_Controller.php';
	$RS=new Reservation_Controller();
	$RS->reserveRoom();
	if($_SESSION['reserveflag']!=NULL){
		$_SESSION['reserveno']=$_SESSION['reserveflag'];
		$_SESSION['rID']=$_SESSION['RID'];
		header  ('location:../View/MakeReservationView.php');
	}
}
elseif($check=="CHECK2"){

	$_SESSION['Reserveno']=$_POST['Reserveno'];
	$_SESSION['Email']=$_POST['Email'];


	include 'CheckReservation_Controller.php';

	$CC=new CheckReservation_Controller();
	$CC->checkReservation();



	$pp=$_SESSION['Exit'];
	if($pp==0){

		header  ('location:../View/ReservationView.php');
	}
	else{

		header  ('location:../View/CancelUpdateReservationView.php');
	}
}


elseif($check=="CANCLE"){
	?>
	<script language="javascript">
	var r=confirm("Are You Sure To Delete this Reservation");
	if (r==true){
		document.location="../Controller/Cancel_Controller.php";
	}
	else {

		document.location="../View/CancelUpdateReservationView.php";
	}

	</script>

	<?php   }

	elseif ($check=="UPDATE"){

		$_SESSION['nameupdate']=$_POST['nameupdate'];

		if ($_SESSION['nameupdate']==""){
			$_SESSION['nameupdate']= $_SESSION['name'];

		}

		$_SESSION['optradioupdate']=$_POST['optradioupdate'];
		if ($_SESSION['optradioupdate']==$_SESSION['gender']){
			$_SESSION['optradioupdate']=$_SESSION['gender'];
		}

		$_SESSION['phonenoupdate']=$_POST['phonenoupdate'];
		if ($_SESSION['phonenoupdate']==""){
			$_SESSION['phonenoupdate']= $_SESSION['phone'];

		}
		$_SESSION['arrivaldateupdate']=$_POST['arrivaldateupdate'];
		if ($_SESSION['arrivaldateupdate']==""){
			$_SESSION['arrivaldateupdate']= $_SESSION['ArrivalDate'];

		}
		$_SESSION['departuredateupdate']=$_POST['departuredateupdate'];
		if ($_SESSION['departuredateupdate']==""){
			$_SESSION['departuredateupdate']= $_SESSION['DeparatureDate'];

		}

		$_SESSION['singleroomupdate']=$_POST['singleroomupdate'];

		if ($_SESSION['singleroomupdate']==""){
			$_SESSION['singleroomupdate']= $_SESSION['Single'];

		}

		$_SESSION['doubleroomupdate']=$_POST['doubleroomupdate'];
		if ($_SESSION['doubleroomupdate']==""){
			$_SESSION['doubleroomupdate']= $_SESSION['Double'];

		}

		if ($_SESSION['arrivaldateupdate']== $_SESSION['ArrivalDate']  &&  $_SESSION['departuredateupdate']== $_SESSION['DeparatureDate'] &&  $_SESSION['singleroomupdate']= $_SESSION['Single']  &&  $_SESSION['doubleroomupdate']= $_SESSION['Double']){
			include 'Update_Controller.php';
			$Update=new Update_Controller();
			$Update-> UpdateCustomerInfo();
		}
		else {


			include 'Update_Controller.php';
			$Update=new Update_Controller();
			$Update->UpdateReserve();
		}
	}

	?>
