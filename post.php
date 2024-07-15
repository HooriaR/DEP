<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Posts</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <header>
        <h1>My Blogs</h1>
    </header>
    <main>
        <section class="posts">
            <h2> Blog Posts</h2>
            <div id="postsContainer">
                <?php
                $conn = new mysqli('localhost', 'root', '', 'blog');

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT id, Title, Text FROM posts ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='post'>";
                        echo "<h3 class='post-title'>" . $row['Title'] . "</h3>";
                        echo "<p class='post-content'>" . $row['Text'] . "</p>";
                        echo "<form action='delete.php' method='post' style='display:inline-block;'>";
                        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                        echo "<button type='submit'>Delete</button>";
                        echo "</form>";
                        echo "<form action='update.php' method='get' style='display:inline-block; margin:4px;'>";
                        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                        echo "<button type='submit'>Edit</button>";
                        echo "</form>";
                        echo "</div>";
                       
                    }
                } else {
                    echo "No posts found";
                }
              
                $conn->close();
                ?>
            </div>
            <a href="index.php" class="back">Back to Create New Post</a>
        </section>
    </main>
</body>
</html>
