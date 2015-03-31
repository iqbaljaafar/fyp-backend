<?php
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="users"; // Database name 
$tbl_name="users"; // Table name 


// Create connection
$conn = new mysqli($host,$username,$password,$db_name,$tbl_name);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql = "UPDATE users SET username='ebal' WHERE username=Ali";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>