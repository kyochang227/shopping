<?php
require 'common.php';

$pdo=connect();

$st=$pdo->query("SELECT * FROM buy_history");
$history=$st->fetchAll();
$st->closeCursor();

require 't_history.php';
?>