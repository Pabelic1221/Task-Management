<?php
if (!empty($_POST['delete_id'])) {

    $delete_id = $_POST['delete_id'];
    $conn = new mysqli('localhost', 'root', '', 'task_management');

    if ($conn->connect_error) {die('Connection failed: ' . $conn->connect_error);}

    $deletequery = "DELETE FROM tasks WHERE id = ?";
    $del = $conn->prepare($deletequery); 
    $del->bind_param("i", $delete_id);
    $del->execute();

    if ($del->affected_rows === 1) {
        echo '<script>window.location = "view_task.php"; </script>';
    } else {
        echo '<script>window.location = "view_task.php"; </script>';
    }
    $del->close();
    $conn->close();
}
?>