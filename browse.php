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
 <link href="glyphicons"
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="/javascripts/html5shiv.js"></script>
      <script src="/javascripts/respond.min.js"></script>
    <![endif]-->
  </head>

  <body bgcolor="#660000" style="background-color:#660000">
  	<img src="images/banner.jpg" width="1010px" height="150px"/>
    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
    <?php
require("./header.php");
     ?>

      <!-- Begin page content -->
      <div class="container">  


<?php
if($_POST['searchbook']){
					//if there is a search post
					if(isset($_POST['searchbook'])){
							$_book = new Book();

							$rows = $_book->findBook($_POST['searchbook'],$_POST['search_option']);
					}else{
					/*		$_book = new Book();
							
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
*/
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
	<input name="searchbook" value="" style="border:2px solid #ccc" />
	<select name="search_option" style="border:px solid #000: height:1px">
		<option value="Title">Title</option>
		<option value="Author">Author</option>
		<option value="Book_Id">Book ID</option>
		<option value="Location">Location</option>
	</select>
	<input type="submit" value="search" style="border:px solid #000" />&nbsp;
	
	

	
 </form>
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
	$uid = $_SESSION['userid'];
$nowtime = date('Y/m/d');
$rtime_borrow = date('Y/m/d',strtotime($nowtime . '+10 days'));
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
	echo "<td><a data-toggle='modal' href='#borrow_{$row->Book_Id}'><button>Borrow</button></a>";
	echo "<div id='borrow_{$row->Book_Id}' class='modal fade in' style='text-align:left'>
            <div class='modal-header'>
              <a class='close' data-dismiss='modal'>×</a>
              <h3>You are about to borrow this book...</h3>
            </div>
            <div class='modal-body'>  
					<strong>Book Title: </strong>{$row->Title} <br />
					<strong>Date Borrowed: </strong> $nowtime <br />
					<strong>Date Returned: </strong> $rtime_borrow <br />
					<strong>Terms: </strong> Upon borrowing, you will be given 10 days to return the book. Failure to return the book after 10 days will result on a Php 10.00 per day fee.<br />
					<div id='borrowbutton'><a href='javascript:void(0);' onclick='borrow({$uid},{$row->Book_Id});'>Borrow and Agree Terms</a></div>'
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
	function borrow(userid,bookid){
		jQuery.post(
				'/models/borrowbook.php',
				{userid:userid,bookid:bookid}			
			).done(function(data){jQuery('#borrowbutton').html(data);});		
	};
</script>
  </body>
</html>