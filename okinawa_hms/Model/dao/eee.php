<?php
$dsn = "mysql:dbname=fujitsu";
$username = "root";
$password = "";
$Reserveno=2;


try {
  $conn = new PDO( $dsn, $username, $password );
  $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch ( PDOException $e ) {

  echo "Connection failed: " . $e->getMessage();
}
$RoomCancelSql	="SELECT  roomID  from Reservation where  ReserveID='". $Reserveno."'";

try {

  $results = $conn->query( $RoomCancelSql);

  foreach ($results  as $key) {

    $RoomID=$key['roomID'];
    echo $RoomID;

  }

}
catch (PDOException $e){
  echo "Query failed: " . $e->getMessage();
}

$conn = null;


?>
