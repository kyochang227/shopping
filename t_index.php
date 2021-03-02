<!DOCTYPE html> <!--トップページのデザイン-->
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Hemzon 公式サイト</title>
<link rel="stylesheet" href="shop.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
rel="stylesheet">
</head>
<body>
<div id="wrapper">
<!-- ここからヘッダー画面 -->
<header class="header">
  <h1>hemzon.co.jp</h1>
  <form action="item.php" method="post" class="keyword">
    <label for="search">商品検索</label>
    <input type="search" name="keyword">
    <input type="submit" value="検索">
  </form>
  <p><a href="logout.php">ログアウト</a></p>        
</header>
<!-- ヘッダー画面終了 -->
<!-- ここからナビ部分 -->
<nav class="top_nav">
　<ul>
　  <li>ランキング</li>
　  <li><a href="login.php">ログイン</a></li>
　  <li>新着商品</li>
　</ul>
</nav>

<form action="categori.php" method="post">
  <input type="hidden" name="DVD" value="<?php echo $goods['category'] ?>">
  <input type="submit" value="DVD">
</form>
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