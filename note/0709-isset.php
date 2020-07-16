<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Hello, <?= isset($_GET['name']) ? $_GET['name'] : 'Nobody' ?>
    <br>
    <?= isset($_GET['age']) ? $_GET['age'] : '' ?>

    <!--http://localhost/proj58/0709-get.php?name=Esther&age=25 -->
    <!--urlencoded格式,可直接在網址上給值 -->

</body>
</html>