<!-- カテゴリー別商品画面 プログラム部分 -->
<?php
    require('common.php');

    $pdo=connect();

    $calname=$_POST['cal'];
    $st=$pdo->prepare("SELECT * FROM goods WHERE category='".$calname."'");
    $st->execute();
    $categorys=$st->fetchAll();

    require('t_category.php');
?>