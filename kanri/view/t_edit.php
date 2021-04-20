<!-- 修正ページのデザイン部分 -->
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="robots" content="noindex,nofollow">
<title>SHOPPING | 修正画面</title>
<link rel="stylesheet" href="../../shop.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
rel="stylesheet">
<link rel="stylesheet" href="../../bootstrap-4.1.3-dist/css/bootstrap.min.css"/>
</head>
<body>


<div id="wrapper">

<div class="container-fluid"><!--gridシステム使用-->

<header>
  <h1 class="kanri">修正画面</h1>
</header>

<main>

<div class="base_kanri">

  <form action="../model/edit.php" method="post">

    <p>
      商品名<br>
      <input type="text" name="name" value="<?php echo $name ?>">
    </p>
      <?php if($error['name'] == 'blank'):?>
        <p class="error">*商品名を入力してください</p>        
      <?php endif;?>
    <p>
      読み方(平仮名)<br>
      <input type="text" name="name_ruby" value="<?php echo $name_ruby ?>">
    </p>
      <?php if($error['name_ruby'] == 'blank'):?>
        <p class="error">*読み仮名を入力してください</p>        
      <?php endif;?>
    <p>
      商品説明<br>
      <textarea name="comment" rows="10" cols="60"><?php echo $comment ?></textarea>
    </p>
      <?php if($error['comment'] == 'blank'):?>
        <p class="error">*商品説明を入力してください</p>        
      <?php endif;?>
    <p>
      価格<br>
      <input type="text" name="price" value="<?php echo $price ?>">
    </p>
      <?php if($error['price'] == 'blank'):?>
        <p class="error">*商品価格を入力してください</p>        
      <?php endif;?>
      <?php if($error['price'] == 'typo'):?>
        <p class="error">*商品価格が適正ではありません。半角数字で入力してください。</p>        
      <?php endif;?>
    <p>
      カテゴリー<br>
      <select name="category">
        <?php foreach($_SESSION['category'] as $c): ?>
          <option value="<?php echo $c ;?>"><?php echo $c ;?></option>
        <?php endforeach; ?>
      </select>
    </p>
      <?php if($error['category'] == 'blank'):?>
        <p class="error">*カテゴリーを入力してください</p>        
      <?php endif;?>
    <p>
      <input type="hidden" name="code" value="<?php echo $code ?>"> <!--コードを参照しどれを修正しているかを判別する-->
      <input type="submit" name="submit" value="更新">
    </p>

  </form>

</div>

<div class="base">
  <a href="../model/index.php">一覧に戻る</a>　
</div>

</main>

</div>

</div>

  <script src="../../js/jquery-3.5.1.min.js"></script>
  <script src="../../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
	<script type="text/javascript" src="../../bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../../js/main.js"></script>
</body>
</html>