<!--カート デザイン部分-->
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="robots" content="noindex,nofollow">
<title>SHOPPING | カート</title>
<link rel="stylesheet" href="../shop.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
rel="stylesheet">
<link rel="stylesheet" href="../bootstrap-4.1.3-dist/css/bootstrap.min.css"/>
</head>
<body>

<div id="wrapper">

<div class="container-fluid"><!--gridシステム使用-->

  <!-- ヘッダー画面 -->
  <header class="header">

  <div class="row">
  
  <!-- ロゴ -->
  <h1 class="col-lg-4"><a href="../model/index.php">SHOPPING.CO.JP</a></h1>
  <!-- 商品検索 -->
  <form class="col-lg-4 keyword" action="../model/item.php" method="post">
    <label for="search">商品検索</label>
    <input type="search" name="keyword">
    <input type="submit" value="検索">
  </form>
  <!-- カート -->
  <span class="material-icons col-lg-4" id="cart"><a href="../model/cart.php">add_shopping_cart カート</a></span>

  </div>

</header>
<!-- ヘッダー終了 -->

<!-- トップナビ -->
<nav class="top_nav">

　<ul class="row">

    <li class="col-lg-1"><div class="sp-menu"><span class="material-icons" id="open">menu</span></div></li><!--ハンバーガーメニュー-->
    <li class="col-lg-1"><a href="../model/newitem.php">新着商品</a></li>
　  <li class="col-lg-1"><a href="../model/history.php">購入履歴</a></li>
　  <li class="col-lg-1"><a href="../model/ranking.php">ランキング</a></li>

　</ul>

</nav>
<!-- トップナビ終了 -->

<!-- スライドショー -->
<div class="slideshow">

  <ul id="slide">

			<li><img src="../images/slide1.jpg" alt=""></li>
			<li><img src="../images/slide2.jpg" alt=""></li>
			<li><img src="../images/slide3.jpg" alt=""></li>
			<li><img src="../images/slide4.jpg" alt=""></li>

	</ul>

</div>
<!-- スライドショー終了 -->

<!-- ハンバーガメニュー ナビ -->
<div class="overlay">
  <!-- ハンバーガーメニューを閉じる -->
  <span class="material-icons" id="close">close</span>
  <!--個別にこんにちは  -->
  <p><?php echo $_SESSION['name'];?>さん、こんにちは</p>
  <!-- ログアウト -->
  <p><a href="../model/logout.php">ログアウト</a></p>

  <h2>カテゴリー別</h2>
  <!-- カテゴリーを自動生成 -->
  <?php foreach($_SESSION['category'] as $c):?>

    <form action="../model/category.php" name="<?php echo "cat_".$c;?>" method="post">
    <input type="hidden" name="cal" value="<?php echo $c;?>">
    <a href="<?php echo "javascript: cat_".$c.".submit()";?>"><?php echo $c;?></a>
    </form>

  <?php endforeach; ?>

</div>
<!-- ハンバーガメニュー ナビ終了 -->

<main>
<!-- 商品一覧画面 -->
<div class="items">

<!-- カートが空の時に実行 -->
<!-- カートが空のメッセージを表示し、商品テーブルを非表示にする -->
<?php

  if($_SESSION['cart'] == null){
    echo "<div class='"."container null"."'>";
    echo "<p>".$cartEmpty."</p>";
    echo "</div>";
    $class="hide"; //このクラスを持っている要素を非表示にする
  }

?>

<div class="container table-resposive">

<table class="<?php echo $class;?> table table-striped table-bordered">

  <tr><th>商品名</th><th>単価</th><th>数量</th><th>小計</th></tr>

  <?php foreach($rows as $r):?>

  <tr>
    <td><?php echo $r['name'] ;?></td>
    <td><?php echo $r['price'] ;?></td>
    <td><?php echo $r['num'] ;?></td>
    <td><?php echo $r['price'] * $r['num'] ;?>円</td>
  </tr>

  <?php endforeach;?>

  <tr>
    <td colspan='2'></td>
    <td><strong>合計</strong></td>
    <td><?php echo $sum ;?>円</td>  
  </tr>

</table>

</div>

</div>


<div class="base">
  <a href="../model/index.php">お買い物に戻る</a>　
  <a href="../model/cart_empty.php" class="<?php echo $class;?>">カートを空にする</a>　
  <a href="../model/buy.php" class="<?php echo $class;?>">購入する</a>
</div>

</main>
<!-- 商品一覧画面終了 -->

<footer>

  <p><a href="../model/newitem.php">新着商品</a></p>
  <p><a href="../model/history.php">購入履歴</a></p>
  <p><a href="../model/ranking.php">ランキング</a></p>

  <p class="copyrights"><small>&copy;2021 SHOPPING.All rights reserved.</small></p>

</footer>

</div>

</div>


  <script src="../js/jquery-3.5.1.min.js"></script>
  <script src="../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
	<script type="text/javascript" src="../bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/main.js"></script>
</body>
</html>