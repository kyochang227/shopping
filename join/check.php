<!-- 会員登録画面　入力内容確認画面 -->
<?php
require('../common.php');

if(!isset($_SESSION['join'])){
    header('Location: index.php');
    exit();
}

if(!empty($_POST)){
    //登録処理をする
    $db=connect();
    $st=$db->prepare('INSERT INTO members SET name=?,email=?,
    password=?,created=NOW()');
    echo $ret=$st->execute(array(
        $_SESSION['join']['name'],
        $_SESSION['join']['email'],
        sha1($_SESSION['join']['password'])
    ));
    unset($_SESSION['join']);

    header('Location: thanks.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Hemzon 新規会員登録確認画面</title>
<link rel="stylesheet" href="shop.css">
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="action" value="submit">
    <dl>
        <dt>氏名</dt>
        <dd>
        <?php echo htmlspecialchars($_SESSION['join']['name'],ENT_QUOTES); ?>
        </dd>    
        <dt>メールアドレス</dt>
        <dd>
        <?php echo htmlspecialchars($_SESSION['join']['email'],ENT_QUOTES); ?>
        </dd>    
        <dt>パスワード</dt>
        <dd>
        【表示されません】
        </dd>    
    </dl>
    <div><a href="index.php?action=rewrite">&laquo;&nbsp;書き直す</a> | <input type="submit" value="登録する   "></div>
</form>
</body>
</html>