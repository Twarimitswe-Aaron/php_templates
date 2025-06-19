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
// Fetch user details from the database
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
        <title>User Profile | Registration and Login System</title>
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
                        <h3 class="text-center text-lg font-medium text-gray-700">User Profile</h3>
                    </div>
                    <div class="px-8 py-6">
                        <!-- Display user details in a table -->
                        <table class="min-w-full text-left text-gray-700 border rounded">
                            <tr class="border-b"><th class="py-2 px-4 font-semibold">First Name</th><td class="py-2 px-4"><?php echo htmlspecialchars($user['fname']); ?></td></tr>
                            <tr class="border-b"><th class="py-2 px-4 font-semibold">Last Name</th><td class="py-2 px-4"><?php echo htmlspecialchars($user['lname']); ?></td></tr>
                            <tr class="border-b"><th class="py-2 px-4 font-semibold">Email</th><td class="py-2 px-4"><?php echo htmlspecialchars($user['email']); ?></td></tr>
                            <tr class="border-b"><th class="py-2 px-4 font-semibold">Contact Number</th><td class="py-2 px-4"><?php echo htmlspecialchars($user['contactno']); ?></td></tr>
                            <tr><th class="py-2 px-4 font-semibold">Account Status</th><td class="py-2 px-4"><?php echo $user['is_verified'] ? 'Verified' : 'Not Verified'; ?></td></tr>
                        </table>
                    </div>
                    <div class="px-8 pb-6 text-center border-t">
                        <!-- Navigation links -->
                        <div class="mb-2"><a class="text-sm text-blue-600 hover:underline" href="edit-profile.php">Edit Profile</a></div>
                        <div class="mb-2"><a class="text-sm text-blue-600 hover:underline" href="change-password.php">Change Password</a></div>
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
