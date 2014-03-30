<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<meta charset="utf-8">   

    <title>Category Management</title>

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
<script type="text/javascript" language="javascript" src="bootstrap-3/js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="dataTables/media/js/jquery.dataTables.js"></script>
		

  </head>
  <body bgcolor="#660000" style="background-color:#660000">
  	<!--<img src="images/banner.jpg" width="1010px" height="150px"/>-->
    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
  <?php require('./header.php'); ?>

      <!-- Begin page content -->
      <div class="container" style="background:#fff;padding:20px;">  
      	 <?php require('category.class.php'); ?>
      	 

      </div>


      <table cellpadding="0" cellspacing="0" border="0" class="display" id="tcategory">
	<thead>
		<tr style="background:grey" class="table-hover">
			<th>ID</th>
			<th>Title</th>
			<th>Description</th>
			<th>Action</th>


		</tr>
	</thead>
	
	<tbody>
		<?php
      	 $rArray = array();
      	 	$cat = new Category();
      	 //	$cat->moveCategoryToObject($cat->getCategoryLists());
      	 	$rows = $cat->getCategoryLists();

      foreach ($rows as $row) { ?>
      <tr>
      		<td><?php echo $rows->C_Id; ?></td>
			<td><?php echo $rows->Title; ?></td>
			<td><?php echo $rows->Description; ?></td>
			<td><a href="#addCategory">Delete</a></td>
      </tr>
      <?php	}  ?>
	</tbody>
</table>










    </div>

    <div id="footer">
      <div class="container">
        <p class="text-muted credit">Implemented by: <a href="#">author</a></p>
      </div>
    </div>

 <script src="javascripts/modal.js"></script>
  </body>
</html>