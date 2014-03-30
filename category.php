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

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

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
<script>
	jQuery(document).ready(function($){
		$('#tcategory').dataTable();
	});
</script>

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

      	 <h2> Category </h2>
      	 	 <?php
      	 	if(isset($_POST['title'])){
      	 		$ncat = new category();

				$ntitle = $_POST['title'];
				$ndes = $_POST['desc'];
//print_r($_POST);
//die($ntitle);
      	 		
				$ncat->setTitle($ntitle);
				$ncat->setDescription($ndes);
				$ncat->saveCategory();
echo "<div class='alert alert-success'><a data-dismiss='alert' class='close' href='#'>×</a><strong>Success!</strong> New Category Added</div>";
      	 	}
      	  ?>
    <a data-toggle='modal' href="#add_category" class="btn btn-primary" style="float:left; color:black">Add Category</a>

<!-- Modal for add category -->
	<div class="modal fade" id="add_category" role="dialog">
	<div class="modal-dailog">
		<div class="modal-content">
			<div class="modal-header">
				<a class='close' data-dismiss='modal'>x</a>
				<p>Category</p>
			</div>
			
			<div class="modal-body">
				<form class="form-signin" action="" method="post" onsubmit='return true;' accept-charset="utf-8">
			 <h2 class="form-signin-heading"></h2>
				
				Title: <br /> 
				<input name="title" value="" class="form-control" placeholder="Category Title" required /><br />
				Description : <br /> 
				<input name="desc"  value="" class="form-control" placeholder="Description" autofocus required /><br />		
							
				<br /> <button class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
			</form>		

			<div class="modal-footer">
				<a class="btn btn-primary" data-dismiss="modal">Close</a>
			</div>
		</div>
	</div>
</div>
</div>













<!-- End Modal for Add category-->
<br />
<table cellpadding="0" cellspacing="0" border="0" class="display" id="tcategory">
	<thead>
		<tr style="background:grey" class="table-hover">
			<th>ID</th>
			<th>Title</th>
			<th>Description</th>
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
      		<td><?php echo $row->C_Id; ?></td>
			<td><?php echo $row->Title; ?></td>
			<td><?php echo $row->Description; ?></td>
      </tr>
      <?php	}  ?>
	</tbody>
</table>      	 

      </div>
 </div>
    <div id="footer">
      <div class="container">
        <p class="text-muted credit">Implemented by: <a href="#">author</a></p>
      </div>
    </div>

 <script src="javascripts/modal.js"></script>
  </body>
   <script src="js/jquery.min.js"></script>
<script src="bootstrap-3/js/modal.js"></script>	
</html>