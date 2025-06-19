<?php
// Start a new session or resume the existing session
session_start();
// Destroy all session data
session_unset();
session_destroy();
// Remove the 'Remember Me' cookie if set
if (isset($_COOKIE['rememberme'])) {
    setcookie('rememberme', '', time() - 3600, "/"); // Expire the cookie
}
// Redirect the user to the login page
header('location:login.php');
exit();
?>
<script language="javascript">
document.location="index.php";
</script>
