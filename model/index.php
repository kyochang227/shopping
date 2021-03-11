<!-- トップページ プログラム部分 -->
<?php 
  require('../controller/common.php');

  $pdo=connect();

  // ログインしているかを検査
  //セッションにidがあるか、最後の行動から1時間以内であるか
  if(isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()){
    //ログインしている

    //セッションの時刻を現時刻に変更
    $_SESSION['time']=time();

    $members=$pdo->prepare("SELECT * FROM members WHERE id=?");
    $members->execute(array($_SESSION['id']));
    $member=$members->fetch();  
    $members->closeCursor();

  }else{

    header('Location: login.php'); exit();

  }
  
  $st = $pdo->query("SELECT * FROM goods"); //table:goodsを取得
  $goods = $st->fetchAll(); //goodsレコードをすべて取り出す
  $st->closeCursor();

  //カテゴリーのデータをセッションに保存
  $stcat=$pdo->query("SELECT category FROM item_category");
  $categorys=$stcat->fetchAll(PDO::FETCH_COLUMN);
  $stcat->closeCursor();
  $_SESSION['category']=$categorys;

  require('../view/t_index.php');
?>