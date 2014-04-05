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
 <script type="text/javascript" src="js/jquery.validate.min.js"></script>
 

 <script>
  jQuery(document).ready(function($){
 $.validator.addMethod("isbn",function(value,element){
                return this.optional(element) || /^&*[0-9]/i.test(value);
            },"ISBN must contain numbers only!");

        $('.form-horizontal').validate({
        rules: {
            isbn: {
                minlength: 5,
               // maxlength: 15,
                required: true
            }
          },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
           // if(element.parent('.input-group').length) {
               // error.insertAfter;

          //  } else {
                error.insertAfter(element);
          //  }
        }
    });


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

      <h2> All Books </h2>  




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
							if(isset($_POST['status'])){
								//die($_POST['status']);
								$_book->setStatus($_POST['status']);
							}
							$_book->setTitle($_POST['title']);
							$_book->setPublisher($_POST['publisher']);
							$_book->setIsbn($_POST['isbn']);
							$_book->setAuthor($_POST['author']);
							$_book->setCategory($_POST['category']);
							$_book->setLocation($_POST['location']);
							$_book->setCondition($_POST['condition']);	
							//die($_book->getStatus());
							$nbid = $_book->saveBook();
$rows = $_book->findBook($_book->getId(),'Book_Id');
$allowedExts = array("jpeg", "jpg");
$temp = explode(".", $_FILES["file"]["name"]);
//die($nbid);
$extension = end($temp);
$_FILES["file"]["name"] = "img_".$nbid.".".$extension;
//die($_FILES["file"]["name"]);
if (in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
  echo "Invalid file";
  }
					}
				//	die();
	
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
	<?php //if($_SESSION['userid']) { ?>
		<a data-toggle='modal' href="#add_book" class="btn btn-primary" style="float:right; color:black">Add Book</a>
		<br>
	<?php// } ?>

	
 </form>
 	<div id='add_book' class='modal fade' style='text-align:left' tabindex='-1' role='dialog' aria-hidden='true'>
          <!-- <pre class="pre-scrollable">-->
            <div class='modal-header'>
              <a class='close' data-dismiss='modal'>×</a>
              <h3>Book Information</h3>
            </div>
            <div class='modal-body'>
			
<form class="form-signin" action="" method="post" onsubmit='return true;' accept-charset="utf-8" enctype="multipart/form-data" style="padding:0px;width:100%">
			 <h2 class="form-signin-heading"></h2>
	<table>
		<tr>
			<td valign="top">
					Book Title:<br /><input name="title" value="" class="form-control" placeholder="Book Title" onsubmit="return checkForm(this); required />
<span class="help-block"></span>
					<br />
					
					Image:<br /><input type="file" class="form-control" placeholder="Book Image" name="file" id="file" /><br />
					Publisher:<br /><input name="publisher" value="" class="form-control" placeholder="Publisher" required /><br />
					ISBN:<br /><input name="isbn" id="isbn" value="" class="form-control" placeholder="ISBN" onsubmit="return checkForm(this); required /><br />

				
			</td>
			<td valign="top">
					 Author:<br /><input name="author" value="" class="form-control" placeholder="Author" required /><br />
					Category:<br /><select name="category" class="form-control" required>
					<?php
						foreach($catLists as $cat){
							echo "<option value='{$cat->C_Id}'>{$cat->Title}</option>";
						}
					?>
				</select><br />
					Location:<br /><input name="location" value="" class="form-control" placeholder="Location" required /><br />
						
			</td>
		</tr>
	</table>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
	
	</form>		
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
		<td style="text-transform:uppercase">Shelf Location</td>
		<td style="text-transform:uppercase">Action</td>
		
		
	</tr>
<?php	
if($rows){
	//die(print_r($rows));
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
	echo "<td><a data-toggle='modal' href='#edit_{$row->Book_Id}'><span class='glyphicon glyphicon-edit' style=''></span></a>&nbsp; 	&nbsp;<a onclick='delBook(\"{$row->Book_Id}\");'></a>";
	echo "<div id='edit_{$row->Book_Id}' class='modal fade in' style='text-align:left'>
            <div class='modal-header'>
              <a class='close' data-dismiss='modal'>×</a>
              <h3>Edit Book</h3>
            </div>
            <div class='modal-body'>
			<form class='form-signin' action='' method='post' onsubmit='return true;' accept-charset='utf-8' enctype='multipart/form-data' style='padding:0px;width:100%'>
	<table style='width:100%'>
		<tr>
			<td valign='top'>
				<input name='bid' id='bid' value='{$row->Book_Id}' type='hidden' required /><br />			
				Title:<br /><input name='title' id='title' value='{$row->Title}' class='form-control' placeholder='Book Title' required /><br />
				Publisher:<br /><input name='publisher' id='publisher' value='{$row->Publisher}' class='form-control' placeholder='Publisher' autofocus required /><br />		
				condition:<br /><select name='condition' class='form-control'>
				<option value='0' "; echo ($row->condition == 0)?"selected='selected'":""; echo ">good</option>
				<option value='1' "; echo ($row->condition == 1)?"selected='selected'":""; echo ">missing</option>
				<option value='2' "; echo ($row->condition == 2)?"selected='selected'":""; echo ">damage</option>
				<option value='3' "; echo ($row->condition == 3)?"selected='selected'":""; echo ">old</option>
				
				</select>
				ISBN:<br /><input name='isbn' id='isbn' value='{$row->ISBN}' class='form-control' placeholder='ISBN' /><br />	
				
				
			</td>
			<td valign='top'>
							<br />
				Author:<br /><input name='author' id='author' value='{$row->Author}' class='form-control' placeholder='Author' required/><br /> ";			
						echo "Category:<br /><select name='category' class='form-control'>";
					
						foreach($catLists as $cats){
							echo "<option value='{$cats->C_Id}' ";
							echo ($cats->Title == $row->Category)? "selected":"";
							echo ">{$cats->Title}</option>";
						}
				
					
					
				echo "</select><br />
				Location:<br /><input name='location' id='location' value='{$row->Location}' class='form-control' placeholder='Location' /><br />				
						
			</td>
		</tr>
	</table>
				<button class='btn btn-lg btn-primary btn-block' type='submit'>Save</button>
	
	</form>	  
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