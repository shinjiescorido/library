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
        #tmissing{
          width:90%;
        }
        #tdamage{
          width: 90%;
        }
        #told{
          width: 90%;
        }
        .tab-content {
    border-left: 1px solid #ddd;
    border-right: 1px solid #ddd;
    padding: 10px;
}

.nav-tabs {
    margin-bottom: 0;
}
</style>

<script type="text/javascript" language="javascript" src="dataTables/media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="bootstrap-3/js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="dataTables/media/js/jquery.dataTables.js"></script>
    

  </head>

  <body bgcolor="#660000" style="background-color:#660000">
    <!--<img src="images/banner.jpg" width="1010px" height="150px"/>-->
    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
    <?php
require("./header.php");
   // require("./user.class.php");
     ?>

      <!-- Begin page content -->
      <div class="container" style="background-color:#fff">  


<?php
if($_POST['searchbook']){
          //if there is a search post
          if(isset($_POST['searchbook'])){
              $_book = new Book();

              $rows = $_book->findBook($_POST['searchbook'],$_POST['search_option']);
          }else{
          /*    $_book = new Book();
              
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
    <option value="Location">Location</option>
  </select>
  <input type="submit" value="search" style="border:px solid #000" />&nbsp; 
 </form>
<div style="width:1085px;margin:auto">

<?php 

if($rows){
//  $uid = $_SESSION['userid'];
//$nowtime = date('Y/m/d');
//$rtime_borrow = date('Y/m/d',strtotime($nowtime . '+10 days'));

foreach ($rows as $row) {
  ?>
<div class="bookitem" style="height:240px;width:180px;border:1px solid #ccc;margin:20px;padding:15px;float:left;text-align:left">
    <div>
      <?php
      echo "<div class='modal fade' id='myModal-{$row->Book_Id}' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'></div>";
          if(file_exists("./upload/img_".$row->Book_Id.".jpg"))
          {

echo "<a data-toggle='modal' data-target='#myModal-{$row->Book_Id}' href='/models/displaybook.php?bookid={$row->Book_Id}'>";
            echo "<img style='width:150px;height:160px;' src='./upload/img_{$row->Book_Id}.jpg' />";
            echo "</a>";
          }else{
echo "<a data-toggle='modal' data-target='#myModal-{$row->Book_Id}' href='/models/displaybook.php?bookid={$row->Book_Id}'>";
            echo "<img style='width:150px;height:160px;' src='./images/sample.jpg' />";
            echo "</a>";
          }
          echo $row->Title;
          echo "<hr style='margin:2px;' />";
          echo "<em>by: ".$row->Author."</em>";


       ?>
    </div>
    
  </div>
<?php }
}
?>
<div style="clear:both"></div>
</div>
      </div>
    </div>

    <div id="footer">
      <div class="container">
        <p class="text-muted credit">Implemented by: <a href="#">author</a></p>
      </div>
    </div>

 <script src="javascripts/modal.js"></script>
  </body>
</html>