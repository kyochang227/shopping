<!-- 商品購入ページのデザイン部分 -->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>HEMZON | 購入手続き</title>
<link rel="stylesheet" href="../shop.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
rel="stylesheet">
<link rel="stylesheet" href="../bootstrap-4.1.3-dist/css/bootstrap.min.css"/>
</head>
<body>

<div id="wrapper">

<div class="base_buy">

<h1>下記項目を入力し、購入手続きを行ってください</h1>

  <form action="../model/buy.php" method="post">

    <dl>
      <dt>お名前</dt>

      <dd>
        <input type="text" name="name" value="<?php echo $name; ?>">

        <?php if($error['name']=='blank'):?>
        <p class="error">*氏名を入力してください</p>        
        <?php endif;?>
      </dd>

      <dt>ご住所</dt>

      <dd>
        <input type="text" name="address" size="60" value="<?php echo $address; ?>">

        <?php if($error['address']=='blank'):?>
        <p class="error">*住所を入力してください</p>        
        <?php endif;?>
      </dd>

      <dt>電話番号</dt>

      <dd>
        <input type="text" name="tel" value="<?php echo $tel; ?>">

        <?php if($error['tel']=='blank'):?>
        <p class="error">*電話番号を入力してください</p>
        <?php endif;?>

        <?php if($error['tel']=='typo'): ?>

          <p class="error">
          *電話番号の入力に誤りがあります。<br>
          例:000-0000-0000
          </p>

        <?php endif; ?>
      </dd>

      <dt>メールアドレス</dt>

      <dd>
        <input type="text" name="email" size="35" value="<?php echo $email; ?>">

        <?php if($error['email']=='blank'):?>
        <p class="error">*メールアドレスを入力してください</p>
        <?php endif;?>

        <?php if($error['email']=='mismatch'):?>
        <p class="error">*メールアドレスが一致しません</p>
        <?php endif;?>
      </dd>

      <dt>パスワード</dt>
      <dd>
        <input type="password" name="password" size="12">

        <?php if($error['password']=='blank'):?>
        <p class="error">*パスワードを入力してください</p>
        <?php endif;?>

        <?php if($error['password']=='mismatch'):?>
        <p class="error">*パスワードが一致しません</p>
        <?php endif;?>

      </dd>
    </dl>

    <div><input type="submit" name="submit" value="確認"></div>

  </form>


<div class="base">
  <a href="../model/index.php">お買い物に戻る</a>　
  <a href="../model/cart.php">カートに戻る</a>
</div>

</div>

</div>

  <script src="../js/jquery-3.5.1.min.js"></script>
  <script src="../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
	<script type="text/javascript" src="../bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/main.js"></script>
</body>
</html>