<?php
// Start a new session or resume the existing session
session_start();
// Check if the user is logged in
if(!isset($_SESSION['id'])){
    // If not logged in, redirect to login page
    header('location:login.php');
    exit();
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
        <title>Welcome | Registration and Login System</title>
        <!-- Link to the local Tailwind CSS file -->
        <link href="css/tailwind.min.css" rel="stylesheet" />
        <!-- Font Awesome for icons -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-gray-100 min-h-screen">
        <div class="flex flex-col min-h-screen justify-center items-center">
            <div class="w-full max-w-md mx-auto">
                <div class="bg-white shadow-lg rounded-lg mt-10">
                    <div class="px-8 pt-8 pb-4 border-b">
                        <h2 class="text-center text-2xl font-bold">Registration and Login System</h2>
                        <hr class="my-2" />
                        <h3 class="text-center text-lg font-medium text-gray-700">Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?>!</h3>
                    </div>
                    <div class="px-8 py-6">
                        <!-- Welcome message -->
                        <p class="text-center text-gray-700">You have successfully logged in.</p>
                    </div>
                    <div class="px-8 pb-6 text-center border-t">
                        <!-- Navigation links -->
                        <div class="mb-2"><a class="text-sm text-blue-600 hover:underline" href="profile.php">View Profile</a></div>
                        <div class="mb-2"><a class="text-sm text-blue-600 hover:underline" href="logout.php">Logout</a></div>
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
