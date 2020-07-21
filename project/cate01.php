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
    <pre><?php // print_r($rows) ?></pre>
    <pre><?php print_r($cate) #  印出陣列第一層 ?></pre>

</div>
<?php include __DIR__. '/0714_scripts.php' ?>
<?php require __DIR__. '/0714_html_foot.php' ?>