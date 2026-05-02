<?php
// Database connection settings
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch entry/exit logs
$sql = "SELECT student_id, entry_time, exit_time FROM logs ORDER BY entry_time DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data for each row
    echo "<table><tr><th>Student ID</th><th>Entry Time</th><th>Exit Time</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["student_id"]. "</td><td>" . $row["entry_time"]. "</td><td>" . $row["exit_time"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>