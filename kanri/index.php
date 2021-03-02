<!-- 商品一覧ページのプログラム部分 -->
<?php
  require 'common.php';
  $pdo = connect();
  $st = $pdo->query("SELECT * FROM goods");
  $goods = $st->fetchAll();
  require 't_index.php';
?>