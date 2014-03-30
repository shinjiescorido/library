<?php
require( './connector.php' );
class Category{
	var $C_Id;
	var $Title;
	var $Description;

function setDefaults(){
		$this->Title = 'Lorem';
		$this->Description = 'Lorem Lipsum';		
	}

function setId($val){
	$this->$C_Id = $val;
}

function setTitle($val){
	//die($val);
	$this->Title = $val;

}

function setDescription($val){
	$this->Description = $val;
}


function getId(){
		return $this->C_Id;
	}
function getTitle(){
		return $this->Title;
	}
function getDescription(){
		return $this->Description;
	}


function getCategoryLists(){

	$resultArray = array();
$result = mysql_query("select * from `library`.`category`")or die(mysql_error());
	while ( $row = @mysql_fetch_object( $result ) ) {
				$resultArray[] = $row;
			}
			
			return $resultArray;
			//die();
}


function saveCategory(){

	$title = $this->getTitle();
	$description = $this->getDescription();
//	die("INSERT INTO `category` (`C_Id`, `Title`, `Description`) VALUES (NULL, '$title', '$description')");
mysql_query("INSERT INTO `category` (`C_Id`, `Title`, `Description`) VALUES (NULL, '$title', '$description')") 
	or die(mysql_error());
	}

} ?>