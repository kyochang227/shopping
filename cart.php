<!--カートのプログラム部分-->
<?php
  require 'common.php';
  $rows = array(); //カートに入れた商品データを格納
  $sum = 0; //カートの合計金額
  $pdo = connect(); 

  if (!isset($_SESSION['cart'])) $_SESSION['cart'] = array(); //isset=true or false 

  // 例　商品コード「2」を4個カートに→$_SESSION['cart'][2]=4
  if (@$_POST['submit']) { //t_indexから送信されると商品の個数を受け取る
    
    if($_POST['num']>0){//0以外の数字だけ処理を実行する
      @$_SESSION['cart'][$_POST['code']] += $_POST['num']; //すでにカートに商品が入ってる状態でカートに入れると足される
    }
  }

  foreach($_SESSION['cart'] as $code => $num) {
    $st = $pdo->prepare("SELECT * FROM goods WHERE code=?"); //ユーザーが打った情報をSQL文に含める準備
    $st->execute(array($code)); //入力情報を含んだSQLを代入
    $row = $st->fetch(); //レコードを取り出す fetchはshopの行を配列化している
    $st->closeCursor();  //再びSQL文を発行できるようにサーバーへの接続を解放
    $row['num'] = strip_tags($num); //htmlタグを取り除く
    $sum += $num * $row['price']; //商品の価格と数量を掛けたものを合算
    $rows[] = $row; //商品データの入った配列を$rows配列に追加する
  }

  //カート空の時
  $class="";
  $cartemp="カートの中身が空です";
  if($_SESSION['cart']==null){
    echo $cartemp;
    $class="hide";
  }

  require 't_cart.php';
?>
<style>
  .hide{display: none;}
</style>