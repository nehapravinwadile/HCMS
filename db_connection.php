<?php
$host = "localhost"; // Replace with your actual database host
$username = "root"; // Replace with your actual database username
$password = ""; // Replace with your actual database password
$database = "mydb"; // Replace with your actual database name

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
