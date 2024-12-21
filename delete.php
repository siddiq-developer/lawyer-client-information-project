<?php
include('includes/connDB.php');

$clientid = $_GET['clientid'];
$query = "DELETE  FROM client WHERE clientid = '$clientid'";
$data = mysqli_query($conn,$query);

if($data)
{
    ?>
    <meta http-equiv = "refresh" content = "0; url = http://localhost/LCMS/client.php" />
    <?php
}
else{ 
    echo "Failed to delete";
}
?> 