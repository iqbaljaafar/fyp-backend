<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="test"; // Database name 
$tbl_name="users"; // Table name 

// Connect to server and select databse.
//mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
//mysql_select_db("$db_name")or die("cannot select DB");

$mysqli = mysqli_connect($host,$username,$password,$tbl_name);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  
// username and password sent from form 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
//$myusername = mysqli_real_escape_string($myusername);
$myusername = $mysqli->real_escape_string($myusername);
$mypassword = $mysqli->real_escape_string($mypassword);
//$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$sql = "INSERT INTO $tbl_name (username, password) VALUES ('$myusername', '$mypassword.')";


//dekat sini, aku tukar sql statement, dr SELECT kpd INSERT.
//Ko boleh refer sql statement utk select/insert/update/drop
//So aku akan insert ke dalam $tbl_name="users"; // Table name 
//parameter username and password, nama parameter tu kena sama dgn dlm database
//Pastu Values kena ikut susunan, kalau letak username, password, kat dalam values tu kena susun username, password
//('$myusername', '$mypassword.')
//
//$myusername=$_POST['myusername']; 
//$mypassword=$_POST['mypassword']; 
//$_POST['myusername']; <-- yg ni parameter yg ko dpt dr form td, pakai method $_POST untuk ambil parameter tu
//make sure nama parameter tu sama mcm dalam form.. name="myusername"




//$result=mysqli_query($sql);
if ($mysqli->query($sql) === TRUE) {
    echo "<script>alert('New record created successfully');</script>";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

//selection dekat atas ni akan run sql statement tu, dia akan query, kalau betul dia akan echo berjaya, kalau salah dia akan
//keluarkan error
//OK?.. bru nmpk skit..
//Yg signupsuccess.php tu boleh delete, aku tak pakai, klau ikutkan aku nak redirect ke class tu

// Mysql_num_row is counting table row
//$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

?>