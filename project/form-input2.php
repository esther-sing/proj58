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
        <label for="">運動</label><br>
                <?php foreach ($data1 as $k=>$v): ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sport_2" id="sport_2_<?= $k+1 ?>" value="<?= $v['sid'] ?>">
                        <label class="form-check-label" for="sport_2_<?= $k+1 ?>"><?= $v['sport'] ?></label>
                    </div>
                <?php endforeach; ?>
        </div>
        

      
        <div class="form-group">
            <!--  name下一樣才是同一個group ,不能多選   /name不一樣可以多選-->
            <label for="exampleFormControlSelect1">運動 2</label>
                <select class="form-control" id="exampleFormControlSelect1" name="sport_3">
                    <option value="">--- 請選擇 ---</option>
                    <?php foreach ($data1 as $v): ?>
                        <option value="<?= $v['sid'] ?>"><?= $v['sport'] ?></option>
                    <?php endforeach; ?>
                </select>
        </div>
       

        <br>
        <button type="submit" class="btn btn-primary">Submit</button>



    </form>

</div>






<?php include __DIR__. '/0714_scripts.php' ?>
<?php require __DIR__. '/0714_html_foot.php' ?>