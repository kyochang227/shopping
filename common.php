<!-- 共通処理、関数を定義したもの　すべてのページから読み込まれる -->
<?php 
  session_start();

  function connect() {
    return new PDO("mysql:dbname=shop", "root");//値を渡す
  }

  function img_tag($code) {
    if (file_exists("images/$code.jpg")) $name = $code;
    else $name = 'noimage';
    return '<img src="images/' . $name . '.jpg" width="100px" height="100px" alt="">';//例:1.jpg
  }
?>