<?php include('includes/header.php') ?>
<?php include('includes/connDB.php')?>
<?php 
// error_reporting(0);
session_start();
// session_unset();

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
    <!-- <a href="#">Siddiq Akbar</a> -->
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
    <div class="row">
    <div class="col-12 col-md-3  container-fluid  d-flex" id="mainBox">
    <div class="card flex-fill border-0">
    <div class="card-body py-4">
    <div class="d-flex align-items-start">
    <div class="flex-grow-1">
    <p class="mb-2">
    <?php
    $dash_user_query = "SELECT * from lawyer";
    $dash_user_query_run = mysqli_query($conn, $dash_user_query);

    if($_total = mysqli_num_rows($dash_user_query_run))
    {
        echo '<h1 class="mb-0"> '.$_total.'</h1>';
    }
    else{
        echo '<h4 class="mb-0"> No Data </h4>';
    }
    ?>
     <p class="mb-2">
    <h3>Lawyer</h3>
    </p>
    <div class="mb-0">
    <span class="text-muted">
    <a href="lawyer.php"><h4 class="TotaLawyer">Total Lawyer
    </h4></a>
    </span>
    </div>
    </div>
    <i class="fa-solid fa-people-group" id="iconFlex"></i>
    </div>
    </div>
    </div>
    </div>
    <!-- -----------card 1 End---------------- -->

    <div class="col-12 col-md-3 container-fluid d-flex" id="mainBox">
    <div class="card flex-fill border-0">
    <div class="card-body py-4">
    <div class="d-flex align-items-start">
    <div class="flex-grow-1">
    <p class="mb-2">
    <?php
    $dash_user_query = "SELECT * from client";
    $dash_user_query_run = mysqli_query($conn, $dash_user_query);

    if($_total = mysqli_num_rows($dash_user_query_run))
    {
        echo '<h1 class="mb-0"> '.$_total.'</h1>';
    }
    else{
        echo '<h4 class="mb-0"> No Data </h4>';
    }
    ?>
    </p>
    <p class="mb-2">
    <h3>Client</h3>
    </p>
    <div class="mb-0">
    <span class="text-muted">
    <a href="client.php"><h4 class="TotaLawyer">Total Client
    </h4></a>
    </span>
    </div>
    </div>
    <i class="fa-solid fa-user-group" id="iconFlex"></i>
    </div>
    </div>
    </div>
    </div>
    <!-- -----------card 2 End---------------- -->
    <div class="col-12 col-md-3 container-fluid d-flex" id="mainBox">
    <div class="card flex-fill border-0">
    <div class="card-body py-4">
    <div class="d-flex align-items-start">
    <div class="flex-grow-1">

    <p class="mb-2">
    <?php
    $dash_user_query = "SELECT * from cases";
    $dash_user_query_run = mysqli_query($conn, $dash_user_query);

    if($_total = mysqli_num_rows($dash_user_query_run))
    {
        echo '<h1 class="mb-0"> '.$_total.'</h1>';
    }
    else{
        echo '<h4 class="mb-0"> No Data </h4>';
    }
    ?>
    </p>
    <p class="mb-2">
    <h3>Cases</h3>
    </p>
    <div class="mb-0">
    <span class="text-muted">
    <a href="case.php"><h4 class="TotaLawyer">Total Cases</h4></a>
    </span>
    </div>
    </div>
    <i class="fa-solid fa-gavel" id="iconFlex"></i>
    </div>
    </div>
    </div>
    </div>
    <!-- -----------card 3 End---------------- -->
    <div class="col-12 col-md-3 container-fluid d-flex" id="mainBox">
    <div class="card flex-fill border-0">
    <div class="card-body py-4">
    <div class="d-flex align-items-start">
    <div class="flex-grow-1">
    <p class="mb-2">
    <?php
    $dash_user_query = "SELECT * from finance";
    $dash_user_query_run = mysqli_query($conn, $dash_user_query);

    if($_total = mysqli_num_rows($dash_user_query_run))
    {
        echo '<h1 class="mb-0"> '.$_total.'</h1>';
    }
    else{
        echo '<h4 class="mb-0"> No Data </h4>';
    }
    ?>
    </p>
    <p class="mb-2">
    <h3>Finance</h3>
    </p>
    <div class="mb-0">
    <span class="text-muted">
    <a href="finance.php"><h4 class="TotaLawyer">Total Finance</h4></a>
    </span>
    </div>
    </div>
    <i class="fa-solid fa-bars-progress" id="iconFlex"></i>
    </div>
    </div>
    </div>
    </div>
    <!-- -----------card 4 End---------------- -->
    <div class="col-12 col-md-3 container-fluid d-flex" id="mainBox">
    <div class="card flex-fill border-0">
    <div class="card-body py-4">
    <div class="d-flex align-items-start">
    <div class="flex-grow-1">
    <p class="mb-2">
    <?php
    $dash_user_query = "SELECT * from appointment";
    $dash_user_query_run = mysqli_query($conn, $dash_user_query);

    if($_total = mysqli_num_rows($dash_user_query_run))
    {
        echo '<h1 class="mb-0"> '.$_total.'</h1>';
    }
    else{
        echo '<h4 class="mb-0"> No Data </h4>';
    }
    ?>
    </p>
    <p class="mb-2">
    <h3>Appointment</h3>
    </p>
    <div class="mb-0">
    <span class="text-muted">
    <a href="appointment.php"><h4 class="TotaLawyer">Total Appointment</h4></a>
    </span>
    </div>
    </div>
    <i class="fa-solid fa-calendar-check" id="iconFlex"></i>
    </div>
    </div>
    </div>
    </div>
    <!-- -----------card 5 End---------------- -->
    <div class="col-12 col-md-3 container-fluid d-flex" id="mainBox">
    <div class="card flex-fill border-0">
    <div class="card-body py-4">
    <div class="d-flex align-items-start">
    <div class="flex-grow-1">
    <p class="mb-2">
    <p class="mb-2">
    <?php
    $dash_user_query = "SELECT * from admin";
    $dash_user_query_run = mysqli_query($conn, $dash_user_query);

    if($_total = mysqli_num_rows($dash_user_query_run))
    {
        echo '<h1 class="mb-0"> '.$_total.'</h1>';
    }
    else{
        echo '<h4 class="mb-0"> No Data </h4>';
    }
    ?>
    <h2>Admin</h2>
    </p>
    </div>
    <i class="fa-solid fa-user NavUserIcon" id="iconFlex"></i>
    </div>
    </div>
    </div>
    </div>
    <!-- -----------card 6 End---------------- -->
    </div>
    <!-- ----------------------------------- -->
    <?php include('includes/footer.php') ?>