<?php
require __DIR__. '/0714_connect.php';
$pageName = 'product-list';

$perPage = 4;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;


$t_sql = "SELECT COUNT(1) FROM `products`";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
$totalPages = ceil($totalRows/$perPage);

if($page<1){
    header('Location: product-list.php');
    exit;
}
if($page>$totalPages){
    header('Location: product-list.php?page='. $totalPages);
    exit;
}

$sql = sprintf("SELECT * FROM `products` LIMIT %s, %s", ($page-1)*$perPage, $perPage);

$rows = $pdo->query($sql)->fetchAll();

// echo json_encode($rows, JSON_UNESCAPED_UNICODE);





// exit;

?>
?>

<?php include __DIR__. '/0714_html_head.php' ?>
<?php include __DIR__. '/0714_navebar.php' ?>
<div class="container">

<div class="row">
    <div class="col-lg-3">

    </div>
    <div class="col-lg-9">
        <div class="row">
            <div class="col">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row">
            <?php foreach($rows as $r): ?>
            <div class="col-lg-3">
                <div class="card">
                    <img src="imgs/small/<?= $r['book_id'] ?>.jpg" class="card-img-top" alt="">
                    <!-- 抓到圖片 -->
                    
                    <div class="card-body">
                        <h5 class="card-title"><?= $r['bookname'] ?></h5> 
                        <p class="card-text"><?= $r['author'] ?></p>
                        <p class="card-text"><?= $r['price'] ?></p>
                        <!--複製bootstrap格式來修改  $r [' 資料庫欄位名稱 '] -->
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>

</div>
<?php include __DIR__. '/0714_scripts.php' ?>
<?php require __DIR__. '/0714_html_foot.php' ?>