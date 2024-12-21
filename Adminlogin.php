<?php include('includes/header.php'); ?>
<?php include('includes/connDB.php'); ?>
<?php 
session_start();
?>

<section>
    <div class="container">
        <div class="row m-3">
            <div class="col-12 col-sm-8 col-md-6 m-auto" id="formWidt">
                <div class="card m-5 bg-dark">
                    <div class="card-body">
                        <div class="text-center">
                            <!-- Display default profile image since this is the login form -->
                            <img src="./lawyerImg.png" alt="" name="profile_image" width="80" height="80" class="rounded-pill">
                            <h1 class="logAdm">Lawyer</h1>
            
                        </div>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" autocomplete="off">
                            <input type="text" name="user" id="formInput" class="form-control my-5" placeholder="username" required>
                            <input type="password" name="password" id="formInput" class="form-control my-5" placeholder="password" required>
                            <div class="text-center">
                                <button type="submit" name="login" class="btn btn-primary" id="formButn">Login</button>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['login'])) {
                            $user = $_POST['user'];
                            $password = $_POST['password'];

                            // Validate user credentials
                            $query = "SELECT * FROM admin WHERE user = '$user' AND password = '$password'";
                            $data = mysqli_query($conn, $query);
                            $total = mysqli_num_rows($data);

                            if ($total == 1) {
                                // Successful login
                                $_SESSION['user'] = $user;
                                header('location: dashboard.php'); // Redirect to dashboard
                                exit;
                            } else {
                                // Login failed
                                echo "<div class='alert alert-danger'>Login failed. Please check your credentials.</div>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('includes/footer.php'); ?>
