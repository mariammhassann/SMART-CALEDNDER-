<?php
include 'config.php';

// Database connection details
$host = 'localhost';
$username = 'root';
$password = ''; // Replace with your MySQL password if needed
$database = 'shop_db';
$conn = mysqli_connect('localhost','root','','shop_db') or die('connection failed');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve and sanitize form data
        $taskTitle = $conn->real_escape_string($_POST['task_title']);
        $taskDate = $conn->real_escape_string($_POST['task_date']);
        $taskTime = $conn->real_escape_string($_POST['task_time']);
        $taskDescription = $conn->real_escape_string($_POST['task_description']);

        // Insert the data into the tasks table
        $sql = "INSERT INTO tasks (task_title, task_date, task_time, task_description) 
                VALUES ('$taskTitle', '$taskDate', '$taskTime', '$taskDescription')";

        if ($conn->query($sql) === TRUE) {
            echo "New task created successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close the connection
    $conn->close();
?>

     <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
    <link rel="stylesheet", href="css/task.css">
</head>
<body>
    <div class="task-container">
        <h2>Create a New Task</h2>
        <form method="POST" action="createTask.php">
            <input type="varchar" name="task_title" placeholder="Task Title" required>
            <input type="date" name="task_date" required>
            <input type="time" name="task_time" required>
            <textarea name="task_description" placeholder="Task Description" rows="4"></textarea>
            <button class=add-task type="submit">Add Task</button>
        </form>
        
        <br>
        <br>
        
      
    </div>
</body>
</html>