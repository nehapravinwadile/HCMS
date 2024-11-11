<?php
include("db_connection.php"); // Include the database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and store the student ID and dropdown value
    $student_id = $_POST["student_id"];
    $selected_option = $_POST["dropdown"];

    if ($selected_option === "Completed") {
        $currentDate = date("Y-m-d");
        $sql = "UPDATE complaints SET Action = ?, doc = ? WHERE sid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $selected_option, $currentDate, $student_id);
    } else {
        // Prepare and execute an SQL UPDATE statement
        $sql = "UPDATE complaints SET Action = ? WHERE sid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $selected_option, $student_id);
    }

    if ($stmt->execute()) {
        echo "Data updated in the database successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    // Handle invalid requests
    echo "Invalid request.";
}

$conn->close();
?>
