<!--トップページのデザイン-->
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="robots" content="noindex,nofollow">
<title>SHOPPING | <?php echo $goods[0]['name'] ;?></title>
<link rel="stylesheet" href="../shop.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
rel="stylesheet">
<link rel="stylesheet" href="../bootstrap-4.1.3-dist/css/bootstrap.min.css"/>
</head>
<body>
  
<div id="wrapper">

<div class="container-fluid"><!--gridシステム使用-->

  <!-- ヘッダー -->
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

<!-- ハンバーガーメニュー ナビ -->
<div class="overlay">
  <!-- ハンバーガーメニューを閉じる -->
  <span class="material-icons" id="close">close</span>
  <!--個別にこんにちは  -->
  <p><?php echo $_SESSION['name'];?>さん、こんにちは</p>
  <!-- ログアウト -->
  <p><a href="logout.php">ログアウト</a></p>

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

<!-- ナビ部分終了 -->

<main>
<!-- 商品一覧画面 -->
<div class="items container">

    <div class="table-resposive row">

    <?php foreach ($goods as $g): ?> <!--テーブルgoodsのカラムから値を取り出す-->

    <table class="table table-striped table-bordered col-lg-12">
    <tr>
      <td style="text-align: center;">
        <h1><?php echo $g['name'] ;?></h1>
      </td>
    </tr>
    <tr style="text-align: center;">
      <td class="goods_img">
        <?php echo img_tag($g['code']) ;?> <!--codeから値を取り出す-->
      </td>
    </tr>
    <tr style="text-align: center;">
      <td>
      
        <p><?php echo nl2br($g['comment']) ;?></p>

      </td>
    </tr>
    <tr>

      <td width="80" style="text-align: center;">

        <p><?php echo $g['price'] ;?> 円</p>
        <form action="cart.php" method="post"> <!--form部分-->
          <select name="num">
            <?php
              for ($i = 0; $i <= 9; $i++) { //処理9回まわす
                echo "<option>$i</option>"; //<option>タグと値を生成
              }
            ?>
          </select>
          <input type="hidden" name="code" value="<?php echo $g['code'] ;?>"><!--隠しインプットで$g['code']を検査-->
          <input type="submit" name="submit" value="カートへ"><!--カート画面へ遷移-->
        </form>

      </td>
    </tr>

    </table>

    <?php endforeach;?>
    
    </div>

</div>
<!-- 商品一覧画面終了 -->

</main>

<p><a href="../model/index.php">トップページに戻る</a></p>

<!-- フッター -->
<footer>

  <p><a href="../model/newitem.php">新着商品</a></p>
  <p><a href="../model/history.php">購入履歴</a></p>
  <p><a href="../model/ranking.php">ランキング</a></p>

  <p class="copyrights"><small>&copy;2021 SHOPPING.All rights reserved.</small></p>
  
</footer>
<!-- フッター終了 -->

</div>

</div>

  <script src="../js/jquery-3.5.1.min.js"></script>
  <script src="../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
  <script type="text/javascript" src="../bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/main.js"></script>
</body>
</html>