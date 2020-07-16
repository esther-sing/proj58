<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre>
        GET:
        <?php print_r($_GET) ?>
        <!--form表單的 method=get時會抓到輸入的值  -->


        POST:
        <?php print_r($_POST) ?>
        <!--form表單的 method=post時會抓到輸入的值  -->

        REQUEST:
        <?php print_r($_REQUEST) ?>
        <!--form表單的 method=get或post時都會抓到輸入的值,但不建議使用  -->


    </pre>


        <form action="" method="get">
            <!-- action=""  表單要送到的位置 -->
            <label for="account">帳號</label>
            <input type="text" id="account" name="account"><br>
        <!-- 要加name才會送出 -->
            <label for="password">密碼</label>
            <input type="password" id="password" name="password"><br>
            <input type="checkbox" id="my_cb" name="my_cb" value="好">
            <label for="my_cb">同意....</label>
            <br>
            <input type="submit" value="登入">
            <!-- submit預設字是提交 -->
            <br>
        </form>
        
    </form>
</body>
</html>