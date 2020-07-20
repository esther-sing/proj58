<?php
require __DIR__. '/0714_connect.php';
$pageName = 'ab-list';
$pageTitle = '通訊錄列表';
$perPage = 5; // 每頁有幾筆
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; // 用戶要看的頁數

$t_sql = "SELECT COUNT(sid) FROM `address_book`";
//$t_stmt = $pdo->query($t_sql);
//$totalRows = $t_stmt->fetch(PDO::FETCH_NUM)[0];

$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
$stmt = null;
$pageBtns = [];
if($totalRows > 0) {
    $totalPages = ceil($totalRows / $perPage);

    if ($page < 1) {
        header('Location: ab-list.php');
        exit; // die();
    }
    if ($page > $totalPages) {
        header("Location: ab-list.php?page=$totalPages");
        exit; // die();
    }


    $sql = sprintf("SELECT * FROM address_book ORDER BY `sid` DESC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
    $stmt = $pdo->query($sql);

    if($totalPages<=5){
        for($i=1; $i<=$totalPages; $i++){
            $pageBtns[] = $i;
        }
    } else {
        $tmpAr1 = [];
        for($i=$page-2; $i<=$totalPages; $i++){
            if($i>=1) {
                $tmpAr1[] = $i;  // array push
            }
            if(count($tmpAr1)>=5){
                break;
            }
        }
        $tmpAr2 = [];
        for($i=$page+2; $i>=1; $i--){
            if($i<=$totalPages) {
                array_unshift($tmpAr2, $i);
            }
            if(count($tmpAr2)>=5){
                break;
            }
        }
        $pageBtns = (count($tmpAr1) > count($tmpAr2)) ? $tmpAr1 : $tmpAr2;
    }
}

?>
<?php include __DIR__. '/0714_html_head.php' ?>
<style>
    ul.pagination {
        font-size: 1.2rem;
    }
</style>
<?php include __DIR__. '/0714_navebar.php' ?>
<div class="container">
    <div class="row">
        <div class="col">
            <?php if(!empty($stmt)): ?>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item <?= $page==1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page-1 ?>">
                            <i class="fas fa-arrow-circle-left"></i>
                        </a>
                    </li>
                    <?php foreach($pageBtns as $i):?>
                    <li class="page-item <?= $page==$i ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                    <?php endforeach; ?>
                    <li class="page-item <?= $page==$totalPages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page+1 ?>">
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <?php else: ?>
                <div class="alert alert-danger" role="alert">
                    沒有資料
                </div>
            <?php endif; ?>
        </div>
    </div>


    <div class="row">
        <div class="col">
            <?php if(!empty($stmt)): ?>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th><i class="fas fa-trash-alt"></i></th>
                    <th>#</th>
                    <th>姓名</th>
                    <th>email</th>
                    <th>mobile</th>
                    <th>birthday</th>
                    <th>address</th>
                    <th><i class="fas fa-edit"></i></th>
                </tr>
                </thead>
                <tbody>
                <?php while($r = $stmt->fetch()): ?>
                <tr>
                    <td>
                        <a href="javascript: delete_it(<?= $r['sid'] ?>)">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                    <td><?= $r['sid'] ?></td>
                    <td><?= $r['name'] ?></td>
                    <td><?= $r['email'] ?></td>
                    <td><?= $r['mobile'] ?></td>
                    <td><?= $r['birthday'] ?></td>
                    <td><?= htmlentities($r['address']) ?></td>

<!--                    <td>--><?//= strip_tags($r['address']) ?><!--</td>-->
                    <td>
                        <a href="ab-edit.php?sid=<?= $r['sid'] ?>">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>

                </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
            <?php endif; ?>
        </div>
    </div>


</div>
<?php include __DIR__. '/0714_scripts.php' ?>
<script>
    function delete_it(sid) {
        if(confirm(`確定要刪除編號為 ${sid} 的資料嗎?`)){
            location.href = 'ab-del.php?sid=' + sid;
        }
    }


</script>
<?php require __DIR__. '/0714_html_foot.php' ?>




