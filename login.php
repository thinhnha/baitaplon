<?php
session_start(); // Khởi tạo session

// Kết nối cơ sở dữ liệu
$host = 'localhost';
$db = 'quanly';
$user = 'root'; // Thay bằng username của MySQL
$pass = '';     // Thay bằng mật khẩu của MySQL

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Xử lý đăng nhập
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {
        // Truy vấn kiểm tra thông tin đăng nhập
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // So sánh mật khẩu thuần túy
        if ($user && $user['password'] == $password) {
            // Đăng nhập thành công, lưu thông tin vào session
            $_SESSION['user'] = $user['username'];
            header('Location: index.php'); // Quay lại trang index.php sau khi đăng nhập thành công
            exit();
        } else {
            $error = "Tên người dùng hoặc mật khẩu không đúng.";
        }
    } else {
        $error = "Vui lòng nhập đầy đủ thông tin.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="Css/login.css">
</head>
<body>
    <div class="main">
        <h1>Đăng nhập</h1>
        <?php if (!empty($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="input-container">
                <label for="username">Tên đăng nhập</label>
                <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập" required>
            </div>
            <div class="input-container">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
            </div>
            <div class="button-container">
                <button type="submit">Đăng nhập</button>
            </div>
        </form>
        <p>Chưa có tài khoản? <a href="register.php">Tạo tài khoản</a></p>
    </div>
</body>
</html>
