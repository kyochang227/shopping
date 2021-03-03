<!-- 検索でキャッチした商品のみ表示する　システム部分 -->
<?php
require 'common.php';

$pdo = connect();
$keyword=$_POST['keyword'];
$keyword='%'.$keyword.'%';
$st=$pdo->prepare("SELECT * FROM goods WHERE name LIKE :keyword OR name_ruby LIKE :keyword");//:=$ $keywordをsql文で使用できるようにする
$st->bindParam(':keyword',$keyword,PDO::PARAM_STR);
$st->execute();
$item=$st->fetchAll();

//検索に引っかからなかった場合
$keywordemp="商品が見当たりません";
$class="hidden";
if($item==null){
    echo $keywordemp;
}

require 't_item.php'
?>