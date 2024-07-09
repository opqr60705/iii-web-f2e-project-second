<?php

$link = mysqli_connect("localhost","root","","db_shop",3306);
$result = mysqli_query($link,"set names utf8");
$mi = $_GET["id"];
$sql = <<<sqlStatement
DELETE FROM member WHERE memberId = $mi
sqlStatement;
$result = mysqli_query($link,$sql);

setcookie("id","",time() - 60 * 60 *24);   // 時間減一天
setcookie("passed","",time() - 60 * 60 *24);

header("location: index.php");

exit();

?>