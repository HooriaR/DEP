<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "blog";

 $conn = new mysqli($servername, $username, $password, $dbname);
 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];

$sql = "DELETE FROM posts WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: post.php?message=Post%20deleted%20successfully");
    exit();
} else {
    echo "Error : " . $conn->error;
}

$conn->close();
exit();
?>
