<?php
//判斷式 如果是就給值mycookie，不是就給0  intval整數
$mycookie = isset($_COOKIE['mycookie']) ? intval($_COOKIE['mycookie']) : 0;
$mycookie++;
// 設定在 HTTP 檔頭, 要等到 response 後才會生效
setcookie('mycookie', $mycookie);

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
        <?php
        // 讀取 cookie, 是從 request 過來的 HTTP 檔頭
        if (isset($_COOKIE['mycookie'])) {
            echo $_COOKIE['mycookie'];
        }
        ?>
    </div>
</body>

</html>