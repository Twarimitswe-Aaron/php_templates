<?php 
// Start a new session or resume the existing session
session_start();
// Include the database configuration file
include_once('includes/config.php');
// Check if the user is logged in
if (strlen($_SESSION['id']==0)) {
  // If not logged in, redirect to logout
  header('location:logout.php');
} else {
// Code for Updation 
// For password change   
if(isset($_POST['update']))
{
    // Get user input
    $oldpassword = $_POST['currentpassword']; 
    $newpassword = $_POST['newpassword'];
    $userid = $_SESSION['id'];
    // Fetch the current hashed password from the database
    $sql = mysqli_query($con, "SELECT password FROM users where id='$userid'");
    $num = mysqli_fetch_array($sql);
    if($num && password_verify($oldpassword, $num['password']))
    {
        // Hash the new password
        $hashed_newpassword = password_hash($newpassword, PASSWORD_DEFAULT);
        // Update the password in the database
        $ret = mysqli_query($con, "update users set password='$hashed_newpassword' where id='$userid'");
        echo "<script>alert('Password Changed Successfully !!');</script>";
        echo "<script type='text/javascript'> document.location = 'change-password.php'; </script>";
    }
    else
    {
        // Old password does not match
        echo "<script>alert('Old Password not match !!');</script>";
        echo "<script type='text/javascript'> document.location = 'change-password.php'; </script>";
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
        <title>Change password | Registration and Login System</title>
        <!-- Link to the local Tailwind CSS file -->
        <link href="css/tailwind.min.css" rel="stylesheet" />
        <!-- Font Awesome for icons -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script language="javascript" type="text/javascript">
        function valid()
        {
            // Check if new password and confirm password match
            if(document.changepassword.newpassword.value!= document.changepassword.confirmpassword.value)
            {
                alert("Password and Confirm Password Field do not match  !!");
                document.changepassword.confirmpassword.focus();
                return false;
            }
            return true;
        }
        </script>
    </head>
    <body class="bg-gray-100 min-h-screen">
        <div class="flex flex-col min-h-screen justify-center items-center">
            <div class="w-full max-w-2xl mx-auto">
                <div class="bg-white shadow-lg rounded-lg mt-10">
                    <div class="px-8 pt-8 pb-4 border-b">
                        <h2 class="text-center text-2xl font-bold">Change Password</h2>
                    </div>
                    <div class="px-8 py-6">
                        <!-- Password change form -->
                        <form method="post" name="changepassword" onSubmit="return valid();">
                            <div class="mb-4">
                                <label for="currentpassword" class="block text-gray-700 mb-2">Current Password</label>
                                <input class="form-input w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" id="currentpassword" name="currentpassword" type="password" value="" required />
                            </div>
                            <div class="mb-4">
                                <label for="newpassword" class="block text-gray-700 mb-2">New Password</label>
                                <input class="form-input w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" id="newpassword" name="newpassword" type="password" value=""  required />
                            </div>
                            <div class="mb-4">
                                <label for="confirmpassword" class="block text-gray-700 mb-2">Confirm Password</label>
                                <input class="form-input w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" id="confirmpassword" name="confirmpassword" type="password" required />
                            </div>
                            <div class="mt-4 mb-0">
                                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition w-full" name="update">Change</button>
                            </div>
                        </form>
                    </div>
                    <div class="px-8 pb-6 text-center border-t">
                        <div class="mb-2"><a class="text-sm text-gray-600 hover:underline" href="profile.php">Back to Profile</a></div>
                        <div class="mb-2"><a class="text-sm text-gray-600 hover:underline" href="welcome.php">Back to Welcome</a></div>
                        <div><a class="text-sm text-gray-600 hover:underline" href="logout.php">Logout</a></div>
                    </div>
                </div>
            </div>
            <!-- Include the footer -->
            <div class="w-full mt-8">
                <?php include('includes/footer.php');?>
            </div>
        </div>
        <!-- Custom scripts (if any) -->
        <script src="js/scripts.js"></script>
    </body>
</html>
<?php } ?>
