<!-- 商品購入ページ プログラム -->
<?php
  require('../controller/common.php');
  
  $name = htmlspecialchars($_POST['name'],ENT_QUOTES); //名前
  $address = htmlspecialchars($_POST['address'],ENT_QUOTES); //住所
  $tel = htmlspecialchars($_POST['tel'],ENT_QUOTES); //電話番号
  $email=htmlspecialchars($_POST['email'],ENT_QUOTES); //メールアドレス
  $password=htmlspecialchars(($_POST['password']),ENT_QUOTES); //パスワード
  $telCheck="/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}$/"; //電話番号の正規表現

  //カートの中身が空の状態で遷移たとき
  if($_SESSION['cart'] == null){
    //カート画面に遷移
    header('Location: cart.php');
    exit();

  }

  //エラー項目の確認
  if (!empty($_POST)) {

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

    if($password==''){

      $error['password']='blank';

    }
    //ログイン時のメールアドレスと一致しなかったら
    if($_SESSION['email'] != $email){

      $error['email']='mismatch';

    }
    //ログイン時のパスワードと一致しなかったら
    if(!password_verify($password,$_SESSION['password'])){
      $error['password']='mismatch';
    }

    //エラーが存在しなかったら
    if(empty($error)){

      $_SESSION['buy'] = $_POST; //セッションに入力データを保存
      header('Location: buy_check.php');//購入確認画面に遷移
      exit();

    }
 
  }

  require('../view/t_buy.php');
?>