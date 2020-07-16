<?php
$p = array(
    'name' => '彼得' ,
    'age' => 27,
    'gender' =>'male',
    123
);
//關聯式陣列


$a = ['彼得',27,'male'];

echo json_encode($p,JSON_UNESCAPED_UNICODE);

//json_encode 轉會成原生物件  
//JSON_UNESCAPED_UNICODE內件常數，讓中文(或其他語言)能顯示 彼得
?>