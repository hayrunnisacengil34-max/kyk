<?php
session_start();

// Check if user is an admin
if(!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    die('Access denied.');
}

// Display student list
$students = [
    ['id' => 1, 'name' => 'John Doe'],
    ['id' => 2, 'name' => 'Jane Smith'],
];

function displayStudents($students) {
    echo '<h2>Student List</h2>';
    echo '<ul>';
    foreach ($students as $student) {
        echo '<li>' . htmlspecialchars($student['name']) . ' (ID: ' . $student['id'] . ')</li>';
    }
    echo '</ul>';
}

displayStudents($students);

// Management buttons
echo '<h3>Student Management</h3>';
echo '<button onclick="location.href='"add_student.php'">Add Student</button>';
echo '<button onclick="location.href='"edit_student.php'">Edit Student</button>';
echo '<button onclick="location.href='"delete_student.php'">Delete Student</button>';

echo '<h3>Entry/Exit Management</h3>';

echo '<button onclick="location.href='"entry_exit.php'">Entry/Exit</button>';
?>
