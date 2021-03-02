<?php
    
    //データベースへ接続
    try{
    $db=new PDO('mysql:dbname=kensaku;host=127.0.0.1;charset=utf8',
    'root','');
    } catch (PDOException $e){
        echo 'DB接続エラー:' . $e->getMessage();
    }

    $keyword=$_POST["user_name"];
    $keyword='%'.$keyword.'%';

    if(@$_POST['id'] != "" || @$_POST['user_name'] != ""){
        $stmt=$db->query("SELECT * FROM user_list 
        WHERE ID='".$_POST["id"]."' OR Name LIKE '%".$_POST["user_name"]."%'");
    } 
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>検索フォームを作ろう</title>
</head>
<body>
<form action="user_list.php" method="post">
    ID:<input type="text" name="id" value="<?php echo $_POST['id']?>">
    <?php
        //正規表現
        if(preg_match("/[^0-9A-Za-z]/",$_POST['id'])){
        echo "IDは英数字で入力してください!";
        }
    ?>
    <br>
    Name:<input type="text" name="user_name" value="<?php echo $_POST['user_name']?>"><br>
    <input type="submit">
</form>
<table>
<tr><th>ID</th><th>User Name</th></tr>
<!--    ここでPHPのforeachを使って結果をループさせる -->
<?php foreach ($stmt as $row):?>
    <tr><td><?php echo $row[0]?></td><td><?php echo $row[1]?></td></tr>
<?php endforeach;?>
</table>
</body>
</html>