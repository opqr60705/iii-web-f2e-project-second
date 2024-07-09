<?php
// 顯示名稱
$userName = "Guest";
if(isset($_COOKIE["id"])){
    $userName = $_COOKIE["id"];
}

// mem ID
if(isset($_COOKIE["mi"])){
    $mi = $_COOKIE["mi"];
}

// 跳轉 登入頁
if (isset($_POST["login_btn"])) {
    header("location: login.php");
}

// 登出
if (isset($_POST["logout"])) {
    header("location: logout.php");
}

// 會員頁
if (isset($_POST["member"])) {
    header("location: member.php");
}

// 註冊頁
if (isset($_POST["add_member_btn"])) {
    header("location: add_member.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOP</title>
    <style>
        <?= 
            include("./css/header.css");
            include("./css/sticky_top.css");
            include("./css/shop.css");
            include("./css/product.css");
        ?>
        #mem_btn{
            margin-top:1%;
            padding: 10px;
            margin-left:45%;
        }

    </style>
    <!-- 載入 font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- header -->
    <form class="header" id="page_top" method="post" action="">
        <!-- <a class="btn_a" href="./shop_index.html"><i class="fa fa-home" aria-hidden="true">HOME</i></a> -->
        <a class="btn_a" href="./index.php"><i class="fa fa-shopping-bag" aria-hidden="true">SHOP</i></a>
        <a class="btn_a" href="#"><i class="fa fa-shopping-cart" aria-hidden="true">
                <table id="cart_defult">
                    <div id="brige_opacity"></div>
                    <div id="brige_color"></div>
                    <tr>
                        <th>品項</th>
                        <th>數量</th>
                        <th>金額</th>
                    </tr>
                    <tr></tr>
                    <tr>
                        <th colspan="3">
                            <input type="submit" value="結帳">
                        </th>
                    </tr>
                </table>
            </i></a>
        <a class="btn_a" href="#"><i id="membericon" class="fa fa-user-circle-o" aria-hidden="true">
            <div id="login_opacity"></div>
            <div id="login_color"></div>    
            <div id="login">
                <p></p>
                <!-- 判斷UserName的值，顯示登入或登出 -->
                <?php if ($userName == "Guest") { ?>
                    <button type='submit' name='login_btn'>登入</button>
                    <button type='submit' name='add_member_btn'>註冊</button>
                <?php } else { ?>
                    <input type="submit" name="logout" value="登出">
                <?php } ?>
                <p>hello!!! <?=$userName ?></p>
            </div>
        </i></a>
    </form>
    <?php if ($userName != "Guest") { ?>
    <a id="mem_a" href="member.php?id=<?=$mi ?>"><input type="submit" name="member" id="mem_btn" value="會員專用頁"></a>
    <?php } ?>
    <!-- 右下 大 sticky 圖列 -->
    <div id="sticky_group">
        <!-- 預設圖片 -->
        <div id="sticky_defult">
            <img id="sticky_img" src="./img/stickytop/moneybag1.png">
        </div>
        <!-- 隱藏Icon -->
        <div id="touch_area"></div>
        <img id="sticky_img_change" src="./img/stickytop/moneybag2.png">
        <img class="herf_icon" src="./img/stickytop/FBlogo.png">
        <img class="herf_icon" src="./img/stickytop/IGlogo.png">
        <img class="herf_icon" src="./img/stickytop/LINElogo.png">
        <img class="herf_icon" src="./img/stickytop/YTlogo.png">
        <a href="#page_top"><i class="fa fa-arrow-circle-o-up herf_icon" id="back_top" aria-hidden="true"></i></a>
    </div>

    <!-- 產品資料 -->
    <!-- https://www.cathaylife.com.tw/cathaylife/products/insurance/index/hot-products -->
    <!-- SHOP -->
    <div class="shop">
        <!-- shop card -->
        <div class="col_card">
            <div class="collision_card">
                <div class="row_card">
                    <div class="card_img">
                        <p>more...</p>
                        <img src="./img/shop_img/CC3-01.jpg" title="保單001">
                    </div>
                    <h3>GO福氣終身壽險</h3>
                    <h4>（定期給付型）</h4>
                    <div class="btn_readmore">
                        <a href="#">了解更多</a>
                    </div>
                </div>
                <div class="row_card">
                    <div class="card_img">
                        <p>more...</p>
                        <img src="./img/shop_img/CDB_01.jpg" title="保單001">
                    </div>
                    <h3>GO精彩101美元險</h3>
                    <h4>（定期給付型）</h4>
                    <div class="btn_readmore">
                        <a href="#">了解更多</a>
                    </div>
                </div>
                <div class="row_card">
                    <div class="card_img">
                        <p>more...</p>
                        <img src="./img/shop_img/KA3-01.jpg" title="保單001">
                    </div>
                    <h3>微馨安小額終身險</h3>
                    <h4>（內含多種方案）</h4>
                    <div class="btn_readmore">
                        <a href="#">了解更多</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>