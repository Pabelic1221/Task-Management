<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "task_management";

$conn = new mysqli('localhost', 'root', '', 'task_management'); 
  
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
} 
  
$sql = "SELECT * FROM task"; 
$result = $conn->query($sql); 
?> 
