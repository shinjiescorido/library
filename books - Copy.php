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

 <link href="/css/bootstrap.min.css" rel="stylesheet">
 <link href="/css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="/javascripts/html5shiv.js"></script>
      <script src="/javascripts/respond.min.js"></script>
    <![endif]-->
  </head>

  <body bgcolor="#660000" style="background-color:#660000">
  	<!--<img src="images/banner.jpg" width="1010px" height="150px"/>-->
    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
  <?php require('./header.php'); ?>
      <!-- Begin page content -->
      <div class="container">  


<?php
if($_POST){
					//if there is a search post
					if(isset($_POST['searchbook'])){
							$_book = new Book();

							$rows = $_book->findBook($_POST['searchbook'],$_POST['search_option']);
					}else{
							$_book = new Book();
							
							if(isset($_POST['bid']))
							$_book->findOneBook($_POST['bid']);
							
							$_book->setTitle($_POST['title']);
							$_book->setPublisher($_POST['publisher']);
							$_book->setIsbn($_POST['isbn']);
							$_book->setAuthor($_POST['author']);
							$_book->setCategory($_POST['category']);
							$_book->setLocation($_POST['location']);	
							$_book->saveBook();
$rows = $_book->findBook($_book->getId(),'Book_Id');
					}
					
	
}else{
$_book = new Book();
$rows = $_book->getList(1);
//$_book->getCategoryName();

 }
 $_book_c = new Book();
 $catLists = $_book_c ->getCatLists();
 ?>	
 <form method="post" action="">
	<input name="searchbook" value="" style="border:1px solid #ccc" />
	<select name="search_option" style="border:1px solid #000">
		<option value="Title">Title</option>
		<option value="Author">Author</option>
		<option value="Book_Id">Book ID</option>
		<option value="Location">Location</option>
	</select>
	<input type="submit" value="search" style="border:1px solid #000" />&nbsp;
	<?php if($_SESSION['userid']) { ?>
		<a data-toggle='modal' href="#add_book" class="btn btn-primary" style="float:right; color:black">Add Book</a>
		<br>
	<?php } ?>

	
 </form>
 	<div id='add_book' class='modal fade' style='text-align:left' tabindex='-1' role='dialog' aria-hidden='true'>
          <!-- <pre class="pre-scrollable">-->
            <div class='modal-header'>
              <a class='close' data-dismiss='modal'>×</a>
              <h3>Book Information</h3>
            </div>
            <div class='modal-body'>
				<form class="form-signin" action="" method="post" onsubmit='return true;' accept-charset="utf-8">
			 <h2 class="form-signin-heading"></h2>
				
				Book Title <input name="title" value="" class="form-control" placeholder="Book Title" required /><br />
				Publisher <input name="publisher"  value="" class="form-control" placeholder="Publisher" autofocus required /><br />		
				ISBN <input name="isbn"  value="" class="form-control" placeholder="ISBN" required /><br />				
				Author <input name="author" value="" class="form-control" placeholder="Author" required /><br />
				Status <input name="status" value="" class="form-control" placeholder="Status" required /><br />
				Catergory <select name="category" class="form-control" required>
					<?php
						foreach($catLists as $cat){
							echo "<option value='{$cat->C_Id}'>{$cat->Title}</option>";
						}
					?>
					
					
				</select>
				Location <input name="location"  value="" class="form-control" placeholder="Location" required /><br />				
				<button class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
			</form>		
            </div>
            <div class='modal-footer'>
              
              <a href='#' class='btn' data-dismiss='modal'>Close</a>
            </div>
	</div>
 <table cellpadding="5" cellspacing="5" style="" class="table table-hover table-condensed">
	<tr style="background:grey" class="table-hover">
		<td style="text-transform:uppercase">ID</td>
		<td style="text-transform:uppercase">Title</td>
		<td style="text-transform:uppercase">Publisher</td>
		<td style="text-transform:uppercase">ISBN</td>
		<td style="text-transform:uppercase">Author</td>
		<td style="text-transform:uppercase">Category</td>
		<td style="text-transform:uppercase">Location</td>
		<td style="text-transform:uppercase">Action</td>
		
		
	</tr>
