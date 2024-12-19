<?php
require ('connect.php');
if(isset($_POST['add']))
{
    $name = $_POST['name'];
    $price = $_POST['price'];
    $pname = $_FILES["img"]["name"];
    $tname = $_FILES["img"]["tmp_name"];
    $upload_dir = 'images';
    move_uploaded_file($tname, $upload_dir.'/'.$pname); 
    $sql = "INSERT INTO `sanpham` (`name`,`price`,`img`)
            VALUES ('$name','$price','$pname')";
    if($conn->query($sql)=== TRUE)
    {
        $message = "Thêm sản phẩm thành công";
       echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
$sql1 = "SELECT * FROM sanpham";
$result = $conn->query($sql1);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Nhập thông tin</title>
    </head>
    <body>
        <div>
            <form enctype="multipart/form-data" method="post">
                <div>
                <label for="name">Họ và tên:</label>
                <input type="text" name="name" id="name">
                </div>
                <div>
                    <label for="price">Ngày sinh:</label>
                    <input type="number" name="price" id="price">
</div>
            <div>
                <input type="File" name="img" id="img">
            </div>  
                <input type="submit" name="add" value="Lưu">
            </form>
        </div>
        <div>
            <?php
            while($row = $result->fetch_assoc())
            {
                echo "<img src='https://localhost/laptrinh/london-eye-800x534.jpg' alt='sample picture'>";
            }
            ?>
        </div>
</body>
</html>