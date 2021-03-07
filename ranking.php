<!-- ランキング プログラミング部分 -->
<?php
    require 'common.php';

    $counter=1;//順位

    $pdo=connect();
    $st=$pdo->prepare("SELECT g.code,g.name,g.comment,g.price,SUM(b.item_num) 
    FROM goods g,buy_history b WHERE g.name=b.item_name 
    GROUP BY b.item_name ORDER BY SUM(b.item_num) DESC LIMIT 0,3");
    $st->execute();
    $ranking=$st->fetchAll();
    $st->closeCursor();

    require 't_ranking.php';
?>