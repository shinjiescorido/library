<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<meta charset="utf-8">   

    <title>SJS</title>

    <!-- Bootstrap core CSS -->
    <link href="stylesheets/bootstrap.css" rel="stylesheet">
    <!-- Custom stylesheets for this template -->
    <link href="stylesheets/sticky-footer-navbar.css" rel="stylesheet">
 <link href="stylesheets/navbar-static-top.css" rel="stylesheet">
  
 <link href="bootstrap-3/css/bootstrap.min.css" rel="stylesheet">
 <link href="bootstrap-3/css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="/javascripts/html5shiv.js"></script>
      <script src="/javascripts/respond.min.js"></script>
    <![endif]-->
  </head>
  <script src="js/jquery.validate.min.js"></script>
<script>
  jQuery(document).ready(function(){

        $('.form-signin').validate({
        rules: {
            password: {
                minlength: 3,
                maxlength: 15,
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
  <body bgcolor = "#993333" style="background-color:#993333">
   <img src="images/banner.jpg" width="1258px" height="150px"/> 
    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
    <?php
//require("./header.php");
     ?>

      <!-- Begin page content -->
      <div class="container">  
        <div class="row">

      		<form role="form" class="form-signin" method="post" action="/models/userCopy.php">
        <h2 class="form-signin-heading" style="color:#FFFFFF">Sign In</h2>
        <input type="hidden" name = "forlog" value="1" />
       <a style="color:white"><strong> Username: </strong></a><input name="idnum" type="text" autofocus="" required="" placeholder="Id Number" class="form-control">
       <a style="color:white"><strong> Password: </strong></a><input id="password" name="password" type="password" required="" placeholder="Password" class="form-control">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
      </form>
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