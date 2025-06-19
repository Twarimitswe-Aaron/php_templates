<?php
include 'database.php'; // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username']; // Get username from form
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash password for security

    // SQL query to insert user data
    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $conn->prepare($sql); // Prepare the SQL query

    // Bind parameters to prevent SQL injection
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        echo "Registration successful!"; // Success message
    } else {
        echo "Registration failed."; // Error message
    }
}
?>
<form method="POST" action="">
    <input type="text" name="username" placeholder="Username" required />
    <input type="password" name="password" placeholder="Password" required />
    <button type="submit">Register</button>
</form>