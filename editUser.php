<?php
	require( './user.class.php' );
session_start();
	$user_obj = new User();
// set user_obj to current user data
	$user_obj->getUser($_SESSION['userid']);
if($_POST){
if($_POST['name']){

	$user_obj->setName($_POST['name']);
}

if($_POST['age']){

	$user_obj->setAge($_POST['age']);
}

if($_POST['address']){

	$user_obj->setAddress($_POST['address']);
}

if($_POST['phone_number']){

	$user_obj->setPhoneNumber($_POST['phone_number']);
}

if($_POST['email_address']){

	$user_obj->setEmailAddress($_POST['email_address']);
}

if($_POST['epword']){

	$user_obj->setPassword($_POST['epword']);
}
$user_obj->saveUserToDb();

}



	//echo $_POST['name']."<hr />";
 ?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<meta charset="utf-8">   

    <title>Edit Information</title>

    <!-- Bootstrap core CSS -->
    <link href="stylesheets/bootstrap.css" rel="stylesheet">
    <!-- Custom stylesheets for this template -->
    <link href="stylesheets/sticky-footer-navbar.css" rel="stylesheet">
 <link href="stylesheets/navbar-static-top.css" rel="stylesheet">
 <link href="stylesheets/screen.css" rel="stylesheet">
 
 <link href="/css/bootstrap.min.css" rel="stylesheet">
 <link href="/css/bootstrap.css" rel="stylesheet">


</head>
<body bgcolor = "#993333" style="background-color:#993333">
   <!-- <img src="images/banner.jpg" width="1010px" height="200px"/>-->

<div id="wrap">

	<div class="container">
		<div class="row">

	<button class="btn btn-lg btn-success" type="submit" style="color:black"> <a href="/models/userCopy.php" />Back</a></button>
<div class="span4 well">

<form method="post" action="" style="float:center">
		
<br /> Name: <input name="name" value="<?php echo $user_obj->getName(); ?>" required /><br />
<br /> Age: <input name="age" value="<?php echo $user_obj->getAge(); ?>" required /><br />
<br /> Email Address: <input name="email_address" value="<?php echo $user_obj->getEmailAddress(); ?>" required /><br />
<br /> Address: <input name="address" value="<?php echo $user_obj->getAddress(); ?>" required /><br />
<br /> Phone Number: <input name="phone_number" value="<?php echo $user_obj->getPhoneNumber(); ?>" required /><br />
<br /> Password: <input name="epword" type ="password" value="<?php echo $user_obj->getPassword(); ?>" required /><br />
<br /><button class="btn btn-lg btn-primary" type="submit" style="font-color:black">Save</button>
</form>

</div>
	
		</div>
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