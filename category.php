<?php
require 'common.php';

$calname=$_POST['cal'];
$pdo=connect();
$st=$pdo->prepare("SELECT * FROM goods WHERE category='".$calname."'");
$st->execute();
$categorys=$st->fetchAll();

require 't_category.php';
?>