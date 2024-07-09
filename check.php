<?php
$link = mysqli_connect("localhost","root","","db_shop",3306);
$result = mysqli_query($link,"set names utf8");

$account = $_POST["user_Account"];
$password = $_POST["user_Password"];

$sql = <<<statement
SELECT * FROM member WHERE account = '$account' AND password = '$password'
statement;
$result = mysqli_query($link,$sql);

$sql_mi = <<<statement
SELECT * FROM member WHERE account = '$account' AND memberId
statement;
$result_mi = mysqli_query($link,$sql_mi);

// mysqli_num_rows() 返回结果集中行的數量
if (mysqli_num_rows($result) == 0) {
    // mysqli_free_result() 釋放記憶體內存
    mysqli_free_result($result);
    // 關閉資料連接
    mysqli_close($link);
    // 錯誤訊息 回上頁
    echo "<script>";
    echo "alert('錯誤');";
    echo "history.back();";
    echo "</script>";
}
else {
    // 抓帳號
    $id = mysqli_fetch_assoc($result);
    $mi = mysqli_fetch_assoc($result_mi);
    $id = $id['account'];
    $mi = $mi['memberId'];
    // mysqli_free_result() 釋放記憶體內存
    mysqli_free_result($result);
    // 關閉資料連接
    mysqli_close($link);
    // 設 cookie
    setcookie("id",$id);
    setcookie("passed","TRUE");
    setcookie("mi",$mi);
    header("location: index.php");
}

?>