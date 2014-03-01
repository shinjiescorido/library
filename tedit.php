<?php
	require( './transaction.class.php' );
	 $column = $_POST['columnPosition'];
	 $tid = explode('_', $_POST['id']);
	 $value = $_POST['value'];
	 $bookid = $_POST['bid'];
	// die($column);
	$t = new Transaction();
	switch ($column) {
		case 5:
			$c = 'Status';
			$t->updateTransaction($tid[0],$value,$c);
			break;
		case 6:
			$c = 'condition';
			$t->updateTransaction($tid[1],$value,$c);
			break;
		case  7:
			$c = 'damage';
			//die($c);
			$t->updateTransaction($tid[1],$value,$c);
			break;
	};


?>