<?php

setcookie("id","",time() - 60 * 60 *24);   // 時間減一天
setcookie("passed","",time() - 60 * 60 *24);
setcookie("mi","",time() - 60 * 60 *24);
setcookie("fn","",time() - 60 * 60 *24);
setcookie("ln","",time() - 60 * 60 *24);
header("location: index.php");
    
?>