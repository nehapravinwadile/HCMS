<?php
// Connect to the database
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'mydb';
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Update the complaint with the given id

session_start();
// $cid = $_SESSION['cid'];
// echo $cid;
$sql="UPDATE complaints SET Action = 'Completed' WHERE cid = 40 AND cid <= 100";

echo " status updated successfully";
$result = mysqli_query($conn, $sql);

// Close the database connection

$conn->close();
?>
