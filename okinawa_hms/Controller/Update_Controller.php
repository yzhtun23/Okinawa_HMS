<?php
class Update_Controller{

	public  function UpdateCustomerInfo(){
		include  ('../Model/dao/CustomerDAO.php');
		$UDAO1=new CustomerDAO();
		$UpdateCustomer1=$UDAO1->UpdateCustomer();
		if ($UpdateCustomer1==1){
			$_SESSION['CancelFlag']=2;
			$_SESSION['name']=$_SESSION['nameupdate'];
			$_SESSION['phone']=$_SESSION['phonenoupdate'];
			$_SESSION['gender']=	$_SESSION['optradioupdate'];
			header('location:../View/CancelUpdateReservationView.php');
		}
	}


	public function UpdateReserve() {
		include  ('../Model/dao/ReservationDAO.php');
		include  ('../Model/dao/CustomerDAO.php');
		include  ('../Model/dao/RoomDAO.php');

		$UDAO=new  ReservationDAO();
		$UpdateCustomer=$UDAO->updatereserve();

		$UDAO1=new CustomerDAO();
		$UpdateCustomer1=$UDAO1->UpdateCustomer();

		if ($UpdateCustomer==1  && $UpdateCustomer1==1){
			$_SESSION['CancelFlag']=2;
			$_SESSION['name']=$_SESSION['nameupdate'];
			$_SESSION['phone']=$_SESSION['phonenoupdate'];
			$_SESSION['gender']=	$_SESSION['optradioupdate'];
			$_SESSION['ArrivalDate']=$_SESSION['arrivaldateupdate'];
			$_SESSION['DeparatureDate']=$_SESSION['departuredateupdate'];
			$_SESSION['Single']= $_SESSION['singleroomupdate'];
			$_SESSION['Double']= $_SESSION['doubleroomupdate'];
			header('location:../View/CancelUpdateReservationView.php');
		}

		else
		{
			$_SESSION['CancelFlag']=5;
			header('location:../View/CancelUpdateReservationView.php');

		}
	}
}
