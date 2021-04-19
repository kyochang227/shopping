<!-- 商品を削除するページ -->
<?php
  require('../controller/common.php');

  $pdo = connect();
  $code = $_GET['code'];

  $st = $pdo->prepare("DELETE FROM goods WHERE code=:code");
  $st->bindParam(':code',$code);
  $st->execute();
  $st->closeCursor();
  
  header('Location: ../model/index.php');
?>