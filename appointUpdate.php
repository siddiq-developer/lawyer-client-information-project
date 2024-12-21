<?php include('includes/header.php') ?>
<?php include('includes/connDB.php')?>
<?php
   $appointmentid = $_GET['appointmentid'];
   $query = "SELECT * FROM appointment WHERE appointmentid= '$appointmentid'";
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
    <div class="wrapper">
    <aside id="sidebar">
    <!-- Content For Sidebar -->
    <div class="h-100">
    <div class="sidebar-logo">
    <img src="./Siddiq Akbar.jpg" alt="" class="avatar img-fluid" id="imgSeat">
    <ul class="sidebar-nav">
        <li class="sidebar-item">
        <a href="dashboard.php" class="sidebar-link">
        <i class="fa-solid fa-list"></i>
        Dashboard
        </a>
        </li>
        <li class="sidebar-item">
        <a href="admin.php" class="sidebar-link">
        <i class="fa-solid fa-user NavUserIcon"></i>
        Admin
        </a>
        </li>
        <li class="sidebar-item">
        <a href="lawyer.php" class="sidebar-link">
        <i class="fa-solid fa-user-group"></i>
        Lawyer
        </a>
        </li>
        <li class="sidebar-item">
        <a href="client.php" class="sidebar-link">
        <i class="fa-solid fa-user-group"></i>
        Client
        </a>
        </li>
        <li class="sidebar-item">
        <a href="case.php" class="sidebar-link">
        <i class="fa-solid fa-gavel"></i>
        case
        </a>
        </li>
        <li class="sidebar-item">
        <a href="finance.php" class="sidebar-link">
        <i class="fa-solid fa-bars-progress"></i>
        Finance
        </a>
        </li>
        <li class="sidebar-item">
        <a href="appointment.php" class="sidebar-link">
        <i class="fa-solid fa-calendar-check"></i>
        Appointment
        </a>
        </li>
        </li>
        </ul>
    </div>
    </div>
    </aside>
    <!-- ---------Main content--------------- -->
    <div class="main">  
    <!-- -------------Nabar Start-------------- -->
    <nav class="navbar navbar-expand px-3 border-bottom" id="nav">
    <button class="btn btn-light" id="sidebar-toggle" type="button">
    <span class="navbar-toggler-icon" id="navButon"></span>
    </button>
    <div class="navbar-collapse navbar" >
    <ul class="navbar-nav">
    <li class="nav-item dropdown">
    <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
    <img src="./Siddiq Akbar.jpg" alt="" class="avatar img-fluid" id="imgSeat">
    </a>
    </li>
    </ul>
    </div>
    <a href="Adminlogout.php" id="navLog">LogOut</a>
    </nav>

<section>
    <div class="container">
    <div class="row">
    <div class="col-12 col-sm-8  m-auto" id="formWidt">
    <div class="card m-1 form-card1 ">
    <div class="card-body">
    <div class="text-center">
    <svg  xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="white" class="bi bi-person-circle" viewBox="0 0 16 16">
    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/></svg>
  <!-- <h1>Update</h1> -->
</div>
</div>
    <form ction="appointment.php?appointmentid=<?php echo $appointmentid; ?>" class="form-signup" method="POST" enctype="multipart/form-data">
    <input type="text" value="<?php echo $result['appointmentid'] ?>" name="appointmentid"  id="formInput" class="form-control my-2" placeholder="appointmentid" required>
    <input type="text" value="<?php echo $result['date'] ?>" name="date" id="formInput" class="form-control my-2" placeholder="date" required>
    <input type="text" value="<?php echo $result['time'] ?>" name="time" id="formInput" class="form-control my-2" placeholder="time" required>
    <input type="text" value="<?php echo $result['clientid'] ?>" name="clientid" id="formInput" class="form-control my-2" placeholder="clientid" required>
    <input type="text" value="<?php echo $result['lawyerid'] ?>" name="lawyerid" id="formInput" class="form-control my-2" placeholder="lawyerid" required>
    <input type="text" value="<?php echo $result['caseid'] ?>" name="caseid" id="formInput" class="form-control my-2" placeholder="caseid" required>

    <div class="text-center">
    <button type="submit" value="Update" class="btn btn-primary" name="update" id="formButn1" required>Update</button> 
    </div>
    </form> 
    </div>
    </div>
    </div>
    </div>
    </div>
</section>
<?php


// Check if the form is submitted
if(isset($_POST['update'])) {
    
    $appointmentid = $_POST['appointmentid'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $clientid = $_POST['clientid'];
    $lawyerid = $_POST['lawyerid'];
    $caseid = $_POST['caseid'];

    $sql= "UPDATE appointment set appointmentid ='$appointmentid'
    ,date='$date',time='$time',clientid='$clientid',lawyerid='$lawyerid',caseid='$caseid' WHERE  appointmentid='$appointmentid'";
    // Perform the query
    if(mysqli_query($conn, $sql)) {
        // echo "update successfully.";
        echo "<script>alert('Record Update Successfully')</script>"
    ?>
    <meta http-equiv = "refresh" content = "1; url = http://localhost/LCMS/appointment.php" />
    <?php
    } else {

    }

    // Close the connection (if open, assuming $conn is your database connection)
    mysqli_close($conn);
}
?>
<?php include('includes/footer.php') ?>

 
