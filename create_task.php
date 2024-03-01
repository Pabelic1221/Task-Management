<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 

    $title = $_POST['title']; 
    $description = $_POST['description']; 
    $priority = $_POST['priority']; 
    $due_date = $_POST['due_date']; 
 
    $conn = new mysqli('localhost', 'root', '', 'task_management'); 
  
    if ($conn->connect_error) { 
        die("Connection failed: " . $conn->connect_error); 
    } 
  
    $sql = "INSERT INTO `tasks`(`title`, `description`, `priority`, `due_date`)  
            VALUES ('$title', '$description', '$priority', '$due_date')"; 
            
    if ($conn->query($sql) === TRUE) { 
        echo "Task added successfully!"; 
    } else { 
        echo "Error: " . $sql . "<br>" . $conn->error; 
    } 
  
    $conn->close(); 
} 
?> 
  
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content= 
     "width=device-width, initial-scale=1.0"> 
    <title>Add Task</title> 
    <link rel="stylesheet" href="styles.css">
</head> 
<body> 
    <div class="container">
        <div class="glass-container">
            <h2>Add task</h2> 
            <form method="post" action=""> 

                <label for="title">title:</label>
                <input type="text" name="title" required><br>
  
                <label for="description">description:</label> <br>
                <textarea name="description" rows="4" cols="50" required></textarea><br>
  
                <label for="priority">priority:</label> 
                <select name="priority"> 
                    <option value="Low">Low</option> 
                    <option value="Medium">Medium</option> 
                    <option value="High">High</option> 
                </select><br>

                <label for="due_date">Due Date:</label>
                <input type="date" id="due_date" name="due_date" required><br><br>
  
                <input type="submit" value="Add Task"> 
            </form> 
            <h3><a href="view_task.php" type="view-task-btn" >View All Task</a></h3>
        </div>
    </div>
</body> 
</html>