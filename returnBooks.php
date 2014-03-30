<?php session_start();
require( './book.class.php' ); ?>
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
<script type="text/javascript" language="javascript" src="bootstrap-3/js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="dataTables/media/js/jquery.dataTables.js"></script>
		

		<script type="text/javascript" charset="utf-8">
	

	jQuery(document).ready(function($) {

		$('.returnedbook').dataTable( {
				} );
		
		$('.return-button').click(function(event){
					//alert(event.target.id);
					var _bookid = event.target.id;
					if(confirm("Do you want to Return this book?")){
						jQuery.post(
						'/models/book_return.php',
						{bookid : _bookid}
							).done(function(data){
							//	alert(data);
								//$(this).append(data);
								event.target.outerHTML = data;
						//onsole.dir(event.target);
							});
					}
				});
	});
	
		</script>
  </head>


  <body bgcolor="#993333" style="background-color:#993333">
  	<!--<img src="images/banner.jpg" width="1010px" height="150px"/>-->
    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
<?php require('./header.php');
//require('./user.class.php');
?>
	<!-- Begin page content -->
      <div class="container" style="background:#fff;padding:20px;">  

      	<h2> Return </h2>

		
<div class="allreturned">
							<?php 
								// list book history here10px 38px 10px 10px

								$book_obj = new Book();

								//$tObj = new Transaction();
								//$resHistory = $tObj->getHistory($book->getId());
								//die(print_r($book_obj->getAllBorrowedBooks()));
							?>

<div class = "bookTable">
<table cellpadding="0" cellspacing="0" border="0" class="returnedbook" style="width:100%">
	<thead>
		<tr style="background:grey" class="table-hover">
			<th>Book ID</th>
			<th>Title</th>
			<th>Author</th>
			<th>Publisher</th>
			<th>ISBN</th>
			<th>Category</th>
			<th>Location</th>
			<th>Action</th>
			


		</tr>
	</thead>
	
	<tbody>
		<?php 
		$ars = $book_obj->getAllReturned();
			foreach($ars as $useritem){
				//echo $x->Name;
			
		?>
		<tr>
			<td>
<a target="_blank" href="/models/userCopy.php?id=<?php echo $useritem->User_Id; ?>">
	<?php echo $useritem->Book_Id; ?></a></td>
			<td><?php echo $useritem->Title; ?></td>
			<td><?php echo $useritem->Author; ?></td>
			<td><?php echo $useritem->Publisher; ?></td>
			<td><?php echo $useritem->ISBN; ?></td>	
			<td><?php echo $useritem->Category; ?></td>
			<td><?php echo $useritem->Location; ?></td>	
			<td>
	<a href="#" id="<?php echo $useritem->Book_Id; ?>" class="btn btn-danger reserve-primary return-button">
		Return Book
	</a>
			</td>
	

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