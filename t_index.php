<!DOCTYPE html> <!--トップページのデザイン-->
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Hemzon ホーム画面</title>
<link rel="stylesheet" href="shop.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
rel="stylesheet">
</head>
<body>
<div id="wrapper">
<!-- ここからヘッダー画面 -->
<header class="header">
  <h1><a href="#">HEMZON.CO.JP</a></h1>
  <!-- 商品検索 -->
  <form action="item.php" method="post" class="keyword">
    <label for="search">商品検索</label>
    <input type="search" name="keyword">
    <input type="submit" value="検索">
  </form>
  <!-- ログアウト -->
  <p><a href="logout.php">ログアウト</a></p>
   <!--個別にこんにちは  -->
  <p><?php echo $_SESSION['name'];?>さん、こんにちは</p>
  <span class="material-icons"><a href="cart.php">add_shopping_cart カート</a></span>       
</header>
<!-- ヘッダー終了 -->
<!-- ここからナビ部分 -->
<nav class="top_nav">
　<ul>
    <li><div class="sp-menu"><span class="material-icons" id="open">menu</span></div></li>
　  <li>ランキング</li>
　  <li><a href="login.php">ログイン</a></li>
　  <li>新着商品</li>
　</ul>
</nav>

<div class="overlay">
  <span class="material-icons" id="close">close</span>

  <?php foreach($_SESSION['category'] as $c):?>
      <form action="category.php" name="<?php echo "cat_".$c;?>" method="post">
      <input type="hidden" name="cal" value="<?php echo $c;?>">
      <a href="<?php echo "javascript: cat_".$c.".submit()";?>"><?php echo $c;?></a>
    </form>
  <?php endforeach; ?>
</div>

<!-- ナビ部分終了 -->

<main>
<!-- ここから商品一覧画面 -->
<div id="items">
<table>
  <?php foreach ($goods as $g) { ?> <!--テーブルgoodsからカラムを取り出す-->
    <tr>
      <td>
        <?php echo img_tag($g['code']) ?> <!--codeから値を取り出す-->
      </td>
      <td>
        <p class="goods"><?php echo $g['name'] ?></p>
        <p><?php echo nl2br($g['comment']) ?></p>
      </td>
      <td width="80">
        <p><?php echo $g['price'] ?> 円</p>
        <form action="cart.php" method="post"> <!--form部分-->
          <select name="num">
            <?php
              for ($i = 0; $i <= 9; $i++) { //処理9回まわす
                echo "<option>$i</option>"; //<option>タグと値を生成
              }
            ?>
          </select>
          <input type="hidden" name="code" value="<?php echo $g['code'] ?>">
          <input type="submit" name="submit" value="カートへ">
        </form>
      </td>
    </tr>
  <?php } ?>
</table>
</div>

</main>

<footer>
  <small>&copy;2021 Hemzon.All rights reserved.</small>
</footer>

</div>

  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>