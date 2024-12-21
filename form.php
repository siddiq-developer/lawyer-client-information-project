<?php include('includes/header.php') ?> 
<?php include('includes/connDB.php')?>
<?php 
error_reporting(0);

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
    <div class="mb-3">
    <!-- <h4>Admin Dashboard</h4> -->
    </div>
    <div class="row">
   
    </div>

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
    <form ction="client.php" class="form-signup" method="POST" enctype="multipart/form-data">
    <input type="file" name="uploadfile" name="picture" id="formInput" class="form-control my-2" placeholder="picture" required>
    <input type="text" name="name" id="formInput" class="form-control my-2" placeholder="name" required>
    <input type="text" name="cnic" id="formInput" class="form-control my-2" placeholder="cnic" required>
    <input type="text" name="phone" id="formInput" class="form-control my-2" placeholder="phone" required>
    <input type="text" name="email" id="formInput" class="form-control my-2" placeholder="email" required>
    <input type="text" name="description" id="formInput" class="form-control my-2" placeholder="description" required>
    <div class="text-center">
    <button type="submit" value="register" class="btn btn-primary" name="register" id="formButn1" required>Login</button> 
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

  $filename =  $_FILES["uploadfile"]["name"];
  $tempname =  $_FILES["uploadfile"]["tmp_name"];
  $folder = "images/".$filename;   
  move_uploaded_file($tempname, $folder);
    $id = $_POST['clientid'];
    $picture = $_POST['picture'];
    $name = $_POST['name'];
    $cnic = $_POST['cnic'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $description = $_POST['description'];

    // Assuming you have a database connection established earlier
    // Replace 'your_table_name' with your actual table name
    $sql = "INSERT INTO client (clientid,picture,name, cnic, phone, email,description) 
    VALUES ('$clientid','$folder', '$name', '$cnic', '$phone', '$email','$description')";

    // Perform the query
    if(mysqli_query($conn, $sql)) {
        // echo "Record inserted successfully.";
        echo "<script>alert('Data Inserted into Database')</script>";
    ?>
      <meta http-equiv = "refresh" content = "1; url = http://localhost/LCMS/client.php" />
    <?php
    } else {
        echo "<script>alert('Failed')</script>";
        // echo "Error: " . $sql . "<br>" . mysqli_error($conn);   
    }
    mysqli_close($conn);
}
?>
    <?php include('includes/footer.php') ?>