<?php	
if($rows){
foreach ($rows as $row) {
echo "<tr style='background:#fff'>";
	echo "<td><a data-toggle='modal' href='#catalog_{$row->Book_Id}'>".$row->Book_Id."</a>";
			echo "<div id='catalog_{$row->Book_Id}' class='modal fade in' style='text-align:left'>
            <div class='modal-header'>
              <a class='close' data-dismiss='modal'>×</a>
              <h3>{$row->Title}</h3>
            </div>
            <div class='modal-body'>
              <ul>
			
				<li><strong>Author: </strong><span>{$row->Author}</span></li>
				<li><strong>ISBN: </strong><span>{$row->ISBN}</span></li>
				<li><strong>Publisher: </strong><span>{$row->Publisher}</span></li>
				<li><strong>Location: </strong><span>{$row->Location}</span></li>
				<li><strong>Category: </strong><span>{$row->Category}</li>
				<li><strong>Stocks: </strong><span></span></li>				
			  </ul>		        
            </div>
            <div class='modal-footer'>
              
              <a href='#' class='btn' data-dismiss='modal'>Close</a>
            </div>
</div>";
	echo "</td>";
	echo "<td>".$row->Title."</td>";
	echo "<td>".$row->Publisher."</td>";
	echo "<td>".$row->ISBN."</td>";
	echo "<td>".$row->Author."</td>";
	echo "<td>".$row->Category."</td>";
	echo "<td>".$row->Location."</td>";
	echo "<td><a data-toggle='modal' href='#edit_{$row->Book_Id}'><span class='glyphicon glyphicon-edit' style=''></span></a>&nbsp; 	&nbsp;<a onclick='delBook(\"{$row->Book_Id}\");'><span class='glyphicon glyphicon-trash'></span></a>";
	echo "<div id='edit_{$row->Book_Id}' class='modal fade in' style='text-align:left'>
            <div class='modal-header'>
              <a class='close' data-dismiss='modal'>×</a>
              <h3>Edit Book</h3>
            </div>
            <div class='modal-body'>
			<form class='form-signin' action='' method='post' onsubmit='return true;' accept-charset='utf-8'>	
				<input name='bid' id='bid' value='{$row->Book_Id}' type='hidden' required/><br />			
				Title: <input name='title' id='title' value='{$row->Title}' class='form-control' placeholder='Book Title' required/><br />
				Publisher: <input name='publisher' id='publisher' value='{$row->Publisher}' class='form-control' placeholder='Publisher' autofocus required/><br />		
				ISBN: <input name='isbn' id='isbn' value='{$row->ISBN}' class='form-control' placeholder='ISBN' /><br />				
				Author: <input name='author' id='author' value='{$row->Author}' class='form-control' placeholder='Author' required
				/><br />	";			
								echo "<select name='category' class='form-control'>";
					
						foreach($catLists as $cats){
							echo "<option value='{$cats->C_Id}' ";
							echo ($cats->Title == $row->Category)? "selected":"";
							echo ">{$cats->Title}</option>";
						}
				
					
					
				echo "</select>
				<input name='location' id='location' value='{$row->Location}' class='form-control' placeholder='Location' /><br />				
				<button class='btn btn-lg btn-primary btn-block' type='submit'>Save</button>
			</form>	             	        
            </div>
            <div class='modal-footer'>
             
              <a href='#' class='btn' data-dismiss='modal'>Close</a>
            </div>
</div>";
	
	echo "</td>";
echo "</tr>";
        	}
		}else{
			echo "<td rowspan='8'> no results </td>";
		}
		?>
 </table>
      </div>
    </div>

    <div id="footer">
      <div class="container">
        <p class="text-muted credit">Implemented by: <a href="#">author</a></p>
      </div>
    </div>
    <script src="javascripts/jquery.js"></script>
 <script src="javascripts/modal.js"></script>
 <script>
	function delBook(id){
		if(confirm("You want to delete this book?")){
			jQuery.post(
				'/models/deleteajax.php',
				{bid:id}			
			).done(function(data){alert(data);location.reload();});		
		}else{
			return false;
		}
	}
</script>
  </body>
</html>