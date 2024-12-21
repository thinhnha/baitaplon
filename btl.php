<?php
require ('connect.php');
$sql = "SELECT * FROM sanpham";
if(isset($_POST['search']))
{
    $nd = $_POST['noidung'];
    $sql = "SELECT * FROM sanpham WHERE name LIKE '%$nd%'";
}
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Css/app.css">
    <title>Cửa hàng game giá rẻ</title>
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <nav class="container-menu">
                <div class="head">
                <a href="" id="logomenu">
                    <img src="img/logomenu.png" alt="logomenu">
                </a>
                <div class="form-search">
                    <form method="post">
                  <input class="search" name="noidung" type="text" placeholder="Nhập thông tin để tìm kiếm">
                  <button class="search-btn" type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                </div>
                <ul id="main-menu">
                    <li><a href="">Trang chủ</a></li>
                    <li><a href="">Đĩa</a>
                        <ul class="sub-menu">
                            <li><a href="">Game PS4</a></li>
                            <li><a href="">Game PS5</a></li>
                            <li><a href="">Game Nintendo Switch</a></li>
                            <li><a href="">Game Xbox One</a></li>
                        </ul>
                    </li>
                    <li><a href="">Danh sách khách hàng</a></li>
                    <li><a href="">Doanh thu</a></li>
                </ul>
                <div class="form-login">
                    <button class="login-btn" type="button" data-toggle="modal" data-target="#myModal"> Đăng nhập </button>
                </div>
            </nav>
        </div>
        <div id="main-content">
            <div id="sidebar">
                <h2>Danh mục</h2>
                <ul>
                    <li><a href="">Html</a></li>
                    <li><a href="">Css</a></li>
                    <li><a href="">Js</a></li>
                </ul>
            </div>
            <div id="picture">
                <img src="img/picture.webp" alt="top 10 game" width="960px">
            </div>
            <div id="content">
            <?php 
        while($row = $result->fetch_assoc())
        {$price = number_format($row['price'], 0, ',', '.') . " ₫";
        echo "
            <a href='' >
            <img src='".$row['img']."' alt='sample picture' width='100px' height ='100px'>
            <p>".$row['name']." </p>
            <p>".$price."</p>
            </a>
            ";
            
        }
        ?>
                
            </div>
        </div>
        <div id="footer">
            <p>Phần thông tin cuối</p>
        </div>      
    </div>
</body>
</html>
