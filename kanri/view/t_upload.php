<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="robots" content="noindex,nofollow">
<title>SHOPPING | 画像追加画面</title>
<link rel="stylesheet" href="../../shop.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
rel="stylesheet">
<link rel="stylesheet" href="../../bootstrap-4.1.3-dist/css/bootstrap.min.css"/>
</head>
<body>

<div id="wrapper">

<div class="container-fluid"><!--gridシステム使用-->

<header>
  <h1 class="kanri">画像追加</h1>
</header>

<main>

<div class="base_kanri">

  <form action="../model/upload.php" method="post" enctype="multipart/form-data">
    <p>
      商品画像（JPEGのみ）<br>
      <input type="file" name="pic">
    </p>
      <?php if($error['img'] == 'blank'):?>
        <p class="error">*画像を選択してください。</p>        
      <?php endif;?>
    <p>
      <input type="hidden" name="code" value="<?php echo $code ?>">
      <input type="submit" name="submit" value="追加">
    </p>
  </form>

</div>

</main>

<div class="base">
  <a href="../model/index.php">一覧に戻る</a>　
</div>

</div>

</div>


  <script src="../../js/jquery-3.5.1.min.js"></script>
  <script src="../../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
	<script type="text/javascript" src="../../bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../../js/main.js"></script>
</body>
</html>