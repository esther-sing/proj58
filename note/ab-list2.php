<?php
require __DIR__. '/0714_connect.php';
$pageName = 'ab-list2';
$pageTitle = '2-ajax';

?>
<?php include __DIR__. '/0714_html_head.php' ?>
<style>
    ul.pagination {
        font-size: 1.2rem;
    }
</style>
<?php include __DIR__. '/0714_navebar.php' ?>
<div class="container">
    <div class="row">
        <div class="col">
            
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item ">
                        <a class="page-link" href="?page=">
                            <i class="fas fa-arrow-circle-left"></i>
                        </a>
                    </li>
                    
                    <li class="page-item ">
                        <a class="page-link" href="?page="></a>
                    </li>
                    
                    <li class="page-item">
                        <a class="page-link" href="?page=">
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            
                <div class="alert alert-danger" role="alert">
                    沒有資料
                </div>
            
        </div>
    </div>


    <div class="row">
        <div class="col">
            
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th><i class="fas fa-trash-alt"></i></th>
                    <th>#</th>
                    <th>姓名</th>
                    <th>email</th>
                    <th>mobile</th>
                    <th>birthday</th>
                    <th>address</th>
                    <th><i class="fas fa-edit"></i></th>
                </tr>
                </thead>
                <tbody>
                
                <tr>
                    <td>
                        <a href="javascript: delete_it()">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>


                    <td>
                        <a href="ab-edit.php?sid=">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>

                </tr>
                
                </tbody>
            </table>
            <input type="text">
            <div id="info"></div>
        </div>
    </div>


</div>
<?php include __DIR__. '/0714_scripts.php' ?>
<script>
     function handleHash(){
        let h = location.hash.slice(1);
        h = parseInt(h) || 1;
        info.innerHTML = h;
     }


    window.addEventListener('hashchange', handleHash);
    handleHash();

    //在網址列打#+隨意的數字,在input欄位輸入數字，頁面不會重新刷新
    // NaN ->  Not a Number

</script>
<?php require __DIR__. '/0714_html_foot.php' ?>




