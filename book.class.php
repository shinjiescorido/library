<?php
require( './connector.php' );
class Book{
	var $id;
	var $title;
	var $author;
	var $isbn;
	var $publisher;
	var $location;
	var $status;
	var $category;
	
	function setDefaults(){
	//	$this->id = '';
		$this->title = 'the sample title';
		$this->author = 'the sample author';
		$this->isbn = 'the sample isbn';
		$this->publisher = 'the sample publisher';
		$this->location = 'the sample location';
		$this->status = 'the sample status';
		$this->category = 'the sample category';
		
	}
	function getDefaults(){
		return $this;
		
	}
	function display(){
		//echo "<br />id: ".$this->getId();
		echo "<br />title: ".$this->getTitle();
		echo "<br />author: ".$this->getAuthor();
		echo "<br />isbn: ".$this->getIsbn();
		echo "<br />publisher: ".$this->getPublisher();
		echo "<br />location: ".$this->getLocation();
		echo "<br />status: ".$this->getStatus();
		echo "<br />category: ".$this->getCategory();
	}
	/* setters */
	function setId($val){
		$this->id = $val;
	}
	function setTitle($val){
		$this->title = $val;
	}
	function setAuthor($val){
		$this->author = $val;
	}
	function setIsbn($val){
		$this->isbn = $val;
	}
	function setPublisher($val){
		$this->publisher = $val;
	}
	function setLocation($val){
		$this->location = $val;
	}
	function setStatus($val){
		$this->status = $val;
	}
	function setCategory($val){
		$this->category = $val;
	}

	/* getters */
	function getId(){
		return $this->id;
	}
		function getTitle(){
		return $this->title;
	}

		function getAuthor(){
		return $this->author;
	}

		function getIsbn(){
		return $this->isbn;
	}

		function getPublisher(){
		return $this->publisher;
	}

		function getLocation(){
		return $this->location;
	}

		function getStatus(){
		return $this->status;
	}

		function getCategory(){
		return $this->category;
	}
	
function getCatLists(){
	$resultArray = array();
$result = mysql_query("select * from `library`.`category`")or die(mysql_error());
	while ( $row = @mysql_fetch_object( $result ) ) {
				$resultArray[] = $row;
			}
			
			return($resultArray);
			//die();
}
function mergeArrayToBook($row){
	
		$this->id = $row->Book_Id;
		$this->title = $row->Title;
		$this->author = $row->Author;
		$this->isbn = $row->ISBN;
		$this->publisher = $row->Publisher;
		$this->location = $row->Location;
		$this->status = $row->Status;
		$this->category = $row->Category;
}
function saveBook(){

	/* save the book as new row in book table if id is undefined else save the book object as update */

		$title = $this->getTitle();
		$author = $this->getAuthor();
		$isbn = $this->getIsbn();
		$publisher = $this->getPublisher();
		$location = $this->getLocation();
		$status = $this->getStatus();
		$category = $this->getCategory();
		
		if(!$this->getId()){
		mysql_query("INSERT INTO `library`.`books` (`Book_Id`, `Title`, `Author`, `ISBN`, `Publisher`, `Location`, `Status`, `Category`)".
		" VALUES (NULL, '$title', '$author', '$author', '$publisher', '$location', '$status', '$category');
		")or die(mysql_error());
	}else{
	$bookid = $this->getId();

		$res = mysql_query("UPDATE `library`.`books` SET ". 
"`Author` = '$author', ".
"`Title` = '$title', ".
"`ISBN` = '$isbn', ".
"`Publisher` = '$publisher', ".
"`Location` = '$location', ".
"`Status` = '$status', ".
"`Category` = '$category' ".
" WHERE `books`.`Book_Id` ='$bookid'")or die(mysql_error());
			if ($res){
				return "saved successfully";
			}
	}
	}	
function findBook($val,$option){
$resultArray = array();
$result = mysql_query("select * from `library`.`books` where `$option` like '%$val%'")or die(mysql_error());
	while ( $row = @mysql_fetch_object( $result ) ) {
				$resultArray[] = $row;
			}
			$resultArray = $this->getCategoryName($resultArray);
			return $resultArray;
}
function findOneBook($val){
$resultArray = array();
$result = mysql_query("select * from `library`.`books` where `Book_Id` = '$val'")or die(mysql_error());
	while ( $row = @mysql_fetch_object( $result ) ) {
				$resultArray[] = $row;
			}
$this->mergeArrayToBook($resultArray[0]);
			
			return true;
}
function getCategoryName($rs){
//die (print_r($rs));
foreach($rs as $r){
	$result = mysql_query("select `Title` from `library`.`category` where `C_Id` = '{$r->Category}'")or die(mysql_error());
	$row = mysql_fetch_object( $result );
	$r->Category = $row->Title;
	}
	//die (print_r($rs));
	return $rs;
		//return $this->category;
	}
function getList($sortVal){
$resultArray = array();
	/* get all book sorted according to sortVal and return all results as an array */
	$result = mysql_query("select * from `library`.`books`")or die(mysql_error());
			while ( $row = @mysql_fetch_object( $result ) ) {
				$resultArray[] = $row;
			}
			
			$resultArray = $this->getCategoryName($resultArray);
			return $resultArray;
}
	
} ?>