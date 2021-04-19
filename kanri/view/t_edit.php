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
  <h1>管理画面</h1>
</header>

<main>

<div class="base">

  <?php if ($error) echo "<span class=\"error\">$error</span>" ?>
  <form action="../model/edit.php" method="post">

    <p>
      商品名<br>
      <input type="text" name="name" value="<?php echo $name ?>">
    </p>
    <p>
      読み方(平仮名)<br>
      <input type="text" name="name_ruby" value="<?php echo $name_ruby ?>">
    </p>
    <p>
      商品説明<br>
      <textarea name="comment" rows="10" cols="60"><?php echo $comment ?></textarea>
    </p>
    <p>
      価格<br>
      <input type="text" name="price" value="<?php echo $price ?>">
    </p>
    <p>
      カテゴリー<br>
      <select name="category">
        <?php foreach($_SESSION['category'] as $c): ?>
          <option value="<?php echo $c ;?>"><?php echo $c ;?></option>
        <?php endforeach; ?>
      </select>
    </p>
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

<div class="base">
  <a href="../model/insert.php">新規追加</a>　
  <a href="../../model/index.php" target="_blank">サイト確認</a>
</div>

</div>

</div>

  <script src="../../js/jquery-3.5.1.min.js"></script>
  <script src="../../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
	<script type="text/javascript" src="../../bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../../js/main.js"></script>
</body>
</html>