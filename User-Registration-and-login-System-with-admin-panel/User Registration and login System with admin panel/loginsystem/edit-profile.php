<?php
// Start a new session or resume the existing session
session_start();
// Include the database configuration file
include_once('includes/config.php');
// Check if the user is logged in
if(!isset($_SESSION['id'])){
    // If not logged in, redirect to login page
    header('location:login.php');
    exit();
}
// Get the user's ID from the session
$userid = $_SESSION['id'];
// Handle profile update form submission
if(isset($_POST['update'])){
    // Get updated user input
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['contact'];
    // Update user details in the database
    $query = mysqli_query($con, "UPDATE users SET fname='$fname', lname='$lname', contactno='$contact' WHERE id='$userid'");
    if($query){
        echo "<script>alert('Profile updated successfully!');</script>";
        echo "<script type='text/javascript'> document.location = 'profile.php'; </script>";
    }
}
// Fetch current user details
$query = mysqli_query($con, "SELECT * FROM users WHERE id='$userid'");
$user = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Edit Profile | Registration and Login System</title>
        <!-- Link to the local Tailwind CSS file -->
        <link href="css/tailwind.min.css" rel="stylesheet" />
        <!-- Font Awesome for icons -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-gray-100 min-h-screen">
        <div class="flex flex-col min-h-screen justify-center items-center">
            <div class="w-full max-w-2xl mx-auto">
                <div class="bg-white shadow-lg rounded-lg mt-10">
                    <div class="px-8 pt-8 pb-4 border-b">
                        <h2 class="text-center text-2xl font-bold">Registration and Login System</h2>
                        <hr class="my-2" />
                        <h3 class="text-center text-lg font-medium text-gray-700">Edit Profile</h3>
                    </div>
                    <div class="px-8 py-6">
                        <!-- Edit profile form -->
                        <form method="post">
                            <div class="mb-4">
                                <label for="fname" class="block text-gray-700 mb-2">First Name</label>
                                <input class="form-input w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" id="fname" name="fname" type="text" value="<?php echo htmlspecialchars($user['fname']); ?>" required />
                            </div>
                            <div class="mb-4">
                                <label for="lname" class="block text-gray-700 mb-2">Last Name</label>
                                <input class="form-input w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" id="lname" name="lname" type="text" value="<?php echo htmlspecialchars($user['lname']); ?>" required />
                            </div>
                            <div class="mb-4">
                                <label for="contact" class="block text-gray-700 mb-2">Contact Number</label>
                                <input class="form-input w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" id="contact" name="contact" type="text" value="<?php echo htmlspecialchars($user['contactno']); ?>" required pattern="[0-9]{10}" title="10 numeric characters only" maxlength="10" />
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-gray-700 mb-2">Email address (cannot be changed)</label>
                                <input class="form-input w-full px-4 py-2 border rounded bg-gray-100 cursor-not-allowed" id="email" name="email" type="email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly />
                            </div>
                            <div class="mt-4 mb-0">
                                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition w-full" name="update">Update Profile</button>
                            </div>
                        </form>
                    </div>
                    <div class="px-8 pb-6 text-center border-t">
                        <!-- Navigation links -->
                        <div class="mb-2"><a class="text-sm text-blue-600 hover:underline" href="profile.php">Back to Profile</a></div>
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
