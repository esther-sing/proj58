<?php
$bear = isset($_GET['bear'])? intval($_GET['bear']) : 0;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="?bear=1">bear 1</a>
    <br>
    <a href="?bear=2">bear 2</a>

    <?php if ($bear ==1 ) { ?>
        <h2>bear 1</h2>
        <img src="../img/we-bare-bears.jpg" alt="">
   <?php } ?>

   <?php if ($bear ==2 ): ?>
        <h2>bear 1</h2>
        <img src="../img/bear3.jpg" alt="">
    <?php endif ?>

</body>
</html>