<!-- 新着商品(番号が新しい順に表示)　プログラム部分 -->
<?php
    require 'common.php';

    $pdo=connect();
    $st=$pdo->prepare("SELECT * FROM goods ORDER BY code DESC LIMIT 0,5");
    $st->execute();
    $newitem=$st->fetchAll();
    $st->closeCursor();

    require 't_newitem.php';
?>