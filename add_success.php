<?php

if (isset($_POST["btn_home"])) {
    setcookie("id","",time() - 60 * 60 *24);   // 時間減一天
    setcookie("passed","",time() - 60 * 60 *24);
    setcookie("mi","",time() - 60 * 60 *24);
    setcookie("fn","",time() - 60 * 60 *24);
    setcookie("ln","",time() - 60 * 60 *24);
    header("location: index.php");
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
        /* @import url(./css/header.css); */
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
    <table>
        <thead>
            <th colspan="2">Welcome Join Us ~ 
                <br><br>Member&emsp;<u><i><?=$_COOKIE["fn"] , $_COOKIE["ln"] ?></i></u>&emsp;!!!
            </th>
        </thead>
        <tbody>
            <form method="post" action="">
            <tr>
                <th>Account</th>
                <td>
                    <?=$_COOKIE["id"] ?>
                </td>
                
            </tr>
            <tr>
                <th>Password</th>
                <td>
                    <?=$_COOKIE["passed"] ?>
                </td>
            </tr>
            <!-- Button (Double) -->
            <tr>
                <td colspan="2">
                    <button name="btn_home" class="btn">HOME</button>
                </td>
            </tr>
            </form>
        </tbody>
    </table>
</body>
</html>