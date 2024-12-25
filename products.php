<?php
require('connect.php');
$id = (int) $_GET['id'];
$sql = "SELECT * FROM sanpham WHERE id = {$id}";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$price = number_format($row['price'], 0, ',', '.') . ' ₫';
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $id = (int) $_GET['id'];
    $sql = "SELECT * FROM sanpham WHERE id={$id}";
    $result = $conn->query($sql);
    $number = $_POST['amount'];
    $row = $result->fetch_assoc();
    $soluong = $row['quantity'] - $number;
    $sql1 = "UPDATE sanpham SET quantity= '$soluong' WHERE id={$id}";
    $sum += $row['price'];
    $kq = $conn -> query($sql1);
    if ($kq) {
        header('Location:hienthi.php');
}
}

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
        <?php include 'btl.php'; ?> <!-- Include phần menu và thanh tìm kiếm từ btl.php -->
        <!-- sp -->
        <section class="product">
            <div class="container">
                <div class="product-content row">
                    <div class="product-content-left row">
                        <div class="big-img">
                            <img src="<?php echo $row["img"]; ?>" alt="ảnh sản phẩm">
                        </div>

                    </div>
                    <div class="product-content-right ">
                        <div class="product-name">
                            <h1><?php echo $row["name"]; ?></h1>
                            <h1>
                                <div id="buy-amount">
                                    <button id="btn-minus" class="minus-btn"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                        </svg>
                                    </button>


                                   


                                    <button id="btn-plus" class="plus-btn"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={2} stroke="currentColor" className="size-6">
                                            <path strokeLinecap="round" strokeLinejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                    </button>


                                </div>
                        </div>
                        <form  method="post" >
                        <input type="text" name="amount" id="amount" value="1">
                            <h1>Số lượng: <?php echo $row["quantity"]; ?>
                            </h1>
                            <div class="product-price">
                                <p>Giá: <?php echo $price = number_format($row['price'], 0, ',', '.') . " ₫"; ?></p>
                            </div>
                            <div class="product-information">
                                <p>Thông tin sp</p>
                            </div>
                            <div class="information">
                                <div class="information-chitiet">
                                    <?php echo $row['info']; ?>
                                </div>
                                <div class="product-button">
                                    <a href="update.php?id=<?php echo $row["id"]; ?> " style="background-color: green;"><i class="fa-solid fa-wrench"></i> | Sửa</button>
                                        <button type="input"style="background-color: red;"><i class="fa-solid fa-trash"></i> | Bán</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
        </section>

        <!-- end -->
    </div>
    <div id="footer">
        <p>Phần thông tin cuối</p>
    </div>
    </div>

    <script>

        function handle(e) {
            console.log(amount);
        }

        let btnplus = document.getElementById('btn-plus');
        let btnminus = document.getElementById('btn-minus');
        let amount = document.getElementById('amount');
        btnplus.addEventListener('click', function(e) {
            let number = parseInt(amount.value);
            if(!isNaN(number))
        {
            number++
            amount.value = number;
        }
    });
        btnminus.addEventListener('click',function(e)
        {
            let number = parseInt(amount.value);
            if (!isNaN(number) && amount.value >1)
        {
            number--
            amount.value = number;
        }
        });

    </script>

</body>

</html>
