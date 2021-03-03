<!-- トップページのプログラミング部分 -->
<?php 
  require 'common.php';

  if(isset($_SESSION['id']) && $_SESSION['time']+3600>time()){
    //ログインしている

    $_SESSION['time']=time();

    $db=connect();
    $members=$db->prepare('SELECT * FROM members WHERE id=?');
    $members->execute(array($_SESSION['id']));
    $member=$members->fetch();    
  }else{
    header('Location: login.php'); exit();
  }
  
  $pdo = connect();
  $st = $pdo->query("SELECT * FROM goods"); //table:goodsを取得
  $goods = $st->fetchAll(); //goodsレコードをすべて取り出す

  //カテゴリーのデータをセッションに保存
  $stcat=$pdo->query("SELECT category FROM item_category");
  $categorys=$stcat->fetchAll(PDO::FETCH_COLUMN);
  $_SESSION['category']=$categorys;

  require 't_index.php';
?>