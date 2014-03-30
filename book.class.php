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
	function _display(){
		//echo "<br />id: ".$this->getId();
		echo "<br />title: ".$this->getTitle();
		echo "<br />author: ".$this->getAuthor();
		echo "<br />isbn: ".$this->getIsbn();
		echo "<br />publisher: ".$this->getPublisher();
		echo "<br />location: ".$this->getLocation();
		echo "<br />status: ".$this->getStatus();
		echo "<br />category: ".$this->getCategory();
		echo ($this->getCopies($this->getTitle()) > 1) ? "<br />Copies: ".$this->getCopies($this->getTitle()) : '';
	}
	function getCopies($val){
	$result = mysql_query("SELECT count( * ) AS copies"
		." FROM `books`"
		." WHERE `Title` = '$val'") or die (mysql_error());
	$data=mysql_fetch_assoc($result);
	//die(print_r($data));
return ($data['copies'])?$data['copies']:false;

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
			$today = date('Y-m-d 00:00:00');
mysql_query("INSERT INTO `library`.`books` (`Book_Id`, `Title`, `Author`, `ISBN`, `Publisher`, `Location`, `Status`,`condition`, `Category`,`Date_Created`)".
		" VALUES (NULL, '$title', '$author', '$author', '$publisher', '$location', 0,0, '$category','$today');
		")or die(mysql_error());
		$res_ = mysql_query("SELECT `Book_Id` FROM `books` WHERE `Title` = '$title' AND `Author` = '$author'");
	return mysql_fetch_object($res_)->Book_Id;
	}else{
	$bookid = $this->getId();
//die($status);
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
	//return $bookid;
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
function getBookByCondition($con){
	$query = '';
	$_con = (!$con) ? '0' : $con;
	//die("ddd".$_con."rr");
				$query = "select * from `books` where `condition` = $_con";
//die ($query);
	$resultArray = array();
$result = mysql_query($query) or die(mysql_error());
	while ( $row = @mysql_fetch_object( $result ) ) {
				$resultArray[] = $row;
			}
			$resultArray = $this->getCategoryName($resultArray);
			//die(print_r($resultArray));

			//$this->mergeArrayToBook($resultArray[0]);
			return $resultArray;
 		/* 
 		condition 1 = missing
 		condition 2 = damaged
 		condition 3 = old
 		else conrmal

 		 */
	}
function findOneBook($val){
$resultArray = array();
$result = mysql_query("select * from `library`.`books` where `Book_Id` = '$val'")or die(mysql_error());
	while ( $row = @mysql_fetch_object( $result ) ) {
				$resultArray[] = $row;
			}
						$resultArray = $this->getCategoryName($resultArray);
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
function isBorrowed ($id){
	$result = mysql_query("select b.Book_Id from books as b, transaction as t where b.Book_Id = t.Book_Id and t.status = 1 and b.Book_Id = $id");
//	die("select b.Book_Id from books as b, transaction as t where b.Book_Id = t.Book_Id and t.status = 0 and b.Book_Id = $id");
//die($result);

	if (mysql_num_rows($result))
		return true;
	else
		return false;



}
function getReturned($id){
	$result = ("select t.Date_Returned where books as b, transaction as t 
		where t.Book_Id = b.Book_Id 
		and b.Book_Id = $id
		");
	return $result;
}
function getAllBooks(){
$resultArray = array();
	/* get all book sorted according to sortVal and return all results as an array */
	$result = mysql_query("select * from `books` where `Status` < 2 && `condition` = 0")or die(mysql_error());
	//die("select * from `books` where (`Status` = 0 || `Status` = 1) && `condition` = 0");
	// $userObj = new User();
	// $allUser = $userObj->getUserList();
	// $userOptions = "";
	// foreach ($allUser as $user) {
	// $userOptions = $userOptions . "<option value='{$user->User_Id}'>".$user->Name."</option>";
	// }
	/*die("<a data-toggle='modal' data-target='#issue-{$row->Book_Id}' href=''>Issue book</a>".
				"<div id='#issue-{$row->Book_Id}'>".
				"<form action=''>".
					"Student Name:".
					"<select name='sid'>".
						$userOptions.
					"</select>".
				"</form>".


				"</div>");*/
	while ( $row = @mysql_fetch_object( $result ) ) {
				//$condition_ = floor((time() - strtotime($row->penalty))/86400)*10;

				//$row->condition_ = ($penalty > 0)?$penalty:'0';
				//$row->Status = ($row->Status)?'reserve':'borrow';
				//$row->condition = ($row->condition)?'good':'damaged';	
			//	$row->Category = $this->getCategoryName($row->Category);
if($row->Status != 1)
$row->action = "<a data-toggle='modal' href='#issue' data-id='{$row->Book_Id}' class='btn btn-primary announce'>Issue book</a>";
else
$row->action = "<a data-toggle='modal' href='#reserve' data-id='{$row->Book_Id}' class='btn btn-success announce'>Reserve</a>";
				$resultArray[] = $row;
			//	die(print_r($row));

				//$resultArray[] = $penalty*10;
			}			
			//$aaData['aaData'] = $resultArray;
			//$aar[] = $aaData;
			$resultArray = $this->getCategoryName($resultArray);

			return ( json_encode($resultArray) );
			
			//$resultArray = $this->getCategoryName($resultArray);
			//return $resultArray;
}
function getList($sortVal){
$resultArray = array();
	/* get all book sorted according to sortVal and return all results as an array */
	$result = mysql_query("select * from `library`.`books` WHERE `condition` != 3")or die(mysql_error());
			while ( $row = @mysql_fetch_object( $result ) ) {
				$resultArray[] = $row;
			}
			
			$resultArray = $this->getCategoryName($resultArray);
			return $resultArray;
}

function getAllReservedBooks(){
$resultArray = array();
	/* get all book sorted according to sortVal and return all results as an array */
	$result = mysql_query("select * from `library`.`books` WHERE `Status` = 2")or die(mysql_error());
			while ( $row = @mysql_fetch_object( $result ) ) {
				$resultArray[] = $row;
			}
			
			$resultArray = $this->getCategoryName($resultArray);
			return $resultArray;
}


function getAllReturned(){
$resultArray = array();
	/* get all book sorted according to sortVal and return all results as an array */
	$result = mysql_query("select * from `library`.`books` WHERE `Status` = 1")or die(mysql_error());
			while ( $row = @mysql_fetch_object( $result ) ) {
				$resultArray[] = $row;
			}
			
			$resultArray = $this->getCategoryName($resultArray);
			return $resultArray;
}


function cancelReservation($bookid){
	mysql_query("UPDATE `books` SET `Status` = 1 WHERE `Book_Id` = $bookid") or die(mysql_error());
	mysql_query("DELETE FROM `transaction` WHERE  `Status` =  2 && `Book_Id` = $bookid")or die(mysql_error());
}
function returnBook($bookid){
	mysql_query("UPDATE `books` SET `Status` = 0 WHERE `Book_Id` = $bookid") or die(mysql_error());
	mysql_query("DELETE FROM `transaction` WHERE  `Status` =  1 && `Book_Id` = $bookid")or die(mysql_error());
}
	
} ?>