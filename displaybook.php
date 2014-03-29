<?php
require('./book.class.php');
require('./transaction.class.php');
$book = new Book();
$book->findOneBook($_GET['bookid']);
//$book->display();
 ?>
<html>
<head>
<title>display book</title>
</head>
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

		</style>

<script type="text/javascript" language="javascript" src="dataTables/media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="dataTables/media/js/jquery.dataTables.js"></script>



<script type="text/javascript" charset="utf-8">
	jQuery(document).ready(function($) {
    	$('#thistory').dataTable();
    	$('#treserve').dataTable();
    	$('#myTab a:last').tab('show');
	} );
</script>
<style>
	body{
		background-color: #eee;
	}
	#main_container{
		/* border:1px #000 solid; */
		width: 550px;
		min-height: 400px;
		margin: auto;
		padding: 15px;	


	}

</style>

<body>
	<div id="main_container">
<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
		<div class="container">
			<div class="row">
						<div class="bookinfo" style= "display:table">
							<div style="float:left">
								<?php if(file_exists("./upload/img_".$book->getId().".jpg")){ ?>
<img style="width: 245px; height: 220px;padding:10px 38px 10px 10px; border:1px solid ccc" src="upload/img_<?php echo $book->getId(); ?>.jpg" />
								<?php } else { ?>							
<img style="width: 245px; height: 220px;padding:10px 38px 10px 10px; border:1px solid ccc" src="images/sample.jpg" />
<?php } ?>
							</div>
							<div style="float:right"><?php $book->_display(); ?></div>
						</div>
						<div class="bookhistory">
							<?php 
								// list book history here10px 38px 10px 10px
								$tObj = new Transaction();
								$resHistory = $tObj->getHistory($book->getId());
								//print_r($resHistory);
							?>
							<!-- Nav tabs -->

							<ul class="nav nav-tabs" id="myTab">
								 <li><a href="#reservations" data-toggle="tab">Reservations</a></li>
							  <li class="active"><a href="#history" data-toggle="tab">History</a></li>
							 
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
							  <div class="tab-pane active" id="history">
							<table id="thistory">
								<thead>
									<tr>
									<th>Transaction ID</th>
									<th>Borrower</th>
									<th>Date Borrowed</th>
									<th>Date Returned</th>
									<th>Penalty</th>
								</tr>
								</thead>
								<tbody>
							<?php	
							foreach ($resHistory as $res) {
								echo "<tr>";
										echo "<td>".$res->T_Id."</td>";
										echo "<td>".$res->uname."</td>";
										echo "<td>".$res->Date_Claimed."</td>";
										echo "<td>".$res->Date_Returned."</td>";
										echo "<td>".$res->penalty."</td>";
								echo "</tr>";
								}
							?>
							</tbody>
						</table>
						</div>
							  <div class="tab-pane" id="reservations">
							<?php 
								// list book history here10px 38px 10px 10px
								$tObj = new Transaction();
								$reserveHistory = $tObj->getReserveHistory($book->getId());
							//
							//	print_r($reserveHistory);
							?>
							<table id="treserve" style="width:100%">
								<thead>
									<tr>
									<th>Transaction ID</th>
									<th>Reserved By</th>
									<th>Date Reserved</th>
	
								</tr>
								</thead>
								<tbody>
							<?php	
							foreach ($reserveHistory as $_res) {
								echo "<tr>";
										echo "<td>".$_res->T_Id."</td>";
										echo "<td>".$_res->uname."</td>";
										echo "<td>".$_res->Date_Claimed."</td>";
								echo "</tr>";
								}
							?>
							</tbody>
						</table>
							  </div>
						</div>
						

			</div>

		</div>

	</div>
</body>


</html>