<?php

require __DIR__.'/0714_connect.php';//讀取資料

// $sql = "SELECT * FROM address_book"; //SELECT * 取得資料的所有項目     address_book SQL資料表檔案名稱

$sql = "SELECT `sid`, `name`, `email` FROM `address_book` ORDER BY `sid` DESC";
//以`sid` 欄做 DESC降冪排列

$stmt = $pdo->query($sql); //執行SQL  ( 物件用->  陣列用=> )

$row = $stmt->fetch(PDO::FETCH_ASSOC); //讀取一筆,關聯式陣列
// $row = $stmt->fetch(PDO::FETCH_NUM); // 讀取一筆, 索引式陣列
print_r($row);
?>