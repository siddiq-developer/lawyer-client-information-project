<?php include('includes/header.php') ?> 
<?php include('includes/connDB.php')?>
<?php 
// error_reporting(0);
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
<div class="container">
<div class="card m-5 bg-secondary">
  <div class="card-header text-center bg-info">
    <h4>Invoice</h4>
  </div>
  <div class="card-body">

<!-- --------------------------------------------------------- -->
<form ction="finance.php" class="form-signup" method="POST" enctype="multipart/form-data">
 <div class="row">

  <div class="col-6">
  <div class="input-group mt-4">
  <span class="input-group-text" id="basic-addon1">Lawyerid</span>
  <input type="text" name="lawyerid" class="form-control" placeholder="Lawyerid" aria-label="Username" aria-describedby="basic-addon1">
</div>
</div>
<div class="col-6">
    <div class="input-group mt-4">
  <span class="input-group-text" id="basic-addon1">Clientid</span>
  <input type="text" name="clientid" class="form-control" placeholder="Clientid" aria-label="Username" aria-describedby="basic-addon1">
  </div>
    </div>
    <div class="col-6">
    <div class="input-group mt-5">
  <span class="input-group-text" id="basic-addon1">Caseid</span>
  <input type="text" name="caseid" class="form-control" placeholder="caseid" aria-label="Username" aria-describedby="basic-addon1">
  </div>
</div>
    <div class="col-6">
    <div class="input-group mt-5">
  <span class="input-group-text" id="basic-addon1">Address</span>
  <input type="text" name="address" class="form-control" placeholder="Address" aria-label="Username" aria-describedby="basic-addon1">
  </div>
    </div>

    <div class="col-6">
    <div class="input-group mt-5">
  <span class="input-group-text" id="basic-addon1">Inv.Date</span>
  <input type="date" name="date" class="form-control" placeholder="Inv.Date" aria-label="Username" aria-describedby="basic-addon1">
  </div>
  </div>

  <div class="col-6">
    <div class="input-group mt-5">
  <span class="input-group-text" id="basic-addon1">Paid</span>
  <input type="text" name="paid"  class="form-control" placeholder="Paid" aria-label="Username" aria-describedby="basic-addon1">
  </div>
    </div>

    <div class="col-6">
    <div class="input-group mt-5">
  <span class="input-group-text" id="basic-addon1">Unpaid</span>
  <input type="text" name="unpaid" class="form-control" placeholder="Unpaid" aria-label="Username" aria-describedby="basic-addon1">
  </div>
  </div>

  <div class="col-6">
    <div class="input-group mt-5">
  <span class="input-group-text" id="basic-addon1">Total</span>
  <input type="text" name="total" class="form-control" placeholder="Total" aria-label="Username" aria-describedby="basic-addon1">
  </div>
  </div>
</div>

<!-- ------------------------------------ -->
<div class="row">
<div class="row">
 <div class="col-8">
 <button type="button" class="btn btn-primary mt-3" onclick="GetPrint()">Print</button>
 <button type="submit" value="register" class="btn btn-success mt-3" name="register"  class="btn btn-success">Save</button>
 <button type="button" class="btn btn-danger mt-3"><a href="finance.php">Cancel</a></button>
 </div>
</form>

</div>
 <!-- ---------------------------------------------- -->
</div>
</div>

<?php

// Check if the form is submitted
if(isset($_POST['register'])) {

    // $id = $_POST['id'];    
    // $accountid  = $_POST['accountid'];

    // $lawyerid = $_POST['lawyerid'];
    // $clientid = $_POST['clientid'];
    //  $caseid = $_POST['caseid']; // Ensure this is added to the form
    // $address = $_POST['address'];
    // $date = $_POST['date'];
    // $paid = $_POST['paid'];
    // $unpaid = $_POST['unpaid'];
    // $total = $_POST['total'];
    $lawyerid = $_POST['lawyerid'];
    $clientid = $_POST['clientid'];
    $caseid = $_POST['caseid'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $paid = $_POST['paid'];
    $unpaid = $_POST['unpaid'];
    $total = $_POST['total'];

        // Check if the clientid exists in the client table
        $query = "SELECT * FROM client WHERE clientid = '$clientid'";
        $result = mysqli_query($conn, $query);
    
        if (mysqli_num_rows($result) == 0) {
          echo "<script>alert('Invalid Client ID. Please provide a valid Client ID.');</script>";
          exit();
      }    
    // Check if 'caseid' is set before accessing it
    $caseid = isset($_POST['caseid']) ? $_POST['caseid'] : null;

    if (empty($caseid)) {
        echo "<script>alert('Case ID is required. Please enter a valid Case ID.');</script>";
        exit(); // Stop further execution if 'caseid' is missing
    }
    print_r($_POST); 

    $sql = "INSERT INTO finance (lawyerid, clientid, caseid, address, date, paid, unpaid, total) 
        VALUES ('$lawyerid', '$clientid', '$caseid', '$address', '$date', '$paid', '$unpaid', '$total')";
    // Perform the query
    if(mysqli_query($conn, $sql)) {
        // echo "Record inserted successfully.";
        echo "<script>alert('Data Inserted into Database')</script>";
    ?>
      <meta http-equiv = "refresh" content = "0; url = http://localhost/LCMS/finance.php" />
    <?php
    } else {
        echo "<script>alert('Failed')</script>";
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);   
    }
    mysqli_close($conn);
}
?>
<?php include('includes/footer.php') ?>