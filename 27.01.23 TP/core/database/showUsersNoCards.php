
<?php

require_once __DIR__ . './database.php';

$showUsersNoCards = $pdo->prepare('SELECT firstName, lastName FROM `clients` WHERE card = 0');
$showUsersNoCards->execute();

$getUsersNoCards = $showUsersNoCards->fetchAll();


