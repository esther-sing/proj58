<?php
require __DIR__ . '/0714_connect.php';

$pageName = 'ab-list';
$pageTitle = '通訊錄列表';
$perPage = 5; // 每頁有幾筆
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; // 用戶要看的頁數


$t_sql = "SELECT COUNT(sid) FROM `address_book`"; //抓到sid總共有幾筆


//$t_stmt = $pdo->query($t_sql);
//$totalRows = $t_stmt->fetch(PDO::FETCH_NUM)[0];
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0]; //抓到總共有幾筆

// $totalPages = ceil($totalRows / $perPage);  //總共幾頁ceil()取天花板整數
// echo "<div>$totalRows,$totalPages </div>";


// 如果沒有資料時的設定
$stmt = null;
if ($totalRows > 0) {
    $totalPages = ceil($totalRows / $perPage);







    // 如果沒有資料時的設定
    if ($page < 1) {
        header('Location: ab-list.php');
        exit; //結束程式  也可用die();
        // $page<1時 回到Location那頁,後面程式都不執行
    }
    if ($page > $totalPages) {
        header("Location: ab-list.php?page=$totalPages");
        exit; // die();
    }






    // 如果沒有資料時的設定
    $sql = sprintf("SELECT * FROM address_book ORDER BY`sid` DESC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
    // ORDER BY`sid` DESC 降冪排列
    $stmt = $pdo->query($sql);
}


?>

<?php include __DIR__ . '/0714_html_head.php' ?>

<style>
    ul.pagination {
        font-size: 1.5rem;

    }
</style>
<?php include __DIR__ . '/0714_navebar.php' ?>
<div class="container">

    <div class="row">
        <div class="col">

            <?php if (!empty($stmt)) : ?>
                <!-- 如果沒有資料時的設定 -->

                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item  <?= $page == 1 ? 'disabled' : '' ?>">
                            <!-- disabled 不能按 -->
                            <a class="page-link" href="?page=<?= $page - 1 ?>">
                                <!-- ?page  ?表示放在同一層的檔案 -->
                                <i class="fas fa-arrow-circle-left"></i>
                                <!--先在head的php檔 link fontawesome ,複製 fontawesome網站上的連結 fas fa-arrow-circle-left -->
                            </a>
                        </li>
                        <?php for ($i = 1; $i <= $totalPages; $i++) :  ?>
                            <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                                <!--active  bootstrap語法,底色變藍其他底色變白 -->
                                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>
                        <li class="page-item  <?= $page == $totalPages ? 'disabled' : '' ?>">
                            <a class="page-link" href="?page=<?= $page + 1 ?>">
                                <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>


                <!-- 如果沒有資料時的設定 -->
            <?php else : ?>
                <div class="alert alert-danger" role="alert">
                    沒有資料
                </div>
            <?php endif; ?>
            <!-- 如果沒有資料時的設定 -->
        </div>
    </div>



    <div class="row">
        <div class="col">

            <?php if (!empty($stmt)) : ?>
                <!-- 如果沒有資料時的設定 -->
                <table class="table table-striped">
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
                        <?php while ($r = $stmt->fetch()) : ?>
                            <tr>
                                <td>
                                    <a href="javascript: delete_it(<?= $r['sid'] ?>)">
                                    <!-- 刪除前確認 -->

                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                                <td><?= $r['sid'] ?></td>
                                <td><?= $r['name'] ?></td>
                                <td><?= $r['email'] ?></td>
                                <td><?= $r['mobile'] ?></td>
                                <td><?= $r['birthday'] ?></td>
                                <td><?= htmlentities($r['address']) ?></td>
                                <!-- 輸入htmlentities時會顯示htmlentities -->
                                <td>-->
                                    <?//= strip_tags($r['address']) ?>
                                </td>
                                <!-- 輸入htmlentities時會去除掉htmlentities -->

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
            <!-- 如果沒有資料時的設定 -->
        </div>
    </div>





</div>
<?php include __DIR__ . '/0714_scripts.php' ?>
<script>

// 刪除前確認
    function delete_it(sid){
        if(confirm(`確定要刪除編號為 ${sid} 的資料嗎?`)){
            location.href = 'ab-del.php?sid=' + sid;
        }
    }
</script>
<?php require __DIR__ . '/0714_html_foot.php' ?>