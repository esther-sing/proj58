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
    case 'add':  //加入購物車
        if(empty($sid) or $quantity<=0 ){
                        // 若兩個都沒有, 不做任何事
                        $output['code'] = 400; //測試用編碼
                    } else {
                        $index = array_search($sid, array_column($_SESSION['cart'], 'sid')); //查詢有沒有這個sid
                        if($index===false){
                            // 原本沒有此項目 ,加入此項目到購物車
                            $_SESSION['cart'][] = [
                                'sid' => $sid,
                                'quantity' => $quantity
                            ];
                            $output['code'] = 200;
                        } else {
                            // 已經有該項目  , 將數量加入原有的購物車清單內
                            $_SESSION['cart'][$index]['quantity'] = $quantity;
                            $output['code'] = 210;
                        }
            
                    }
            

    case 'remove': //刪除購物車內容
                $index = array_search($sid, array_column($_SESSION['cart'], 'sid'));
                if($index===false){
                    // 原本沒有此項目
                    $output['code'] = 300;
                } else {
                    // 有該項目,將該項目刪除
                    array_splice($_SESSION['cart'], $index, 1);
                    $output['code'] = 310;
                }
        break;
    case 'empty':
        $_SESSION['cart'] = [];
        break;

}

$output['cart'] = $_SESSION['cart']; //在傳陣列裡加上陣列
echo json_encode($output, JSON_UNESCAPED_UNICODE);

?>
