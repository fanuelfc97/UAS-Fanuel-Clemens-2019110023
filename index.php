<?php include('templates/header.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
	<!-- Include Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<!-- Include jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Include Bootstrap Javascript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="container">
		<h1 class="text-center">Blog</h1>

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

			// Fetch posts from the database
			$sql = "SELECT * FROM posts";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				// Output data of each row
				while($row = mysqli_fetch_assoc($result)) {
					$post_id = $row["post_id"];
					$user_id = $row["user_id"];
					$title = $row["title"];
					$content = $row["content"];
					$image_url = $row["image_url"];
					$published_date = $row["published_date"];

					echo '<div class="row">';
					echo '<div class="col-md-3">';
					echo '<div class="thumbnail">';
					echo '<img src="'.$image_url.'" alt="'.$title.'">';
					echo '</div>';
					echo '</div>';
					echo '<div class="col-md-9">';
					echo '<h3>'.$title.'</h3>';
					echo '<p>'.$content.'</p>';
					echo '<p>Published on: '.$published_date.'</p>';
					echo '<a href="viewer.php?post_id='.$post_id.'" class="btn btn-primary">View</a>';
					echo '</div>';
					echo '</div>';
					echo '<hr>';
				}
			} else {
				echo "0 results";
			}

			mysqli_close($conn);
		?>

	</div>

</body>
</html>
