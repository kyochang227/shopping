<!-- 購入確認画面　プログラム部分 -->
<?php
    require('common.php');

    $pdo=connect();

    $user_id=$_SESSION['id'];
    $name=htmlspecialchars($_SESSION['buy']['name'],ENT_QUOTES);
    $address=htmlspecialchars($_SESSION['buy']['address'],ENT_QUOTES);
    $tel=htmlspecialchars($_SESSION['buy']['tel'],ENT_QUOTES);
    //購入する商品を表示
    $rows=$_SESSION['history'];

    //セッションに購入者の情報がなかった場合
    if(!isset($_SESSION['buy'])){

        header('Location: buy.php');
        exit();

    }

    //購入ボタンを押したら
    if(!empty($_POST)){

        for($i=0;$i<count($rows);$i++){

        $item_name= $rows[$i]['name'];
        $item_price= $rows[$i]['price'];
        $item_num= $rows[$i]['num'];
        $item_sum = $rows[$i]['sum'];
    
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

    require('t_buy_check.php');
?>