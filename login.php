</!DOCTYPE html>
<html lang="en">
<head>
  <title>BookStore-login.php</title>
  <meta name="viewpoint" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>

<?php

session_start();
$name = $email = $password = "";


if (empty($_POST["name"]) || empty($_POST["password"]) ) {
    header( "Location:login.html" ) ;
    exit();
  } 


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

$username=$_POST['name'];
$password=$_POST['password']; 
$sql="SELECT * FROM user WHERE UserName='$username' AND Password='$password'"; 
$query=mysqli_query($conn,$sql);
$count=mysqli_num_rows($query);
// If result matched $username and $password, table row must be 1 row
if($count==1){
  $_SESSION["name"] = $_POST["name"];
  $_SESSION["password"] = $_POST["password"];
   header( "Location:books.php" ) ;
    exit();

}
else
{
   header( "Location:login.html" ) ;
    exit();
}

mysqli_close();
?>





 <footer>
    <p>PHP &copy; 2018</p>
  </footer>



</body>
</html>