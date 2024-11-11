<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "mydb";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// New column details
$newColumnName = "doc";
$newColumnType = "Date";
$afterColumnName = "Date";

// SQL query to add a new column after a specified column
$sql = "ALTER TABLE complaints ADD $newColumnName $newColumnType AFTER $afterColumnName";

if ($conn->query($sql) === TRUE) {
    echo "New column added successfully.";
} else {
    echo "Error: " . $conn->error;
}

// Close the connection
$conn->close();
?>
