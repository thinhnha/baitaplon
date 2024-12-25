<?php
    require('connect.php');
    $id = (int) $_GET['id'];
    $sql = "SELECT * FROM sanpham WHERE id = {$id}";

    $result = $conn->query($sql);
    $row = $result -> fetch_assoc();
    $price = number_format($row['price'], 0, ',', '.') . ' ₫';
    if($_SERVER['REQUEST_METHOD']==='POST')
    {
        $id = (int) $_GET['id'];
        $sql = "SELECT * FROM sanpham WHERE id={$id}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $soluong = $row['quantity'] - 1;
        $sql1 = "UPDATE sanpham SET quantity= '$soluong' WHERE id={$id}";
        $sum += $row['price'];
     
        if ($kq = $conn->query($sql1))
        {
            header("Location:hienthi.php");
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
                        <?php 
                        echo"


                        <div class='big-img'>
                            <img src='".$row['img']."' alt='ảnh sản phẩm'>
                        </div>
                    
                    </div>
                    <div class='product-content-right '>
                        <div class='product-name'>
                            <h1>".$row['name']."</h1>
                            <h1>
                            <div id='buy-amount'>
                            
        <button class='minus-btn' onclick='handleMinus()'><svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' class='size-6'>
            <path stroke-linecap='round' stroke-linejoin='round' d='M5 12h14' />
          </svg>
          </button>
            <input type='text' name='amount' id='amount' value='1'>
        <button class='plus-btn' onclick='handlePlus()'><svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' strokeWidth={2} stroke='currentColor' className='size-6'>
            <path strokeLinecap='round' strokeLinejoin='round' d='M12 4.5v15m7.5-7.5h-15' />
          </svg>
        </button>
    </div>
                            Số lượng: ".$row['quantity']."
                            </h1>
                        </div>
                        <div class='product-price'>
                            <p>Giá: ".$price."</p>
                        </div>
                        <div class='product-information'>
                            <p>Thông tin sp</p>
                        </div>
                        <div class='information'>
                            <div class='information-chitiet'>
                                <br>PS5 Slim 2024, có thể bỏ đĩa vô chơi hoặc tải game về chơi.
                                <br>Mua Máy được Tặng 2 Game Miễn Phí Theo List Game Tặng.
                            </div>
                        <div class='product-button'>
                            <a href='update.php?id=".$row['id']."' style='background-color: green;'><i class='fa-solid fa-wrench'></i> |   Sửa</button>
                            <a href='sell.php?id=".$row['id']."' style='background-color: red;'><i class='fa-solid fa-trash'></i>  |   Bán</button>
                        </div>
                    </div> ";
                    ?>
 
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
        let amountElement = document.getElementById('amount');
        let amount = amountElement.value
        let render = (amount) => {
            amountElement.value = amount
        }
        //Xử lí plus
        let handlePlus = () =>{
            amount++
            render(amount);
        }
        //Xử lí phần trừ
        let handleMinus = () =>{
            if(amount > 1)
            amount--
            render(amount);
        }
        amountElement.addEventListener('input', () => {
            amount = amountElement.value;
            amount = parseInt(amount); // chuyển dữ liệu amount về dạng số nguyên
            amount = (isNaN(amount)||amount==0)?1:amount; // điều kiện kép nếu là text hoặc 0 thì sẽ tự động chuyển về 1
            render(amount);
            console.log(amount);
        });     
    </script>
</body>
</html>
