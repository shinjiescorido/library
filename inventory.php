<?php session_start();?>
<?php require( './book.class.php' ); ?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<meta charset="utf-8">   

    <title>BOOKS</title>

   <!-- Bootstrap core CSS -->
    <link href="stylesheets/bootstrap.css" rel="stylesheet">
    <!-- Custom stylesheets for this template -->
    <link href="stylesheets/sticky-footer-navbar.css" rel="stylesheet">
 <link href="stylesheets/navbar-static-top.css" rel="stylesheet">
 <link href="stylesheets/screen.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="/javascripts/html5shiv.js"></script>
      <script src="/javascripts/respond.min.js"></script>
    <![endif]-->
<style type="text/css" title="currentStyle">
			@import "dataTables/media/css/demo_page.css";
			@import "dataTables/media/css/demo_table.css";
				#tmissing{
					width:90%;
				}
				#tdamage{
					width: 90%;
				}
				#told{
					width: 90%;
				}
				.tab-content {
    border-left: 1px solid #ddd;
    border-right: 1px solid #ddd;
    padding: 10px;
}

.nav-tabs {
    margin-bottom: 0;
}
</style>

<script type="text/javascript" language="javascript" src="dataTables/media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="bootstrap-3/js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="dataTables/media/js/jquery.dataTables.js"></script>
		

  </head>
<script type="text/javascript" charset="utf-8">
	jQuery(document).ready(function($) {
    	$('#tmissing').dataTable();
    	$('#tdamage').dataTable();
    	$('#ready_').dataTable();
    	$('#myTab a:last').tab('show');
	} );
