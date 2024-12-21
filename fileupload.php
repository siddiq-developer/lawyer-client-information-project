<?php include('includes/header.php') ?>
<?php include('includes/connDB.php')?>
<?php
error_reporting(0);
session_start();
$user =  $_SESSION['user'];
if($user == true)
{
}
else
{
  header('location: Adminlogin.php');
}
 ?>
 <!DOCTYPE html>

    <title>File Upload</title>
 </head>

 <body>
    <form action="#" method ="POST" enctype="multipart/form-data">
    <input type="file" name="uploadfile"><br><br>
    <input type="submit" name="submit" value="Upload File">
    </form>
 </body>

 </html> 
 <?php
  // $folder = "./images"; 
  // print_r($_FILES["uploadfile"]);
  $filename =  $_FILES["uploadfile"]["name"];
  $tempname =  $_FILES["uploadfile"]["tmp_name"];
  $folder = "images/".$filename; 
//   echo $folder;  
  move_uploaded_file($tempname, $folder);
  echo "<img src='$folder' height='100px' width='100px'>";
 ?>
<?php include('includes/footer.php') ?>