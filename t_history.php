<!--購入履歴-->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>購入履歴 | HEMZON</title>
<link rel="stylesheet" href="shop.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
rel="stylesheet">
<link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css"/>
</head>
<body>
<div id="wrapper">
  
<!-- ここからヘッダー画面 -->
<header class="header">

<div class="container-fluid"><!--gridシステム使用-->

  <!-- ここからヘッダー画面 -->
  <header class="header">

  <div class="row">
  
  <!-- ロゴ -->
  <h1 class="col-lg-4"><a href="index.php">HEMZON.CO.JP</a></h1>
  <!-- 商品検索 -->
  <form class="col-lg-4 keyword" action="item.php" method="post">
    <label for="search">商品検索</label>
    <input type="search" name="keyword">
    <input type="submit" value="検索">
  </form>
  <!-- カート -->
  <span class="material-icons col-lg-4" id="cart"><a href="cart.php">add_shopping_cart カート</a></span>

  </div>

</header>
<!-- ヘッダー終了 -->

<!-- ここからナビ部分 -->
<nav class="top_nav">

　<ul class="row">

    <li class="col-lg-1"><div class="sp-menu"><span class="material-icons" id="open">menu</span></div></li>
　  <li class="col-lg-1">新着商品</li>
　  <li class="col-lg-1"><a href="history.php">購入履歴</a></li>

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

<main>

<div class="table-resposive">

<table class="table table-striped table-bordered">
    <tr>
        <td>id</td>
        <td>氏名</td>
        <td>住所</td>
        <td>電話番号</td>
        <td>商品名</td>
        <td>価格</td>
        <td>個数</td>
        <td>合計</td>
        <td>購入日時</td>
    </tr>
  <?php foreach($history as $h):?>
    <tr>
      <td><?php echo $h['user_id']; ?></td>
      <td><?php echo $h['name']; ?></td>
      <td><?php echo $h['address']; ?></td>
      <td><?php echo $h['tel']; ?></td>
      <td><?php echo $h['item_name']; ?></td>
      <td><?php echo $h['item_price']; ?></td>
      <td><?php echo $h['item_num']; ?></td>
      <td><?php echo $h['item_sum']; ?></td>
      <td><?php echo $h['created_at']; ?></td>
    </tr>
  <?php endforeach;?>

</table>

</div>

<h1>購入履歴</h1>

<div class="base">
  <a href="index.php">お買い物に戻る</a>　　
</div>

</main>


<footer>
  <small>&copy;2021 Hemzon.All rights reserved.</small>
</footer>

</div>

</div>


<script src="js/jquery-3.5.1.min.js"></script>
  <script src="node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
		<script
			type="text/javascript"
			src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
</body>
</html>