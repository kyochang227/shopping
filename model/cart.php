<!--カート プログラム部分-->
<?php
  require('../controller/common.php');

  $pdo = connect();

  $rows = array(); //カートに入れた商品データを格納
  $sum = 0; //カートの合計金額 初期値を0とする


  //カート空の時に使う変数
  $class=""; //カートが空の時に値を与える
  $cartEmpty="カートの中身が空です"; //空の時に表示されるメッセージ

  //カート用のセッションがない場合は作成する
  if (!isset($_SESSION['cart'])){

    $_SESSION['cart'] = array();

  }

  // 例　商品コード「2」を4個カートに→$_SESSION['cart'][2]=4
  //t_indexから送信されると商品の個数を受け取る
  if (@$_POST['submit']) {
    
    if($_POST['num'] > 0){//0以外の数字だけ処理を実行する

      @$_SESSION['cart'][$_POST['code']] += $_POST['num']; //すでにカートに商品が入ってる状態でカートに入れると足される;
    }
  }
  
   //ユーザーが打った情報をSQL文に含める準備
  foreach($_SESSION['cart'] as $code => $num) {

    $st = $pdo->prepare("SELECT * FROM goods WHERE code=:code");

    $st->bindParam(":code",$code);

    $st->execute();

    $row = $st->fetch(PDO::FETCH_ASSOC);

    $st->closeCursor();

    $row['num'] = strip_tags($num); //htmlタグを取り除く

    $sum += $num * $row['price']; //商品の単価と数量を掛けたものを合算

    $row['sum']=$sum; //合算値を$rowに入れる

    $rows[] = $row; //商品データの入った配列を$rows配列に追加する

    $_SESSION['history']=$rows; //購入後、購入履歴にデータを表示する為のセッション

  }

  require('../view/t_cart.php');
?>
<!-- カートが空の時に発動するCSS -->
<style>
  .hide{display: none;}/*カートの中が空の時にクラスが有効になる */

  .show{display: inline;}
</style>