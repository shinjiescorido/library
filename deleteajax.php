<?php 
require( './connector.php' );
$bid = $_POST['bid'];
mysql_query("DELETE FROM `library`.`books` WHERE `books`.`Book_Id` = '$bid'");
echo "delete success!";
?>