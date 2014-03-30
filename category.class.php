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
	$this->$Title = $val;
}

function setDescription($val){
	$this->$Description = $val;
}


function getId(){
		return $this->id;
	}
function getTitle(){
		return $this->title;
	}
function getDescription(){
		return $this->description;
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

function moveCategoryToObject($r){
	
	$this->setId($id_);
	$this->setTitle($title);
	$this->setDescription($des);
	return $this;


}

function saveCategory(){

	$title = $this->getTitle();
	$description = $this->getDescription();
mysql_query("INSERT INTO `category` (`C_Id`, `Title`, `Description`) VALUES (NULL, '$title', '$description')") 
	or die(mysql_error());
	}	

} ?>