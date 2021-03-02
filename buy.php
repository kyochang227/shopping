<!-- 商品購入ページのプログラム部分 -->
<?php
  require 'common.php';
  $error = $name = $address = $tel = ''; //名前、アドレス、電話番号が空だった場合エラー
  if (@$_POST['submit']) { //送信されたら
    $name = htmlspecialchars($_POST['name']); //名前
    $address = htmlspecialchars($_POST['address']); //住所
    $tel = htmlspecialchars($_POST['tel']); //電話番号
    if (!$name) $error .= 'お名前を入力してください。<br>';
    if (!$address) $error .= 'ご住所を入力してください。<br>';
    if (!$tel) $error .= '電話番号を入力してください。<br>';
    if (preg_match('/[^\d-]/', $tel)) $error .= '電話番号が正しくありません。<br>';
    if (!$error) {
      $pdo = connect();
      $body = "商品が購入されました。\n\n"
       . "お名前: $name\n"
       . "ご住所: $address\n"
       . "電話番号: $tel\n\n";
      foreach($_SESSION['cart'] as $code => $num) {
        $st = $pdo->prepare("SELECT * FROM goods WHERE code=?"); //バインド変数　？を使えるように
        $st->execute(array($code)); //実行
        $row = $st->fetch(); //
        $st->closeCursor();
        $body .= "商品名: {$row['name']}\n"
          . "単価: {$row['price']} 円\n"
          . "数量: $num\n\n";
      }
      $from = "newuser@localhost";
      $to = "newuser@localhost";
      mb_send_mail($to, "購入メール", $body, "From: $from");
      $_SESSION['cart'] = null;
      require 't_buy_complete.php';
      exit();
    }
  }
  require 't_buy.php';
?>