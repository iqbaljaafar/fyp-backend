<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="users"; // Database name 
$tbl_name="users"; // Table name 

// Create connection
$mysqli = mysqli_connect($host,$username,$password,$tbl_name);
//$conn = new mysqli($host, $username, $password, $db_name, $tbl_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
// sql to delete a record
$sql = "DELETE FROM users WHERE password=112233.";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>