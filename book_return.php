<?php 
require('./book.class.php');
require('./transaction.class.php');
$bid = $_POST['bookid'];
$book = new Book();
//$trans = new Transaction();

$book->returnBook($bid);
echo "returned";

 ?>