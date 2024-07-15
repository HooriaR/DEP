<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "blog";
$id = $title = $content = "";


if (isset($_GET['id'])) {
    $conn = new mysqli($servername, $username, $password, $db_name);

  
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $id = $_GET['id'];
    $sql = "SELECT * FROM posts WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $title = $row['Title'];
        $content = $row['Text'];
    } else {
        echo "Post not found.";
    }

    $conn->close();
}
if (isset($_POST['update'])) {
    $conn = new mysqli($servername, $username, $password, $db_name);

   
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $post_id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "UPDATE posts SET Title = '$title', Text = '$content' WHERE id = $post_id";

    if ($conn->query($sql) === TRUE) {
        header('Location: post.php?update_msg=Post updated successfully');
        exit();
    } else {
        echo "Error updating post: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <header>
        <h1>Edit Post</h1>
    </header>
    <main>
        <section class="edit">
            <h2>Edit  Post</h2>
            <form action="update.php?id=<?php echo $id; ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="<?php echo $title; ?>" required>
                <label for="content">Content</label>
                <textarea id="content" name="content" required><?php echo $content; ?></textarea>
                <button type="submit" name="update">Update</button>
            </form>
        </section>
    </main>
</body>
</html>
