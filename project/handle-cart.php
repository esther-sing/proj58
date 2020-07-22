<?php
require __DIR__. '/0714_connect.php';

if(! isset($_SESSION['cart'])){
    $_SESSION['cart']=[];
}

$action = isset($_GET['action']) ? $_GET['action'] : '';
$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;  //編號
$quantity = isset($_GET['quantity']) ? intval($_GET['quantity']) : 0;  //數量
$output = [
        'action' => $action, //動作
        'code' => 0, //邏輯
    ];
/*
 * 加入商品, 移除商品, 查詢內容
 * action: add, remove, empty
 *
 */

switch ($action){
    case 'add':
        $_SESSION['cart'][] = [
            'sid' => $sid,
            'quantity' => $quantity
        ];
        break;
    case 'remove':

        break;
    case 'empty':
        $_SESSION['cart'] = [];
        break;

}

$output['cart'] = $_SESSION['cart']; //在傳陣列裡加上陣列
echo json_encode($output, JSON_UNESCAPED_UNICODE);

?>
