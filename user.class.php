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
		var $id_number;

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

	function setIdNumber($val){

		$this->id_number = $val;
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
	function isAdmin(){

		$flagadmin = false;
		$uid = $this->getId();
		$results = mysql_query("select Type from user where User_Id = $uid");
		
		if(mysql_num_rows($results) > 0){
			$row = mysql_fetch_row($results);
		}
		 if ($row[0] == "admin")
		    		$flagadmin = true;

				return $flagadmin;
			}
	
	function getType(){
		//die($this->type);
		return $this->type;
	}

	function getIdNumber(){
		//die($this->type);
		return $this->id_number;
	}
	
	function mergeArrayToUser($row){
		$this->id = $row->User_Id;
		$this->name = $row->Name;
		$this->age = $row->Age;
		$this->address = $row->Address;
		$this->phone_number = $row->Phone_Number;
		$this->email_address = $row->Email_Address;
		$this->type = $row->Type;
		$this->password = $row->Password;
		$this->id_number = $row->Id_Number;
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
		
	mysql_query("INSERT INTO `library`.`user` (`User_Id`, `Name`, `Age`, `Address`, `Phone_Number`, `Email_Address`,`Password`,`Type`,`Id_Number`)".
	" VALUES (NULL, '$name', '$age', '$address', '$phone_number', '$email_address', '$password','$types','$id_number');
	")or die("INSERT INTO `library`.`user` (`User_Id`, `Name`, `Age`, `Address`, `Phone_Number`, `Email_Address`,`Password`,`Type`,`Id_Number`)".
	" VALUES (NULL, '$name', '$age', '$address', '$phone_number', '$email_address', '$password','$types','$id_number');
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
function saveUserToDb(){
	$u_id = $this->getId();
	$u_name = $this->getName();
	$u_age = $this->getAge();
	$u_address = $this->getAddress();
	$u_phoneNumber = $this->getPhoneNumber();
	$u_emailAddress = $this->getemailAddress();
	$u_age = $this->getAge();
	$u_password = $this->getPassword();

	mysql_query("UPDATE `library`.`user` SET `Name` = '$u_name',
`Age` = '$u_age',
`Address` = '$u_address',
`Phone_Number` = '$u_phoneNumber',
`Email_Address` = '$u_emailAddress',
`Password` = '$u_password' WHERE `user`.`User_Id` =$u_id") or die (mysql_error());

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