<!-- 購入履歴 プログラム部分 -->
<?php
require('../controller/common.php');

$pdo=connect();

$id=$_SESSION['id'];

$st=$pdo->prepare("SELECT * FROM buy_history WHERE user_id=:id");
$st->bindParam(":id",$id);
$st->execute();
$history=$st->fetchAll();
$st->closeCursor();

require('../view/t_history.php');
?>