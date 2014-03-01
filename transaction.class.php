<?php
require( './connector.php' );
	class Transaction{
		var $Id;
		var $Date_Claimed;
		var $Date_Returned;
		var $Status;
		var $Stocks;
		var $Book_Id;
		var $User_Id;


	function setId($val){
		$this->id=$val;
		
	}

	function setDateClaimed($val){

		//$this->dateclaimed = date();
	}


	function setDateReturned($val){

		//$this->datereturned = $val;
	}

	function setStatus($val){

		$this->status = $val;
	}
	function setStocks($val){

		$this->stocks = $val;
	}
	function setBookId($val){

		$this->bookid = $val;
	}
	function setUserId($val){

		$this->userid = $val;
	}




	function getId(){
		return $this->id;

	}
	function getDateClaimed(){
		return $this->Date_Claimed;

	}
	function getDateReturned(){
		return $this->Date_Returned;

	}
	function getStatus(){
		return $this->status;

	}
	function getStocks(){
		return $this->stocks;
	}
	function getBookId(){

		return $this->bookid;
	}

	
	function getUserId(){
		return $this->userid;

	}
	
	function getTransactionsByUserId($userid){
	$resultArray = array();


		$result = mysql_query("	SELECT transaction . * , books.Title".
								 " FROM transaction, books".
								 " WHERE User_Id = '$userid'".
								 " AND transaction.Book_Id = books.Book_Id")
								 or die
								 (mysql_error());
		while ( $row = @mysql_fetch_object( $result ) ) {
				$resultArray[] = $row;
			}			
			
			return $resultArray;
	}

	function getTransactions(){
	$resultArray = array();


		$result = mysql_query("SELECT * , books.Title ".
								"FROM transaction ".
								"INNER JOIN books ON books.Book_Id = transaction.Book_Id")
								 or die
								 (mysql_error());

			while ( $row = @mysql_fetch_object( $result ) ) {
							 " WHERE transaction.Book_Id = books.Book_Id";
				$resultArray[] = $row;
			}			
			//die(print_r($resultArray));
			return $resultArray;
	}
	function getTransactionss(){
	$resultArray = array();


		$result = mysql_query("	SELECT transaction . * , books.Book_Id, books.Title, books.condition, books.damage, (transaction.Date_Returned) as penalty".
								//" books.condition, books.damage".
								 " FROM transaction, books".
								// " WHERE User_Id = '$userid'".
								 " WHERE transaction.Book_Id = books.Book_Id")
								 or die
								 (mysql_error());
		while ( $row = @mysql_fetch_object( $result ) ) {
				$penalty = floor((time() - strtotime($row->penalty))/86400)*10;

				$row->penalty = ($penalty > 0)?$penalty:'0';
				$row->Status = ($row->Status)?'reserve':'borrow';
				$row->condition = ($row->condition)?'good':'damaged';	
				$resultArray[] = $row;
			//	die(print_r($row));

				//$resultArray[] = $penalty*10;
			}			
			$aaData['aaData'] = $resultArray;
			$aar[] = $aaData;
			return ( json_encode($resultArray) );
	}
	
	function saveTransaction($userid,$bookid){
	$today = date('Y-m-d 00:00:00');
	$return = date('Y-m-d 00:00:00',strtotime($today . '+10 days'));
		mysql_query("INSERT INTO `library`.`transaction` ".
	"(`T_Id`, `Date_Claimed`, `Date_Returned`, `Status`, `Stocks`, `Book_Id`, `User_Id`) ".
		"VALUES ".
		"(NULL, '$today', '$return', '1', '', '$bookid', '$userid')")
		or die
		(mysql_error());
	
	return 'Okay!';
	}

	function updateTransaction( $id, $value, $column ){
		//die($column);
		if($column == 'Status'){
		mysql_query("UPDATE `transaction` SET `$column` = '$value' WHERE `T_Id` =$id;")
		or die
		(mysql_error());
		}else{
//			die("UPDATE books SET $column = '$value' WHERE Book_Id =$id;");
		mysql_query("UPDATE `books` SET `$column` = '$value' WHERE `Book_Id` =$id;")
		or die
		(mysql_error());
	}
		return 'okay';
			
	}

	
}?>