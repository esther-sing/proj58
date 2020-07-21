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
?>

<?php include __DIR__. '/0714_html_head.php' ?>

<div class="container">

    <h2>Hello</h2>
    <pre><?php // print_r($rows) 印出陣列全部 ?></pre>
    <pre><?php print_r($cate) #  印出陣列第一層 ?></pre>

    <!-- 呈現畫面Array
(
    [0] => Array
        (
            [sid] => 1
            [name] => 程式設計
            [parent_sid] => 0
        )

    [1] => Array
        (
            [sid] => 2
            [name] => 繪圖軟體
            [parent_sid] => 0
        )

    [2] => Array
        (
            [sid] => 3
            [name] => 網際網路應用
            [parent_sid] => 0
        )

) -->

</div>
<?php include __DIR__. '/0714_scripts.php' ?>
<?php require __DIR__. '/0714_html_foot.php' ?>