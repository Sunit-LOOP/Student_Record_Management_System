<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the course from the database
    $stmt = $conn->prepare("DELETE FROM `courses` WHERE `id` = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();

    // Refresh the page to reflect the changes
    header("Location:editcourse.php" . $_SERVER['PHP_SELF']); // This line refreshes the page after deletion
    exit(); // Make sure no further code is executed after the redirect
}
?>
