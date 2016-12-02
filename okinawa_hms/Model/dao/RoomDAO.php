<?php
class RoomDAO{

	public function CancelRoom() {

		$dsn = "mysql:dbname=fujitsu";
		$username = "root";
		$password = "";
		$Reserveno=$_SESSION['Reserveno'];
		$Email=$_SESSION['Email'];

		try {
			$conn = new PDO( $dsn, $username, $password );
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		}
		catch ( PDOException $e ) {

			echo "Connection failed: " . $e->getMessage();
		}
	$RoomCancelSql	="SELECT  RoomID  from Reservation where  ReserveID='". $Reserveno."'";

		try {

			$results = $conn->query( $RoomCancelSql);

			foreach ($results  as $key) {

			$RoomID=$key['RoomID'];
			$RoomCancelSql1	='Update  Room set Status=0  where  RoomID='.$RoomID.'';
			$results1 = $conn->query( $RoomCancelSql1);

		  		    					}

		}
			catch (PDOException $e){
			echo "Query failed: " . $e->getMessage();
		}

		$conn = null;
	}

	public function VacancyStatusSingle() {
		$dsn="mysql:dbname=fujitsu";
		$username = "root";
		$password = "";
			try {
			$conn = new PDO( $dsn, $username, $password );
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

		}
		catch ( PDOException $e ) {

			echo "Connection failed: " . $e->getMessage();
		}
		$scount = array();
		$todayDate = date("Y-m-d");
		date_default_timezone_set("Asia/Rangoon");

		for($i=0;$i<182;$i++) {

			$startDate = strtotime("+".$i." day", strtotime("$todayDate"));
			$date = date("Y-m-d", $startDate);
			$sqlsingle = 'SELECT COUNT(RoomID) FROM room WHERE RoomType="Single" AND RoomDate="'.$date.'" AND Status=1';
			$scount[$i] = $conn->query($sqlsingle)->fetchColumn();
			$scount[$i] = 20 - $scount[$i];

		}
		return $scount;

	}

	public function VacancyStatusDouble() {
		$dsn="mysql:dbname=fujitsu";
		$username = "root";
		$password = "";
			try {
			$conn = new PDO( $dsn, $username, $password );
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

		}
		catch ( PDOException $e ) {

			echo "Connection failed: " . $e->getMessage();
		}
		$todayDate = date("Y-m-d");
		$dcount = array();
		date_default_timezone_set("Asia/Rangoon");

		for($i=0;$i<182;$i++) {

			$startDate = strtotime("+".$i." day", strtotime("$todayDate"));
			$date = date("Y-m-d", $startDate);
			$sqldouble = 'SELECT COUNT(RoomID) FROM room WHERE RoomType="Double" AND RoomDate="'.$date.'" AND Status=1';
			$dcount[$i] = $conn->query($sqldouble)->fetchColumn();
			$dcount[$i] = 10 - $dcount[$i];
		}
		return $dcount;

	}



}
