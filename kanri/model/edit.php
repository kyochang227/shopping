<!-- 修正ページのプログラム部分 -->
<?php

  require('../controller/common.php');

  $pdo = connect(); //SQLよりgoodsを呼び出す
  $error = ''; //フォーム内が空だった場合エラー
  
  $code = $_POST['code'];
  $name = $_POST['name'];
  $comment = $_POST['comment'];
  $price = $_POST['price'];
  $name_ruby = $_POST['name_ruby'];
  $category = $_POST['category'];

  if (@$_POST['submit']) {

    if (!$name) $error .= '商品名がありません。<br>';
    if (!$comment) $error .= '商品説明がありません。<br>';
    if (!$price) $error .= '価格がありません。<br>';
    if (preg_match('/\D/', $price)) $error .= '価格が不正です。<br>';

    if (!$error) {

      $st=$pdo->prepare("UPDATE goods SET name=:name,comment=:comment,price=:price,name_ruby=:name_ruby,category=:category WHERE code=:code");
      $st->bindParam(':name',$name);
      $st->bindParam(':comment',$comment);
      $st->bindParam(':price',$price);
      $st->bindParam(':code',$code);
      $st->bindParam(':name_ruby',$name_ruby);
      $st->bindParam(':category',$category);
      $st->execute();
      $st->closeCursor();

      header('Location: ../model/index.php');
      exit();
    }

  } else {

    $code = $_GET['code'];
    $st = $pdo->query("SELECT * FROM goods WHERE code=$code");
    $row = $st->fetch();
    $name = $row['name'];
    $comment = $row['comment'];
    $price = $row['price'];
    $name_ruby = $row['name_ruby'];
    $category = $row['category'];
    
  }

  require('../view/t_edit.php');

?>