<?php 
require( './connector.php' );
$bid = $_POST['bid'];

mysql_query("UPDATE `library`.`books` SET `condition` = 3 WHERE `books`.`Book_Id` = '$bid'");
echo "delete success!";
?>