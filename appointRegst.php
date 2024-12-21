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
    <div class="wrapper">
    <aside id="sidebar">
    <!-- Content For Sidebar -->
    <div class="h-100">
    <div class="sidebar-logo">
    <img src="./lawyerImg.png" alt="" class="avatar img-fluid" id="imgSeat1">
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
    <!-- -------------Navbar End--------------- -->
    <main class="content px-3 py-2">
    <div class="container-fluid">
    <div class="mb-3">
    <!-- <h4>Admin Dashboard</h4> -->
    </div>
    <div class="row">

    </div>
    <!-- ----------------------------------- -->

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
  
</div>
</div>
    <form ction="appointment.php" class="form-signup" method="POST" enctype="multipart/form-data">
    <input type="text" name="appointmentid" id="formInput" class="form-control my-2" placeholder="appointmentid" required>
    <input type="text" name="date" id="formInput" class="form-control my-2" placeholder="date" required>
    <input type="text" name="time" id="formInput" class="form-control my-2" placeholder="time" required>
    <input type="text" name="clientid" id="formInput" class="form-control my-2" placeholder="clientid" required>
    <input type="text" name="lawyerid" id="formInput" class="form-control my-2" placeholder="lawyerid" required>
    <input type="text" name="caseid" id="formInput" class="form-control my-2" placeholder="caseid" required>
    
    <div class="text-center">
    <button type="submit" value="register" class="btn btn-primary" name="register" id="formButn1" required>Appointment Add</button> 
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
if(isset($_POST['register'])) {


    // $id = $_POST['id'];
    $appointmentid = $_POST['appointmentid'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $clientid = $_POST['clientid'];
    $lawyerid = $_POST['lawyerid'];
    $caseid = $_POST['caseid'];

    // Assuming you have a database connection established earlier
    // Replace 'your_table_name' with your actual table name
    $sql = "INSERT INTO appointment (appointmentid,date,time,clientid,lawyerid,caseid) 
    VALUES ('$appointmentid', '$date', '$time','$clientid','$lawyerid','$caseid')";

    // Perform the query
    if(mysqli_query($conn, $sql)) {
        // echo "Record inserted successfully.";
        echo "<script>alert('Data Inserted into Database')</script>";
    ?>
      <meta http-equiv = "refresh" content = "1; url = http://localhost/LCMS/appointment.php" />
    <?php
    } else {
        echo "<script>alert('Failed')</script>";  
    }
    // Close the connection (if open, assuming $conn is your database connection)
    mysqli_close($conn);
}
?>
    <?php include('includes/footer.php') ?>