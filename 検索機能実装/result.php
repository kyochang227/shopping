<?php
require('kensaku.php');

try{
    $db=new PDO('mysql:dbname=kensaku;host=127.0.0.1;charset=utf8',
    'root','');
    } catch (PDOException $e){
        echo 'DB接続エラー:' . $e->getMessage();
    }

$keyword=$_POST["keyword"];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-sacale=1">
<title><?php echo htmlspecialchars($_POST["keyword"],ENT_QUOTES,'UTF-8')."の検索結果";?></title>
</head>
<body>
<p><a href="kensaku.php">戻る</a></p>
<?php

$keyword='%'.$keyword.'%';
$stmt=$db->prepare("SELECT * FROM information WHERE title LIKE :keyword OR comment LIKE :keyword OR ruby LIKE :keyword");//:=$ $keywordをsql文で使用できるようにする
$stmt->bindParam(':keyword',$keyword,PDO::PARAM_STR);
$stmt->execute();

while($result=$stmt->fetch(PDO::FETCH_ASSOC)){
    echo '<p>'.htmlspecialchars($result['title'],ENT_QUOTES,'UTF-8').'</p>';    
    echo '<p>'.htmlspecialchars($result['comment'],ENT_QUOTES,'UTF-8').'<br></p>';    
}
?>
</body>
</html>