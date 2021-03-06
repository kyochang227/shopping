<!-- 検索でキャッチした商品のみ表示する　システム部分 -->
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="robots" content="noindex,nofollow">
<title>SHOPPING | "<?php echo htmlspecialchars($_POST["keyword"],ENT_QUOTES,'UTF-8');?>"の検索結果</title>
<link rel="stylesheet" href="../shop.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
rel="stylesheet">
<link rel="stylesheet" href="../bootstrap-4.1.3-dist/css/bootstrap.min.css"/>
</head>
<body>
<div id="wrapper">

<div class="container-fluid"><!--gridシステム使用-->

  <!-- ここからヘッダー画面 -->
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

<!-- ここからナビ部分 -->
<nav class="top_nav">

　<ul class="row">

    <li class="col-lg-1"><div class="sp-menu"><span class="material-icons" id="open">menu</span></div></li>
    <li class="col-lg-1"><a href="../model/newitem.php">新着商品</a></li>
　  <li class="col-lg-1"><a href="../model/history.php">購入履歴</a></li>
　  <li class="col-lg-1"><a href="../model/ranking.php">ランキング</a></li>

　</ul>

</nav>

<!-- スライドショー -->
<div class="slideshow">

  <ul id="slide">

			<li><img src="../images/slide1.jpg" alt=""></li>
			<li><img src="../images/slide2.jpg" alt=""></li>
			<li><img src="../images/slide3.jpg" alt=""></li>
			<li><img src="../images/slide4.jpg" alt=""></li>

	</ul>
  
</div>

<div class="overlay">
  <span class="material-icons" id="close">close</span>
     <!--個別にこんにちは  -->
     <p><?php echo $_SESSION['name'];?>さん、こんにちは</p>
  <!-- ログアウト -->
  <p><a href="../model/logout.php">ログアウト</a></p>

  <h2>カテゴリー別</h2>
  <?php foreach($_SESSION['category'] as $c):?>
      <form action="../model/category.php" name="<?php echo "cat_".$c;?>" method="post">
      <input type="hidden" name="cal" value="<?php echo $c;?>">
      <a href="<?php echo "javascript: cat_".$c.".submit()";?>"><?php echo $c;?></a>
    </form>
  <?php endforeach; ?>
</div>

<!-- ナビ部分終了 -->

<main>
<div id="items">

<!-- 該当商品がなかった場合に表示 -->
<?php
if($item==null){
  echo "<div class='"."container null"."'>";
  echo "<p>".$keywordemp."</p>";
  echo "</div>";
}
?>

<div class="table-resposive row">

  <?php foreach ($item as $it):?> <!--テーブルgoodsからカラムを取り出す-->
    <table class="table table-striped table-bordered col-lg-4">
    <tr class="item_img">
      <td>
        <?php echo img_tag($it['code']) ?> <!--codeから値を取り出す-->
      </td>
      <td>
        <p class="goods"><?php echo $it['name'] ?></p>
        <p><?php echo nl2br($it['comment']) ?></p>
      </td>
      <td width="80">
        <p><?php echo $it['price'] ?> 円</p>
        <form action="cart.php" method="post"> <!--form部分-->
          <select name="num">
            <?php
              for ($i = 0; $i <= 9; $i++) { //処理9回まわす
                echo "<option>$i</option>"; //<option>タグと値を生成
              }
            ?>
          </select>
          <input type="hidden" name="code" value="<?php echo $it['code'] ?>">
          <input type="submit" name="submit" value="カートへ">
        </form>
      </td>
    </tr>
    </table>
  <?php endforeach; ?>

</div>

</div>
</main>

<p><a href="../model/index.php">トップページに戻る</a></p>

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