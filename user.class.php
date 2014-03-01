<?php
require( './connector.php' );
	class User{
		var $id;
		var $name;
		var $age;
		var $address;
		var $phone_number;
		var $email_address;
		var $transaction_Number;
		var $password;
		var $type;

	function setId($val){
		$this->id=$val;
		
	}

	function setName($val){

		$this->name = $val;
	}


	function setAge($val){

		$this->age = $val;
	}

	function setAddress($val){

		$this->address = $val;
	}
	function setPhoneNumber($val){

		$this->phone_number = $val;
	}
	function setEmailAddress($val){

		$this->email_address = $val;
	}
	function setTransactionNumber($val){

		$this->transaction_number = $val;
	}
	
	function setPassword($val){

		$this->password = $val;
	}
	
	function setType($val){

		$this->type = $val;
	}




	function getId(){
		return $this->id;

	}
	function getName(){
		return $this->name;

	}
	function getAge(){
		return $this->age;

	}
	function getAddress(){
		return $this->address;

	}
	function getPhoneNumber(){
		return $this->phone_number;
}
	function getEmailAddress(){

		return $this->email_address;
	}

	
	function getPassword(){
		return $this->password;

	}
	
	function getType(){
		//die($this->type);
		return $this->type;
	}
	
	function mergeArrayToUser($row){
		$this->id = $row->User_Id;
		$this->name = $row->Name;
		$this->age = $row->Age;
		$this->address = $row->Address;
		$this->phone_number = $row->Phone_Number;
		$this->email_address = $row->Email_Address;
		$this->type = $row->Type;
}

	function getUser($id){
$resultArray = array();
		$result = mysql_query("select * from `library`.`user` where `User_Id` = '$id'")or die(mysql_error());
//$row = mysql_fetch_object( $result )
			while ( $row = @mysql_fetch_object( $result ) ) {
				//echo $row->User_Id.'<br />';
				//echo $row->Name.'<br />';
				$resultArray[] = $row;
			}
			$this->mergeArrayToUser($resultArray[0]);
	}
	function userlogin($name,$pass){
		$result = mysql_query("SELECT * FROM `user` WHERE `Name` = '$name' AND `Password` = '$pass'");
		if(mysql_num_rows($result) > 0){
			while ( $row = @mysql_fetch_object( $result ) ) {
				die( $row->User_Id );
			}
		}else{
			return false;
		}
	}
function saveUser(){

	/* save the book as new row in book table if id is defined else save the book object as update */

		$name = $this->getName();
		$age = $this->getAge();
		$address = $this->getAddress();
		$phone_number = $this->getPhoneNumber();
		$email_address = $this->getEmailAddress();
	//	$transaction_number = $this->getTransactionNumber();
		$password = $this->getPassword();
		$types = $this->getType();
		
	mysql_query("INSERT INTO `library`.`user` (`User_Id`, `Name`, `Age`, `Address`, `Phone_Number`, `Email_Address`,`Password`,`Type`)".
	" VALUES (NULL, '$name', '$age', '$address', '$phone_number', '$email_address', '$password','$types');
	")or die("INSERT INTO `library`.`user` (`User_Id`, `Name`, `Age`, `Address`, `Phone_Number`, `Email_Address`,`Password`,`Type`)".
	" VALUES (NULL, '$name', '$age', '$address', '$phone_number', '$email_address', '$password','$types');
	");

	}	
function findUser($val){
$result = mysql_query("select * from `library`.`user` where `Name` = '$val'")or die(mysql_error());
//$row = mysql_fetch_object( $result )
			while ( $row = @mysql_fetch_object( $result ) ) {
				echo $row->User_Id.'<br />';
				echo $row->Name.'<br />';
			}
}
function getList($sortVal){

	/* get all book sorted according to sortVal and return all results as an array */
		return false;
}	
function getUserList(){
	$resultArray = array();

	$result = mysql_query("select * from user");
	while ( $row = @mysql_fetch_object( $result ) ) {
				$resultArray[] = $row;
			}
			//return(json_encode($resultArray));
			return $resultArray;

}
}?>