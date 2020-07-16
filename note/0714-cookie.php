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
        echo $_COOKIE['mycookie'];
        ?>
    </div>
</body>
</html>