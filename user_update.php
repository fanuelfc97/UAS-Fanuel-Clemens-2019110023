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
//mengecek apakah form telah disubmit
if(isset($_POST['submit'])) {
    //mengambil data dari form
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    
    //memperbarui data di database
    $query = "UPDATE users SET name='$name', email='$email', phone_number='$phone_number' WHERE user_id=$user_id";
    $result = mysqli_query($conn, $query);
    
    //jika berhasil memperbarui data, redirect ke halaman user.php
    if($result) {
        header('Location: user.php');
        exit;
    } else {
        echo "Gagal memperbarui data pengguna";
    }
} else {
    //mengambil data pengguna berdasarkan user_id
    $user_id = $_GET['user_id'];
    $query = "SELECT * FROM users WHERE user_id=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    //jika data pengguna tidak ditemukan, redirect ke halaman user.php
    if(!$user) {
        header('Location: user.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User Data</title>
    <!-- menggunakan bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Update User Data</h2>
        <form method="POST" action="user_update.php">
            
        <div class="form-group">
                <label for="user_id">Id:</label>
                <input type="text" class="form-control" id="user_id" name="user_id" value="<?php echo $user['user_id']; ?>">
            </div>
            <div class="form-group">
        <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $user['name']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo $user['phone_number']; ?>">
            </div>
            <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
            <button type="submit" class="btn btn-default" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>
