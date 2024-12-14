<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
    <link rel="stylesheet", href="task.css">
</head>
<body>
<div class="task-container">
        <h2>Create a New Task</h2>
        <form method="POST" action="createTask.php">
            <input type="text" name="task_title" placeholder="Task Title" required>
            <input type="date" name="task_date" required>
            <input type="time" name="task_time" required>
            <textarea name="task_description" placeholder="Task Description" rows="4"></textarea>
            <button class="add-task" type="submit">Add Task</button>
        </form>
        
        <?php
        // Database connection
        $conn = new mysqli("localhost", "root", "", "calendar_db");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Handle form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = $conn->real_escape_string($_POST['task_title']);
            $date = $conn->real_escape_string($_POST['task_date']);
            $time = $conn->real_escape_string($_POST['task_time']);
            $description = $conn->real_escape_string($_POST['task_description']);
            $datetime = $date . ' ' . $time;

            $sql = "INSERT INTO tasks (title, datetime, description) VALUES ('$title', '$datetime', '$description')";
            if ($conn->query($sql) === TRUE) {
                echo "<p>Task created successfully!</p>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        $conn->close();
        ?>

        <br><br>
        <button class="back-to"><a href="calendar.php" style="text-decoration: none; color: inherit;">Back to Calendar</a></button>
    </div>
</body>
</html>
