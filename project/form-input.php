<?php include __DIR__. '/0714_html_head.php' ?>
<?php include __DIR__. '/0714_navebar.php' ?>

<div class="container">

    <pre>
        <?php print_r($_POST) ?>
    </pre>
    <form action="" method="post">

            <!--  name用陣列呈現-->
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="hobby[]" value="游泳">
            <label class="form-check-label" for="exampleCheck1">游泳</label>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck2" name="hobby[]" value="跑步">
            <label class="form-check-label" for="exampleCheck1">跑步</label>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck3" name="hobby[]" value="爬山">
            <label class="form-check-label" for="exampleCheck1">爬山</label>
        </div>

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
                <input class="form-check-input" type="radio" name="gender" id="gender2" value="F">
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