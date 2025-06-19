<?php
// Include the database configuration file
include_once('includes/config.php');
// Initialize variables
$show_form = false;
$message = '';
// Check if the reset token is present in the URL
if(isset($_GET['token'])){
    // Get the token from the URL
    $token = $_GET['token'];
    // Check if a user with this token exists and the token is not expired
    $query = mysqli_query($con, "SELECT id FROM users WHERE reset_token='$token' AND reset_token_expiry > NOW()");
    if(mysqli_num_rows($query) > 0){
        // Token is valid, show the reset form
        $show_form = true;
        $user = mysqli_fetch_array($query);
        $userid = $user['id'];
        // Handle form submission
        if(isset($_POST['reset'])){
            // Get the new password from the form
            $newpassword = $_POST['newpassword'];
            // Hash the new password
            $hashed_newpassword = password_hash($newpassword, PASSWORD_DEFAULT);
            // Update the password in the database and clear the reset token
            mysqli_query($con, "UPDATE users SET password='$hashed_newpassword', reset_token=NULL, reset_token_expiry=NULL WHERE id='$userid'");
            $message = "Your password has been reset successfully! You can now <a href='login.php'>login</a>.";
            $show_form = false;
        }
    } else {
        // Invalid or expired token
        $message = "Invalid or expired password reset link.";
    }
} else {
    // No token provided
    $message = "No password reset token provided.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password | Registration and Login System</title>
    <!-- Link to the main CSS file -->
    <link href="css/styles.css" rel="stylesheet" />
    <script type="text/javascript">
    // Client-side validation for password match
    function checkpass() {
        if(document.resetForm.newpassword.value != document.resetForm.confirmpassword.value) {
            alert('Password and Confirm Password field do not match');
            document.resetForm.confirmpassword.focus();
            return false;
        }
        return true;
    }
    </script>
</head>
<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h2 align="center">Registration and Login System</h2>
                                    <hr />
                                    <h3 class="text-center font-weight-light my-4">Reset Password</h3>
                                </div>
                                <div class="card-body">
                                    <?php if($show_form){ ?>
                                    <!-- Password reset form -->
                                    <form method="post" name="resetForm" onsubmit="return checkpass();">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="newpassword" name="newpassword" type="password" placeholder="New Password" required />
                                            <label for="newpassword">New Password</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="confirmpassword" name="confirmpassword" type="password" placeholder="Confirm Password" required />
                                            <label for="confirmpassword">Confirm Password</label>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" name="reset">Reset Password</button></div>
                                        </div>
                                    </form>
                                    <?php } ?>
                                    <!-- Display the result message -->
                                    <p class="text-center"><?php echo $message; ?></p>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="login.php">Go to Login</a></div>
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
</body>
</html> 