<!-- 修正ページのプログラム部分 -->
<?php

  require('../../controller/common.php');


  $error = ''; //フォーム内が空だった場合エラー

  $pdo = connect(); //SQLよりgoodsを呼び出す

  if (@$_POST['submit']) {

    $code = $_POST['code'];
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $price = $_POST['price'];

    if (!$name) $error .= '商品名がありません。<br>';
    if (!$comment) $error .= '商品説明がありません。<br>';
    if (!$price) $error .= '価格がありません。<br>';
    if (preg_match('/\D/', $price)) $error .= '価格が不正です。<br>';
    if (!$error) {
      $pdo->query("UPDATE goods SET name='$name',comment='$comment',price=$price WHERE code=$code");
      header('Location: index.php');
      exit();
    }
  } else {

    $code = $_GET['code'];
    $st = $pdo->query("SELECT * FROM goods WHERE code=$code");
    $row = $st->fetch();
    $name = $row['name'];
    $comment = $row['comment'];
    $price = $row['price'];
    
  }
  require('../model/t_edit.php');

?>