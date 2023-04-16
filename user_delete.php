<?php
// Koneksi ke database
$host = 'localhost';
$user = 'root';
$password = '12345';
$database = 'blog';

$connection = mysqli_connect($host, $user, $password, $database);
if (!$connection) {
    die('Koneksi gagal: ' . mysqli_connect_error());
}

// Proses penghapusan data
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    $query = "DELETE FROM users WHERE user_id = '$user_id'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die('Penghapusan data gagal: ' . mysqli_error($connection));
    }

    // Alihkan kembali ke halaman utama setelah penghapusan data berhasil
    header('Location: users.php');
    exit;
}

// Ambil data user yang akan dihapus
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    $query = "SELECT * FROM users WHERE user_id = '$delete_id'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die('Error: ' . mysqli_error($connection));
    }

    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hapus User</title>
</head>
<body>
    <h1>Hapus User</h1>
    <p>Anda akan menghapus data user:</p>
    <p>Nama: <?php echo $name; ?></p>
    <p>Apakah Anda yakin?</p>

    <form method="post"action="delete_user.php">
        <input type="submit" name="submit" value="Ya">
        <a href="users.php">Tidak</a>
    </form>
</body>
</html>
