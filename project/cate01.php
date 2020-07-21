<?php
require __DIR__. '/0714_connect.php';

$sql = "SELECT * FROM `categories`";
$rows = $pdo->query($sql)->fetchAll();
$cate =[];
foreach($rows as $r){
    // $r  每一次迴圈的值
        if($r['parent_sid']==0){
            $cate[] = $r;
        }
    }


    //第二層塞到第一層
    foreach($cate as $k=>$c){
        foreach($rows as $r){
           if($r['parent_sid']==$c['sid']){
            // 如果 $r 是  $c 的子層 ,把r塞進來
               $cate[$k]['children'][] = $r; //透過$cate變數,對應原本陣列
           }
            }
    }
?>



<?php include __DIR__. '/0714_html_head.php' ?>

<div class="container">

    <h2>Hello</h2>
    <pre><?php // print_r($rows) 印出陣列全部 ?></pre>
    <pre><?php print_r($cate) #  印出陣列第一層 ?></pre>

    <!-- 呈現畫面Array
Array
(
    [0] => Array
        (
            [sid] => 1
            [name] => 程式設計
            [parent_sid] => 0
            [children] => Array
                (
                    [0] => Array
                        (
                            [sid] => 4
                            [name] => PHP
                            [parent_sid] => 1
                        )

                    [1] => Array
                        (
                            [sid] => 5
                            [name] => JavaScript
                            [parent_sid] => 1
                        )

                    [2] => Array
                        (
                            [sid] => 10
                            [name] => C++
                            [parent_sid] => 1
                        )

                )

        )

    [1] => Array
        (
            [sid] => 2
            [name] => 繪圖軟體
            [parent_sid] => 0
            [children] => Array
                (
                    [0] => Array
                        (
                            [sid] => 7
                            [name] => PS
                            [parent_sid] => 2
                        )

                    [1] => Array
                        (
                            [sid] => 16
                            [name] => 椅拉
                            [parent_sid] => 2
                        )

                )

        )

    [2] => Array
        (
            [sid] => 3
            [name] => 網際網路應用
            [parent_sid] => 0
            [children] => Array
                (
                    [0] => Array
                        (
                            [sid] => 8
                            [name] => Chrome
                            [parent_sid] => 3
                        )

                    [1] => Array
                        (
                            [sid] => 9
                            [name] => 騙錢的
                            [parent_sid] => 3
                        )

                )

        )

) -->

</div>
<?php include __DIR__. '/0714_scripts.php' ?>
<script>
let cates = <?= json_encode($cate, JSON_UNESCAPED_UNICODE); ?>;
</script>
<?php require __DIR__. '/0714_html_foot.php' ?>