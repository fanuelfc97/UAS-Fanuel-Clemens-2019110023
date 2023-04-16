<!DOCTYPE html>
<html>
<head>
	<title>Create User</title>
	<!-- Load Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container mt-3">
		<h2>Create User</h2>
		<form method="post">
        <div class="form-group">
				<label>User ID</label>
				<input type="text" name="user_id" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Phone Number</label>
				<input type="text" name="phone_number" class="form-control" required>
			</div>
			<button type="submit" name="submit" class="btn btn-primary">Submit</button>
			<a href="users.php" class="btn btn-secondary">Cancel</a>
		</form>
	</div>

	<?php
	// Connect to database
	$host = "localhost";
	$user = "root";
	$password = "12345";
	$database = "blog";

	$conn = mysqli_connect($host, $user, $password, $database);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// Check if form is submitted
	if (isset($_POST['submit'])) {
        $user_id = $_POST['user_id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone_number = $_POST['phone_number'];

		// Insert data to database
		$sql = "INSERT INTO users (user_id, name, email, phone_number) VALUES ('$user_id','$name', '$email', '$phone_number')";

		if (mysqli_query($conn, $sql)) {
			// Redirect to users.php after successful insert
			header("Location: users.php");
			exit;
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}

	// Close database connection
	mysqli_close($conn);
	?>

	<!-- Load Bootstrap JS -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
