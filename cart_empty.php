<!--カートの中身を空にする-->
<?php
  require 'common.php';
  $_SESSION['cart'] = null; //SESSIONデータを空にする
  $_SESSION['history']=null; //購入履歴用セッションも空にする
  header('Location: cart.php'); //cart.phpに遷移
?>