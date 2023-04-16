<!DOCTYPE html>
<html>
<head>
	<title>Data User</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container mt-5">
		<h2>Data User</h2>
		<a href="user_create.php" class="btn btn-primary mb-3">Tambah User</a>
		<table class="table">
			<thead>
				<tr>
					<th>User Id</th>
					<th>Nama</th>
					<th>Email</th>
					<th>No. Telepon</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
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
				$query = "SELECT * FROM users";
				$result = mysqli_query($conn, $query);
				$i = 1;
				while ($row = mysqli_fetch_array($result)) {
				?>
					<tr>
						<td><?= $row['user_id'] ?></td>
						<td><?= $row['name'] ?></td>
						<td><?= $row['email'] ?></td>
						<td><?= $row['phone_number'] ?></td>
						<td>
							<a href="user_update.php?id=<?= $row['user_id'] ?>" class="btn btn-warning btn-sm">Edit</a>
							<a href="user_delete.php?id=<?= $row['user_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus user ini?')">Hapus</a>
						</td>
					</tr>
				<?php
					$i++;
				}
				mysqli_close($conn);
				?>
			</tbody>
		</table>
	</div>
</body>
</html>
