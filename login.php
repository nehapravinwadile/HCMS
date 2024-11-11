<?php
// Database configuration
$hostname = 'localhost';  // Hostname
$username = 'root';       // Database username
$password = '';           // Database password
$database = 'mydb';       // Database name

// Create a connection to the database
$connection = new mysqli($hostname, $username, $password, $database);

// Check the connection
if ($connection->connect_error) {
    die('Connection failed: ' . $connection->connect_error);
}

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform a database query to check if the entered username and password match
    $query = "SELECT * FROM users WHERE name = ? AND password = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    // If a user with matching username and password is found, redirect to home page
    if ($user) {
        

        
      $query = "SELECT sid FROM users WHERE name = ?";
      $stmt = $connection->prepare($query);
      $stmt->bind_param("s", $username);
      $stmt->execute();
      $result = $stmt->get_result();
      $sid = $result->fetch_assoc()['sid'];
      echo $sid;
      session_start();
      $_SESSION['sid'] = $sid;
      $stmt->close();
      


        header("Location: studentcomplaints.php");

        exit();
    } else {
        // Display an error message if the username and password do not match
        $error = "Invalid username or password";
        echo "<br><br><br><br><br><br><h2><center>User not found</h2></center>";
        header("refresh:1;url=login.html");
    }
}

// Close the database connection
$connection->close();
?>