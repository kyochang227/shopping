<!-- ログイン画面 -->
<?php
require('../controller/common.php');

$pdo = connect();

$password = htmlspecialchars($_POST['password'],ENT_QUOTES); //ユーザーが入力したパスワード
$email = htmlspecialchars($_POST['email'],ENT_QUOTES); //ユーザーが入力したメールアドレス
$error = $error['login']; //エラー

//自動ログイン
if($_COOKIE['email'] != ''){ //Cookieの'email'に値があった場合$_POSTにCookieの値が入れられる

    $email = $_COOKIE['email']; //ログイン画面をまたいでトップ画面に遷移する
    $password = $_COOKIE['password'];
    $_POST['save'] = 'on';

}

if(!empty($_POST)){
    //ログインの処理
    //ユーザーが入力したemailとpasswordが一致する情報を探す
    if($email !='' && $password !=''){

        $login=$pdo->prepare("SELECT * FROM members WHERE email=? AND
        password=?");
        $login->execute(array(

            $email,
            sha1($password)
            
        ));
        $member = $login->fetch();
        $login->closeCursor();

        if($member){ //メンバーが存在する場合

            $_SESSION['id']=$member['id'];
            $_SESSION['time']=time();
            $_SESSION['name']=$member['name'];
            $_SESSION['email']=$member['email'];
            $_SESSION['password']=$member['password'];

            //ログイン情報を記録する
            if($_POST['save']=='on'){ //次回からは自動で自動的にログインするにチェックした時クッキーに値を入れる
                setcookie('email', $email, time() + 60*60*24*14); //2週間有効
                setcookie('password', $password, time() + 60*60*24*14); //2週間有効
            }

            header('Location: ../model/index.php');
            exit();

        }else {

            $er = 'failed';
            
        }
    }else{

        $er = 'blank';
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Hemzon | ログイン画面</title>
<link rel="stylesheet" href="../shop.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
rel="stylesheet">
<link rel="stylesheet" href="../bootstrap-4.1.3-dist/css/bootstrap.min.css"/>
</head>
<body>

<div id="wrapper">

    <section id="lead">
        <h1>下記項目を入力し、ログインして下さい。</h1>
        <h2>入会手続きがまだの方はこちらからどうぞ。</h2>
        <p>&raquo;<a href="../join/index.php">入会手続きをする</a></p>
    </section>

    <form action="" method="post" class="login">

        <dl>
            <dt>メールアドレス</dt>
        
            <dd>

            <input type="text" name="email" size="35" maxlength="255"
            value="<?php echo $email; ?>">
        
            <?php if($er == 'blank'):?>
            <p class="error">*メールアドレスとパスワードをご記入ください。</p>
            <?php endif;?>
        
            <?php if($er =='failed'):?>
            <p class="error">*ログインに失敗しました。正しくご記入ください</p>
            <?php endif;?>

            </dd>

            <dt>パスワード</dt>

            <dd>

            <input type="password" name="password" size="12" maxlength="255">
            </dd>

            <dt>ログイン情報の記録</dt>

            <dd>

            <input type="checkbox" name="save" value="on"><label 
            for="save">次回からは自動的にログインする</label>

            </dd>
        </dl>

        <div><input type="submit" value="ログインする"></div>

    </form>

</div>

    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
	<script type="text/javascript" src="../bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>
</body>
</html>