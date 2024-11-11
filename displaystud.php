<!DOCTYPE html>
<html>
  <head>

    <title>Students</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f1f1f1;
      }
      
      
      h1 {
            text-align: center;
            color: #333;
        }
        h2{
            text-align: center;
            color: #2EC2C0;
            padding: 10px;
        }
      
     
      table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px;
      }
      th,
      td {
        text-align: left;
        padding: 8px;
      }
      th {
        background-color: #2EC2C0;
        color: white;
      }
      tr:nth-child(even) {
        background-color: #f2f2f2;
      }
      
    </style>
  </head>
  <!DOCTYPE html>
<body>
	<table>
		<thead>
			<tr>
				<th><h1>Student Details..</h1>
                </th>
				
			</tr>
		</thead>
		<tbody>
			<?php
				$servername = 'localhost';
                $username = 'root';
                $password = '';
                $dbname = 'mydb';
                $conn = new mysqli($servername, $username, $password, $dbname);
                
				// Check if connection was successful
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                  }

				// SQL query to select all records from the table
				$sql = "SELECT * FROM users";

				// Execute the query and get the result set
				$result = mysqli_query($conn, $sql);
                echo "<table>";
                echo "<h2><tr><th>Student Name</th><th>Room Number</th><th> Email</th><th>Phone No</th><th>Gender</th></tr></h2>";
				// Loop through the result set and display the data in the table
				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo "<td>" . $row['name'] . "</td>";
						echo "<td>" . $row['room_no'] . "</td>";
						echo "<td>" . $row['email'] . "</td>";
						echo "<td>" . $row['phone_number'] . "</td>";
                        echo "<td>" . $row['gender'] . "</td>";

						echo "</tr>";
					}
				} else {
					echo "No records found.";
				}

				// Close the database connection
				mysqli_close($conn);
			?>
		</tbody>
	</table>
</body>
</html>
