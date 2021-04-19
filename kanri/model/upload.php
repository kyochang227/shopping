<!-- 画像をアップロードするページのプログラム部分 -->
<?php

  require('../controller/common.php');

  $error = '';

  if (@$_POST['submit']) {

    $code = $_POST['code'];

    if (move_uploaded_file($_FILES['pic']['tmp_name'], "../../images/$code.jpg")) {

      header('Location: ../model/index.php');
      exit();

    } else {

      $error .= 'ファイルを選択してください。<br>';

    }

  } else {

    $code = $_GET['code'];

  }

  require('../view/t_upload.php');

?>