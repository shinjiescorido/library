<?php
	require( './transaction.class.php' );
	$t = new Transaction();
	
	echo $t->saveTransaction($_POST['userid'],$_POST['bookid']);
 ?>