<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Home | Registration and Login System </title>
        <!-- Link to the local Tailwind CSS file -->
        <link href="css/tailwind.min.css" rel="stylesheet" />
        <!-- Font Awesome for icons -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-gray-100 min-h-screen">
        <!-- Top navigation bar -->
        <nav class="w-full bg-gray-900 text-white py-4 px-6 flex items-center">
            <!-- Navbar Brand-->
            <a class="text-xl font-bold" href="index.php">Registration and Login System</a>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container mx-auto px-4 py-8">
                        <!-- Main heading -->
                        <h1 class="mt-4 text-2xl font-bold text-center mb-6">User Registration & Login and User Management System With admin panel</h1>
                        <!-- Breadcrumb navigation -->
                        <ol class="flex justify-center space-x-2 mb-8 text-gray-600">
                            <li><a href="index.php" class="hover:underline">Home</a></li>
                        </ol>
                        <!-- Row with three main cards -->
                        <div class="flex flex-col md:flex-row gap-6 justify-center">
                            <!-- Card for new users to sign up -->
                            <div class="flex-1 max-w-sm">
                                <div class="bg-blue-600 text-white rounded-lg shadow-lg mb-4">
                                    <div class="p-6 font-semibold text-lg">Not Registered Yet</div>
                                    <div class="flex items-center justify-between px-6 pb-4">
                                        <a class="text-white underline hover:text-blue-200" href="signup.php">Signup Here</a>
                                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card for already registered users to login -->
                            <div class="flex-1 max-w-sm">
                                <div class="bg-yellow-500 text-white rounded-lg shadow-lg mb-4">
                                    <div class="p-6 font-semibold text-lg">Already Registered</div>
                                    <div class="flex items-center justify-between px-6 pb-4">
                                        <a class="text-white underline hover:text-yellow-200" href="login.php">Login Here</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card for admin panel login -->
                            <div class="flex-1 max-w-sm">
                                <div class="bg-red-600 text-white rounded-lg shadow-lg mb-4">
                                    <div class="p-6 font-semibold text-lg">Admin Panel</div>
                                    <div class="flex items-center justify-between px-6 pb-4">
                                        <a class="text-white underline hover:text-red-200" href="admin">Login Here</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Spacer to push footer to bottom -->
                        <div class="h-32"></div>
                    </div>
                </main>
                <!-- Include the footer -->
                <?php include_once('includes/footer.php');?>
            </div>
        </div>
        <!-- Custom scripts (if any) -->
        <script src="js/scripts.js"></script>
    </body>
</html>
