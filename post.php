<!DOCTYPE html>
<html>
<head>
	<title>Posts</title>
	<!-- Include Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h1>Posts</h1>
		<table class="table">
			<thead>
				<tr>
					<th>Post ID</th>
					<th>User ID</th>
					<th>Title</th>
					<th>Content</th>
					<th>Image URL</th>
					<th>Published Date</th>
				</tr>
			</thead>
			<tbody>
				<?php
				// Connect to database
				$host = 'localhost';
				$user = 'root';
				$password = '12345';
				$database = 'blog';
				$conn = mysqli_connect($host, $user, $password, $database);

				// Query posts
				$query = "SELECT * FROM posts";
				$result = mysqli_query($conn, $query);

				// Loop through posts
				while ($post = mysqli_fetch_assoc($result)) {
					echo '<tr>';
					echo '<td>' . $post['post_id'] . '</td>';
					echo '<td>' . $post['user_id'] . '</td>';
					echo '<td>' . $post['title'] . '</td>';
					echo '<td>' . $post['content'] . '</td>';
					echo '<td><img src="' . $post['image_url'] . '" height="100"></td>';
					echo '<td>' . $post['published_date'] . '</td>';
					echo '</tr>';
				}

				// Close database connection
				mysqli_close($conn);
				?>
			</tbody>
		</table>
	</div>
	<!-- Include Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
