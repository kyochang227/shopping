<!-- 商品購入ページのデザイン部分 -->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>購入 | Noodle Shop</title>
<link rel="stylesheet" href="shop.css">
</head>
<body>
<h1>購入</h1>
<div class="base">
  <form action="buy.php" method="post">
    <p>
      お名前<br>
      <input type="text" name="name" value="<?php echo $name; ?>">

      <?php if($error['name']=='blank'):?>
      <p class="error">*氏名を入力してください</p>        
      <?php endif;?>
    </p>
    <p>
      ご住所<br>
      <input type="text" name="address" size="60" value="<?php echo $address; ?>">

      <?php if($error['address']=='blank'):?>
      <p class="error">*住所を入力してください</p>        
      <?php endif;?>
    </p>
    <p>
      電話番号<br>
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
    </p>
    <p>
      <input type="submit" name="submit" value="購入">
    </p>
  </form>
</div>
<div class="base">
  <a href="index.php">お買い物に戻る</a>　
  <a href="cart.php">カートに戻る</a>
</div>
</body>
</html>