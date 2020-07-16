<?php
//撈資料庫
$db_host = 'localhost'; //網路位置
$db_name = 'proj58'; //資料庫的名字
$db_user ='root';//預設帳號
$db_pass ='';

$dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8', $db_host, $db_name);

$pdo_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //發生錯誤要以什麼方式呈現  例外的時後EXCEPTION
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //讀取資料使用 關聯式陣列
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" //連線後做的第一個SQL指令
];

$pdo = new PDO($dsn, $db_user, $db_pass, $pdo_options);


// $pdo->query("USE `proj58`"); // 選擇使用的資料庫



if(! isset($_SESSION)){
    session_start();
}

define('WEB_ROOT', '/proj58/project'); //路徑設變數
?>