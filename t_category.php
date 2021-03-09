<!-- カテゴリー別商品画面 デザイン部分-->
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-sacale=1">
<title>HEMZON | <?php echo $_POST["cal"];?></title>
<link rel="stylesheet" href="shop.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
rel="stylesheet">
<link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css"/>
</head>
<body>

<div id="wrapper">

<div class="container-fluid"><!--gridシステム使用-->

  <!-- ヘッダー画面 -->
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

<!-- トップナビ -->
<nav class="top_nav">

　<ul class="row">

    <li class="col-lg-1"><div class="sp-menu"><span class="material-icons" id="open">menu</span></div></li>
    <li class="col-lg-1"><a href="newitem.php">新着商品</a></li>
　  <li class="col-lg-1"><a href="history.php">購入履歴</a></li>
　  <li class="col-lg-1"><a href="ranking.php">ランキング</a></li>

　</ul>

</nav>
<!-- トップナビ終了 -->

<!-- スライドショー -->
<nav>

  <ul id="slide">

			<li><img src="images/slide1.jpg" alt=""></li>
			<li><img src="images/slide2.jpg" alt=""></li>
			<li><img src="images/slide3.jpg" alt=""></li>
			<li><img src="images/slide4.jpg" alt=""></li>

	</ul>

</nav>
<!-- スライドショー終了 -->


<div class="overlay">

  <span class="material-icons" id="close">close</span>
  <!--個別にこんにちは  -->
  <p><?php echo $_SESSION['name'];?>さん、こんにちは</p>
  <!-- ログアウト -->
  <p><a href="logout.php">ログアウト</a></p>

  <h2>カテゴリー別</h2>
  <!-- カテゴリーを自動生成 -->
  <?php foreach($_SESSION['category'] as $c):?>

    <form action="category.php" name="<?php echo "cat_".$c;?>" method="post">
    <input type="hidden" name="cal" value="<?php echo $c;?>">
    <a href="<?php echo "javascript: cat_".$c.".submit()";?>"><?php echo $c;?></a>
    </form>

  <?php endforeach; ?>

</div>

<!-- ハンバーガーメニュー ナビ終了 -->

<main>
<!-- 商品一覧画面 -->
<div id="items">

<div class="table-resposive row">

  <?php foreach ($categorys as $cate): ?> <!--テーブルgoodsからカラムを取り出す-->

    <table class="table table-striped table-bordered col-lg-4">
    <tr class="item_img">

      <td>
        <?php echo img_tag($cate['code']) ?> <!--codeから値を取り出す-->
      </td>
      <td>
        <p class="goods"><?php echo $cate['name'] ?></p>
        <p><?php echo nl2br($cate['comment']) ?></p>
      </td>

      <td width="80">

        <p><?php echo $cate['price'] ?> 円</p>
        <form action="cart.php" method="post"> <!--form部分-->
          <select name="num">
            <?php
              for ($i = 0; $i <= 9; $i++) { //処理9回まわす
                echo "<option>$i</option>"; //<option>タグと値を生成
              }
            ?>
          </select>
          <input type="hidden" name="code" value="<?php echo $cate['code'] ?>">
          <input type="submit" name="submit" value="カートへ">
        </form>

      </td>

    </tr>
    </table>

  <?php endforeach; ?>

</div>

</div>
<!-- 商品一覧画面終了-->
</main>

<p><a href="index.php">トップページに戻る</a></p>

<!-- フッター -->
<footer>

  <p><a href="newitem.php">新着商品</a></p>
  <p><a href="history.php">購入履歴</a></p>
  <p><a href="ranking.php">ランキング</a></p>

  <p class="copyrights"><small>&copy;2021 Hemzon.All rights reserved.</small></p>
  
</footer>
<!-- フッター終了 -->

</div>

</div>

  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
	<script type="text/javascript" src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
</body>
</html>