<!-- 購入確認画面　プログラム部分 -->
<?php
require 'common.php';

if(!isset($_SESSION['buy'])){
    header('Location: buy.php');
    exit();
}

if(!empty($_POST)){
    $_SESSION['buy']=null;
    $_SESSION['cart']=null;

    header('Location: t_buy_complete.php');
}

require 't_buy_check.php';
?>