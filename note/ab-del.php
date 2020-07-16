<?php
 require __DIR__. '/0714_connect.php';

  //抓到sid
 $sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

//刪除sid
 if(! empty($sid)) {
     $sql = "DELETE FROM `address_book` WHERE `sid`=$sid";
     $pdo->query($sql);
 }
 
 
 // echo $_SERVER['HTTP_REFERER'];
if(empty($_SERVER['HTTP_REFERER'])){
    header('Location: ab-list.php');
} else {
    header('Location: '. $_SERVER['HTTP_REFERER']);
}
 
-header('Location: '. $_SERVER['HTTP_REFERER']);