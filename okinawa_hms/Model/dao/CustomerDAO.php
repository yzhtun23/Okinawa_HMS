<?php

class CustomerDAO{
public function reservationInfo($name,$email,$gender,$phoneno,$address,$arrivaldate,$departuredate,$singleno,$doubleno){
$arryear=substr($arrivaldate, 2,2);
		$depyear=substr($departuredate, 2,2);
		$arrmonth=substr($arrivaldate,5, 2);
		$depmonth=substr($departuredate,5, 2);

		if((int)$depyear > (int)$arryear){
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
				$dep=substr($departuredate,8,2);
				$date=$days+$arrday+(int)$dep;
				$date2=$date;
			}
			elseif((int)$arrmonth== 2){
				$arr=substr($arrivaldate,8, 2);
				$arrday=28-(int)$arr;
				$dep=substr($departuredate,8,2);
				$date=$days+$arrday+(int)$dep;
				$date2=$date;
			}
			elseif ((int)$arrmonth==1||3||5||7||8||9||10||11){
				$arr=substr($arrivaldate,8, 2);
				$arrday=31-(int)$arr;
				$dep=substr($departuredate,8,2);
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
				$dep=substr($departuredate,8,2);
				$date=$days+$arrday+(int)$dep;
				$date2=$date;
			}
			elseif((int)$arrmonth== 2){
				$arr=substr($arrivaldate,8, 2);
				$arrday=28-(int)$arr;
				$dep=substr($departuredate,8,2);
				$date=$days+$arrday+(int)$dep;
				$date2=$date;
			}
			elseif ((int)$arrmonth==1||3||5||7||8||9||10||11){
				$arr=substr($arrivaldate,8, 2);
				$arrday=31-(int)$arr;
				$dep=substr($departuredate,8,2);
				$date=$days+$arrday+(int)$dep;
				$date2=$date;
			}

		}
		elseif((int)$depyear = (int)$arryear && (int)$depmonth == (int)$arrmonth) {
			$arr=substr($arrivaldate,8, 2);
			$dep=substr($departuredate,8,2);
			$date=(int)$dep-(int)$arr;
		    	$date2=$date;
		}
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
		try{
			$maxsql='SELECT MAX(ReserveID) from reservation';
			$maxrow=$conn->query($maxsql)->fetchColumn();
			$reservemax=(int)$maxrow;
			$reserve=$reservemax+1;

			$sql='SELECT MAX( RoomID )FROM room';
			$row=$conn->query($sql)->fetchColumn();
			$max=(int)$row;
			$cloumn=$max+$singleno;

			if($singleno!=0){
				for($i=$max+1; $i<=$cloumn; $i++){
					$sql8='SELECT MAX( RoomID )FROM room';
					$row8=$conn->query($sql8)->fetchColumn();
					$max8=(int)$row8;
					for($j=0; $j<=$date; $j++){
						$room=$max8+$j+1;
						$sql1='Insert into room(RoomType,RoomDate,Status)
						 values("Single",DATE_ADD("'.$arrivaldate.'", INTERVAL '.$j.' DAY)
						 ,1)';
						$conn->query( $sql1);
						$sql3='INSERT INTO reservation( ReserveID, ArrivalDate, DeparatureDate, ReserveStatus, RoomID )
						VALUES ( '.$reserve.', "'.$arrivaldate.'", "'.$departuredate.'", 1, '.$room.')';
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
						VALUES ( '.$reserve.', "'.$arrivaldate.'", "'.$departuredate.'", 1, '.$roomcount.')';
						$conn->query( $sql7);
					}
				}
			}
			$sql4='Insert into customer(ReserveID,CustName,CustAddress,CustPhone,Gender,CustEmail,Single_No_of_room,Double_No_of_room) values
			('.$reserve.',"'.$name.'","'.$address.'",'.$phoneno.',"'.$gender.'","'.$email.' ", '.$singleno.' ,'.$doubleno.')';
			$row4 = $conn->query( $sql4);
			$sql10='SELECT MAX( ReserveID ) FROM  customer';
			$reserverow=$conn->query($sql10)->fetchColumn();
			$reseveno=(int)$reserverow;

		}
		catch (PDOException $e){
			echo "Query failed: " . $e->getMessage();
		}

		$conn = null;
		$_SESSION['reseveID']=$reseveno;
		return 1;

	}

public function UpdateCustomer(){

		$dsn = "mysql:dbname=fujitsu";
		$username = "root";
		$password = "";
		$Reserveno=$_SESSION['Reserveno'];
		$name=$_SESSION['nameupdate'];
		$gender=$_SESSION['optradioupdate'];
		$phoneno=$_SESSION['phonenoupdate'];

		try {
			$conn = new PDO( $dsn, $username, $password );
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

		}
		catch ( PDOException $e ) {

			echo "Connection failed: " . $e->getMessage();
		}
		$updatecustomersql="UPDATE CUSTOMER SET CustName='".$name."' , Gender='".$gender."' ,CustPhone='".$phoneno."'where ReserveID='". $Reserveno."'";
try {

   			$R = $conn->query( $updatecustomersql);

			return $_SESSION['Flag']=1;


		}


		catch (PDOException $e){
			echo "Query failed: " . $e->getMessage();
		}

		$conn = null;

	}

}
?>
