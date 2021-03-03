<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Hemzon 新規会員登録確認画面</title>
<link rel="stylesheet" href="shop.css">
</head>
<body>
<h2>入力項目及び購入する商品をご確認下さい</h2>
<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="action" value="submit">
    <dl>
        <dt>名前</dt>
        <dd>
        <?php echo htmlspecialchars($_SESSION['buy']['name'],ENT_QUOTES); ?>
        </dd>    
        <dt>住所</dt>
        <dd>
        <?php echo htmlspecialchars($_SESSION['buy']['address'],ENT_QUOTES); ?>
        </dd>    
        <dt>電話番号</dt>
        <dd>
        <?php echo htmlspecialchars($_SESSION['buy']['tel'],ENT_QUOTES); ?>
        </dd>    
    </dl>
    <div><input type="submit" value="購入"></div>
</form>
</body>
</html>