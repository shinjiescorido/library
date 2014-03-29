<html>
	<head>

 <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="bootstrap-3/css/bootstrap-modal.css">
 <script type="text/javascript" src="bootstrap-3/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="bootstrap-3/js/bootstrap.js"></script>


 	</head>

 	<body>

 		<!-- Button to trigger modal -->
<a href="#contact" role="button" class="btn" data-toggle="modal">Contact</a>
 
<!-- Modal -->
<div class="modal fade" id="contact" role="dialog">
	<div class="modal-dailog">
		<div class="modal-content">
			<div class="modal-header">
				<a class='close' data-dismiss='modal'>x</a>
				<p>Contact</p>
			</div>
			
			<div class="modal-body">
				<form class="form-signin" action="" method="post" onsubmit='return true;' accept-charset="utf-8">
			 <h2 class="form-signin-heading"></h2>
				
				Book Title: <br /> 
				<input name="title" value="" class="form-control" placeholder="Book Title" required /><br />
				Publisher: <br /> 
				<input name="publisher"  value="" class="form-control" placeholder="Publisher" autofocus required /><br />		
				ISBN: <br /> 
				<input name="isbn"  value="" class="form-control" placeholder="ISBN" required /><br />				
				Author: <br />
				 <input name="author" value="" class="form-control" placeholder="Author" required /><br />
				Status: <br /> 
				<input name="status" value="" class="form-control" placeholder="Status" required /><br />
				Catergory: <br /> 
				<select name="category" class="form-control" required>
					<?php
						foreach($catLists as $cat){
							echo "<option value='{$cat->C_Id}'>{$cat->Title}</option>";
						}
					?>
					
					
				</select><br/>
				Location: <br />
				<input name="location"  value="" class="form-control" placeholder="Location" required /><br />				
				<br /> <button class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
			</form>		

			<div class="modal-footer">
				<a class="btn btn-primary" data-dismiss="modal">Close</a>
			</div>
		</div>
	</div>
</div>

<script src="js/jquery.min.js"></script>
<script src="bootstrap-3/js/modal.js"></script>	
 	</body>

	

 </html>