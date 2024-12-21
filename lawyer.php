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
<!-- ============================================ -->
 <!-- ================================================ -->

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
    <a href="lawyerRegister.php" class="btn btn-light">lawyer / Add</a>
    </div>
    <div class="row">
   
   
    <!-- </div> -->
    <table class="table table-hover table-bordered text-center mt-5 bg-dark" id="myTable">
  <thead id="tableHead"class="table-dark">
    <tr>
      <!-- <th scope="col">Id</th> -->
      <th scope="col">lawyerid</th>
      <th scope="col">licenseNo</th>
      <th scope="col">qualification</th>
      <th scope="col">experience</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>


<?php
    $query = "SELECT * FROM lawyer";
    // error_reporting(0);

    $data =  mysqli_query($conn, $query);
    $total =  mysqli_num_rows( $data);


  //  $id = 0;
      $lawyerid = 0;
    if($total != 0){
    // echo "Table has records";
    ?>
     <!-- <th>".$id."</th> -->
<?php
    while( $result = mysqli_fetch_assoc($data)){
        // $id = $id +  1;
        $lawyerid = $lawyerid + 1;
      echo  "<tr>
            <th>".$lawyerid."</th>
            <th>".$result['licenseNo']."</td>
            <td>".$result['qualification']."</td>
            <td>".$result['experience']."</td>
            <td><a href=lawyerUpdate.php?lawyerid=$result[lawyerid] value='Update' onclick = 'return checkdelete()' class='btn btn-success m-2'><i class='fa-solid fa-pen-to-square'></i></a><a href='laywerDelete.php?lawyerid=$result[lawyerid]' value='Delete' onclick = 'return checkdelete()' class='btn btn-danger'>
            <i class='fa-solid fa-trash'></i></a><td>
            </tr>";
            // print_r($result);
    }}else{
    // echo "No records found";
    }
    ?>
</tbody>
</table>
</main>
</div>
</div>
    <script>
    function checkdelete(){
    return confirm('Are you sure');
    }
    </script>

<?php include('includes/footer.php') ?>




