<?php
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
$_FILES["file"]["name"] = $temp[0].mt_rand().".".$temp[1];
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
?>

<html>

<body>

<form action="" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br>
Title: <input type="text" name="Title" id="title"><br>
Author: <input type="text" name="Author" id="author"><br>
Publisher: <input type="text" name="Publisher" id="publisher"><br>
ISBN: <input type="text" name="ISBN" id="isbn"><br>
Status: <input type="text" name="Status" id="status"><br>
Location: <input type="text" name="Location" id="location"><br>
Category: <input type="text" name="Category" id="category"><br>

<input type="submit" name="submit" value="Submit">

</form>

</body>
</html>