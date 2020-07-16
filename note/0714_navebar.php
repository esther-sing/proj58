<?php
if(empty($pageName)){
    $pageName = '';
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <!-- <li class="nav-item active"> -->
                <li class="nav-item <?= $pageName=='ab-home' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= WEB_ROOT ?>/0715-address-book.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <!-- <li class="nav-item"> -->
                <li class="nav-item <?= $pageName=='ab-list' ? 'active' : '' ?>">

                    <a class="nav-link" href="<?= WEB_ROOT ?>/0715-address-book-list.php">資料列表</a>
                </li>
                <!-- <li class="nav-item"> -->
                <li class="nav-item <?= $pageName=='ab-insert' ? 'active' : '' ?>">
                 <a class="nav-link" href="<?= WEB_ROOT ?>/0715-abinsert.php">新增資料</a>
              </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    ul.navbar-nav > .nav-item.active {
        /* background-color: #9fcdff; */
        /* border-radius: 10px; */
        border-bottom:solid lightpink;
    }
</style>