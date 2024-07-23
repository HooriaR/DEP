<?php
session_start();

$servername= "localhost";
$username= "root";
$password= "";
$db_name= "kids";
$conn = new mysqli($servername, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['Add_to_Cart'])) {
    $product_name= $_POST['Name'];
    $product_price= $_POST['PKR'];
    $product_image= $_POST['Image'];

    $product_name= $conn->real_escape_string($product_name);
    $product_price= $conn->real_escape_string($product_price);
    $product_image= $conn->real_escape_string($product_image);

    $sql= "SELECT * FROM items WHERE name = '$product_name' AND price = '$product_price'";
    $result= $conn->query($sql);

    if($result->num_rows>0) {
    
        $sql= "UPDATE items SET quantity= quantity+ 1 WHERE name= '$product_name' AND price= '$product_price'";
        $conn->query($sql);
    } 
    else {
    
       $sql= "INSERT INTO items (name, price, quantity, image) VALUES ('$product_name', '$product_price', 1, '$product_image')";
      $conn->query($sql);
    }

    $conn->close();
    echo "<script>
        alert('Item Added to Cart');
        window.location.href='shop.php';
    </script>";
}
?>
