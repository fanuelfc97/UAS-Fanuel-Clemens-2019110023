<!DOCTYPE html>
<html>
<head>
	<title>Add New Post</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
	<div class="row">
		<div class="col-md-6 mx-auto">
			<h3>Add New Post</h3>
			<form method="POST" >
				<div class="mb-3">
					<label for="title" class="form-label">Title</label>
					<input type="text" class="form-control" id="title" name="title" required>
				</div>
				<div class="mb-3">
					<label for="content" class="form-label">Content</label>
					<textarea class="form-control" id="content" name="content" rows="4" required></textarea>
				</div>
				<div class="mb-3">
					<label for="image_url" class="form-label">Image URL</label>
					<input type="text" class="form-control" id="image_url" name="image_url">
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>



<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Mengambil data dari form
	$title = $_POST["title"];
	$content = $_POST["content"];
	$image_url = $_POST["image_url"];

	// Koneksi ke database
	$host = "localhost";
	$username = "root";
	$password = "";
	$dbname = "blog";
	$conn = mysqli_connect($host, $username, $password, $dbname);

	// Menyiapkan query SQL
	$sql = "INSERT INTO posts (user_id, title, content, image_url, published_date) 
			VALUES (1, '$title', '$content', '$image_url', NOW())";

	// Menjalankan query dan mengecek apakah berhasil atau tidak
	if (mysqli_query($conn, $sql)) {
		echo "New post added successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	// Menutup koneksi ke database
	mysqli_close($conn);
}

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
