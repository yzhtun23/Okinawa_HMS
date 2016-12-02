<?php
class  ReservationInfo {
	private $reserveID;
	private  $arrivalDate;
	private $depatureDate;
	private $singleno;
	private $doubleno;
	private  $reservestatus;
	
		
public function __construct($reserveID,$arrivalDate,$depatureDate,$singleno,$doubleno,$reservestatus){
	 $this->reserveID = $reserveID;
	 $this->arrivalDate = $arrivalDate;
	  $this->depatureDate = $depatureDate;
	$this->singleno = $singleno;
	$this->doubleno = $doubleno;
	$this->reservestatus = $reservestatus;
}
public function  setreserveID($reserveID) {
 $this->reserveID = $reserveID;
}
public function  setarrivalDate($arrivalDate) {
 $this->arrivalDate = $arrivalDate;
}
public function  setdepatureDate($depatureDate) {
 $this->depatureDate = $depatureDate;
}
public function  setsingleno($singleno) {
 $this->singleno = $singleno;
}

public function  setdoubleno($doubleno) {
 $this->doubleno = $doublenono;
}
public function  setreserve($reservestatus) {
 $this->reservestatus = $reservestatus;
}
public function  getreservestatus() {
return  $this->reservestatus ;
}
public function  getreserveID() {
return  $this->reserveID ;
}
public function  getarrivalDate() {
 return $this->arrivalDate;
}
public function  getdepatureDate() {
return  $this->depatureDate;
}
public function  getsingleno() {
 return $this->singleno;
}

public function  getdoubleno() {
 $this->doubleno = $doublenono;
}

}

/*$obj=new ReservationInfo(1,"2012-3-5","2012-3-15",1,0,1);
$i=$obj->getsingleno();
echo  $i;*/


?>