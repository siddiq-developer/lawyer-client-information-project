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
    $image_query = "";

    // Handle image upload if an image was uploaded
    if (!empty($image)) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image);

        // Ensure the uploads directory exists
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // Move uploaded image to the target directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $image_query = ", profile_image='$target_file'";  // Update query for image
        } else {
            echo "<div class='alert alert-danger'>Image upload failed. Please check the directory and file permissions.</div>";
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
                        <h3>Update Profile</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                            <!-- Username Field -->
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
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
                                <img src="<?php echo htmlspecialchars($admin['profile_image'] ?? './lawyerImg.png', ENT_QUOTES); ?>" alt="Profile Image" class="rounded-circle" width="100" height="100">
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" name="update_profile" class="btn btn-dark">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('includes/footer.php'); ?>
