<?php
//新增資料到資料庫SQL

require __DIR__. '/0714_connect.php';

$output = [
    'success' => false,
    'code' => 0,
    'error' => '',
    'postData' => $_POST
];

if(empty($_POST['name'])){
    $output['error'] = '沒有姓名資料';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}
// TODO: 檢查欄位

$mobile = $_POST['mobile'];
$mobile = implode('',explode('-',$mobile));
// php: mobile 去除 dash
// explode 字串用-切割,改成成空格
// implode 組合


$sql = "UPDATE `address_book` SET 
            `name`=?,
            `email`=?,
            `mobile`=?,
            `birthday`=?,
            `address`=?
             WHERE `sid`=?";
        // ?是要輸入的值

$stmt = $pdo->prepare($sql);
$stmt->execute([
       $_POST['name'],
        $_POST['email'],
        $mobile,
        $_POST['birthday'],
        $_POST['address'],
        $_POST['sid'],
        //抓到輸入的值
]);

if($stmt->rowCount()){
    $output['success'] = true;
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);

