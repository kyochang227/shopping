<!-- カテゴリー別商品画面 プログラム部分 -->
<?php
    require('../controller/common.php');

    $pdo=connect();
    //カテゴリー名を取得
    $calname=$_POST['cal'];

    $st=$pdo->prepare("SELECT * FROM goods WHERE category=:calname");
    $st->bindParam(":calname",$calname);
    $st->execute();
    $categorys=$st->fetchAll();

    require('../view/t_category.php');
?>