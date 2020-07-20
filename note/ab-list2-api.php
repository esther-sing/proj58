<?php
require __DIR__. '/0714_connect.php';
$perPage = 5; // 每頁有幾筆
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; // 用戶要看的頁數

$output = [
    'perPage'=> $perPage,
    'page'=> $page,
    'totalRows' => 0,
    'totalPages' => 0,
    'rows' => [], // 該頁的資料
    'pageBtns' => [],
];

$t_sql = "SELECT COUNT(sid) FROM `address_book`";

$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
$stmt = null;
$pageBtns = [];
if($totalRows > 0) {
    $totalPages = ceil($totalRows / $perPage);


    if ($page < 1) $page = 1;
    if ($page > $totalPages) $page=$totalPages;


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

    $output['page'] = $page;
    $output['totalRows'] = $totalRows;
    $output['totalPages'] = $totalPages;
    $output['rows'] = $stmt->fetchAll();
    $output['pageBtns'] = $pageBtns;
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);