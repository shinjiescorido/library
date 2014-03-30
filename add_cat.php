<?php
require('./category.class.php');
$ncat = new category();

$ntitle = $_POST['Title'];
$ndes = $_POST['Description'];

$ncat->setTitle($ntitle);
$ncat->setDescription($ndes);
$ncat->saveCategory();

 ?>