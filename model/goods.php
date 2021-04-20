<?php

require('../controller/common.php');

$pdo = connect();
$code = $_POST['code']; 

$st=$pdo->prepare("SELECT * FROM goods WHERE code = :code");
$st->bindParam(':code',$code);
$st->execute();
$goods = $st->fetchAll(PDO::FETCH_ASSOC);
$st->closeCursor();

require('../view/t_goods.php');
?>