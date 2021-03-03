<!-- 商品購入ページのプログラム部分 -->
<?php
  require 'common.php';
  
  $name = htmlspecialchars($_POST['name']); //名前
  $address = htmlspecialchars($_POST['address']); //住所
  $tel = htmlspecialchars($_POST['tel']); //電話番号
  $telcheck="/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}$/";

  //エラー項目の確認
  if (!empty($_POST)) {
    //入力欄が空だった場合
    if($name==''){
      $error['name']='blank';
    }
    if($address==''){
      $error['address']='blank';
    }
    if(preg_match($telcheck,$tel)==0){
      $error['tel']='typo';
    }

    if(empty($error)){
      $_SESSION['buy'] = $_POST;
      header('Location: buy_check.php');
      exit();
    }
 
  }

  require 't_buy.php';
?>