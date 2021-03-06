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

  <link href="/models/css/bootstrap.min.css" rel="stylesheet">
 <link href="/models/css/bootstrap.css" rel="stylesheet">
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

  <body bgcolor="#660000" style="background-color:#660000">
  <!--	<img src="images/banner.jpg" width="1010px" height="150px"/>-->
    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
    <?php require("./header.php");
    	//require('./user.class.php');
     ?>
<?php //die($_SESSION['userid']); ?>
<?php 
//require( './user.class.php' ); 
require( './transaction.class.php' );
	$defaultuser = new User();
	if(isset($_GET['id']))
		$uid = $_GET['id'];
	else
		$uid = $_SESSION['userid'];
	//if(isset($_SESSION['userid']))
	$defaultuser->getUser($uid);
	if($defaultuser->isAdmin()){
		 //header('Location: books.php');die();
			echo "<script>
			window.location='/models/books.php';
			</script>";
		}
	//die(print_r($defaultuser));
	//else
	//	$defaultuser->getUser(002); // just put dummy value
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
			<br />Id Number: <?php echo $defaultuser->getIdNumber(); ?> <br />
			
			<?php
				$trans = new Transaction();
				$translist = $trans->getBorrowByUserId($defaultuser->getId());
				//print_r($translist);
				$results = mysql_query("select * from user where User_Id = $uid");
		   


		   ?>
		   <br />
		   <button class="btn btn-success" style="<?php (isset($_SESSION['userid']))?'display:none;' : ''; ?>float:right; font-color:black"><a href="/models/editUser.php" >Edit</a></button>
	<?php if(count((array)$translist) > 0) { ?> 
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
					echo "<td>".$tlist->T_Id."</td>";
					echo "<td>".$tlist->Title."</td>";
					echo "<td>".date("Y-m-d",strtotime($tlist->Date_Claimed))."</td>";
echo ($tlist->Status == 1) ? "<td>".date("Y-m-d",strtotime($tlist->Date_Returned))."</td>" : "<td>Nan</td>";
					echo ($penalty > 0)?"<td> Php ".($penalty*10).".00 </td>":"<td> Php 0.00 </td>";
echo ($tlist->Status == 1)? "<td>not yet returned</td>":"<td>Reserved</td>";

echo "</tr>";
					//echo ($tlist->Status)? "<td> not yet returned</td>":"<td>returned</td>";
			}
	?>
	</table>
	<br />
<?php } ?>
	<!-- * * * * * * * * * * * * y * * * * * * * * * * * * * -->
	<?php
				$transr = new Transaction();
				$translistr = $transr->getReserveByUserId($defaultuser->getId());
				//print_r($translist);
				$results = mysql_query("select * from user where User_Id = $uid");
		   


		   ?>
		   <hr>
	<?php if(count((array)$translistr) > 0) { ?> 

		<h3>Reserved Books</h3>
	<table cellpadding="5" cellspacing="5" style="" class="table table-hover table-condensed">
	<tr style="background:grey" class="table-hover">
		<td style="text-transform:uppercase">ID</td>
		<td style="text-transform:uppercase">Book Title</td>
		<td style="text-transform:uppercase">Date Reserved</td>
		<td style="text-transform:uppercase">Return Date</td>
		<td style="text-transform:uppercase">Penalty</td>
		<td style="text-transform:uppercase">Status</td>
	</tr>
	<?php
	
			foreach($translistr as $tlist){
			$today = date("d");
			
				$penalty = floor((time() - strtotime($tlist->Date_Returned))/86400);
				echo "<tr style='background:#fff'>";
					echo "<td>".$tlist->T_Id."</td>";
					echo "<td>".$tlist->Title."</td>";
					echo "<td>".date("Y-m-d",strtotime($tlist->Date_Claimed))."</td>";
echo ($tlist->Status == 1) ? "<td>".date("Y-m-d",strtotime($tlist->Date_Returned))."</td>" : "<td>Nan</td>";
					echo ($penalty > 0)?"<td> Php ".($penalty*10).".00 </td>":"<td> Php 0.00 </td>";
echo ($tlist->Status == 1)? "<td>not yet returned</td>":"<td>Reserved</td>";

echo "</tr>";
					//echo ($tlist->Status)? "<td> not yet returned</td>":"<td>returned</td>";
			}
	?>
	</table>
	<br />
<?php } ?>

		
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