<html lang="en">
<head>
  <title>BookStore-cart.php</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<?
session_start();
$search = $_GET["bookid"];
$name= $_SESSION["name"];

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


// sql to create table
$sql = "CREATE TABLE if NOT EXISTS bookstore.shoppingcart (
 
UserName VARCHAR(30) ,
BookID INT ,
PRIMARY KEY (UserName,BookID)
)";




$sql1 = "INSERT INTO bookstore.shoppingcart (UserName,BookID) VALUES ('$name','$search')";

if ($conn->query($sql1) === TRUE) {
   echo "New item added to cart successfully";
	} 
else {
    echo "Item already in cart";
	}

$sql2 = "SELECT * FROM Book,shoppingcart WHERE Book.BookID=shoppingcart.BookID ";

$result = mysqli_query($conn, $sql2);

echo "<table class='table table-striped'><tr><td>Book Title</td><td>List Price</td></tr>";


while($row = mysqli_fetch_array($result)){

  echo "<tr><td>". $row["BookTitle"] ."</td><td>". $row["ListPrice"]."</td></tr>";
  $sum += $row['ListPrice'];
}

echo "</table>";
echo "<tr><td>"Total"</td><td>"$sum"</td></tr>";
echo "<h1><b>Cart Total</b>: $sum</h1>";



mysqli_close($conn);
?>

<a href="books.php">Continue Shopping</a>
</br>
<a href="logout.php">Logout</a>


</body>

 <footer>
    <p>PHP &copy; 2018</p>
  </footer>

</html>