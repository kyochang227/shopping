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
      $_SESSION['cart'] = null;
      require 't_buy_complete.php';
      exit();
    }
  }
  require 't_buy.php';
?>