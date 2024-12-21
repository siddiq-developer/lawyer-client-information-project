
<?php include('includes/header.php') ?>
<?php include('includes/connDB.php')?>
<?php
   $clientid = $_GET['clientid'];
   $query = "SELECT * FROM client WHERE clientid= '$clientid'";
   error_reporting(0);

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
    <form action="update.php?clientid=<?php echo $clientid; ?>" class="form-signup" method="POST" enctype="multipart/form-data">
    <input type="text" value="<?php echo $result['clientid'] ?>" name="id" name="picture" id="formInput" class="form-control my-2" placeholder="picture" required>
    <input type="text" value="<?php echo $result['name'] ?>" name="name" id="formInput" class="form-control my-2" placeholder="name" required>
    <input type="text" value="<?php echo $result['cnic'] ?>" name="cnic" id="formInput" class="form-control my-2" placeholder="cnic" required>
    <input type="text" value="<?php echo $result['phone'] ?>" name="phone" id="formInput" class="form-control my-2" placeholder="phone" required>
    <input type="text"  value="<?php echo $result['email'] ?>" name="email" id="formInput" class="form-control my-2" placeholder="email" required>
    <input type="text" value="<?php echo $result['description'] ?>" name="description" id="formInput" class="form-control my-2" placeholder="description" required>
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
    

    $id = $_POST['clientid'];
    // $picture = $_POST['picture'];
    $name = $_POST['name'];
    $cnic = $_POST['cnic'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $description = $_POST['description'];


    $sql= "UPDATE client set clientid='$clientid',name='$name'
    ,cnic='$cnic',phone='$phone',email='$email',description='$description' WHERE clientid='$clientid'";
    // Perform the query
    if(mysqli_query($conn, $sql)) {
        // echo "update successfully.";
        echo "<script>alert('Record Update Successfully')</script>"
    ?>
    <meta http-equiv = "refresh" content = "1; url = http://localhost/LCMS/client.php" />
    <?php
    } else {
    }

    mysqli_close($conn);
}
?>
<?php include('includes/footer.php') ?>
