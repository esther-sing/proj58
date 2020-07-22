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
                    <th scope="col">封面</th>
                    <th scope="col">書名</th>
                    <th scope="col">單價</th>
                    <th scope="col">數量</th>
                    <th scope="col">小計</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($_SESSION['cart'] as $i): ?>
                <tr class="p-item"
                    data-sid="<?= $i['sid'] ?>"
                    data-price="<?= $i['price'] ?>"
                    data-quantity="<?= $i['quantity'] ?>"
                >
                    <td>
                        <a href=""><i class="fas fa-trash-alt"></i></a>
                    </td>
                    <td>
                        <img src="imgs/small/<?= $i['book_id'] ?>.jpg">
                    </td>
                    <td><?= $i['bookname'] ?></td>
                    <td class="price"></td>
                    <td class="quantity"></td>
                    <td class="sub-total"></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="alert alert-primary" role="alert">
                總計: <span></span>
            </div>
        </div>
    </div>




</div>
<?php include __DIR__. '/0714_scripts.php' ?>
<script>
    const dallorCommas = function(n){
        return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    };

    $p_item = $('.p-item');
    $p_item.each(function(){
        const sid = $(this).attr('data-sid');
        const price = $(this).attr('data-price');
        const quantity = $(this).attr('data-quantity');

        $(this).find('.price').text(price);
    })
</script>
<?php require __DIR__. '/0714_html_foot.php' ?>




