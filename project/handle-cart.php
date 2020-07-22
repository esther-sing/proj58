<?php
require __DIR__. '/0714_connect.php';

if(! isset($_SESSION['cart'])){
    $_SESSION['cart']=[];
}

$action = isset($_GET['action']) ? $_GET['action'] : '';
$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;  //編號
$quantity = isset($_GET['quantity']) ? intval($_GET['quantity']) : 0;  //數量

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

echo json_encode($_SESSION['cart'], JSON_UNESCAPED_UNICODE);

?>
