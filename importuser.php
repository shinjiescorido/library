<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<meta charset="utf-8">   

    <title>Imports</title>

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
        

  </head>

<body>
    <div id="wrap">

      <!-- Fixed navbar -->
  <?php  require('./header.php'); ?>
      <!-- Begin page content -->
      <?php 

if ($_FILES[csv][size] > 0) {

    //get the csv file
    $file = $_FILES[csv][tmp_name];
    $handle = fopen($file,"r");
    
    //loop through the csv file and insert into database
    do {
        if ($data[0]) {

                            $_user = new User();
                          $_user->setName($data[0]);
                            $_user->setAge($data[1]);
                            $_user->setAddress($data[2]);
                            $_user->setPhoneNumber($data[3]);
                            $_user->setEmailAddress($data[4]);
                            $_user->setPassword($data[5]);
                            $_user->setType($data[6]);
                            $_user->setIdNumber($data[7]);

                            $nbid = $_user->saveUser();
           
        }
    } while ($data = fgetcsv($handle,1000,",","'"));
    //
//die();
    //redirect
    $imported = true;

}

?>
     
      <div class="container" style="background:#fff;padding:20px;">  
         
         <h2> Import User </h2>

<?php if (isset($imported)) { ?>
    <div class="alert alert-success">
        <a data-dismiss="alert" class="close" href="#">×</a>
        <strong>Success!</strong> 
        Users were Imported. <a href="/models/users.php"> View Users </a>
    </div>
<?php } ?> 
<div class="container">
    <div class="well">
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  Choose your file: <br />
  <input name="csv" type="file" id="csv" />
  <input type="submit" name="Submit" value="Submit" />
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
</body>
</html>