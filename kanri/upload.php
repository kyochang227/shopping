<!-- 画像をアップロードするページのプログラム部分 -->
<?php
  require 'common.php';
  $error = '';
  if (@$_POST['submit']) {
    $code = $_POST['code'];
    if (move_uploaded_file($_FILES['pic']['tmp_name'], "../images/$code.jpg")) {
      header('Location: index.php');
      exit();
    } else {
      $error .= 'ファイルを選択してください。<br>';
    }
  } else {
    $code = $_GET['code'];//画像アドレスは$_GET['code'].jpgで表示される
  }
  require 't_upload.php';
?>