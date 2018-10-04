<?php
session_start();

$user = 'root';
$password = 'root';
$db = 'bookstore';
$host = 'localhost';
$port = 3306;

$conn = mysqli_connect(
   $host, 
   $user, 
   $password, 
   $db,
   $port
);


if (!$conn){

  echo "Connection failed!";
  exit;

}

$sql1 = "TRUNCATE bookstore.shoppingcart";

if ($conn->query($sql1) === TRUE) {
   echo "logging out";
	} 
else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
	}

session_unset();
session_destroy();
 echo"<script> window.location.href = 'login.html' ; </script>";
 exit();
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>BookStore-logout.php</title>
</head>
<body>

	<footer>
		<p>PHP &copy; 2018</p>
	</footer>

</body>
</html>