</script>
  <body bgcolor="#660000" style="background-color:#660000">
  	<!--<img src="images/banner.jpg" width="1010px" height="150px"/>-->
    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
  <?php //require('./header.php'); ?>
      <!-- Begin page content -->
      <div class="container" style="background:#fff;padding:20px;">  

      	<?php
      		$book_controller = new Book();
      		$book_controller2 = new Book();
      		$book_controller3 = new Book();
      		$book_controller4 = new Book();
      		$book_missing = $book_controller->getBookBycondition(1);
      		//die(print_r($book_missing));
      		$book_damaged = $book_controller2->getBookBycondition(2);
      		$book_old = $book_controller3->getBookBycondition(3);
      		$book_ready = $book_controller4->getBookBycondition(0);
      		
      		/*foreach ($r as $row) {
      			$row = $book_missing->mergeArrayToBook($row);
      			      		$book_missing->display();
      			      		echo "<hr />";
      		}*/



      	 ?>

      	 			<ul class="nav nav-tabs" id="myTab">
					<li class="active"><a href="#missing" data-toggle="tab">Missing</a></li>
					<li><a href="#damage" data-toggle="tab">Damaged</a></li>
					<li><a href="#old" data-toggle="tab">Old</a></li>
					<li><a href="#ready" data-toggle="tab">Ready</a></li>
					</ul>
						<div class="tab-content">
							  <div class="tab-pane active" id="missing">
							  	<table class = "tme" id="tmissing">
							  		<thead>
							  			<tr>
							  				<th>Book ID</th>
							  				<th>Title</th>
							  				<th>Author</th>
							  				<th>Category</th>
							  			</tr>
							  		</thead>
							  		<tbody>
							  			<?php
							  				foreach ($book_missing as $row) {
							  				//	print_r($row);
							  					echo "<tr>";
								      			$row = $book_controller->mergeArrayToBook($row);
								      			      	//	$book_missing->display();
								      			      		//echo "<hr />";
								      			      	//	die();
								   echo "<td>".$book_controller->getId()."</td>";
echo "<td><a data-toggle='modal' data-target='#myModal-{$book_controller->getId()}' href='/models/displaybook.php?bookid={$book_controller->getId()}'>".
$book_controller->getTitle()."</a><div class='modal fade' id='myModal-{$book_controller->getId()}' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'></div></td>";								   echo "<td>".$book_controller->getAuthor()."</td>";
								   echo "<td>".$book_controller->getCategory()."</td>";
								      			}
								      			echo "</tr>";
							  			 ?>
							  		</tbody>
							  	</table>
							  </div> <!-- end of tab-pane -->

							  <div class="tab-pane" id="damage">
							  	<table class="tme" id="tdamage">
							  		<thead>
							  			<tr>
							  				<th>Book ID</th>
							  				<th>Title</th>
							  				<th>Author</th>
							  				<th>Category</th>
							  			</tr>
							  		</thead>
							  		<tbody>
							  			<?php
							  				foreach ($book_damaged as $rows) {
							  					//print_r($rows);
							  					echo "<tr>";
								      			$row = $book_controller2->mergeArrayToBook($rows);
								      			      	//	$book_missing->display();
								      			      		//echo "<hr />";
								      			      	//	die();
								      		echo "<td>".$book_controller2->getId()."</td>";
echo "<td>
<a data-toggle='modal' data-target='#myModal-{$book_controller2->getId()}' href='/models/displaybook.php?bookid={$book_controller2->getId()}'>".$book_controller2->getTitle()."</a>".
"<div class='modal fade' id='myModal-{$book_controller2->getId()}' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'></div>".

"</td>";								      		echo "<td>".$book_controller2->getAuthor()."</td>";
								      		echo "<td>".$book_controller2->getCategory()."</td>";
								      			}
								      			echo "</tr>";
							  			 ?>
							  		</tbody>
							  	</table>
							  </div> <!-- end of tab-pane -->

							  <div class="tab-pane" id="old">
							  	<table id="told" class="tme">
							  		<thead>
							  			<tr>
							  				<th>Book ID</th>
							  				<th>Title</th>
							  				<th>Author</th>
							  				<th>Category</th>
							  			</tr>
							  		</thead>
							  		<tbody>
							  			<?php
							  				foreach ($book_old as $row) {
							  					//die(print_r($row));
							  					echo "<tr>";
								      			$row = $book_controller3->mergeArrayToBook($row);
								      			      	//	$book_missing->display();
								      			      		//echo "<hr />";
								      			      	//	die();
								      		echo "<td>".$book_controller3->getId()."</td>";
echo "<td><a data-toggle='modal' data-target='#myModal-{$book_controller3->getId()}' href='/models/displaybook.php?bookid={$book_controller3->getId()}'>".$book_controller3->getTitle()."</a>".
"<div class='modal fade' id='myModal-{$book_controller3->getId()}' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'></div>".

"</td>";
								      		echo "<td>".$book_controller3->getAuthor()."</td>";
								      		echo "<td>".$book_controller3->getCategory()."</td>";
								      			}
								      			echo "</tr>";
							  			 ?>
							  		</tbody>
							  	</table>
							  </div> <!-- end of tab-pane -->
<div class="tab-pane" id="ready">
							  	<table id="ready_" style="width:80%">
							  		<thead>
							  			<tr>
							  				<th>Book ID</th>
							  				<th>Title</th>
							  				<th>Author</th>
							  				<th>Category</th>
							  			</tr>
							  		</thead>
							  		<tbody>
							  			<?php
							  				foreach ($book_ready as $row) {
							  					//die(print_r($row));
							  					echo "<tr>";
								      			$row = $book_controller4->mergeArrayToBook($row);
								      			      	//	$book_missing->display();
								      			      		//echo "<hr />";
								      			      	//	die();
								      		echo "<td>".$book_controller4->getId()."</td>";
echo "<td><a data-toggle='modal' data-target='#myModal-{$book_controller4->getId()}' href='/models/displaybook.php?bookid={$book_controller4->getId()}'>".$book_controller4->getTitle()."</a>".
"<div class='modal fade' id='myModal-{$book_controller4->getId()}' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'></div>".
"</td>";
								      		echo "<td>".$book_controller4->getAuthor()."</td>";
								      		echo "<td>".$book_controller4->getCategory()."</td>";
								      			}
								      			echo "</tr>";
							  			 ?>
							  		</tbody>
							  	</table>
							  </div> <!-- end of tab-pane -->						
						</div> <!-- end of tab-content -->



      </div>
    </div>

    <div id="footer">
      <div class="container">
        <p class="text-muted credit">Implemented by: <a href="#">author</a></p>
      </div>
    </div>

 <script src="javascripts/modal.js"></script>
  </body>
</html>