<?php
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

// 載入資料
$mi = $_GET["id"];
$link = mysqli_connect("localhost","root","","db_shop",3306);
$result = mysqli_query($link,"set names utf8");
$sql = <<<statement
SELECT firstName , lastName , tel , c.cityId , cityName ,address 
FROM member AS m JOIN city AS c ON m.cityId = c.cityId
WHERE memberId=$mi
statement;
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>member</title>
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
            width:200px;
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
                <th colspan="2">Member
                    <a onclick="del()" href="delete.php?id=<?=$mi ?>">Delete</a>
                    <a href="edit.php?id=<?=$mi ?>">Edit</a>
                </th>
            </thead>
            <tbody>               
                <tr>
                    <th>Firstname</th>
                    <td><?= $row["firstName"] ?></td>
                </tr>
                <tr>
                    <th>Lastname</th>
                    <td><?= $row["lastName"] ?></td>
                </tr>
                <tr>
                    <th>Tel</th>
                    <td><?= $row["tel"] ?></td>
                </tr>
                <tr>
                    <th>City</th>
                    <td><?= $row["cityName"] ?></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><?= $row["address"] ?></td>
                </tr>
            </tbody>
        </table>
    </form>
    <script>
        function del(){
          alert("want deletel it !?")
        }
        alert("HI~<?= $userName ?>");
  </script>
</body>
</html>