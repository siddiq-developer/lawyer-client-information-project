<?php
include('includes/connDB.php');

$accountid = $_GET['accountid'];
$query = "DELETE  FROM finance WHERE accountid = '$accountid'";
$data = mysqli_query($conn,$query);

if($data)
{
    ?>
    <meta http-equiv = "refresh" content = "0; url = http://localhost/LCMS/finance.php" />
    <?php
}
else{ 
    echo "Failed to delete";
}
?> 