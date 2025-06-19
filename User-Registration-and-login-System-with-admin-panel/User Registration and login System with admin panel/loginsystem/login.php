<?php 
// Start a new session or resume the existing session
session_start(); 
// Include the database configuration file
include_once('includes/config.php');

// Set the maximum allowed failed login attempts
$max_attempts = 5;
// Set the lockout time in seconds (15 minutes)
$lockout_time = 15 * 60;

// Check if the user is already logged in via 'Remember Me' cookie
if (!isset($_SESSION['id']) && isset($_COOKIE['rememberme'])) {
    // Get user ID from cookie
    $user_id = $_COOKIE['rememberme'];
    // Fetch user from database
    $ret = mysqli_query($con, "SELECT id, fname FROM users WHERE id='$user_id'");
    $num = mysqli_fetch_array($ret);
    if ($num > 0) {
        // Set session variables
        $_SESSION['id'] = $num['id'];
        $_SESSION['name'] = $num['fname'];
        header("location:welcome.php");
        exit();
    }
}

// Code for login
if(isset($_POST['login']))
{
    // Get user input
    $password = $_POST['password'];
    $useremail = $_POST['uemail'];
    $remember = isset($_POST['remember']);

    // Check if the user is locked out
    if (isset($_SESSION['lockout_time']) && time() < $_SESSION['lockout_time']) {
        echo "<script>alert('Account locked due to too many failed login attempts. Please try again later.');</script>";
    } else {
        // Fetch user from database
        $ret = mysqli_query($con, "SELECT id, fname, password FROM users WHERE email='$useremail'");
        $num = mysqli_fetch_array($ret);
        if($num > 0 && password_verify($password, $num['password'])) {
            // Successful login
            $_SESSION['id'] = $num['id'];
            $_SESSION['name'] = $num['fname'];
            // If 'Remember Me' is checked, set a cookie for 30 days
            if ($remember) {
                setcookie('rememberme', $num['id'], time() + (30 * 24 * 60 * 60), "/");
            }
            // Reset failed attempts
            unset($_SESSION['failed_attempts']);
            unset($_SESSION['lockout_time']);
            header("location:welcome.php");
            exit();
        } else {
            // Failed login
            if (!isset($_SESSION['failed_attempts'])) {
                $_SESSION['failed_attempts'] = 1;
            } else {
                $_SESSION['failed_attempts']++;
            }
            // Lock the account if max attempts reached
            if ($_SESSION['failed_attempts'] >= $max_attempts) {
                $_SESSION['lockout_time'] = time() + $lockout_time;
                echo "<script>alert('Account locked due to too many failed login attempts. Please try again after 15 minutes.');</script>";
            } else {
                echo "<script>alert('Invalid username or password');</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>User Login | Registration and Login System</title>
        <!-- Link to the main CSS file -->
        <link href="css/styles.css" rel="stylesheet" />
        <!-- Font Awesome for icons -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h2 align="center">Registration and Login System</h2>
                                        <hr />
                                        <h3 class="text-center font-weight-light my-4">User Login</h3>
                                    </div>
                                    <div class="card-body">
                                        <!-- Login form starts here -->
                                        <form method="post">
                                            <!-- Email input -->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="uemail" type="email" placeholder="name@example.com" required/>
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <!-- Password input -->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="password" type="password" placeholder="Password" required />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <!-- Remember Me checkbox -->
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" name="remember" id="rememberMe">
                                                <label class="form-check-label" for="rememberMe">Remember Me</label>
                                            </div>
                                            <!-- Forgot password link and Login button -->
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password-recovery.php">Forgot Password?</a>
                                                <button class="btn btn-primary" name="login" type="submit">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="signup.php">Need an account? Sign up!</a></div>
                                        <div class="small"><a href="index.php">Back to Home</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <!-- Include the footer -->
            <?php include('includes/footer.php');?>
        </div>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <!-- Custom scripts -->
        <script src="js/scripts.js"></script>
    </body>
</html>
