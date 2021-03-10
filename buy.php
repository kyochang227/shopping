<!-- 商品購入ページ プログラム -->
<?php
  require('common.php');
  
  $name = htmlspecialchars($_POST['name'],ENT_QUOTES); //名前
  $address = htmlspecialchars($_POST['address'],ENT_QUOTES); //住所
  $tel = htmlspecialchars($_POST['tel'],ENT_QUOTES); //電話番号
  $email=htmlspecialchars($_POST['email'],ENT_QUOTES);
  $password=htmlspecialchars(($_POST['password']),ENT_QUOTES);
  $telCheck="/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}$/";

  //カートの中身が空の状態で遷移たとき
  if($_SESSION['cart'] == null){

    header('Location: cart.php');
    exit();

  }

  //エラー項目の確認
  if (!empty($_POST)) {

    $passwordSha1=sha1($password);

    //入力欄が空だった場合
    if($name==''){

      $error['name']='blank';

    }
    if($address==''){

      $error['address']='blank';

    }
    if(preg_match($telCheck,$tel)==0){

      $error['tel']='typo';

    }
    if($email==''){

      $error['email']='blank';

    }
    if($_SESSION['email'] != $email){

      $error['email']='mismatch';

    }
    if($passwordSha1==''){

      $error['password']='blank';

    }
    if($_SESSION['password'] != $passwordSha1){
      $error['password']='mismatch';
    }

    if(empty($error)){

      $_SESSION['buy'] = $_POST;
      header('Location: buy_check.php');
      exit();

    }
 
  }

  require('t_buy.php');
?>