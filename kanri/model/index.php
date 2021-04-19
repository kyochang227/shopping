<!-- 商品一覧ページのプログラム部分 -->
<?php
  require('../controller/common.php');
  
  $pdo = connect();
  $st = $pdo->query("SELECT * FROM goods");
  $goods = $st->fetchAll();

  // $stcat=$pdo->query("SELECT category FROM item_category");
  // $category=$stcat->fetchAll(PDO::FETCH_COLUMN);
  // $stcat->closeCursor();
  // $_SESSION['category']=$category;

  require('../view/t_index.php');
?>