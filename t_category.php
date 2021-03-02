<!-- 商品画面デザイン部分　システム部分 -->
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-sacale=1">
<title>"<?php echo htmlspecialchars($_POST["keyword"],ENT_QUOTES,'UTF-8')."の検索結果";?>"</title>
<link rel="stylesheet" href="shop.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
rel="stylesheet">
</head>
<body>
<div id="wrapper">

<!-- ここからヘッダー画面 -->
<header id="top_content">
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
　  <li><span class="material-icons" id="open">menu</span>すべて</li>
　  <li>ランキング</li>
　  <li><a href="login.php">ログイン</a></li>
　  <li>新着商品</li>
　</ul>
</nav>

<div class="overlay">
  <nav>
    <ul>
      <li>DVD</li>
      <li>ゲーム</li>
      <li>服</li>
      <li>本</li>
      <li>パソコン</li>
    </ul>
  </nav>
</div>

<main>
<div id="items">
<table>
  <?php foreach ($categorys as $cate) { ?> <!--テーブルgoodsからカラムを取り出す-->
    <tr>
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
  <?php } ?>
</table>
</div>
</main>

<p><a href="index.php">戻る</a></p>

<footer>
  <small>&copy;2021 Hemzon.All rights reserved.</small>
</footer>

</div>

  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>