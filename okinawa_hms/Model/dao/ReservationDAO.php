<?php

class ReservationDAO  {
	public function CheckReserve($Reserveno,$Email) {

		$dsn = "mysql:dbname=fujitsu";
		$username = "root";
		$password = "";
	
		try {
			$conn = new PDO( $dsn, $username, $password );
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		}
		catch ( PDOException $e ) {

			echo "Connection failed: " . $e->getMessage();
			header('location:../View/Error.php');
		}

		$sql = 'SELECT  custID  from Customer  where ReserveID='.$Reserveno.' and  custEmail="'.$Email.'"';
		$sql1 ="SELECT  custName,custAddress,custPhone,gender,Single_No_of_room,Double_No_of_room   from  Customer  where ReserveID='". $Reserveno."'";
		$sql2="SELECT  ArrivalDate,DeparatureDate  from Reservation where ReserveID='". $Reserveno."'";
		try {
			
			
		$AlreadyCancelsql ="SELECT  ReserveStatus     from  Reservation  where  ReserveID='". $Reserveno."'";
		
			$AlreadyCancel = $conn->query( $AlreadyCancelsql );

			foreach ($AlreadyCancel  as $AlreadyCancelkey) {
				$status = $AlreadyCancelkey['ReserveStatus'];

			}

			if (isset($status) && $status==0){

				
				$_SESSION['CancelFlag']=4;
				
			}
			
			
			$results = $conn->query( $sql );
			$results1=$conn->query($sql1);
			$results2=$conn->query($sql2);


			foreach ($results1  as $key1) {
				$name = $key1['custName'];
				$add=$key1['custAddress'];
				$phone=$key1['custPhone'];
				$gender=$key1['gender'];
				$Single=$key1['Single_No_of_room'];
				$Double=$key1['Double_No_of_room'];
			}
			foreach ($results2 as $key2){
				$ArrivalDate=$key2['ArrivalDate'];
				$DeparatureDate=$key2['DeparatureDate'];

			}
			
				
			

			foreach ($results as $key) {
				$id = $key['custID'];

			}

			if (isset($id)){


				$_SESSION['name']=$name;
				$_SESSION['email']=$Email;
				$_SESSION['RID']=$Reserveno;
				$_SESSION['phone']=$phone;
				$_SESSION['gender']=$gender;
				$_SESSION['ArrivalDate']=$ArrivalDate;
				$_SESSION['DeparatureDate']=$DeparatureDate;
				$_SESSION['Add']=$add;
				$_SESSION['Single']=$Single;
				$_SESSION['Double']=$Double;
				$_SESSION['Exit']=1;
				$_SESSION['WrongReserve']=0;

				return $_SESSION['WrongReserve'];
			}
			else  {
				$_SESSION['WrongReserve']=1;
				$_SESSION['Exit']=0;
				return $_SESSION['WrongReserve'];

			}
		}
		catch (PDOException $e){
			echo "Query failed: " . $e->getMessage();
		}

		$conn = null;
	}

	public function CancelReserve(){

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
			header('location:../View/Error.php');
		}

		$Cancelsql ="SELECT  ReserveStatus     from  Reservation  where  ReserveID='". $Reserveno."'";
		try {
			$results = $conn->query( $Cancelsql );

			foreach ($results as $key) {
				$status = $key['ReserveStatus'];

			}

			if (isset($status) && $status==1){

				$Cancelsql1="UPDATE Reservation set ReserveStatus=0 where ReserveID='". $Reserveno."'";
				$results1 = $conn->query( $Cancelsql1 );

				$_SESSION['CancelFlag']=1;
				return $_SESSION['Flag']=1;
			}
			else  {
				
				return $_SESSION['Flag']=1;
			}
		}

		catch (PDOException $e){
			echo "Query failed: " . $e->getMessage();
			header('location:../View/Error.php');
		}

