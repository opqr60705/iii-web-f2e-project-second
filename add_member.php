<?php
// 連線
$link = mysqli_connect("localhost","root","","db_shop",3306);
$result = mysqli_query($link,"set names utf8");

// 顯示名稱
$userName = "Guest";
if(isset($_COOKIE["id"])){
    $userName = $_COOKIE["id"];
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

// 載入 城市 選項回圈
$sqlCity = <<<statement
SELECT  cityId , cityName 
FROM  city 
ORDER BY cityId 
statement;
$resultCity = mysqli_query($link,$sqlCity);

// 取消 按鈕
if( isset($_POST["cancelButton"]) ){
    header("location: index.php");
    exit();
}
  

if(isset($_POST["okButton"])){
    $sql = <<<statement
        insert into member 
        (account, password, firstName,
        lastName, tel, cityId , address)
        values (
            '{$_POST["account"]}',
            '{$_POST["password"]}',
            '{$_POST["firstName"]}',
            '{$_POST["lastName"]}',
            '{$_POST["tel"]}',
            '{$_POST["cityId"]}',
            '{$_POST["address"]}');
    statement;
    $result = mysqli_query($link,$sql);

    // 按下按鈕將資料回傳資料庫複寫
    // $id = $_POST["account"];
    // $ps = $_POST["password"];
    // $fn = $_POST["firstName"];
    // $ln = $_POST["lastName"];
    // 設 cookie
    setcookie("id",$_POST["account"]);
    setcookie("passed",$_POST["password"]);
    setcookie("fn",$_POST["firstName"]);
    setcookie("ln",$_POST["lastName"]);

    header("location: add_success.php");
    exit();

    // 換頁
    // https://tw511.com/a/01/4318.html
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* 載入 header 樣式 */
        @import url(./css/header.css);
        table{
            border-collapse: collapse;
            margin:0 auto;
            margin-top:5%;
        }
        th,td{
            text-align: center;
            border:2px solid #329F68;
            width:10px;
            height:100px;
        }
        thead{
            background-color: #4CAF50;
        }
        tr:nth-child(even){
            background-color: #f2f2f2;
        }
        tbody tr:hover {
            background-color: #ddd;
        }
        th a{
            margin-right:5%;
            float: right;
        }
        .btn{
            margin:0 5%;
            font-size:36px;
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
        <a class="btn_a" href="#"><i class="fa fa-user-circle-o" aria-hidden="true">
            <div id="login_opacity"></div>
            <div id="login_color"></div>    
            <div id="login">
                <p></p>
                <!-- 判斷UserName的值，顯示登入或登出 -->
                <?php if ($userName == "Guest") { ?>
                    <button type='submit' name='login_btn'>登入</button>
                <?php } else { ?>
                    <input type="submit" name="logout" value="登出">
                <?php } ?>
                <p>hello!!! <?=$userName ?></p>
            </div>
        </i></a>
    </form>
    <form method="post" action="">
        <table>
            <thead>
                <th colspan="2">Join Us ~
                </th>
            </thead>
            <tbody>
                <form method="post" action="">
                <tr>
                    <th>Account</th>
                    <td>
                        <input name="account" value="" type="text">
                    </td>
                    
                </tr>
                <tr>
                    <th>Password</th>
                    <td>
                        <input name="password" value="" type="text">
                    </td>
                </tr>
                <tr>
                    <th>Firstname</th>
                    <td>
                        <input name="firstName" value="" type="text">
                    </td>
                    
                </tr>
                <tr>
                    <th>Lastname</th>
                    <td>
                        <input name="lastName" value="" type="text">
                    </td>
                </tr>
                <tr>
                    <th>Tel</th>
                    <td>
                    <input name="tel" value="" type="text">
                    </td>
                </tr>
                <tr>
                    <th>City</th>
                    <td>
                    <select id="cityId" name="cityId" class="form-control">
                        <!-- 迴圈選項 -->
                        <?php while($row = mysqli_fetch_assoc($resultCity)): ?>
                            <option value="<?=$row["cityId"] ?>"><?=$row["cityName"] ?></option>
                        <?php endwhile; ?>
                    </select>
                    </td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>
                    <input name="address" value="" type="text">
                    </td>
                </tr>
                <!-- Button (Double) -->
                <tr>
                    <td colspan="2">
                        <button name="okButton" class="btn">OK</button>
                        <button name="cancelButton" class="btn">Cancel</button>
                    </td>
                </tr>
                </form>
            </tbody>
        </table>
    </form>
</body>
</html>