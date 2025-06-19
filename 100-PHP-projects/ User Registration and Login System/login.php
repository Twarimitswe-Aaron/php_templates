<?php
include 'database.php'; // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username']; // Get username from form
    $password = $_POST['password']; // Get password from form

    // SQL query to fetch the user
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $conn->prepare($sql); // Prepare the SQL query
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch user details

    if ($user && password_verify($password, $user['password'])) {
        // Verify the password
        session_start();
        $_SESSION['username'] = $user['username']; // Start a session for the user
        header("Location: dashboard.php"); // Redirect to dashboard
        exit;
    } else {
        echo "Invalid username or password."; // Error message
    }
}
?>
<form method="POST" action="">
    <input type="text" name="username" placeholder="Username" required />
    <input type="password" name="password" placeholder="Password" required />
    <button type="submit">Login</button>
</form>
