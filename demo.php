<!DOCTYPE html>
<html>
<head>
    <title>Student Form</title>
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
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin: 20px 0;
        }

        form {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Take Action on the complaints</h1>
    <form action="process_form.php" method="post">
        <label for="student_id">Student ID:</label>
        <input type="text" name="student_id" id="student_id" required>
        <br>
        <label for="dropdown">Select an option:</label>
        <select name="dropdown" id="dropdown">
            <option value="Incomplete">Incomplete</option>
            <option value="Informed to worker">Informed to worker</option>
            <option value="Completed">Completed</option>
        </select>
        <br>
        <input type="submit" value="Submit">
    </form>

    <table>
		<thead>
			<tr>
				<th><h1>Workers Details..</h1>
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
				$sql = "SELECT * FROM workers";

				// Execute the query and get the result set
				$result = mysqli_query($conn, $sql);
                echo "<table>";
                echo "<h2><tr><th>Work Name</th><th> Name</th><th>Moile no</th></tr></h2>";
				// Loop through the result set and display the data in the table
				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            // echo "<td>" . $row['Id'] . "</td>";
            echo "<td>" . $row['Workname'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['mobile no'] . "</td>";
          }  
        }
      
				// Close the database connection
				mysqli_close($conn);
			?>
		</tbody>
	</table>
  </body>
</html>