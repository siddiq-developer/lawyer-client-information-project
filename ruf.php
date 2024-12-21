<!-- Admin code -->
 
<?php include('includes/header.php'); ?>
<?php include('includes/connDB.php'); ?>
<?php
session_start();

// Ensure user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit;
}

// Fetch user data
$user = $_SESSION['user'];

// Query to get user data
$query = "SELECT * FROM admin WHERE user = '$user'";
$data = mysqli_query($conn, $query);

// Check if the user data exists
if ($data && mysqli_num_rows($data) > 0) {
    $admin = mysqli_fetch_assoc($data);
} else {
    echo "<div class='alert alert-danger'>User not found.</div>";
    exit;
}

// Handle form submission
if (isset($_POST['update_profile'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $image = $_FILES['image']['name'];
    // $image = $_FILES['image']['name'] ?? null;

    // Handle image upload
    $image_query = "";
    if ($image) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image);

        // Check if the uploads directory exists and create it if necessary
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // Move uploaded image to the target directory
    //     if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
    //         $image_query = ", profile_image='$target_file'";
    //     } else {
    //         echo "<div class='alert alert-danger'>Image upload failed. Please check the directory and file permissions.</div>";
    //     }
    // }
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        // Update user info with image path
        $update_query = "UPDATE admin SET profile_image='$target_file' WHERE user='$user'";
        if (mysqli_query($conn, $update_query)) {
            echo "Profile image updated successfully!";
        } else {
            echo "Failed to update profile image.";
        }
    } else {
        echo "Image upload failed.";
    }
}

    // Update user info in the database
    $update_query = "UPDATE admin SET user='$username', password='$password' $image_query WHERE user='$user'";
    if (mysqli_query($conn, $update_query)) {
        echo "<div class='alert alert-success'>Profile updated successfully!</div>";
        $_SESSION['user'] = $username; // Update session data if the username changes
        header('Location: dashboard.php'); // Redirect to dashboard
        exit;
    } else {
        echo "<div class='alert alert-danger'>Profile update failed: " . mysqli_error($conn) . "</div>";
    }
}
?>

<section class="mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-dark text-white text-center">
                        <h3>Form update</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                            <!-- Name Field -->
                            <div class="mb-3">
                                <label for="username" class="form-label">Name</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($admin['user'] ?? '', ENT_QUOTES); ?>" required>
                            </div>

                            <!-- Password Field -->
                            <div class="mb-3">
                                <label for="password" class="form-label">New Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password" required>
                            </div>

                            <!-- Image Upload Field -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Profile Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>

                            <!-- Display current profile image -->
                            <div class="mb-3 text-center">
                                <label class="form-label">Current Profile Image</label><br>
                                <img src="<?php echo htmlspecialchars($admin['image'] ?? './lawyerImg.png', ENT_QUOTES); ?>" alt="" class="rounded-circle" width="100" height="100">
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" name="update_profile" class="btn btn-dark">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('includes/footer.php'); ?>


<!-- Adminlogin code -->
<?php include('includes/header.php') ?> 
<?php include('includes/connDB.php')?>
<?php 
// error_reporting(0);
session_start();
?>

<section>
    <div class="container">
    <div class="row m-3">
    <div class="col-12 col-sm-8  col-md-6 m-auto" id="formWidt">
    <div class="card m-5 bg-dark">
    <div class="card-body">
    <div class="text-center">
    <img src="./lawyerImg.png" alt="" width="80" height="80" class="rounded-pill">
    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/></svg>
  
  <h1 class="logAdm">Lawyer</h1>
</div>
</div>
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" autocomplete="off">
    <input type="text" name="user" value="" id="formInput" class="form-control my-5" placeholder="username" required>
    <input type="password" name="password" value="" id="formInput" class="form-control my-5" placeholder="password" required>
    <div class="text-center">
    <button type="submit" name="login" class="btn btn-primary" id="formButn">Login</button> 
    </div>
    </form> 
    <?php

    if (isset($_POST['login'])) {
      $user = $_POST['user'];
      $password = $_POST['password'];

      // Handle image upload
      $image = $_FILES['image']['name'];
      $target_dir = "uploads/";
      $target_file = $target_dir . basename($image);

      // Ensure uploads directory exists
      if (!is_dir($target_dir)) {
          mkdir($target_dir, 0755, true);
      }

      // Move uploaded image to the target directory
      if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
          // Upload successful
          echo "Image uploaded successfully";
      } else {
          echo "Image upload failed";
      }

      // Validate user credentials
      $query = "SELECT * FROM admin WHERE user = '$user' && password = '$password'";
      $data = mysqli_query($conn, $query);
      $total = mysqli_num_rows($data);

      if ($total == 1) {
          $_SESSION['user'] = $user;

          // Store image path in database if login is successful
          $update_query = "UPDATE admin SET profile_image='$target_file' WHERE user='$user'";
          mysqli_query($conn, $update_query);

          // Redirect to dashboard after login
          header('location: dashboard.php');
      } else {
          echo "Login failed. Please check your credentials.";
      }
  }
    ?>
    </div>
    </div>
    </div>
    </div>
    </div>
</section>

<?php include('includes/footer.php') ?>