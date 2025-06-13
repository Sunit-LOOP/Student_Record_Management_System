<?php
$servername = "localhost"; 
$username = "root";       
$password = "";             
$dbname = "project";        

// Create connection using MySQLi (object-oriented style)
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    // Display a detailed error message if the connection fails
    die("Connection failed: " . $conn->connect_error);
}
?>
