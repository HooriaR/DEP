<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blog";

    $conn = new mysqli($servername, $username, $password, $dbname);
    
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$title = $_POST['title'];
$content = $_POST['content'];
$sql = "INSERT INTO posts (Title, Text) VALUES ('$title', '$content')";

if ($conn->query($sql) === TRUE) {
    $conn->close();
    
    header("Location: post.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
