<?php
session_start(); // Khởi tạo session

// Kiểm tra nếu người dùng đã đăng nhập
if (isset($_SESSION['user'])) {
    $username = htmlspecialchars($_SESSION['user']);
} else {
    $username = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Css/app.css">  
    <title>Trang chủ - Cửa hàng game giá rẻ</title>
</head>
<body>
    <div id="wrapper">
        <?php include 'btl.php'; ?> <!-- Include phần menu và thanh tìm kiếm từ btl.php -->

        <div id="main-content">
            <div id="sidebar">
                <h2>Danh mục</h2>
                <ul>
                    <li><a href="#">Html</a></li>
                    <li><a href="#">Css</a></li>
                    <li><a href="#">Js</a></li>
                </ul>
            </div>
            <div id="picture">
                <img src="img/picture.webp" alt="top 10 game" width="960px">
            </div>
            <div id="content">
                <?php if (!empty($username)): ?>
                      <?php 
        while($row = $result->fetch_assoc())
        {$price = number_format($row['price'], 0, ',', '.') . " ₫";
        echo "
            <a href='product.php?id=".$row['id']."' >
            <img src='".$row['img']."' alt='sample picture' width='100px' height ='100px'>
            <p>".$row['name']." </p>
            <p>".$price."</p>
            </a>
            ";
            
        }
        ?>
                
                <?php else: ?>
                    <h1>Hãy đăng nhập để xem sản phẩm</h1>
                <?php endif; ?>
            </div>
        </div>

        <div id="footer">
            <p>Phần thông tin cuối</p>
        </div>      
    </div>
</body>
</html>
