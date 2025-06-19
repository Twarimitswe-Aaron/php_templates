<?php
// Establish a database connection
$host = 'localhost'; // Database server
$dbname = 'user_system'; // Database name
$username = 'root'; // Database username
$password = ''; // Database password

// Create a connection using PDO (PHP Data Objects)
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage()); // Error handling if connection fails
}
?>