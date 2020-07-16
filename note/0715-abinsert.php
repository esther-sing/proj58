<?php
require __DIR__ . '/0714_connect.php';
$pageName = 'ab-insert';
?>


<?php include __DIR__ . '/0714_html_head.php' ?>
<?php include __DIR__ . '/0714_navebar.php' ?>
<div class="container">
    <style>
        .form-group small {
            color: red;
        }
    </style>

    <div class="row">
        <div class="col-lg-6">

            <div id="info-bar" class="alert alert-success" role="alert" style="display: none">dsrfghrf</div>
            <!-- 提示bar -->

            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">新增資料</h5>
                    <form name="form1" method="post" onsubmit="return formCheck()" novalidate>
                        <!-- AJAX  onsubmit="return formCheck()"-->
                        <!-- novalidate 不驗證 -->
                        <div class="form-group">
                            <label for="name">姓名</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            <!-- required 設為必填欄位 -->
                            <small id="nameHelp" class="form-text"></small>
                        </div>
                        <div class="form-group">
                            <label for="email">電郵</label>
                            <input type="email" class="form-control" id="email" name="email">
                            <small id="emailHelp" class="form-text"></small>
                        </div>
                        <div class="form-group">
                            <label for="mobile">手機</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" pattern="09\d{2}-?\d{3}-?\d{3}" placeholder="09XX-XXX-XXX">
                            <!-- pattern="09\d{2}-?\d{3}-?\d{3}" -->
                            <!-- placeholder 預設 -->
                            <small id="mobileHelp" class="form-text"></small>
                        </div>
                        <div class="form-group">
                            <label for="birthday">生日</label>
                            <input type="date" class="form-control" id="birthday" name="birthday">
                            <small id="birthdayHelp" class="form-text"></small>
                        </div>
                        <div class="form-group">
                            <label for="address">地址</label>
                            <textarea class="form-control" id="address" name="address" cols="30" rows="3"></textarea>
                            <small id="addressHelp" class="form-text"></small>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include __DIR__ . '/0714_scripts.php' ?>
<script>
    const email = $('#email'),
        mobile = $('#mobile'),
        info_bar = $('#info-bar'); // 提示ber


    // 抓到正確格式  ^開頭  $結尾
    const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;



    function formCheck() {

        //正確時沒有錯誤提醒
        email.next().text('');
        mobile.next().text('');
        email.css('border-color', '#CCCCCC');
        mobile.css('border-color', '#CCCCCC');

        // TODO: 檢查欄位

        let isPass = true;

        //  如果email格式不正確
        if (!email_re.test(email.val())) {
            isPass = false;
            email.css('border-color', 'red');
            // email.next() : email下一個元素small 給它text
            email.next().text('請填寫正確的 email 格式');
        }


        //  如果mobile格式不正確
        if (!mobile_re.test(mobile.val())) {
            isPass = false;
            mobile.css('border-color', 'red');
            mobile.next().text('請填寫正確的手機格式');
        }


        // isPass = true時回傳表單
        // post()從伺服器載入
        // serialize()載入  
        if (isPass) {
            $.post('0715-ab-insert-api.php', $(document.form1).serialize(), function(data) {
                console.log(data);


                if (data.success) {
                    info_bar.removeClass('alert-danger')
                        .addClass('alert-success')
                        .html('新增成功');
                } else {
                    info_bar.removeClass('alert-success')
                        .addClass('alert-danger')
                        .html(data.error || '新增失敗');
                }
                info_bar.slideDown();

                setTimeout(function() {
                    info_bar.slideUp();
                }, 3000);
                //    設定時間

            }, 'json');

        }


        return false;
    }
</script>
<?php require __DIR__ . '/0714_html_foot.php' ?>