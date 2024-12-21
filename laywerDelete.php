
<?php
include('includes/connDB.php');

$lawyerid = $_GET['lawyerid'];
$query = "DELETE  FROM lawyer WHERE lawyerid = '$lawyerid'";
$data = mysqli_query($conn,$query);

if($data)
{
    ?>
    <meta http-equiv = "refresh" content = "0; url = http://localhost/LCMS/lawyer.php" />
    <?php
}
else{ 
    echo "Failed to delete";
}
?> 