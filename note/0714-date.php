<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // 設定時區
    date_default_timezone_set('Asia/Taipei');
    
    echo time() . '<br>'; //當下時間
    // 2020-07-14 11:31:46

    echo date("Y-m-d H:i:s") . '<br>';
    //1594697592 從1970到現在的秒數

    echo date("Y-m-d H:i:s N w l", time() + 180 * 24 * 60 * 60) . '<br>';
    //time() + 180 * 24 * 60 * 60半年後
    //2021-01-10 11:31:46 7 0
    //N:星期天是7,星期六是6
    //w:星期天是0,星期六是6
    //l:直接秀英文

    echo date("Y-m-d H:i:s ", strtotime('2020/8/21')). '<br>';
    //2020-08-21 00:00:00


    ?>
</body>

</html>