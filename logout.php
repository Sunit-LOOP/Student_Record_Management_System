<?php
// Start the session
session_start();

// Destroy the session
session_destroy();

// If there's a cookie for the username, delete it
if (isset($_COOKIE['username'])) {
    setcookie('username', '', time() - 3600, '/'); // Set a past expiration time to delete the cookie
}

// Redirect to the login page
header('Location: loginpage.php');
exit();
?>
