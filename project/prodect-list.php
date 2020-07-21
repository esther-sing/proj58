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

echo json_encode($rows, JSON_UNESCAPED_UNICODE);





exit;

?>
?>

<?php include __DIR__. '/0714_html_head.php' ?>
<?php include __DIR__. '/0714_navebar.php' ?>
<div class="container">

    <h2>Hello</h2>

</div>
<?php include __DIR__. '/0714_scripts.php' ?>
<?php require __DIR__. '/0714_html_foot.php' ?>