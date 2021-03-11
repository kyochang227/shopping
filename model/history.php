<!-- 購入履歴 プログラム部分 -->
<?php
require('../controller/common.php');

$pdo=connect();

$st=$pdo->query("SELECT * FROM buy_history");
$history=$st->fetchAll();
$st->closeCursor();

require('../view/t_history.php');
?>