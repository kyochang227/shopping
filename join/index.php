<!-- 会員登録画面 -->
<?php
    require('../controller/common.php');

    $pdo=connect();

    $name=htmlspecialchars($_POST['name'],ENT_QUOTES);
    $email=htmlspecialchars($_POST['email'],ENT_QUOTES);
    $password=htmlspecialchars($_POST['password'],ENT_QUOTES);

    //email正規表現
    $mailcheck="/^[a-zA-Z0-9]+[a-zA-Z0-9\._-]*@[a-zA-Z0-9_-]+.[a-zA-Z0-9\._-]+$/";

    //エラー項目の確認
    if(!empty($_POST)){

        //入力欄が空だった場合
        if($_POST['name'] == ''){

            $error['name'] = 'blank';

        }
    
        if($_POST['email'] == ''){

            $error['email'] = 'blank';

        }
        if($_POST['password'] == ''){

            $error['password']='blank';

        }

    //重複アカウントチェック
    if(empty($error)){

        $member=$pdo->prepare('SELECT COUNT(*) AS cnt FROM members WHERE email=?');
        $member->execute(array($_POST['email']));
        $record=$member->fetch();

        if($record['cnt']>0){

            $error['email']='duplicate';

        }

    }

    if(!preg_match($mailcheck,$_POST['email'])){

        $error['email']='typo';

    }
   
    //パスワード正規表現
    if(!(preg_match("/^[a-zA-Z0-9]{8,20}$/",$_POST['password'])//8字以上20文字以下
    && preg_match("/[a-z]+/",$_POST['password']) //アルファベット小文字は存在するか
    && preg_match("/[A-Z]+/",$_POST['password'])//アルファベット大文字は存在するか
    && preg_match("/[0-9+]+/",$_POST['password']))){//数字は存在するか

        $error['password']='typo';
    }
    
    //エラーがなかった場合
    if(empty($error)){

        $_SESSION['join']=$_POST;
        header('Location: check.php');
        exit();

    }

}

//書き直し
if($_REQUEST['action']=='rewrite'){

    $_POST=$_SESSION['join'];

}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Hemzon 新規会員登録</title>
<link rel="stylesheet" href="../shop.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
rel="stylesheet">
<link rel="stylesheet" href="../bootstrap-4.1.3-dist/css/bootstrap.min.css"/>
</head>
<body>

<div id="wrapper">

<div class="registration">

<h1>次のフォームをに必要事項をご記入ください。</h1>

<form action="" method="post" enctype="multipart/form-data">

    <dl>
        <dt>氏名<span class="required">必須</span></dt>

        <dd>
            <input type="text" name="name" size="35" maxlength="255"
            value="<?php echo $name ;?>">

            <?php if($error['name'] == 'blank'):?>
            <p class="error">*氏名を入力してください</p>        
            <?php endif;?>

        </dd>

        <dt>メールアドレス<span class="required">必須</span></dt>

        <dd>
            <input type="text" name="email" size="35" maxlength="255"
            value="<?php echo $email ;?>">

            <?php if($error['email'] == 'blank'):?>
            <p class="error">*メールアドレスを入力してください</p>        
            <?php endif;?>

            <?php if($error['email'] == 'typo'):?>
            <p class="error">*メールアドレスの入力に誤りがあります。</p>        
            <?php endif;?>

            <?php if($error['email'] == 'duplicate'):?>
            <p class="error">*指定されたメールアドレスは既に登録されています</p>        
            <?php endif;?>
        </dd>

        <dt>パスワード<span class="required">必須</span></dt>

        <dd>
            <input type="password" name="password" size="10" maxlength="20"
            value="<?php echo $password ;?>">
        
            <?php if($error['password'] == 'blank'):?>
            <p class="error">*パスワードを入力してください</p>        
            <?php endif;?>

            <?php if($error['password'] == 'typo'):?>
            <p class="error">*パスワードの入力に誤りがあります。<br>
            半角英数字を使用し、8文字以上入力してください</p>        
            <?php endif;?>

        </dd>    
    </dl>

    <div class="base">
        <input type="submit" value="入力内容を確認する"><br>
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