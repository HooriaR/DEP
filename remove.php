<?php
session_start();

$servername= "localhost";
$username= "root";
$password= "";
$dbname= "kids";


$conn= new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$product_name= $conn->real_escape_string($_POST['product_name']);
$sql="DELETE FROM items WHERE name='$product_name'";

if ($conn->query($sql)=== TRUE) {
    echo "<script>
    alert('Item removed');
    window.location.href=' cart.php';
</script>";

} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
