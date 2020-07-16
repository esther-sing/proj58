<?php

require __DIR__.'/0714_connect.php';//讀取資料

header('Content-Type:text/plain'); //text/plain純文字

// $sql = "SELECT * FROM address_book"; //SELECT * 取得資料的所有項目     address_book SQL資料表檔案名稱
$sql = "SELECT * FROM address_book";


$stmt = $pdo->query($sql); //執行SQL  ( 物件用->  陣列用=> )


echo json_encode($stmt->fetchAll(), JSON_UNESCAPED_UNICODE);//$stmt->fetchAll() 取得所有的資料內容 ,以陣列呈現


