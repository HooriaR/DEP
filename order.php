<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername= "localhost";
    $username= "root";
    $password= "";
    $dbname= "kids";


    $conn= new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name= $conn->real_escape_string($_POST["Name"]);
    $contact= $conn->real_escape_string($_POST["Contact"]);
    $address= $conn->real_escape_string($_POST["Address"]);


    $sql= "INSERT INTO customer (Name, Contact, Address) VALUES ('$name', '$contact', '$address')";

    if ($conn->query($sql)===TRUE) {
      
        $sql= "DELETE FROM items";
        $conn->query($sql);

        header("Location: thankyou.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
