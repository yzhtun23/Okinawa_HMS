<?php
class Update_Controller{

	public  function UpdateCustomerInfo($Reserveno){
		echo "tutl";
	include  ('../Model/dao/CustomerDAO.php');
		$UDAO1=new CustomerDAO();
		
		$UpdateCustomer1=$UDAO1->UpdateCustomer($Reserveno);
		if ($UpdateCustomer1==1){
			$_SESSION['CancelFlag']=2;
						
		header('location:../View/UpdatedCustomerInfoView.php');
		
		
	}
	}


	public function UpdateReserve($Reserveno) {
		echo "Non";
		$singleno=	$_SESSION['singleroomupdate'];
		$doubleno=$_SESSION['doubleroomupdate'];
		$arrivaldate= $_SESSION['arrivaldateupdate'];
		$deparaturedate=$_SESSION['departuredateupdate'];
		
		echo $Reserveno;
		echo $singleno;
		echo $doubleno;
		include  ('../Model/dao/ReservationDAO.php');
		include  ('../Model/dao/CustomerDAO.php');

		$UDAO=new  ReservationDAO();
		$UpdateCustomer=$UDAO->updatereserve($Reserveno, $singleno, $doubleno, $arrivaldate, $deparaturedate);

		$UDAO1=new CustomerDAO();
		$UpdateCustomer1=$UDAO1->UpdateCustomer($Reserveno);

		if ($UpdateCustomer==1  && $UpdateCustomer1==1){
			$_SESSION['CancelFlag']=2;
			$_SESSION['name']=$_SESSION['nameupdate'];
			$_SESSION['phone']=$_SESSION['phonenoupdate'];
			$_SESSION['gender']=	$_SESSION['optradioupdate'];
			$_SESSION['ArrivalDate']=$_SESSION['arrivaldateupdate'];
			$_SESSION['DeparatureDate']=$_SESSION['departuredateupdate'];
			$_SESSION['Single']= $_SESSION['singleroomupdate'];
			$_SESSION['Double']= $_SESSION['doubleroomupdate'];
			
			echo $_SESSION['Single'];
			echo $_SESSION['Double'];
			
		header('location:../View/UpdatedCustomerInfoView.php');
		}

		else
		{	
			$_SESSION['CancelFlag']=5;
			header('location:../View/CancelUpdateReservationView.php');
	}
	}

		
	}

