<?php
    require 'connect.php';
        $sql = "SELECT * FROM sanpham ";
            $id = (int) $_GET['id'];
            $sql = "UPDATE khachhang SET fullname = '$fullname', adress = '$address', email = '$email', number = '$number'";
        $result = $conn->query($sql);
        if ($result)
        {
            header("Location:index.php");
        }
?>
<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <div>
            <form method="post">
                <div>
                    <label for="fullname">Họ và tên: </label>
                    <input type="text" name="fullname" id="fullname" value="<?=$row['fullname']?>">
                </div>
                <div>
                    <label for="address">Địa chỉ: </label>
                    <input type="text" name="address" id="address" value="<?=$row['address']?>">
                </div>
                <div>
                    <label for="email">Email: </label>
                    <input type="text" name="email" id="email" value="<?=$row['email']?>">
                </div>
                <div>
                    <label for="number">Số điện thoại: </label>
                    <input type="number" name="number" id="number" value="<?=$row['number']?>">
                </div>
                <input type="submit" value="Lưu">
            </form>
        </div>
    </body>
</html>