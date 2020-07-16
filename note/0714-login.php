<?php
session_start();

$users = [
    'bear' => [
        'nickname' => '熊熊',
        'pw' => '12345'
    ],
    'der' => [
        'nickname' => '小明',
        'pw' => 'pass'
    ],
];

//坢頓是否輸入帳號密碼
if (isset($_POST['account']) and isset($_POST['password'])) {


    // 如果帳號是正確的 ,!empty()非空值
    if (!empty($users[$_POST['account']])) {
        // 如果密碼是正確的
        if ($users[$_POST['account']]['pw'] == $_POST['password']) {
            $_SESSION['user'] = [
                'account' => $_POST['account'],
                'nickname' => $users[$_POST['account']]['nickname']
            ];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<div>
    <?php if(isset($_SESSION['user'])): ?>
        <?= $_SESSION['user']['nickname'] ?> 泥好<br>
        <a href="0714-logout.php">登出</a>
    <?php else: ?>
        <form action="" method="post">
            <label for="account">帳號</label>
            <input type="text" id="account" name="account"><br>
            <label for="password">密碼</label>
            <input type="password" id="password" name="password"><br>
            <button type="submit">登入</button>
            <br>
        </form>
    <?php endif; ?>

    </div>



</body>

</html>