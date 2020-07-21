<?php
define('WEB_ROOT', '/proj58/project');
$data1 = [
    [
        'sid' => 2,
        'sport' => '游泳'
    ], [
        'sid' => 6,
        'sport' => '跑步'
    ], [
        'sid' => 8,
        'sport' => '爬山'
    ]
];
$data2 = [
    'N' => '不知道',
    'F' => '女',
    'M' => '男',
];

?>







<?php include __DIR__. '/0714_html_head.php' ?>
<?php include __DIR__. '/0714_navebar.php' ?>

<div class="container">

    <pre>
        <?php print_r($_POST) ?>
    </pre>
    <form action="" method="post">

    <?php foreach ($data1 as $v): ?>
            <!--  name用陣列呈現-->
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="sport<?= $v['sid'] ?>" name="hobby[]" value="<?= $v['sid'] ?>">
            <label class="form-check-label" for="sport<?= $v['sid'] ?>">
            <?= $v['sport'] ?>
            </label>
        </div>
        <?php endforeach; ?>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Example select: Combobox</label>
            <select class="form-control" id="exampleFormControlSelect1" name="Combobox1">
                <option value="您">您1</option>
                <option value="好" selected>好2</option>
                <option value="嗎">嗎3</option>
            </select>
        </div>

      
        <div class="form-group">
            <!--  name下一樣才是同一個group ,不能多選   /name不一樣可以多選-->
            <label for="">性別</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="gender1" value="N">
                <label class="form-check-label" for="gender1">不知道</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="gender2" value="F" checked>
                <label class="form-check-label" for="gender2">女</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="gender3" value="M">
                <label class="form-check-label" for="gender3">男</label>
            </div>
        </div>
       

        <br>
        <button type="submit" class="btn btn-primary">Submit</button>



    </form>

</div>






<?php include __DIR__. '/0714_scripts.php' ?>
<?php require __DIR__. '/0714_html_foot.php' ?>