<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<meta charset="utf-8">   

    <title>SJS-M</title>

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
		</style>
		<script type="text/javascript" language="javascript" src="dataTables/media/js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="dataTables/media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
	jQuery(document).ready(function($) {
				$('#example').dataTable( {
				} );
			} );
		</script>

<style>
.navbar-default .navbar-collapse, .navbar-default .navbar-form {
border-color: #237A12;
}

</style>


  </head>

  <body bgcolor="#993333" style="background-color:#993333">
  	<img src="images/banner.jpg" width="1010px" height="150px"/>
    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
    <?php require("./header.php"); ?>

<?php 
//require( './user.class.php' ); 
require( './transaction.class.php' );
	$defaultuser = new User();
	if(isset($_SESSION['userid']))
	$defaultuser->getUser($_SESSION['userid']);
	else
		$defaultuser->getUser(002); // just put dummy value
?>
	<!-- Begin page content -->
      <div class="container">  
	
	<!-- start of profile display -->
	<div class="container well">

		<h3> User Information</h3>
				
			Name: <?php echo $defaultuser->getName(); ?> <br />
			<br />Age: <?php echo $defaultuser->getAge(); ?> <br />
			<br />Address: <?php echo $defaultuser->getAddress(); ?> <br />
			<br />Phone Number: <?php echo $defaultuser->getPhoneNumber(); ?> <br />
			<br />Email Address: <?php echo $defaultuser->getEmailAddress(); ?> <br />
			<br />Type: <?php echo $defaultuser->getType(); ?> <br />
			
			<?php
				$trans = new Transaction();
				$translist = $trans->getTransactionsByUserId($defaultuser->getId());
				//print_r($translist);
				$results = mysql_query("select * from user where User_Id = $uid");
		   ?>
		   <br />
		   <button class="btn btn-success" style="float:right"><a href="/models/userCopy.php" style="color:black">Edit</a></button>

		   <hr>

		<h3>Borrowed Books</h3>
	<table cellpadding="5" cellspacing="5" style="" class="table table-hover table-condensed">
	<tr style="background:grey" class="table-hover">
		<td style="text-transform:uppercase">ID</td>
		<td style="text-transform:uppercase">Book Title</td>
		<td style="text-transform:uppercase">Date Borrowed</td>
		<td style="text-transform:uppercase">Return Date</td>
		<td style="text-transform:uppercase">Penalty</td>
		<td style="text-transform:uppercase">Status</td>
	</tr>
	<?php
	
			foreach($translist as $tlist){
			$today = date("d");
			
				$penalty = floor((time() - strtotime($tlist->Date_Returned))/86400);
				echo "<tr style='background:#fff'>";
					echo "<td>".$tlist->T_Id;
					echo "<td>".$tlist->Title;
					echo "<td>".date("Y-m-d",strtotime($tlist->Date_Claimed));
					echo "<td>".date("Y-m-d",strtotime($tlist->Date_Returned));
					echo ($penalty > 0)?"<td> Php ".($penalty*10).".00 </td>":"<td> Php 0.00 </td>";
					echo ($tlist->Status)? "<td> not yet returned</td>":"<td>returned</td>";
			}
	?>
	</table>
	<br />


		
	</div>
	<!-- end of profile display -->
		
      </div>
    </div>

    <div id="footer">
      <div class="container">
        <p class="text-muted credit">Implemented by: <a href="#">author</a></p>
      </div>
    </div>
    <script src="javascripts/jquery.js"></script>
 <script src="javascripts/modal.js"></script>
  </body>
</html>