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
            
        </div>
    </div>


</div>
<?php include __DIR__. '/0714_scripts.php' ?>
<script>
    function delete_it(sid) {
        if(confirm(`確定要刪除編號為 ${sid} 的資料嗎?`)){
            location.href = 'ab-del.php?sid=' + sid;
        }
    }


</script>
<?php require __DIR__. '/0714_html_foot.php' ?>




