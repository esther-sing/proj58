<?php
require __DIR__ . '/0714_connect.php';
$pageName = 'ab-list2';
$pageTitle = '2-ajax';

?>
<?php include __DIR__ . '/0714_html_head.php' ?>
<style>
    ul.pagination {
        font-size: 1.2rem;
    }
</style>
<?php include __DIR__ . '/0714_navebar.php' ?>
<div class="container">
    <div class="row">
        <div class="col">

            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <!--  <li class="page-item ">
                        <a class="page-link" href="">
                    </li>   -->
                </ul>
            </nav>
        </div>
    </div>


    <div class="row">
        <div class="col">

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>

                        <th>#</th>
                        <th>姓名</th>
                        <th>email</th>
                        <th>mobile</th>
                        <th>birthday</th>
                        <th>address</th>

                    </tr>
                </thead>
                <tbody class="tbody">

                    <!-- <tr>

                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>



                    </tr> -->

                </tbody>
            </table>
            <input type="text">
            <div id="info"></div>
        </div>
    </div>


</div>
<?php include __DIR__ . '/0714_scripts.php' ?>
<script>
    const pagination = $('.pagination');
    const tbody = $('.tbody');


    //頁碼按鈕
    function pageBtnTpl(obj) {
        // obj.i // 頁碼
        // obj.isActive // 當前這頁要做反白
        return `<li class="page-item ${obj.isActive ? 'active' : ''}">
                    <a class="page-link" href="#${obj.i}">${obj.i}</a>
                </li>`;
    }

    //抓到的資料
    function itemTpl(obj) {
        let s = obj.address.replace('/</gm', '&lt');
        s = s.replace('/>/gm', '&gt');
        //   '/>/gm', '&gt'  跳脫html
        return `<tr>

                    <td>${obj.sid}</td>
                    <td>${obj.name}</td>
                    <td>${obj.email}</td>
                    <td>${obj.mobile}</td>
                    <td>${obj.birthday}</td>
                    <td>${s}</td>

                    </tr>`

    }


    function handleHash() {
        let h = location.hash.slice(1);
        h = parseInt(h) || 1;
        info.innerHTML = h;

        $.get('ab-list2-api.php', {
            page: h
        }, function(data) {
            console.log(data);
            pagination.empty();
            for (let s in data.pageBtns) {
                pagination.append(pageBtnTpl({
                    i: data.pageBtns[s],
                    isActive: data.pageBtns[s] == data.page
                }))
            }
            tbody.empty();//清空
            for(let s in data.rows){
                tbody.append(itemTpl(data.rows[s]));
            }

        }, 'json');
        //抓到資料顯示在console
    }


    window.addEventListener('hashchange', handleHash);
    handleHash();

    //在網址列打#+隨意的數字,在input欄位輸入數字，頁面不會重新刷新
    // NaN ->  Not a Number
</script>
<?php require __DIR__ . '/0714_html_foot.php' ?>