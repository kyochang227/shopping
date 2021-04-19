<!-- 商品一覧ページのデザイン部分 -->
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="robots" content="noindex,nofollow">
<title>SHOPPING | 管理画面トップ</title>
<link rel="stylesheet" href="../../shop.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
rel="stylesheet">
<link rel="stylesheet" href="../../bootstrap-4.1.3-dist/css/bootstrap.min.css"/>
</head>
<body>

<div id="wrapper">

<div class="container-fluid"><!--gridシステム使用-->

<header>
  <h1>管理画面</h1>
</header>

<main>
<!-- 商品一覧画面 -->
<div class="items">

    <div class="table-resposive row">

    <?php foreach ($goods as $g): ?> <!--テーブルgoodsのカラムから値を取り出す-->

    <table class="table table-striped table-bordered col-lg-4">
    <tr>

      <td class="item_img">
        <?php echo img_tag($g['code']) ;?> <!--codeから値を取り出す-->
      </td>
      <td>
        <p class="goods"><?php echo $g['name'] ;?></p>
        <p><?php echo nl2br($g['comment']) ;?></p>

      </td>

      <td width="80">
        <p><?php echo $g['price'] ?> 円</p>
        <p><a href="../model/edit.php?code=<?php echo $g['code'] ?>">修正</a></p>
        <p><a href="../model/upload.php?code=<?php echo $g['code'] ?>">画像</a></p>
        <p><a href="../model/delete.php?code=<?php echo $g['code'] ?>" onclick="return confirm('削除してよろしいですか？')">削除</a></p>
      </td>

    </tr>
    </table>

    <?php endforeach;?>
    
    </div>

</div>
<!-- 商品一覧画面終了 -->

</main>

<div class="base">
  <a href="../model/insert.php">新規追加</a>　
  <a href="../../model/index.php" target="_blank">サイト確認</a>
</div>

</div>

</div>


  <script src="../../js/jquery-3.5.1.min.js"></script>
  <script src="../../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
	<script type="text/javascript" src="../../bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../../js/main.js"></script>
</body>
</html>