<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Viewer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Blog Viewer</a>
    </nav>
    <div class="container mt-3">
        <?php
        // Connect to the database
			$host = 'localhost';
			$user = 'root';
			$password = '12345';
			$dbname = 'blog';

			$conn = mysqli_connect($host, $user, $password, $dbname);

			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
        // Get post id from query string
        $post_id = $_GET['post_id'];

        // Get post data from database
        $sql = "SELECT * FROM posts WHERE post_id = $post_id";
        $result = mysqli_query($conn, $sql);

        // Check if post exists
        if (mysqli_num_rows($result) == 1) {
            $post = mysqli_fetch_assoc($result);
        ?>
            <div class="card mb-3">
                <img src="<?php echo $post['image_url']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $post['title']; ?></h5>
                    <p class="card-text"><?php echo $post['content']; ?></p>
                    <p class="card-text"><small class="text-muted"><?php echo $post['published_date']; ?></small></p>
                </div>
            </div>
        <?php
        } else {
            echo 'Post not found.';
        }

        // Close database connection
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
