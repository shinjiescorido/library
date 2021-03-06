<?php session_start(); ?>
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
 <link rel="stylesheet" href="css/jquery-ui.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="/javascripts/html5shiv.js"></script>
      <script src="/javascripts/respond.min.js"></script>
    <![endif]-->
<style type="text/css" title="currentStyle">
			@import "dataTables/media/css/demo_page.css";
			@import "dataTables/media/css/demo_table.css";
      .ui-autocomplete { z-index:9999 !important;}  
</style>

<script type="text/javascript" language="javascript" src="dataTables/media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="bootstrap-3/js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="dataTables/media/js/jquery.dataTables.js"></script>
		 <script src="js/jquery-ui.js"></script>


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
  <?php require('./header.php');
//require('./user.class.php');
 ?>
    
      <!-- Begin page content -->
      <div class="container" style="background:#fff;padding:20px;"> 
<h2> Issue </h2>

        	<?php
	if(isset($_POST['bookid'])){
		require('./transaction.class.php');
		$sid = $_POST['sid'];
		$bookid = $_POST['bookid'];
		$trans = new Transaction();
		echo $trans->saveTransaction($sid,$bookid,1)."<br />";
	}
  if(isset($_POST['rbookid'])){
    require('./transaction.class.php');
    $rid = $_POST['rid'];
    $rbookid = $_POST['rbookid'];
    $trans = new Transaction();

    echo $trans->saveTransaction($rid,$rbookid,2)."<br />";
  }
 ?> 

<?php
 	echo "<div class='modal fade' id='issue' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='false'>".
  	"<button aria-hidden='true' data-dismiss='modal' class='close' type='button'>×</button>".

"<div style='padding:10px; min-height:200px;min-width:200px;'>".
  	"<form action='' method='post'>".
  	"<div class='control-group'>".  
            "<label class='control-label' for='select01'>Student Name</label>". 
   //         "<div class='controls'><select class='form-control' name='sid'>".$userOptions."</select></div>".
  	"<div class='controls'><input class='form-control tags'><input type='hidden' name='sid' /></div>".   
    "<input class='idholder' type='hidden' name='bookid' />".
  	"<p>Borrowed books shall be returned in approximately 10 days from this date. Failure to do will have 10.00 penalty each day.</p>".
  	"<input type='submit' value='Issue Book' class='btn btn-primary' style='float: right'/></div></form>".
  	"</div>".
  	"</div>";

    echo "<div class='modal fade' id='reserve' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='false'>".
    "<button aria-hidden='true' data-dismiss='modal' class='close' type='button'>×</button>".

"<div style='padding:10px; min-height:200px;min-width:200px;'>".
    "<form action='' method='post'>".
    "<div class='control-group'>".  
    "<label class='control-label' for='select02'>Student Name</label>". 
   // "<div class='controls'><select id='select02' class='form-control' name='rid'>".$userOptions."</select></div>".
    "<div class='controls'><input class='form-control tags'><input type='hidden' name='rid' /></div>".
    "<input class='idholder' type='hidden' name='rbookid' />".
    "<p>Reservations will start on the book's returned date.</p>".
    "<input type='submit' value='Reserve Book' class='btn btn-success' /></div></form>".
    "</div>".
    "</div>";

	?>
  <script>

  </script>
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
    <script>
                    <?php 
     $userObj = new User();
   $allUser = $userObj->getUserList();
  // die($allUser);
 //  $userOptions = "";
   echo "var tDatas = [";
   foreach ($allUser as $user) {
  // $userOptions = $userOptions . "<option value='{$user->User_Id}'>".$user->Name."</option>";
    echo "{'label':'".$user->Name."','value':'".$user->Name."','id':'".$user->User_Id."'},";
   }
   echo "{'label':'___','value':'99999','id':9999}];";
   echo " $( '.tags' ).autocomplete({".
        "source: tDatas,".
        "select : function(event,ui){ ".
        "$(this).val(ui.item.label);".
        "$(this).next().val(ui.item.id); }".
        "});";
?>
    </script>
     <script src="javascripts/modal.js"></script>
  </body>
</html>