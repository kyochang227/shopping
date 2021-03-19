<!-- 共通処理、関数を定義したもの　すべてのページから読み込まれる -->
<?php 
  session_start();

  //PDOを渡す関数
  function connect() {

    try{
      //値を渡す
      return new PDO('mysql:host=localhost;dbname=shop;charset=utf8','root');

    } catch (PDOException $e){
      //エラー表示
      echo 'DB接続エラー: ' . $e->getMessage();
      
    }
    
  }

  //商品写真表示の関数
  //例:1.jpg→codeが1の商品に挿入される
  //それ以外はnoimage.jpgが挿入される
  function img_tag($code) {

    if (file_exists("../images/$code.jpg")){
      
      $name = $code;

    } else {

      $name = 'noimage';

    }

    return '<img src="../images/' . $name . '.jpg" width="100px" height="100px" alt="">';//例:1.jpg
  }

?>