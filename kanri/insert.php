<!-- 商品追加ページのプログラム部分 -->
<?php
  require 'common.php'; //coomon.phpを呼び出す
  $error = $name =$name_ruby= $comment = $price = ''; //名前、コメント、価格が空の場合エラー
  $pdo = connect();
  if (@$_POST['submit']) {//送信された場合
    $name = $_POST['name']; 
    $name_ruby= $_POST['name_ruby']; 
    $comment = $_POST['comment'];
    $price = $_POST['price'];
    if (!$name) $error .= '商品名を入力してください。<br>';
    if (!$name_ruby) $error .= '読み方を入力してください。<br>';
    if (!$comment) $error .= '商品説明を入力してください。<br>';
    if (!$price) $error .= '価格を入力してください。<br>'; //価格が入力されていない場合
    if (preg_match('/\D/', $price)) $error .= '価格が不正です。<br>'; //数値以外が打たれている場合
    if (!$error) { //エラーが発生しない場合、SQLテーブルに入力内容を追加
      $pdo->query("INSERT INTO goods(name,comment,price,name_ruby) VALUES('$name','$comment','$price','$name_ruby')");
      header('Location: index.php');
      exit(); //プログラム終了
    }
  }
  require 't_insert.php';
?>