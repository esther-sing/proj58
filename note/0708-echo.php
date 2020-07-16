<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo 'abc<br>';
    echo 'def<br>';

    echo __DIR__.'<br>';
    echo __FILE__.'<br>';

    echo __LINE__.'<br>';//在第幾行

    define('MY_CONST','12.456'); //常數設定用字串、要大寫
    echo MY_CONST.'<br>';//呼叫時不用字串



?>
</body>
</html>