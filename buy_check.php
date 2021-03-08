<!-- 購入確認画面　プログラム部分 -->
<?php
require 'common.php';

$user_id=$_SESSION['id'];
$name=$_SESSION['buy']['name'];
$address=$_SESSION['buy']['address'];
$tel=$_SESSION['buy']['tel'];

if(!isset($_SESSION['buy'])){
    header('Location: buy.php');
    exit();
}

if(!empty($_POST)){
    $pdo=connect();
    for($i=0;$i<count($_SESSION['history']);$i++){
        $item_name=$_SESSION['history'][$i]['name'];
        $item_price=$_SESSION['history'][$i]['price'];
        $item_num=$_SESSION['history'][$i]['num'];
        $item_sum = $_SESSION['history'][$i]['sum'];
    
        $st=$pdo->prepare("INSERT INTO buy_history (user_id,name,address,tel,item_name,item_price,item_num,item_sum,created_at)
        VALUES (".$user_id.", '".$name."','".$address."','".$tel."','".$item_name."',".$item_price.",".$item_num.",".$item_sum.",NOW())");
        $st->execute();
        $st->closeCursor();
    }


    $_SESSION['buy']=null;
    $_SESSION['cart']=null;
    $_SESSION['history']=null;

    header('Location: t_buy_complete.php');
}

require 't_buy_check.php';
?>