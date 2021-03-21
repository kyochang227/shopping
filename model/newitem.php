<!-- 新着商品(番号が新しい順に表示)　プログラム部分 -->
<?php
    require('../controller/common.php');

    $pdo=connect();
    
    //新しく追加された商品5件を検索
    $st=$pdo->prepare("SELECT * FROM goods ORDER BY code DESC LIMIT 0,5");
    $st->execute();
    $newItem=$st->fetchAll();
    $st->closeCursor();

    require('../view/t_newitem.php');
?>