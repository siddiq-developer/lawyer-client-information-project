<?php include('includes/header.php') ?>
<?php include('includes/connDB.php')?>
<?php
   $accountid = $_GET['accountid'];
   $query = "SELECT * FROM finance WHERE accountid = '$accountid'";
//    error_reporting(0);

   $data =  mysqli_query($conn, $query);
   $total =  mysqli_num_rows( $data);
   $result = mysqli_fetch_assoc($data);


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
<form action="invoiceUpdate.php?accountid=<?php echo $accountid; ?>" class="form-signup" method="POST" enctype="multipart/form-data">
 <div class="row">

  <div class="col-6">
  <div class="input-group mt-4">
  <span class="input-group-text" id="basic-addon1">Lawyerid</span>
  <input type="text" value="<?php echo $result['lawyerid'] ?>" name="lawyerid" class="form-control" placeholder="Lawyerid" aria-label="Username" aria-describedby="basic-addon1">
</div>
</div>
<div class="col-6">
    <div class="input-group mt-4">
  <span class="input-group-text" id="basic-addon1">Clientid</span>
  <input type="text"  value="<?php echo $result['clientid'] ?>"  name="clientid" class="form-control" placeholder="Clientid" aria-label="Username" aria-describedby="basic-addon1">
  </div>
    </div>

    <div class="col-6">
    <div class="input-group mt-5">
  <span class="input-group-text" id="basic-addon1">Address</span>
  <input type="text" value="<?php echo $result['address'] ?>"  name="address" class="form-control" placeholder="Address" aria-label="Username" aria-describedby="basic-addon1">
  </div>
    </div>

    <div class="col-6">
    <div class="input-group mt-5">
  <span class="input-group-text" id="basic-addon1">Inv.Date</span>
  <input type="date" value="<?php echo $result['date'] ?>" name="date" class="form-control" placeholder="Inv.Date" aria-label="Username" aria-describedby="basic-addon1">
  </div>
  </div>

  <div class="col-6">
    <div class="input-group mt-5">
  <span class="input-group-text" id="basic-addon1">Paid</span>
  <input type="text" value="<?php echo $result['paid'] ?>" name="paid"  class="form-control" placeholder="Paid" aria-label="Username" aria-describedby="basic-addon1">
  </div>
    </div>

    <div class="col-6">
    <div class="input-group mt-5">
  <span class="input-group-text" id="basic-addon1">Unpaid</span>
  <input type="text" value="<?php echo $result['unpaid'] ?>" name="unpaid" class="form-control" placeholder="Unpaid" aria-label="Username" aria-describedby="basic-addon1">
  </div>
  </div>

  <div class="col-6">
    <div class="input-group mt-5">
  <span class="input-group-text" id="basic-addon1">Total</span>
  <input type="text" value="<?php echo $result['total'] ?>" name="total" class="form-control" placeholder="Total" aria-label="Username" aria-describedby="basic-addon1">
  </div>
  </div>
</div>

<div class="row">
 <div class="col-8">
 <button type="button" class="btn btn-primary mt-3" onclick="GetPrint()">Print</button>
 <button type="submit" value="Update" class="btn btn-primary mt-3" name="update" required>Update</button> 
 <button type="cancel" class="btn btn-danger mt-3">Cancel</button>
 </div>
</form>
</div>
 <!-- ---------------------------------------------- -->
</div>
</div>

<?php

if(isset($_POST['update'])) {
    $lawyerid= $_POST['lawyerid'];
    $clientid = $_POST['clientid'];
    $address= $_POST['address'];
    $date = $_POST['date'];
    $paid= $_POST['paid'];
    $unpaid = $_POST['unpaid'];
    $total= $_POST['total'];
    
    $sql= "UPDATE finance set lawyerid='$lawyerid'
    ,clientid='$clientid',address='$address',date='$date',paid='$date',unpaid='$unpaid',
    total='$total' WHERE accountid='$accountid'";
    if(mysqli_query($conn, $sql)) {
        echo "<script>alert('Record Update Successfully')</script>"

    ?>
    <meta http-equiv = "refresh" content = "0; url = http://localhost/LCMS/finance.php" />
    <?php
    } else {
    }

    mysqli_close($conn);
}
?>
<?php include('includes/footer.php') ?>

 
