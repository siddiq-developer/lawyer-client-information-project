<?php
include('includes/connDB.php');

$caseid = $_GET['caseid'];
$query = "DELETE  FROM cases WHERE caseid = '$caseid'";
$data = mysqli_query($conn,$query);

if($data)
{
    ?>
    <meta http-equiv = "refresh" content = "0; url = http://localhost/LCMS/case.php" />
    <?php
}
else{ 
    echo "Failed to delete";
}
?> 