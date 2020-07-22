<?php
require __DIR__. '/0714_connect.php';
$pageName = 'cart';
?>
<?php include __DIR__. '/0714_html_head.php' ?>
<?php include __DIR__. '/0714_navebar.php' ?>
<div class="container">
    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col"><i class="fas fa-trash-alt"></i></th>
                    <th scope="col">書名</th>
                    <th scope="col">封面</th>
                    <th scope="col">單價</th>
                    <th scope="col">數量</th>
                    <th scope="col">小計</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $total = 0;
                foreach($_SESSION['cart'] as $i):
                    $total += $i['price'] * $i['quantity'];
                    ?>
                <tr>
                    <td>
                        <a href=""><i class="fas fa-trash-alt"></i></a>
                    </td>
                    <td>
                        <img src="imgs/small/<?= $i['book_id'] ?>.jpg">
                    </td>
                    <td><?= $i['bookname'] ?></td>
                    <td><?= $i['price'] ?></td>
                    <td><?= $i['quantity'] ?></td>
                    <td><?= $i['price'] * $i['quantity'] ?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="alert alert-primary" role="alert">
                總計: <span><?= $total ?></span>
            </div>
        </div>
    </div>




</div>
<?php include __DIR__. '/0714_scripts.php' ?>
<?php require __DIR__. '/0714_html_foot.php' ?>




