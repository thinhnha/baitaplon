<?php
require('connect.php');
$id = (int) $_GET['id'];
$sql = "SELECT * FROM `khachhang` WHERE `id` = {$id}";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if($_SERVER['REQUEST_METHOD']==='POST')
{  
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    if(strpos($email, '@gmail.com') !== FALSE)
    $update = "UPDATE khachhang SET fullname = '$fullname', address = '$address', email = '$email', number = '$number'";
    if($conn->query($update) === TRUE)
    {
        header("Location:index.php");
    }
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
