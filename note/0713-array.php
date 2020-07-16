<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <pre>
            <?php
            $p = [
                'name' => '彼得',
                'age' => 27,
                'gender' => 'male',
            ];

            $a = $p;  // 複製新的陣列
            $b = &$p; // 設定參照，不會複製新陣列

            $p['age'] = 66;

            print_r($p);
            print_r($a);
            print_r($b);


            # 顯示畫面
            // Array
            // (
            //     [name] => 彼得
            //     [age] => 66
            //     [gender] => male
            // )
            // Array
            // (
            //     [name] => 彼得
            //     [age] => 27
            //     [gender] => male
            // )
            // Array
            // (
            //     [name] => 彼得
            //     [age] => 66
            //     [gender] => male
            // )
                 

            
            ?>
        </pre>
    </div>
</body>
</html>