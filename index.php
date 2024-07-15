<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Blog</title>
    <link rel="stylesheet" href="style1.css">
</head>

<body>
    <header>
        <h1>My Blogs</h1>
    </header>
    <main>
        <section class="create">
            <h2>Create a New Post</h2>
            <form action="create.php" method="post">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" required>
                <label for="content">Content</label>
                <textarea id="content" name="content" required></textarea>
                <button type="submit">Create Post</button>
            </form>
        </section>
</body>
</html>