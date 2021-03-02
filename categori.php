<?php
require 'common.php';

$pdo=connect();
$st=$pdo->prepare("SELECT * FROM goods WHERE category='DVD'");
$st->execute();
$categorys=$st->fetchAll();

require 't_category.php';
?>