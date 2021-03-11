<!-- 会員登録画面　入力内容確認画面 -->
<?php
require('../controller/common.php');

$pdo=connect();

if(!isset($_SESSION['join'])){

    header('Location: index.php');
    exit();

}

if(!empty($_POST)){

    //登録処理をする
    $st=$pdo->prepare('INSERT INTO members SET name=?,email=?,
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
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Hemzon 新規会員登録確認画面</title>
<link rel="stylesheet" href="../shop.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
rel="stylesheet">
<link rel="stylesheet" href="../bootstrap-4.1.3-dist/css/bootstrap.min.css"/>
</head>
<body>

<div id="wrapper">

<div class="registration">

<h1>入力内容を確認してください</h1>

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

    <div class="base">
        <a href="index.php?action=rewrite">&laquo;&nbsp;書き直す</a> | <input type="submit" value="登録する"><br>
        <a href="../model/login.php">ログイン画面に戻る</a>
    </div>

</form>

</div>

</div>

    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
	<script type="text/javascript" src="../bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>
</body>
</html>