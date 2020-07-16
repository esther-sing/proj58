<?php
require __DIR__. '/0714_connect.php';

$output = [
    'success' => false,
    'code' => 0,
    'error' => '',
    'postData' => $_POST
];

if(empty($_POST['email']) or empty($_POST['password'])){
    $output['error'] = '資料不足';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

$sql = "SELECT * FROM members WHERE email=? AND password=SHA1(?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_POST['email'],
    $_POST['password'],
]);

$row = $stmt->fetch();

if(! empty($row)){
    $output['success'] = true;
    unset($row['password']); 
    $_SESSION['member'] = $row;
}
echo json_encode($output, JSON_UNESCAPED_UNICODE);
