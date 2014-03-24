<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<meta charset="utf-8">   

    <title>BOOK ISSUE</title>

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
<script type="text/javascript" charset="utf-8">
$(document).on("click", ".announce", function () {
     $('.idholder').val($(this).data('id'));

});
	jQuery(document).ready(function($) {
	//	$(".announce").click(function(){ // Click to only happen on announce links
   //  $(".idholder").html($(this).data('id'));
   //  $('#issue').modal({show:true});
  // });
// $('#announce').click(function() {
// 	alert(1);
//     $('.idholder').html($(this).data('id'));
// });
var oTable = $('#booktable').dataTable( {
	
						//id:"T_Id",			
"sAjaxSource": 'http://localhost/models/book_lister.php',
"aoColumns": [
{ "mDataProp": "Book_Id" },
{ "mData": "Title" },
{ "mData": "Author"},
{ "mData": "Location"},
{ "mData": "Category"},
{ "mData" : "action"}
],
"sAjaxDataProp": ""
});
	} );
</script>
  <body bgcolor="#660000" style="background-color:#660000">

  	<!--<img src="images/banner.jpg" width="1010px" height="150px"/>-->
    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
  <?php require('./header.php'); ?>
      <!-- Begin page content -->
      <div class="container" style="background:#fff;padding:20px;"> 
        	<?php
	if($_POST){
		require('./transaction.class.php');
		$sid = $_POST['sid'];
		$bookid = $_POST['bookid'];
		$trans = new Transaction();
		echo $trans->saveTransaction($_POST['userid'],$_POST['bookid'])."<br />";
	}
 ?> 
      		<?php 
  	 $userObj = new User();
	 $allUser = $userObj->getUserList();
	 $userOptions = "";
	 foreach ($allUser as $user) {
	 $userOptions = $userOptions . "<option value='{$user->User_Id}'>".$user->Name."</option>";
	 }
  	echo "<div class='modal fade' id='issue' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='false'>".
  	"<button aria-hidden='true' data-dismiss='modal' class='close' type='button'>×</button>".

"<div style='padding:10px; min-height:200px;min-width:200px;'>".
  	"<form action='' method='post'>".
  	"<div class='control-group'>".  
            "<label class='control-label' for='select01'>Student Name</label>". 
            "<div class='controls'><select class='form-control' name='sid'>".$userOptions."</select></div>".
  	"<input class='idholder' type='hidden' name='bookid' />".
  	"<p>Borrowed books shall be returned in approximately 10 days from this date</p>".
  	"<input type='submit' value='Issue Book' class='btn btn-primary' /></div></form>".
  	"</div>".
  	"</div>";
	?>
      				<table cellpadding="0" cellspacing="0" border="0" class="display" id="booktable">

	<thead>
	<tr style="background:grey" class="table-hover">
      		 	
      		 			<th>ID</th>
      		 			<th>Title</th>
      		 			<th>Author</th>
      		 			<th>Location</th>
      		 			<th>Category</th>
      		 			<th>Action</th>
      		 		</tr>
      		 	</thead>
      		 	<tbody>
				<tr>
					<td colspan="5" class="dataTables_empty">Loading data from server</td>
				</tr>

      		 	</tbody>
      		 </table>	
      </div><!-- end of container -->
    </div>

    <div id="footer">
      <div class="container">
        <p class="text-muted credit">Implemented by: <a href="#">author</a></p>
      </div>
    </div>
  </body>
</html>