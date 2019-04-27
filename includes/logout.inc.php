<?php

session_start();    //啟動session
session_unset();    //釋放當前在內存中已經創建的所有$_SESSION變量
session_destroy();  //刪除用戶對應的session文件
header("Location: ../index.php");
?>