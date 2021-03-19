<!-- 購入確認画面　プログラム部分 -->
<?php
    require('../controller/common.php');

    $pdo=connect();

    $user_id=$_SESSION['id']; //ログインユーザーのid
    $name=htmlspecialchars($_SESSION['buy']['name'],ENT_QUOTES); //入力氏名
    $address=htmlspecialchars($_SESSION['buy']['address'],ENT_QUOTES); //入力住所
    $tel=htmlspecialchars($_SESSION['buy']['tel'],ENT_QUOTES); //入力電話番号

    //購入する商品を表示
    $rows=$_SESSION['history'];

    //セッションに購入者の情報がなかった場合
    if(!isset($_SESSION['buy'])){
        //トップ画面に戻る
        header('Location: buy.php');
        exit();

    }

    //購入ボタンを押したら
    if(!empty($_POST)){
        //データベースの購入履歴に入力データを挿入
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

    //ログイン情報以外のセッションを全て空にする
    $_SESSION['buy']=null;
    $_SESSION['cart']=null;
    $_SESSION['history']=null;

    //購入間画面に遷移
    header('Location: ../view/t_buy_complete.php');

    }

    require('../view/t_buy_check.php');
?>