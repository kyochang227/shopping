<!--カートの中身のデザイン部分-->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>カート | HEMZON</title>
<link rel="stylesheet" href="shop.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
rel="stylesheet">
<link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css"/>
</head>
<body>
<div id="wrapper">
  <!-- ここからヘッダー画面 -->
<header class="header">
  <h1><a href="index.php">HEMZON.CO.JP</a></h1>
  <!-- 商品検索 -->
  <form action="item.php" method="post" class="keyword">
    <label for="search">商品検索</label>
    <input type="search" name="keyword">
    <input type="submit" value="検索">
  </form>
  <span class="material-icons" id="cart"><a href="cart.php">add_shopping_cart カート</a></span>       
</header>
<!-- ヘッダー終了 -->
<!-- ここからナビ部分 -->
<nav class="top_nav">
　<ul>
    <li><div class="sp-menu"><span class="material-icons" id="open">menu</span></div></li>
　  <li>ランキング</li>
　  <li>新着商品</li>
　  <li><a href="history.php">購入履歴</a></li>
　</ul>
</nav>

<!-- スライドショー -->
<nav>
  <ul id="slide">
			<li><img src="images/1.jpg" alt=""></li>
			<li><img src="images/6.jpg" alt=""></li>
			<li><img src="images/8.jpg" alt=""></li>
			<li><img src="images/noimage.jpg" alt=""></li>
	</ul>
</nav>

<div class="overlay">
  <span class="material-icons" id="close">close</span>
     <!--個別にこんにちは  -->
     <p><?php echo $_SESSION['name'];?>さん、こんにちは</p>
  <!-- ログアウト -->
  <p><a href="logout.php">ログアウト</a></p>

  <h2>カテゴリー別</h2>
  <?php foreach($_SESSION['category'] as $c):?>
      <form action="category.php" name="<?php echo "cat_".$c;?>" method="post">
      <input type="hidden" name="cal" value="<?php echo $c;?>">
      <a href="<?php echo "javascript: cat_".$c.".submit()";?>"><?php echo $c;?></a>
    </form>
  <?php endforeach; ?>
</div>

<!-- ナビ部分終了 -->

<!-- カートが空の時に実行 -->
<?php
  if($_SESSION['cart']==null){
    echo $cartemp;
    $class="hide";
  }
?>

<table class="<?php echo $class;?>">
  <tr><th>商品名</th><th>単価</th><th>数量</th><th>小計</th></tr>
  <?php foreach($rows as $r) { ;?>
    <tr>
      <td><?php echo $r['name']; ?></td>
      <td><?php echo $r['price']; ?></td>
      <td><?php echo $r['num']; ?></td>
      <td><?php echo $r['price'] * $r['num']; ?> 円</td>
    </tr>
  <?php } ;?>
  <tr><td colspan='2'> </td><td><strong>合計</strong></td><td><?php echo $sum ?> 円</td></tr>
</table>
<div class="base">
  <a href="index.php">お買い物に戻る</a>　
  <a href="cart_empty.php">カートを空にする</a>　
  <a href="buy.php">購入する</a>
</div>

<footer>
  <small>&copy;2021 Hemzon.All rights reserved.</small>
</footer>

</div>


<script src="js/jquery-3.5.1.min.js"></script>
  <script src="node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
		<script
			type="text/javascript"
			src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
</body>
</html>