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
  require 't_index.php';
?>