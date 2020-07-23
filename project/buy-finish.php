<?php
require __DIR__. '/0714_connect.php';
$pageName = 'buy-start';
if(empty($_SESSION['cart']) or empty($_SESSION['member'])){
    header('Location: product-list.php');
    exit;
}

// *** 抓到當下的價格資訊 *** begin
$sids = array_column($_SESSION['cart'], 'sid');
$sql = "SELECT * FROM `products` WHERE `sid` IN (". implode(',', $sids). ")";
$productData = [];
$stmt = $pdo->query($sql);
while($r = $stmt->fetch()){
    $productData[$r['sid']] = $r;
}
$totalPrice = 0;
foreach ($_SESSION['cart'] as $k=>$v){
    $_SESSION['cart'][$k]['price'] = $productData[$v['sid']]['price'];

    $totalPrice += $_SESSION['cart'][$k]['price'] * $v['quantity'];
}
// *** 抓到當下的價格資訊 *** end

// 寫入sql資料庫裡的  orders
$sql = "INSERT INTO `orders`(`member_sid`, `amount`, `order_date`) VALUES (?, ? , NOW())";
$stmt = $pdo->prepare($sql);
$stmt->execute([ $_SESSION['member']['id'], $totalPrice]);

$order_sid = $pdo->lastInsertId();
echo "\$order_sid: $order_sid"; //回傳訂單編號
exit;

