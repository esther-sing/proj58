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

    <div class="row d-flex justify-content-center">
    <!-- 置中 -->
        <div class="col-lg-6">

            <div id="info-bar" class="alert alert-success" role="alert" style="display: none">dsrfghrf</div>
            <!-- 提示bar -->

            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">登入</h5>
                    <form name="form1" method="post" onsubmit="return formCheck()" novalidate>
                        <!-- AJAX  onsubmit="return formCheck()"-->
                        <!-- novalidate 不驗證 -->
                        <div class="form-group">
                            <label for="email">email帳號</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            <!-- required 設為必填欄位 -->
                            <small id="nameHelp" class="form-text"></small>
                        </div>
                        <div class="form-group">
                            <label for="password">密碼</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <small id="passwordHelp" class="form-text"></small>
                        </div>
                        <div class="form-group">
                           
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
    password = $('#password'),
        info_bar = $('#info-bar'); // 提示ber


    // 抓到正確格式  ^開頭  $結尾
    const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    



    function formCheck() {

        //正確時沒有錯誤提醒
        email.next().text('');
        password.next().text('');
        email.css('border-color', '#CCCCCC');
        password.css('border-color', '#CCCCCC');

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
        if(password.val().length <6) {
            isPass = false;
            password.css('border-color', 'red');
            password.next().text('密碼長度不能小於6個字');
        }


        // isPass = true時回傳表單
        // post()從伺服器載入
        // serialize()載入  
        if (isPass) {
            $.post('login-api.php', $(document.form1).serialize(), function(data) {
                console.log(data);


                if (data.success) {
                    info_bar.removeClass('alert-danger')
                        .addClass('alert-success')
                        .html('登入成功');
                } else {
                    info_bar.removeClass('alert-success')
                        .addClass('alert-danger')
                        .html(data.error || '帳號或密碼錯誤');
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