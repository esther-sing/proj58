<?php
if(! isset($_SESSION)){
    session_start();// 啟動 session 功能
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
        <?php
        if(! isset($_SESSION['my'])){
            $_SESSION['my'] = 1;
        }else{
            $_SESSION['my'] ++;
        }
        echo $_SESSION['my'];
        ?>
    </div>
</body>
</html>