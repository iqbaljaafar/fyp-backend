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
$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
//$result=mysqli_query($sql);
$result = $mysqli->prepare($sql);
$result->execute();
$result->store_result();
$count = $result->num_rows;

// Mysql_num_row is counting table row
//$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
//session_register($myusername);
//session_register($mypassword); 
$_SESSION["username"] = $myusername;
header("location:login_success.php");
//ni cara redirect,kalau berjaya dia redirect ke login_success.php

}
else {
echo "Wrong Username or Password";
}
?>