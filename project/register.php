<?php
require __DIR__. '/0714_connect.php';
$pageName = 'ab-insert';
?>
<?php include __DIR__. '/0714_html_head.php' ?>
<?php include __DIR__. '/0714_navebar.php' ?>
<div class="container">
    <style>
        .form-group small {
            color: red;
        }
    </style>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
            <div id="info-bar" class="alert alert-success" role="alert" style="display: none"></div>
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">註冊</h5>
                    <form name="form1" method="post" onsubmit="return formCheck()" novalidate>
                        <div class="form-group">
                            <label for="email">Email 帳號</label>
                            <input type="email" class="form-control" id="email" name="email">
                            <small id="emailHelp" class="form-text"></small>
                        </div>
                        <div class="form-group">
                            <label for="password">密碼</label>
                            <input type="password" class="form-control" id="password"
                                   name="password">
                            <small id="passwordHelp" class="form-text"></small>
                        </div>
                        <div class="form-group">
                            <label for="nickname">暱稱</label>
                            <input type="text" class="form-control" id="nickname"
                                   name="nickname">
                            <small id="nicknameHelp" class="form-text"></small>
                        </div>

                        <button type="submit" class="btn btn-primary">註冊</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include __DIR__. '/0714_scripts.php' ?>
<script>
    const email = $('#email'),
        nickname = $('#nickname'),
        password = $('#password'),
        info_bar = $('#info-bar');
    const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

    function formCheck(){
        email.next().text('');
        password.next().text('');
        nickname.next().text('');
        email.css('border-color', '#CCCCCC');
        password.css('border-color', '#CCCCCC');
        nickname.css('border-color', '#CCCCCC');
        // TODO: 檢查欄位
        let isPass = true;

        if(! email_re.test(email.val())){
            isPass = false;
            email.css('border-color', 'red');
            email.next().text('請填寫正確的 email 格式');
        }

        if(password.val().length <6){
            isPass = false;
            password.css('border-color', 'red');
            password.next().text('密碼長度太短');
        }

        if(nickname.val().trim().length <2){
            isPass = false;
            nickname.css('border-color', 'red');
            nickname.next().text('暱稱長度太短');
        }

        if(isPass){
            $.post('register-api.php', $(document.form1).serialize(), function(data){
                console.log(data);
                if(data.success){
                    info_bar.removeClass('alert-danger')
                        .addClass('alert-success')
                        .html('註冊成功');
                    setTimeout(function(){
                        location.href = 'login.php';
                    }, 3000);
                } else {
                    info_bar.removeClass('alert-success')
                        .addClass('alert-danger')
                        .html(data.error || '註冊失敗');
                }
                info_bar.slideDown();

                setTimeout(function(){
                    info_bar.slideUp();
                }, 2000);

            }, 'json');
        }

        return false;
    }
</script>
<?php require __DIR__. '/0714_html_foot.php' ?>




