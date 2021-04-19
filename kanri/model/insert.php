<!-- 商品追加ページのプログラム部分 -->
<?php

  require('../controller/common.php'); //coomon.phpを呼び出す

  $pdo = connect();
  $name = htmlspecialchars($_POST['name'],ENT_QUOTES); 
  $name_ruby= htmlspecialchars($_POST['name_ruby'],ENT_QUOTES); 
  $comment = htmlspecialchars($_POST['comment'],ENT_QUOTES);
  $price = htmlspecialchars($_POST['price'],ENT_QUOTES);
  $category = $_POST['category'];

  if (@$_POST['submit']) {//送信された場合

    if($name == ''){
      $error['name'] = 'blank';
    }
    if($name_ruby == ''){
      $error['name_ruby'] = 'blank';
    }
    if($comment == ''){
      $error['comment'] = 'blank';
    }
    if($price == ''){
      $error['price'] = 'blank';
    }
    if($category == ''){
      $error['category'] = 'blank';
    }
    if (preg_match('/\D/', $price)){
      $error['price']= 'typo';
    }

    if (!$error) { //エラーが発生しない場合、SQLテーブルに入力内容を追加
      $st=$pdo->prepare("INSERT INTO goods(name,comment,price,name_ruby,category) VALUES(:name,:comment,:price,:name_ruby,:category)");
      $st->bindParam(':name',$name);
      $st->bindParam(':comment',$comment);
      $st->bindParam(':price',$price);
      $st->bindParam(':name_ruby',$name_ruby);
      $st->bindParam(':category',$category);
      $st->execute();
      $st->closeCursor();

      header('Location: ../model/index.php');
      exit(); //プログラム終了
    }

  }

  require('../view/t_insert.php');
?>