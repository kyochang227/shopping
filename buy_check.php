<!-- 購入確認画面　プログラム部分 -->
<?php
require 'common.php';

$user_id=$_SESSION['id'];
$name=$_SESSION['buy']['name'];
$address=$_SESSION['buy']['address'];
$tel=$_SESSION['buy']['tel'];
$item_name=$_SESSION['history']['name'];
$item_price=$_SESSION['history']['price'];
$item_num=$_SESSION['history']['num'];
$item_sum = $_SESSION['history']['sum'];

if(!isset($_SESSION['buy'])){
    header('Location: buy.php');
    exit();
}

if(!empty($_POST)){
    $pdo=connect();
    $st=$pdo->prepare("INSERT INTO buy_history (user_id,name,address,tel,item_name,item_price,item_num,item_sum,created_at)
    VALUES (".$user_id.", '".$name."','".$address."','".$tel."','".$item_name."',".$item_price.",".$item_num.",".$item_sum.",NOW())");
    $st->execute();
    $st->closeCursor();

    $_SESSION['buy']=null;
    $_SESSION['cart']=null;
    $_SESSION['history']=null;

    header('Location: t_buy_complete.php');
}

require 't_buy_check.php';
?>