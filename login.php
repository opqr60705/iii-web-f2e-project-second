<?php
// 顯示名稱
$userName = "Guest";
if(isset($_COOKIE["id"])){
    $userName = $_COOKIE["id"];
}

// 回首頁
if (isset($_POST["back_home"])) {
    header("location: index.php");
}

// 去檢查頁
if (isset($_POST["login"])) {
    // header("location: check.php");
    include("check.php");
}

// 去註冊頁
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
    <title>LogIn</title>
    <style>
        /* 載入 header 樣式 */
        @import url(./css/header.css);

        #login_form{
            margin: 0 auto;
            border: 2px solid #9f3f32;
            margin-top: 5%;
            width: 300px;
            height: min-content;
            background-color: #329f6985;
            text-align: center;
            line-height: 30px;
        }
        div input:nth-of-type(1),div input:nth-of-type(2){
            width:70%;
            font-size:20px;
            margin:5px 0;
        }
        div input:nth-of-type(3),div input:nth-of-type(4){
            font-size:20px;
            margin:5px 0 5px 0;
        }
        div input:nth-of-type(3){
            margin-left:13%;
        }
        div button{
            font-size:20px;
        }

    </style>
    <!-- 載入 font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- header -->
    <form class="header" id="page_top" method="post" action="check.php">
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
        <a class="btn_a" href="#"><i class="fa fa-user-circle-o" aria-hidden="true">
            <div id="login_opacity"></div>
            <div id="login_color"></div>    
            <div id="login">
                <p></p>
                <p>hello!!! <?=$userName ?></p>
            </div>
        </i></a>
    </form>

    
    <!-- login -->
    <form id="login_form" method="post" action="" name="myForm">
        <div>
            <h3>登入頁</h3>
            帳號 : <input type="text" name="user_Account" id="user_Account"><br>
            密碼 : <input type="password" name="user_Password" id="user_Password"><br>
            <input type="submit" name="login" value="登入">
            <input type="submit" name="add_member_btn" value="註冊">
            <button type="submit" name="back_home">回首頁</button>
        </div>
        <br>
    </form>
</body>
</html>