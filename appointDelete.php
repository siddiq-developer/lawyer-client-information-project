<?php
include('includes/connDB.php');

$appointmentid = $_GET['appointmentid'];
$query = "DELETE  FROM appointment WHERE appointmentid = '$appointmentid'";
$data = mysqli_query($conn,$query);

if($data)
{
    ?>
    <meta http-equiv = "refresh" content = "0; url = http://localhost/LCMS/appointment.php" />
    <?php
}
else{ 
    echo "Failed to delete";
}
?> 