<?php
session_start(); // Start the session

if (!isset($_SESSION['username'])) {
    // Redirect to login if the user is not logged in
    header("Location: login.php");
    exit;
}

echo "Welcome, " . htmlspecialchars($_SESSION['username']); // Display a welcome message
?>
<a href="logout.php">Logout</a>