<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>View Task</title> 
</head> 
<body> 
    <div class="container">
        <div class="glass-container">
            <h2>View Tasks</h2> 
            <table> 
                <tr> 
                    <th>id</th> 
                    <th>title</th> 
                    <th>description</th> 
                    <th>priority</th> 
                    <th>due_date</th> 
                    <th>action</th>
                </tr> 
                <?php 
                $conn = new mysqli('localhost', 'root', '', 'task_management');
        
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
        
                $sql = "SELECT * FROM tasks";
                $result = $conn->query($sql);
        
                while ($row = $result->fetch_assoc()) { 
                    echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['title']}</td>
                    <td>{$row['description']}</td>
                    <td>{$row['priority']}</td>
                    <td>{$row['due_date']}</td>
                    <td>
                        <form method='POST' action='delete_task.php'>
                            <button class='delete-button' type='submit' name='delete_id' value='{$row['id']}' aria-label='Delete task with id {$row['id']}'>Delete</button>
                    </td>
                    </tr>";
                }
                ?> 
            </table> 
            <h3><li><a href="edit_task.php">Update Task</a></li></h3>
            <h3><li><a href="create_task.php">Add Another Task</a></li></h3>
            <h3><li><a href="index.php">Home</a></li></h3>
        </div>
    </div>
</body> 
</html>