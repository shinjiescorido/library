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
  <script type="text/javascript" src="js/jquery11.min.js"></script>
  <script type="text/javascript" src="js/jquery.validate.min.js"></script>
 
  <script>
  jQuery(document).ready(function($){
 $.validator.addMethod("password",function(value,element){
                return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/i.test(value);
            },"Passwords must be with uppercase letters, lowercase letters and at least one number, 8-16 characters.");

        $('.form-horizontal').validate({
        rules: {
            password: {
                minlength: 3,
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

<!--<script language="Javascript">

      function validateForm(objForm){
        //alert("In validate Form");

        if(objForm.username.value.length==0){

         // alert("Please enter the username!");
          objForm.username.focus();
          return false;

        }

         if(objForm.password.value.length==0){

        //  alert("Please enter the password!");
          objForm.password.focus();
          return false;

        }


        return true;
      }

    </script>-->
  <body bgcolor="#660000" style="background-color:#660000">
   <img src="images/banner.jpg" width="1345px" height="180px"/> 
    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
    <?php
//require("./header.php");
     ?>

      <!-- Begin page content -->
      <div class="container">  
        <div class="row" style="width:600px;padding:20px;border:1px solid #ccc;margin:auto;background:#fff">
          <?php if(isset($_GET['e'])){
                    //if($_GET['e']){
                        echo "<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Sory, </strong>Wrong ID number or password</div>";
                    // }else{
                    //   unset($_SESSION['invalid']);
                    }
                  //}
           ?>
          <form style="text-align:center" class="form-horizontal"  role="form" method="post" action="/models/userCopy.php">
           <h2 class="form-signin-heading" style="color: white">Sign In</h2>
            <div class="form-group">
                <input type="hidden" name = "forlog" value="1" />
                <a style="color:white"><strong>
                  <div class="">
                    <input type="text" name="idnum" id="username" class="form-control" placeholder="Id Number">
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <a style="color:white"><strong>  
                <div class="">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    <span class="help-block"></span>
                </div>
            </div>


                <!--<label class="checkbox">
                  <input type="checkbox" value="remember-me" style="color:black"> Remember me
                </label>-->
            
             <span class="help-block"></span>
            <button type="submit" class="btn btn btn-primary btn-lg btn-block">Sign in</button>
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