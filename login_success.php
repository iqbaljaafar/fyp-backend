// Check if session is not registered, redirect back to main page. 
// Put this code in first line of web page. 
<?php
session_start();
//if(!session_is_registered(username)){header("location:main_login.php");}
?>

<html>
<body>
<h1>Login Successful</h1>
</body>
</html>