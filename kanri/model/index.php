<!-- 商品一覧ページのプログラム部分 -->
<?php
  require('../../controller/common.php');
  
  $pdo = connect();
  $st = $pdo->query("SELECT * FROM goods");
  $goods = $st->fetchAll();

  require('../view/t_index.php');
?>