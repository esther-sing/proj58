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
<style>
    .bookname{
        overflow : hidden;
        text-overflow : ellipsis;
        white-space : nowrap;
    }
</style>

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
                     <?php for($i=1; $i<=$totalPages; $i++): ?>  
                        <li class="page-item <?= $page==$i ? 'active' : '' ?>">
                            <a class="page-link" href="?page=<?=$i?>"><?=$i?></a>
                        </li>
                        <?php endfor?>    
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
                    <p class="bookname"><?= $r['bookname'] ?></p>
                        <p class="card-text"><i class="fas fa-at"></i> <?= $r['author'] ?></p>
                        <p class="card-text"><i class="fas fa-dollar-sign"></i> <?= $r['price'] ?></p>
                        <p>
                            <select type="number" class="form-control" style="display: inline-block; width: auto;">
                                <?php for($i=1; $i<=20; $i++): ?>
                                <option value="<?=$i?>"><?=$i?></option>
                                <?php endfor; ?>
                            </select>
                            <button type="button" class="btn btn-primary">敗</button>
                        </p>
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