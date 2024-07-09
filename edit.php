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

// 取消 按鈕
if( isset($_POST["cancelButton"]) ){
    header("location: index.php");
    exit();
}
  
// 按下按鈕將資料回傳資料庫複寫
if(isset($_POST["okButton"])){
    $sql = <<<statement
      UPDATE member SET
      firstName = '{$_POST["firstName"]}', 
      lastName ='{$_POST["lastName"]}',
      tel = '{$_POST["tel"]}',
      cityId = '{$_POST["cityId"]}',
      address = '{$_POST["address"]}'
      WHERE memberId = $mi ;
    statement;
    $result = mysqli_query($link,$sql);
    header("location: index.php");
    exit();
}

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
                <th colspan="2">Member
                </th>
            </thead>
            <tbody>
                <form method="post" action="">
                <tr>
                    <th>Firstname</th>
                    <td>
                        <input name="firstName" value="<?= $row["firstName"] ?>" type="text">
                    </td>
                    
                </tr>
                <tr>
                    <th>Lastname</th>
                    <td>
                        <input name="lastName" value="<?= $row["lastName"] ?>" type="text">
                    </td>
                </tr>
                <tr>
                    <th>Tel</th>
                    <td>
                    <input name="tel" value="<?= $row["tel"] ?>" type="text">
                    </td>
                </tr>
                <tr>
                    <th>City</th>
                    <td>
                        <select name="cityId">
                            <option value="1" <?= ($row["cityId"] == 1) ? "selected" : "" ?>>Keelung</option>
                            <option value="2" <?= ($row["cityId"] == 2) ? "selected" : "" ?>>Taipei</option>
                            <option value="3" <?= ($row["cityId"] == 3) ? "selected" : "" ?>>NewTaipei</option>
                            <option value="4" <?= ($row["cityId"] == 4) ? "selected" : "" ?>>Taoyuan</option>
                            <option value="5" <?= ($row["cityId"] == 5) ? "selected" : "" ?>>Hsinchu</option>
                            <option value="6" <?= ($row["cityId"] == 6) ? "selected" : "" ?>>HsinchuCity</option>
                            <option value="7" <?= ($row["cityId"] == 7) ? "selected" : "" ?>>Miaoli</option>
                            <option value="8" <?= ($row["cityId"] == 8) ? "selected" : "" ?>>Taichung</option>
                            <option value="9" <?= ($row["cityId"] == 9) ? "selected" : "" ?>>Changhua</option>
                            <option value="10" <?= ($row["cityId"] == 10) ? "selected" : "" ?>>Nantou</option>
                            <option value="11" <?= ($row["cityId"] == 11) ? "selected" : "" ?>>Yunlin</option>
                            <option value="12" <?= ($row["cityId"] == 12) ? "selected" : "" ?>>Chiayi</option>
                            <option value="13" <?= ($row["cityId"] == 13) ? "selected" : "" ?>>ChiayiCity</option>
                            <option value="14" <?= ($row["cityId"] == 14) ? "selected" : "" ?>>Tainan</option>
                            <option value="15" <?= ($row["cityId"] == 15) ? "selected" : "" ?>>Kaohsiung</option>
                            <option value="16" <?= ($row["cityId"] == 16) ? "selected" : "" ?>>Pingtung</option>
                            <option value="17" <?= ($row["cityId"] == 17) ? "selected" : "" ?>>Yilan</option>
                            <option value="18" <?= ($row["cityId"] == 18) ? "selected" : "" ?>>Hualien</option>
                            <option value="19" <?= ($row["cityId"] == 19) ? "selected" : "" ?>>Taitung</option>
                            <option value="20" <?= ($row["cityId"] == 20) ? "selected" : "" ?>>Penghu</option>
                            <option value="21" <?= ($row["cityId"] == 21) ? "selected" : "" ?>>Kinmen</option>
                            <option value="22" <?= ($row["cityId"] == 22) ? "selected" : "" ?>>Lienchiang</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>
                    <input name="address" value="<?= $row["address"] ?>" type="text">
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