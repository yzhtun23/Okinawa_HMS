<?php
class CustomerInfo{
	private $custID;
	private  $custName;
	private $custAddress;
	private $phoneno;
	private  $gender;
	private $custEmail;
	
	public function __construct($custID,$custName,$custAddress,$phoneno,$gender,$custEmail){
	 $this->custID = $custID;
	 $this->custName=$custName;
	 $this->custAddress=$custAddress;
	$this->phoneno=$phoneno;
	$this->gender = $gender;
	$this->custEmail = $custEmail;
	}
 
public function  setcustID($custID) {
 $this->custID = $custID;
}
public function  setcustName($custName) {
 $this->custName = $custName;
}
public function setcustAddress($custAddress){
	 $this->custAddress=$custAddress;
	}
	public function setphoneno($phoneno){
		  $this->phoneno=$phoneno;
			}
	public function setgender($gender){
				 $this->gender=$gender;
			}
	public  function setcustEmail($custEmail){
		 $this->custEmail=$custEmail;
	}
	public function getcustID(){
		return $this->custID;
	}
	public function getcustName(){
		return $this->custName;
	}
	public function getcustAddress(){
		return $this->custAddress;
	}
	public function getphoneno(){
		return  $this->phoneno;
			}
	public function getgender(){
				return $this->gender;
			}
	public  function getcustEmail(){
		return $this->custEmail;
	}
}