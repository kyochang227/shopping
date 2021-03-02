<!-- 商品追加ページのデザイン部分 -->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>商品追加</title>
<link rel="stylesheet" href="kanri.css">
</head>
<body>
<div class="base">
  <?php if ($error) echo "<span class=\"error\">$error</span>" ?>
  <form action="insert.php" method="post">
    <p>
      商品名<br>
      <input type="text" name="name" value="<?php echo $name ?>">
    </p>
    <p>
      読み方(平仮名)<br>
      <input type="text" name="name_ruby" value="<?php echo $name_ruby ?>">
    </p>
    <p>
      カテゴリー<br>
    <select name="category">
      <?php
        foreach($cate as $ca){
          echo "<option value=$ca>".$ca."</option>";
        }
      ?>
    </select>
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
      <input type="submit" name="submit" value="追加">
    </p>
  </form>
</div>
<div class="base">
  <a href="index.php">一覧に戻る</a>　
</div>
</body>
</html>