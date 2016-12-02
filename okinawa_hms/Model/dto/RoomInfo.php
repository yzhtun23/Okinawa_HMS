<?php


class RoomInfo {
	private $roomID;
	private  $roomType;
	private $roomDate;
	private $price;
	private $status;
	
	
public function __construct($roomID,$roomType,$roomDate,$price,$status){
	$this->roomID = $roomID;
	$this->roomType = $roomType;
	$this->roomDate = $roomDate;
	$this->price = $price;
	$this->status = $status;
}
public function setroomID($roomID){
	$this->roomID = $roomID;
}
public function setroomType($roomType){
	$this->roomType = $roomType;
}
public function setroomDate($roomDate){
	$this->roomDate = $roomDate;
}
public function setprice($price){
	$this->price = $price;
}
public function setstatus($status){
	$this->status = $status;
}
public function getroomID(){
	return $this->roomID;
}
public function getroomType(){
	return $this->roomType;
}
public function getroomDate(){
	return $this->roomDate;
}
public function getprice(){
	return $this->price;
}
public function getstatus(){
	return $this->status;
}
}