<!-- 購入確認画面 デザイン部分 -->
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Hemzon | 購入確認</title>
<link rel="stylesheet" href="shop.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
rel="stylesheet">
<link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css"/>
</head>
<body>

<div id="wrapper">

<div class="base_buy">

<h1>入力項目及び購入する商品をご確認下さい</h1>

<form action="" method="post" enctype="multipart/form-data">

    <input type="hidden" name="action" value="submit">
    <dl>

        <dt>名前</dt>

        <dd>
        <?php echo $name ;?>
        </dd> 

        <dt>住所</dt>

        <dd>
        <?php echo $address ;?>
        </dd>

        <dt>電話番号</dt>

        <dd>
        <?php echo $tel ;?>
        </dd>

    </dl>
    <div><input type="submit" value="購入"></div>

</form>

<h2>購入商品</h2>

<div class="container table-resposive">

<table class="<?php echo $class;?> table table-striped table-bordered">

  <tr><th>商品名</th><th>単価</th><th>数量</th><th>小計</th></tr>

  <?php foreach($rows as $r):?>

  <tr>
    <td><?php echo $r['name'] ;?></td>
    <td><?php echo $r['price'] ;?></td>
    <td><?php echo $r['num'] ;?></td>
    <td><?php echo $r['price'] * $r['num'] ;?>円</td>
  </tr>

  <?php endforeach;?>

  <tr>
    <td colspan='2'></td>
    <td><strong>合計</strong></td>
    <td><?php echo $r['sum'] ;?>円</td>  
  </tr>

</table>

</div>

<div class="base">
  <a href="index.php">お買い物に戻る</a>　
  <a href="cart.php">カートに戻る</a>
</div>

</div>

</div>

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
	<script type="text/javascript" src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>