		$conn = null;

	}

	public function checkroom($arrivaldate,$departuredate,$singleno,$doubleno){

		$checkroomflag=null;
		$dsn = "mysql:dbname=fujitsu";
		$username = "root";
		$password = "";

		try {
			$conn = new PDO( $dsn, $username, $password );
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

		}
		catch ( PDOException $e ) {

			echo "Connection failed: " . $e->getMessage();
			header('location:../View/Error.php');
		}

		try {
			$sql1=' SELECT  count(RoomID) from Room where RoomDate between " '.$arrivaldate.' " and "'.$departuredate.'" and RoomType="Single" and Status=1';
			$rows1 = $conn->query( $sql1 )->fetchColumn();

			$sql2=' SELECT  count(RoomID) from Room where RoomDate=" '.$arrivaldate.' " and "'.$departuredate.'" and RoomType="Double" and Status=1';
			echo "<ul>";
			$rows2 = $conn->query($sql2)->fetchColumn();
			$single=20-$rows1;
			$double=10-$rows2;

			if ($single >= $singleno &&  $double>=$doubleno){
				$checkroomflag=1;
			}else {
				$checkroomflag=0;
			}
			echo "DAO:{$checkroomflag}";
			return $checkroomflag;
		}
		catch (PDOException $e){
			echo "Query failed: " . $e->getMessage();
			header('location:../View/Error.php');
		}
	}
	



	public function updatereserve($Reserveno,$singleno,$doubleno,$arrivaldate,$deparaturedate){
		echo $Reserveno,$singleno,$doubleno,$arrivaldate,$deparaturedate;
		


		$checkroomflag=null;
		$dsn = "mysql:dbname=fujitsu";
		$username = "root";
		$password = "";

		try {
			$conn = new PDO( $dsn, $username, $password );
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

		}
		catch ( PDOException $e ) {

			echo "Connection failed: " . $e->getMessage();
			header('location:../View/Error.php');
		}

		try {
			$conn->beginTransaction();
			$updatesql1="UPDATE Reservation set ReserveStatus=0 where ReserveID='". $Reserveno."'";
			$conn->query( $updatesql1 );

			$Sql	="SELECT  RoomID  from Reservation where  ReserveID='". $Reserveno."'";


			$results = $conn->query( $Sql);

			foreach ($results  as $key) {

				$RoomID=$key['RoomID'];
				$RoomCancelSql1	='Update  Room set Status=0  where  RoomID='.$RoomID.'';
				$results1 = $conn->query( $RoomCancelSql1);

			}

           $updatesql2=' SELECT  count(RoomID) from Room where RoomDate between " '.$arrivaldate.' " and "'.$deparaturedate.'" and RoomType="Single" and Status=1';
			$rows1 = $conn->query( $updatesql2 )->fetchColumn();

			$updatesql3=' SELECT  count(RoomID) from Room where RoomDate=" '.$arrivaldate.' " and "'.$deparaturedate.'" and RoomType="Double" and Status=1';
			echo "<ul>";
			$rows2 = $conn->query($updatesql3)->fetchColumn();
			$single=20-$rows1;
			$double=10-$rows2;

			if ($single >= $singleno &&  $double>=$doubleno){
				echo "Avaliable";



				$arryear=substr($arrivaldate, 2,2);
				$depyear=substr($deparaturedate, 2,2);
				$arrmonth=substr($arrivaldate,5, 2);
				$depmonth=substr($deparaturedate,5, 2);

				if((int)$depyear > (int)$arryear)
				{
					$countarr=12-(int)$arrmonth;
					$countarr2=$countarr+$depmonth;
					for ($o=1; $o<$countarr2; $o++){

						if((int)$arrmonth+$o== 4 || 6 || 9||11||16||18||21||23){
							$days=$days+30;
						}
						elseif ((int)$arrmonth+$o== 2||14){
							$days=$days+28;
						}
						elseif ((int)$arrmonth+$o== 1||3||5||7||8||10||11||13||15||17||19||20||22||24){
							$days=$days+31;
						}
					}
					if ((int)$arrmonth== 4 || 6 || 11){
						$arr=substr($arrivaldate,8, 2);
						$arrday=30-(int)$arr;
						$dep=substr($deparaturedate,8,2);
						$date=$days+$arrday+(int)$dep;
						$date2=$date;
					}
					elseif((int)$arrmonth== 2){
						$arr=substr($arrivaldate,8, 2);
						$arrday=28-(int)$arr;
						$dep=substr($deparaturedate,8,2);
						$date=$days+$arrday+(int)$dep;
						$date2=$date;
					}
					elseif ((int)$arrmonth==1||3||5||7||8||9||10||11){
						$arr=substr($arrivaldate,8, 2);
						$arrday=31-(int)$arr;
						$dep=substr($deparaturedate,8,2);
						$date=$days+$arrday+(int)$dep;
						$date2=$date;
					}

				}
				elseif((int)$depyear = (int)$arryear && (int)$depmonth > (int)$arrmonth) {

					$m=(int)$depmonth -(int)$arrmonth;
					for ($n=1; $n<$m; $n++){

						if((int)$arrmonth+$n== 4 || 6 || 11){
							$days=$days+30;
						}
						elseif ((int)$arrmonth+$n== 2){
							$days=$days+28;
						}
						elseif ((int)$arrmonth+$n== 1||3||5||7||8||9||10||11){
							$days=$days+31;
						}
					}

					if ((int)$arrmonth== 4 || 6 || 11){
						$arr=substr($arrivaldate,8, 2);
						$arrday=30-(int)$arr;
						$dep=substr($deparaturedate,8,2);
						$date=$da+$arrday+(int)$dep;
						$date2=$date;
					}
					elseif((int)$arrmonth== 2){
						$arr=substr($arrivaldate,8, 2);
						$arrday=28-(int)$arr;
						$dep=substr($deparaturedate,8,2);
						$date=$days+$arrday+(int)$dep;
						$date2=$date;
					}
					elseif ((int)$arrmonth==1||3||5||7||8||9||10||11){
						$arr=substr($arrivaldate,8, 2);
						$arrday=31-(int)$arr;
						$dep=substr($deparaturedate,8,2);
						$date=$days+$arrday+(int)$dep;
						$date2=$date;
					}

				}

				elseif((int)$depyear = (int)$arryear && (int)$depmonth == (int)$arrmonth) {
					$arr=substr($arrivaldate,8, 2);
					$dep=substr($deparaturedate,8,2);
					$date=(int)$dep-(int)$arr;
					$date2=$date;
				}




				$sql='SELECT MAX( RoomID )FROM room';
				$row=$conn->query($sql)->fetchColumn();
				$max=(int)$row;
				$cloumn=$max+$singleno;
				echo $cloumn;

				if($singleno!=0){
					for($i=$max+1; $i<=$cloumn; $i++){
						$sql8='SELECT MAX( RoomID )FROM room';
						$row8=$conn->query($sql8)->fetchColumn();
						$max8=(int)$row8;
						echo "max";
						for($j=0; $j<=$date; $j++){
							$room=$max8+$j+1;

							$sql1='Insert into room(RoomType,RoomDate,Status)
							values("Single",DATE_ADD("'.$arrivaldate.'", INTERVAL '.$j.' DAY)
							,1)';
							$conn->query( $sql1);
							$sql3='INSERT INTO reservation( ReserveID, ArrivalDate, DeparatureDate, ReserveStatus, RoomID )
							VALUES ( '.$Reserveno.', "'.$arrivaldate.'", "'.$deparaturedate.' ", 1, '.$room.')';
							$conn->query( $sql3 );
						}
					}
				}

				$sql5='SELECT MAX( RoomID )FROM room';
				$row5=$conn->query($sql5)->fetchColumn();
				$max5=(int)$row5;
				$cloumn1=$max5+$doubleno;

				if($doubleno!=0){
					for($k=$max5+1; $k<=$cloumn1; $k++){
						$sql9='SELECT MAX( RoomID )FROM room';
						$row9=$conn->query($sql9)->fetchColumn();
						$max9=(int)$row9;
						for($l=0; $l<=$date; $l++){
							$roomcount=$max9+$l+1;
							echo "roomcount:{$roomcount}";

							$sql6='Insert into room(RoomType,RoomDate,Status)
							values("Double",DATE_ADD(" '.$arrivaldate.' ", INTERVAL '.$l.' DAY)
							,1)';
							$conn->query( $sql6);

							$sql7='INSERT INTO reservation( ReserveID, ArrivalDate, DeparatureDate, ReserveStatus, RoomID )
							VALUES ( '.$Reserveno.', "'.$arrivaldate.'", "'.$deparaturedate.'", 1, '.$roomcount.')';
							$conn->query( $sql7);
						}
					}
				}


				$conn->commit();
				return $_SESSION['UpdateReservationFlag']=1;
			}

			else {
				echo "Not Avaliable";
				return $_SESSION['UpdateReservationFlag']=0;
				$conn->rollBack();

			}

		}
		catch (PDOException $e){
			echo "Query failed: " . $e->getMessage();
			header('location:../View/Error.php');
		}

	}

}

?>
