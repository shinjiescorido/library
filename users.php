<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<meta charset="utf-8">   

    <title>Account Manager</title>	

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
  </head>


  <body bgcolor="#993333" style="background-color:#993333">
  	<img src="images/banner.jpg" width="1010px" height="150px"/>
    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
    	<?php 

    	require('./header.php'); ?>
	
	<!-- Begin page content -->
      <div class="container">  


	<div class="container">
		
	
<button class="btn btn-default btn-info" type="button"><a href="#reg" data-toggle='modal' style="color:black">Add user</a></button>
		<h3 style="color:#00FF00">Accounts Manager</h3>
		

<div class = "userTable">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
			<th>Name</th>
			<th>Age</th>
			<th>Address</th>
			<th>Phone</th>
			<th>Email</th>
			<th>Type</th>
			
		</tr>
	</thead>
	
	<tbody>
		<?php 
		$ars = $defaultuser->getUserList();
			foreach($ars as $useritem){
				//echo $x->Name;
			
		?>
		<tr>
			<td><a href="/models/userCopy.php"><?php echo $useritem->Name; ?></a></td>
			<td><?php echo $useritem->Age; ?></td>
			<td><?php echo $useritem->Address; ?></td>
			<td><?php echo $useritem->Phone_Number; ?></td>
			<td><?php echo $useritem->Email_Address; ?></td>	
			<td><?php echo $useritem->Type; ?></td>	

		</tr>
	<?php } ?>
	</tbody>
</table>
			
	</div> 

		
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