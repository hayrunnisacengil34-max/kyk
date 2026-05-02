<?php

// File: admin_dashboard.php

// Start session
session_start();

// Include database configuration
require_once 'db_config.php';

// Function to display students
function display_students() {
    global $conn;
    $sql = "SELECT * FROM students";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>ID</th><th>Name</th><th>Action</th></tr>';
        while($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td><a href="edit_student.php?id=' . $row['id'] . '">Edit</a> | <a href="delete_student.php?id=' . $row['id'] . '">Delete</a></td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "No students found.";
    }
}

// Function to log entry/exit
function display_logs() {
    global $conn;
    $sql = "SELECT * FROM logs";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>Time</th><th>Action</th><th>User</th></tr>';
        while($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['timestamp'] . '</td>';
            echo '<td>' . $row['action'] . '</td>';
            echo '<td>' . $row['user'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "No logs found.";
    }
}

// Display the admin panel
?><!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <h2>Student List</h2>
    <a href="add_student.php">Add Student</a>
    <?php display_students(); ?>
    <h2>Entry/Exit Logs</h2>
    <?php display_logs(); ?>
</body>
</html>