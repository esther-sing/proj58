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
        $p = [
            'name' => '彼得',
            'age' => 27,
            'gender' => 'male',
            123
        ];
        foreach ($p as $k => $v){
            // p裡面的 k對應key  v對應值
            echo "$k =&gt; $v <br>";
                   #  &gt : html跳脫
                   // name => 彼得
                   //  age => 27
                   //  gender => male
                   //  0 => 123

            // echo htmlentities("$k => $v <br>");
            //用htmlentities   br 會印出來
            //name => 彼得 <br>age => 27 <br>gender => male <br>0 => 123 <br>
        }
        ?>
    </div>
</body>

</html>