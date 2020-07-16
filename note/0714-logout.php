<?php
session_start();

//清除某個session變數 ,去掉陣列元素
unset($_SESSION['user']);

// session_destroy(); 清除所有的 session

header(('Location: 0714-login.php'));
//連到的位置
?>