<?php 
// Start a new session or resume the existing session
session_start();
// Include the database configuration file
require_once('includes/config.php');

// Include PHPMailer for sending verification emails
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

// Code for Registration 
if(isset($_POST['submit']))
{
    // Get user input from the form
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];
    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    // Generate a verification code
    $verification_code = md5(rand());
    // Check if the email already exists
    $sql = mysqli_query($con, "select id from users where email='$email'");
    $row = mysqli_num_rows($sql);
    if($row > 0)
    {
        // Email already exists
        echo "<script>alert('Email id already exist with another account. Please try with other email id');</script>";
    } else {
        // Insert the new user into the database with 'unverified' status
        $msg = mysqli_query($con, "insert into users(fname, lname, email, password, contactno, verification_code, is_verified) values('$fname', '$lname', '$email', '$hashed_password', '$contact', '$verification_code', 0)");
        if($msg)
        {
            // Send verification email
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'your gmail id here'; // SMTP username
            $mail->Password = 'your gmail password here'; // SMTP password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom('your gmail id here', 'Your Name');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Email Verification';
            $mail->Body = 'Hi ' . $fname . ',<br><br>Please click the following link to verify your email address:<br><a href="http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/verify.php?code=' . $verification_code . '">Verify Email</a>';
            if(!$mail->send()) {
                echo  "<script>alert('Verification email could not be sent.');</script>";
            } else {
                echo "<script>alert('Registered successfully! Please check your email to verify your account.');</script>";
                echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
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
        <title>User Signup | Registration and Login System</title>
        <!-- Link to the local Tailwind CSS file -->
        <link href="css/tailwind.min.css" rel="stylesheet" />
        <!-- Font Awesome for icons -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript">
        function checkpass()
        {
            // Check if password and confirm password match
            if(document.signup.password.value != document.signup.confirmpassword.value)
            {
                alert(' Password and Confirm Password field does not match');
                document.signup.confirmpassword.focus();
                return false;
            }
            return true;
        }
        // Password strength meter
        function checkStrength(password) {
            var strengthBar = document.getElementById("strengthBar");
            var strength = 0;
            if (password.length >= 6) strength += 1;
            if (password.match(/[a-z]+/)) strength += 1;
            if (password.match(/[A-Z]+/)) strength += 1;
            if (password.match(/[0-9]+/)) strength += 1;
            if (password.match(/[$@#&!]+/)) strength += 1;
            strengthBar.value = strength;
        }
        </script>
    </head>
    <body class="bg-gray-100 min-h-screen">
        <div class="flex flex-col min-h-screen justify-center items-center">
            <div class="w-full max-w-2xl mx-auto">
                <div class="bg-white shadow-lg rounded-lg mt-10">
                    <div class="px-8 pt-8 pb-4 border-b">
                        <h2 class="text-center text-2xl font-bold">Registration and Login System</h2>
                        <hr class="my-2" />
                        <h3 class="text-center text-lg font-medium text-gray-700">Create Account</h3>
                    </div>
                    <div class="px-8 py-6">
                        <!-- Signup form starts here -->
                        <form method="post" name="signup" onsubmit="return checkpass();">
                            <div class="flex flex-col md:flex-row gap-4 mb-4">
                                <div class="w-full md:w-1/2">
                                    <label for="fname" class="block text-gray-700 mb-2">First name</label>
                                    <input class="form-input w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" id="fname" name="fname" type="text" placeholder="Enter your first name" required />
                                </div>
                                <div class="w-full md:w-1/2">
                                    <label for="lname" class="block text-gray-700 mb-2">Last name</label>
                                    <input class="form-input w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" id="lname" name="lname" type="text" placeholder="Enter your last name" required />
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-gray-700 mb-2">Email address</label>
                                <input class="form-input w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" id="email" name="email" type="email" placeholder="phpgurukulteam@gmail.com" required />
                            </div>
                            <div class="mb-4">
                                <label for="contact" class="block text-gray-700 mb-2">Contact Number</label>
                                <input class="form-input w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" id="contact" name="contact" type="text" placeholder="1234567890" required pattern="[0-9]{10}" title="10 numeric characters only" maxlength="10" />
                            </div>
                            <div class="flex flex-col md:flex-row gap-4 mb-4">
                                <div class="w-full md:w-1/2">
                                    <label for="password" class="block text-gray-700 mb-2">Password</label>
                                    <input class="form-input w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" id="password" name="password" type="password" placeholder="Create a password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required onkeyup="checkStrength(this.value)"/>
                                    <!-- Password strength meter -->
                                    <progress id="strengthBar" value="0" max="5" class="w-full h-2 mt-2"></progress>
                                </div>
                                <div class="w-full md:w-1/2">
                                    <label for="confirmpassword" class="block text-gray-700 mb-2">Confirm Password</label>
                                    <input class="form-input w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" id="confirmpassword" name="confirmpassword" type="password" placeholder="Confirm password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required />
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid"><button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition w-full" name="submit">Create Account</button></div>
                            </div>
                        </form>
                    </div>
                    <div class="px-8 pb-6 text-center border-t">
                        <div class="mb-2"><a class="text-sm text-blue-600 hover:underline" href="login.php">Have an account? Go to login</a></div>
                        <div><a class="text-sm text-gray-600 hover:underline" href="index.php">Back to Home</a></div>
                    </div>
                </div>
            </div>
            <!-- Include the footer -->
            <div class="w-full mt-8">
                <?php include_once('includes/footer.php');?>
            </div>
        </div>
        <!-- Custom scripts (if any) -->
        <script src="js/scripts.js"></script>
    </body>
</html>
