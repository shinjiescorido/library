<?php
require( './book.class.php' );

	if($_POST){
	$book = new Book();
	
	$book->setTitle($_POST['title']);
	$book->setPublisher($_POST['publisher']);
	$book->setIsbn($_POST['isbn']);
	$book->setAuthor($_POST['author']);
	$book->setStatus($_POST['status']);
	$book->setCategory($_POST['category']);
	$book->setLocation($_POST['location']);	
	$book->saveBook();
}
?>