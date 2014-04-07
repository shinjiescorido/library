<?php
require( './user.class.php' );
//require( './transaction.class.php' );

//die($_SESSION['userid']);
	if($_POST['forreg']){
		$user = new User();
		//print_r($_POST);
		$user->setName($_POST['name']);
		$user->setAge($_POST['age']);
		$user->setAddress($_POST['address']);
		$user->setPhoneNumber($_POST['phone_number']);
		$user->setEmailAddress($_POST['email']);
		$user->setTransactionNumber($_POST['transaction_number']);
		$user->setPassword($_POST['epword']);
		$user->setType($_POST['type']);
		$user->setIdNumber($_POST['id_number']);
		$user->saveUser();

	}

	$defaultuser = new User();
	//$defaultuser->getUser(0000000002);
	//$defaultuser->getUserList();
	//die()
	if($_POST['forlog']){
		$idnum = $_POST['idnum'];
		$pass = md5($_POST['password']);
		//$pass = md5($_POST['pass']);

$result = mysql_query("select User_Id from user where Id_Number = '$idnum' && Password = '$pass'");
	//echo "select User_Id from user where Email_Address = '$emails' && Password = '$pass'".;
	//die(mysql_num_rows($result));
	if(mysql_num_rows($result) > 0){
		$rows = mysql_fetch_row($result);
		//	die(print_r($rows));
		$_SESSION['userid'] = $rows[0];
		//die($_SESSION['userid']);
	}else{
		//$_SESSION['invalid'] = true;
	}




	}

$userid = ($_SESSION['userid'])? $_SESSION['userid'] : "ddddddddd";
//die($userid);
//echo $userid;
	function isAdmin(){
		$flagadmin = false;
		$uid = $_SESSION['userid'];
		$results = mysql_query("select Type from user where User_Id = $uid");
		//echo "select Type from user where User_Id = $userid";
		if(mysql_num_rows($results) > 0){
		$row = mysql_fetch_row($results);
	}
 //  echo $row[0];
    if ($row[0] == "admin")
    		$flagadmin = true;

		return $flagadmin;
	}

	function isLoggedIn(){
		$flagloggedin = false;

		if($_SESSION['userid'])
			$flagloggedin = true;

		return $flagloggedin;
	}

// 	echo (isloggedin())? 'loggedin' : 'loggedout';
// echo (isadmin())? 'Hi admin' : 'Hi User';
// 	die();
	if(!isLoggedIn()){
		//die('ddd');
	 ?>

	 <script>
	 //alert('ddd');
	window.location="/models/?e=logerror";
	 </script>

	<?php }else{		//die('555');
		?>

<div class="navbar navbar-inverse navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SJSM Library System</a>
        </div>
        <div class="navbar-collapse collapse">
         <ul class="nav navbar-nav">
         	<?php if(!isAdmin()){ ?>
            <li class="active"><a href="/models/userCopy.php">User profile</a></li>
			<li class=""><a href="/models/browse_books.php">Browse</a></li>
			<?php } else { ?>
			<li class="dropdown active"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
			Book Manager <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="/models/books.php">All Books</a></li>
			<li class=""><a href="/models/import.php">Import Books Catalogue List</a></li>
			<li class=""><a href="/models/category.php">Book Categories</a></li>

            	</ul>
			</li>
			<li class=""><a href="/models/issue.php">Issue</a></li>
			<li class=""><a href="/models/returnBooks.php">Return</a></li>
			<li class=""><a href="/models/reservedLists.php">Reservation Lists</a></li>

			<!-- mao ni ang ktong borrow og reserve books -->
			<li class=""><a href="/models/users.php">Accts. Manager</a></li>
			<li class=""><a href="/models/inventory.php">Inventory</a></li>


			<?php } ?>

		</ul>
          <ul class="nav navbar-nav navbar-right">
			<?php if(isset($_SESSION['userid'])) { ?>
			<li><a href="#">
					<?php
						$logged_user = new User();
						$logged_user->getUser($_SESSION['userid']);
						echo $logged_user->getName();
					 ?>
			</a></li>
			<?php } ?>
			<li><a href="/models/logout.php">Logout</a></li>

		 </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

	<?php } ?>
		<div id='reg' class='modal fade in' style='text-align:left'>
            <div class='modal-header'>

              <h3>Add User</h3>
            </div>
            <div class='modal-body'>
		 	<form class="form-signin" name="myForm" action="" method="post" onsubmit='return validateForm();' accept-charset="utf-8">
			<input type="hidden" name="forreg" value="1" />

			Full Name: <input name="name" id="name" value="" class="form-control" placeholder="Full Name" autofocus required /><br />
			Age: <input name="age" id="age" value="" class="form-control" placeholder="Age" required /><br />
			Address: <input name="address" id="address" value="" class="form-control" placeholder="Address" required /><br />
			Phone Number: <input name="phone_number" id="phone_number" value="" class="form-control" placeholder="Phone Number" required /><br />
			Email Address: <input name="email" id="email" value="" class="form-control" placeholder="Email Address"  required /><br />
			Transaction Number: <input name="transaction_number" id="transaction_number" value="" class="form-control" placeholder="Transaction Number"  /><br />
			Type: <input name="type" id="type" value="" class="form-control" placeholder="Type" required /><br />
			Id Number: <input name="id_number" id="type" value="" class="form-control" placeholder="Id Number" required /><br />
			Password: <input name="epword" id="epword" type="password" value="" class="form-control" placeholder="Password" required /><br />
				 <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
		</form>
            </div>
            <div class='modal-footer'>

              <a href='#' class='btn' data-dismiss='modal'>Close</a>
            </div>
	</div>

		<div id="log" class="modal fade in">
    		  	<div class="modal-heading">
			    	<h3 class="modal-title">Please sign in</h3>
			 	</div>
			  	<div class="modal-body">
			    	<form accept-charset="UTF-8" role="form" method="post" action="">
                    <fieldset>
			    	  	<div class="form-group">
			    	  		<input type="hidden" name="forlog" value="1" />
			    		    <input class="form-control" placeholder="E-mail" name="email" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="password" type="password" value="">
			    		</div>

			    		<input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
			    	</fieldset>
			      	</form>
			      	</div>
            <div class='modal-footer'>

              <a href='#' class='btn' data-dismiss='modal'>Close</a>
            </div>
                         <script>
             		function validateEmail(str){
             			var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
							    return str.match(pattern);
             		}
             		function validPhone(str){
             			var pattern = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
							    return str.match(pattern);
             		}
									function validateForm()
										{
										var x=document.forms["myForm"]["email"].value;
										var y=document.forms["myForm"]["phone_number"].value;
										if(validateEmail(x) && validPhone(y)){
												return true;
										}else{
											return false;
										}

								}
             </script>

			</div>
