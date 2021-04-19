<!-- 修正ページのプログラム部分 -->
<?php

  require('../controller/common.php');

  $pdo = connect(); //SQLよりgoodsを呼び出す
  
  $code = $_POST['code'];
  $name = htmlspecialchars($_POST['name'],ENT_QUOTES);
  $comment = htmlspecialchars($_POST['comment'],ENT_QUOTES);
  $price = htmlspecialchars($_POST['price'],ENT_QUOTES);
  $name_ruby = htmlspecialchars($_POST['name_ruby'],ENT_QUOTES);
  $category = htmlspecialchars($_POST['category']);

  if (@$_POST['submit']) {

    if($name == ''){
      $error['name'] = 'blank';
    }
    if($comment == ''){
      $error['comment'] = 'blank';
    }
    if($price == ''){
      $error['price'] = 'blank';
    }
    if($name_ruby == ''){
      $error['name_ruby'] = 'blank';
    }
    if($category == ''){
      $error['category'] = 'blank';
    }
    if (preg_match('/\D/', $price)){
        $error['price'] = 'typo';
    }

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